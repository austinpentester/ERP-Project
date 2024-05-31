<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainModel;

class QuotationController extends Controller
{
    public $obj;

    function __construct()
    {
        $this->obj=new MainModel();
    }

    public function quotation(){

        // show customer info
        $result=$this->obj->getDatas('customer_details');
        // shpw product information
        $products=$this->obj->getDatas('products');
        // show tax
        $taxes=$this->obj->getDatas('taxes');
        return view('quotation/quotation')->with('datas',$result)->with('products', $products)->with('taxes', $taxes);
    }

    public function getContactPersons(Request $request) {
        $customerId = $request->input('customerId');
        $where = [
            'customerId' => $customerId
        ];
        $contactPersons = $this->obj->getDatasWhere('contact_details',$where);
        return response()->json($contactPersons);
    }

    public function getproductDetails(Request $request){
        $product_Id = $request->input('product_Id');
        $where = [
            'id' => $product_Id
        ];
        $product = $this->obj->getDatasWhere('products',$where);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $quotationData = $request->input('quotation_data');

        // Extract form input fields data
        $customerName = $quotationData['customer_name'];
        $contactPerson = $quotationData['contact_person'];
        $quotationNumber = $quotationData['quotation_number'];
        $quotationDate = $quotationData['quotation_date'];
        $quotationValidDate = $quotationData['quotation_valid_date'];
        $employeeName = $quotationData['employee_name'];
        $quotationTime = $quotationData['quotation_time'];
        $taxType = $quotationData['tax_type'];
        $clientReference = $quotationData['client_reference'];

        // Extract table row data
        $products = $quotationData['quotation_data'];

        // Prepare data for insertion
        $insertData = [];

        foreach ($products as $product) {
            $insertData[] = [
                'quotation_num' => $quotationNumber,
                'customerName' => $customerName,
                'contact_person' => $contactPerson,
                'quotation_date' => $quotationDate,
                'quotation_valid_date' => $quotationValidDate,
                'employee_name' => $employeeName,
                'quotation_time' => $quotationTime,
                'tax_type' => $taxType,
                'client_ref' => $clientReference,
                'product_name' => $product['product_name'],
                'major_head' => $product['major_head'],
                'hsn_code' => $product['hsn_code'],
                'uom' => $product['uom'],
                'length' => $product['length'],
                'width' => $product['width'],
                'qty' => $product['qty'],
                'unit_price' => $product['unit_price'],
                'total' => $product['total']
            ];
        }

        // Insert all data into the database
        $this->obj->insert('quotation', $insertData);
        // Set session variable
        session()->flash('ins', 'Quotation created successfully!');
        return response()->json([
            'success' => true,
            'redirect_url' => route('quotation.index')
        ]);
    }



    //to view a table

    public function T_quotation(){
        return view('quotation/T_quotation');
    }




















}
