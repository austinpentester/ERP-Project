<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MainModel;

class PartyController extends Controller
{
    private $obj;

    public function __construct()
    {
        $this->obj = new MainModel();
    }


    // customer feild
    // customer feild
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'branch' => 'nullable|string|max:255',
            'customerName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|string|max:255',
            'mobileNumber' => 'required|string|max:15',
            'gstNo' => 'nullable|string|max:15',
            'panNo' => 'nullable|string|max:15',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'billingAddress' => 'required|string|max:500',
            'shippingAddress' => 'required|string|max:500',
            'contactPersonName' => 'required|array',
            'contactPersonName.*' => 'required|string|max:255',
            'contactMobileNumber' => 'required|array',
            'contactMobileNumber.*' => 'required|string|max:15',
            'designation' => 'required|array',
            'designation.*' => 'required|string|max:255',
            'contactEmail' => 'nullable|array',
            'contactEmail.*' => 'nullable|email|max:255',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('imageUpload')) {
            $imagePath = $request->file('imageUpload')->store('customer_images', 'public');
        }

        // Insert the customer details
        $customerData = [
            'cus_id' => $request->cus_id,
            'branch' => $request->branch,
            'customerName' => $request->customerName,
            'email' => $request->email,
            'website' => $request->website,
            'mobileNumber' => $request->mobileNumber,
            'gstNo' => $request->gstNo,
            'panNo' => $request->panNo,
            'imageUpload' => $imagePath,
            'billingAddress' => $request->billingAddress,
            'shippingAddress' => $request->shippingAddress,
        ];
        $customerId = $this->obj->insertCustomer('customer_details', $customerData);

        // Insert the contact details
        $contactDetails = [];
        for ($i = 0; $i < count($request->contactPersonName); $i++) {
            $contactDetails[] = [
                'customerId' => $customerId,
                'contactPersonName' => $request->contactPersonName[$i],
                'contactMobileNumber' => $request->contactMobileNumber[$i],
                'designation' => $request->designation[$i],
                'contactEmail' => $request->contactEmail[$i] ?? null,
            ];
        }
        $this->obj->insertCustomer('contact_details', $contactDetails);

        return redirect()->back()->with('success', 'Customer details have been added successfully.');
    }
    public function customer_upd(Request $request,$id)
    {
        $cd_id[]=$request->cd_id;
        // Validate the incoming request data
        $request->validate([
            'branch' => 'nullable|string|max:255',
            'customerName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|string|max:255',
            'mobileNumber' => 'required|string|max:15',
            'gstNo' => 'nullable|string|max:15',
            'panNo' => 'nullable|string|max:15',
            'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'billingAddress' => 'required|string|max:500',
            'shippingAddress' => 'required|string|max:500',
            'contactPersonName' => 'required|array',
            'contactPersonName.*' => 'required|string|max:255',
            'contactMobileNumber' => 'required|array',
            'contactMobileNumber.*' => 'required|string|max:15',
            'designation' => 'required|array',
            'designation.*' => 'required|string|max:255',
            'contactEmail' => 'nullable|array',
            'contactEmail.*' => 'nullable|email|max:255',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('imageUpload')) {
            $imagePath = $request->file('imageUpload')->store('customer_images', 'public');
        }

        // Insert the customer details
        $customerData = [
            'cus_id' => $request->cus_id,
            'branch' => $request->branch,
            'customerName' => $request->customerName,
            'email' => $request->email,
            'website' => $request->website,
            'mobileNumber' => $request->mobileNumber,
            'gstNo' => $request->gstNo,
            'panNo' => $request->panNo,
            'imageUpload' => $imagePath,
            'billingAddress' => $request->billingAddress,
            'shippingAddress' => $request->shippingAddress,
        ];
        // $customerId = $this->obj->insertCustomer('customer_details', $customerData);

        // Insert the contact details
        $contactDetails = [];
        $where1=[
            'customerId'=>$id
        ];
        // dd($where1);
        for ($i = 0; $i < count($request->contactPersonName); $i++) {
            $contactDetails[] = [
                'customerId' => $id,
                'contactPersonName' => $request->contactPersonName[$i],
                'contactMobileNumber' => $request->contactMobileNumber[$i],
                'designation' => $request->designation[$i],
                'contactEmail' => $request->contactEmail[$i] ?? null,
            ];
        // dd($contactDetails);

            // $result=$this->obj->updateWhere('contact_details',$contactDetails,$where1);
            // dd($result);
        }
        // $this->obj->insertCustomer('contact_details', $contactDetails);
        $where=[
            'id'=>$id
        ];

        $result=$this->obj->updateWhere('customer_details',$customerData,$where);
        $this->obj->updateWhereloop('contact_details',$contactDetails,$where1,$cd_id);

        // if($result)
        // {
            return redirect('C_Table')->with('success', 'Customer details have been update successfully.');
        // }

    }



    public function showCustomerDetailsForm()
    {
        $result=$this->obj->getLastData('customer_details','cus_id');
        // dd($result);
        $id=$result->cus_id+1;
        return view('Customer')->with('data',$id);
    }


 // customer feild
 public function store1(Request $request)
 {

      // Validate the incoming request data
      $request->validate([
        'branch' => 'nullable|string|max:255',
        'supplierName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'nullable|string|max:255',
        'mobileNumber' => 'required|string|max:15',
        'gstNo' => 'nullable|string|max:15',
        'panNo' => 'nullable|string|max:15',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'billingAddress' => 'required|string|max:500',
        'shippingAddress' => 'required|string|max:500',
        'contactPersonName' => 'required|array',
        'contactPersonName.*' => 'required|string|max:255',
        'contactMobileNumber' => 'required|array',
        'contactMobileNumber.*' => 'required|string|max:15',
        'designation' => 'required|array',
        'designation.*' => 'required|string|max:255',
        'contactEmail' => 'nullable|array',
        'contactEmail.*' => 'nullable|email|max:255',
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('imageUpload')) {
        $imagePath = $request->file('imageUpload')->store('supplier_images', 'public');
    }

    // Insert the supplier details
    $supplierData = [
        'sup_id' => $request->sup_id,
        'branch' => $request->branch,
        'supplierName' => $request->supplierName,
        'email' => $request->email,
        'website' => $request->website,
        'mobileNumber' => $request->mobileNumber,
        'gstNo' => $request->gstNo,
        'panNo' => $request->panNo,
        'imageUpload' => $imagePath,
        'billingAddress' => $request->billingAddress,
        'shippingAddress' => $request->shippingAddress,
    ];
    $supplierId = $this->obj->insertSupplier('supplier_details', $supplierData);

    // Insert the contact details
    $contactDetails = [];
    for ($i = 0; $i < count($request->contactPersonName); $i++) {
        $contactDetails[] = [
            'supplierId' => $supplierId,
            'contactPersonName' => $request->contactPersonName[$i],
            'contactMobileNumber' => $request->contactMobileNumber[$i],
            'designation' => $request->designation[$i],
            'contactEmail' => $request->contactEmail[$i] ?? null,
        ];
    }
    $this->obj->insertSupplier('s_contact_details', $contactDetails);

    return redirect()->back()->with('success', 'Supplier details have been added successfully.');
 }
 public function supplier_upd(Request $request,$id)
 {

      // Validate the incoming request data
      $request->validate([
        'branch' => 'nullable|string|max:255',
        'supplierName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'nullable|string|max:255',
        'mobileNumber' => 'required|string|max:15',
        'gstNo' => 'nullable|string|max:15',
        'panNo' => 'nullable|string|max:15',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'billingAddress' => 'required|string|max:500',
        'shippingAddress' => 'required|string|max:500',
        'contactPersonName' => 'required|array',
        'contactPersonName.*' => 'required|string|max:255',
        'contactMobileNumber' => 'required|array',
        'contactMobileNumber.*' => 'required|string|max:15',
        'designation' => 'required|array',
        'designation.*' => 'required|string|max:255',
        'contactEmail' => 'nullable|array',
        'contactEmail.*' => 'nullable|email|max:255',
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('imageUpload')) {
        $imagePath = $request->file('imageUpload')->store('supplier_images', 'public');
    }

    // Insert the supplier details
    $supplierData = [
        'branch' => $request->branch,
        'supplierName' => $request->supplierName,
        'email' => $request->email,
        'website' => $request->website,
        'mobileNumber' => $request->mobileNumber,
        'gstNo' => $request->gstNo,
        'panNo' => $request->panNo,
        'imageUpload' => $imagePath,
        'billingAddress' => $request->billingAddress,
        'shippingAddress' => $request->shippingAddress,
    ];
    // $supplierId = $this->obj->insertSupplier('supplier_details', $supplierData);

    // Insert the contact details
    $contactDetails = [];
    for ($i = 0; $i < count($request->contactPersonName); $i++) {
        $contactDetails[] = [
            'supplierId' => $id,
            'contactPersonName' => $request->contactPersonName[$i],
            'contactMobileNumber' => $request->contactMobileNumber[$i],
            'designation' => $request->designation[$i],
            'contactEmail' => $request->contactEmail[$i] ?? null,
        ];
    }
    // $this->obj->insertSupplier('s_contact_details', $contactDetails);
    $cd_id[]=$request->cd_id;

    $where1=[
                'supplierId'=>$id
            ];
    $where=[
        'id'=>$id
    ];

    $result=$this->obj->updateWhere('supplier_details',$supplierData,$where);
    $result1=$this->obj->updateWhereloop('s_contact_details',$contactDetails,$where1,$cd_id);

    // if($result || $result1)
    // {
        return redirect('S_Table')->with('success', 'Supplier details have been added successfully.');
    // }
    // else
    // {
    //     echo 'hi';
    // }
 }




 public function showSupplierDetailsForm()
 {
    $result=$this->obj->getLastData('supplier_details','sup_id');
    return view('Supplier')->with('data',$result);
 }


 // distributor_details field



public function store2(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'branch' => 'nullable|string|max:255',
        'distributorName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'nullable|string|max:255',
        'mobileNumber' => 'required|string|max:15',
        'gstNo' => 'nullable|string|max:15',
        'panNo' => 'nullable|string|max:15',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'billingAddress' => 'required|string|max:500',
        'shippingAddress' => 'required|string|max:500',
        'contactPersonName' => 'required|array',
        'contactPersonName.*' => 'required|string|max:255',
        'contactMobileNumber' => 'required|array',
        'contactMobileNumber.*' => 'required|string|max:15',
        'designation' => 'required|array',
        'designation.*' => 'required|string|max:255',
        'contactEmail' => 'nullable|array',
        'contactEmail.*' => 'nullable|email|max:255',
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('imageUpload')) {
        $imagePath = $request->file('imageUpload')->store('distributor_images', 'public');
    }

    // Insert the distributor details
    $distributorData = [
        'dis_id' => $request->dis_id,
        'branch' => $request->branch,
        'distributorName' => $request->distributorName,
        'email' => $request->email,
        'website' => $request->website,
        'mobileNumber' => $request->mobileNumber,
        'gstNo' => $request->gstNo,
        'panNo' => $request->panNo,
        'imageUpload' => $imagePath,
        'billingAddress' => $request->billingAddress,
        'shippingAddress' => $request->shippingAddress,
    ];
    $distributorId = $this->obj->insertSupplier('distributor_details', $distributorData);

    // Insert the contact details
    $contactDetails = [];
    for ($i = 0; $i < count($request->contactPersonName); $i++) {
        $contactDetails[] = [
            'distributorId' => $distributorId,
            'contactPersonName' => $request->contactPersonName[$i],
            'contactMobileNumber' => $request->contactMobileNumber[$i],
            'designation' => $request->designation[$i],
            'contactEmail' => $request->contactEmail[$i] ?? null,
        ];
    }
    $this->obj->insertSupplier('d_contact_details', $contactDetails);

    return redirect()->back()->with('success', 'Distributor details have been added successfully.');
}
public function distributor_upd(Request $request,$id)
{
    // Validate the incoming request data
    $request->validate([
        'branch' => 'nullable|string|max:255',
        'distributorName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'website' => 'nullable|string|max:255',
        'mobileNumber' => 'required|string|max:15',
        'gstNo' => 'nullable|string|max:15',
        'panNo' => 'nullable|string|max:15',
        'imageUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'billingAddress' => 'required|string|max:500',
        'shippingAddress' => 'required|string|max:500',
        'contactPersonName' => 'required|array',
        'contactPersonName.*' => 'required|string|max:255',
        'contactMobileNumber' => 'required|array',
        'contactMobileNumber.*' => 'required|string|max:15',
        'designation' => 'required|array',
        'designation.*' => 'required|string|max:255',
        'contactEmail' => 'nullable|array',
        'contactEmail.*' => 'nullable|email|max:255',
    ]);

    // Handle file upload
    $imagePath = null;
    if ($request->hasFile('imageUpload')) {
        $imagePath = $request->file('imageUpload')->store('distributor_images', 'public');
    }

    // Insert the distributor details
    $distributorData = [
        'branch' => $request->branch,
        'distributorName' => $request->distributorName,
        'email' => $request->email,
        'website' => $request->website,
        'mobileNumber' => $request->mobileNumber,
        'gstNo' => $request->gstNo,
        'panNo' => $request->panNo,
        'imageUpload' => $imagePath,
        'billingAddress' => $request->billingAddress,
        'shippingAddress' => $request->shippingAddress,
    ];
    // $distributorId = $this->obj->insertSupplier('distributor_details', $distributorData);

    // Insert the contact details
    $contactDetails = [];
    for ($i = 0; $i < count($request->contactPersonName); $i++) {
        $contactDetails[] = [
            'distributorId' => $id,
            'contactPersonName' => $request->contactPersonName[$i],
            'contactMobileNumber' => $request->contactMobileNumber[$i],
            'designation' => $request->designation[$i],
            'contactEmail' => $request->contactEmail[$i] ?? null,
        ];
    }
    // $this->obj->insertSupplier('d_contact_details', $contactDetails);
    $cd_id[]=$request->cd_id;

    $where1=[
                'distributorId'=>$id
            ];
    $where=[
        'id'=>$id
    ];

    $this->obj->updateWhere('distributor_details',$distributorData,$where);
    $this->obj->updateWhereloop('d_contact_details',$contactDetails,$where1,$cd_id);

    return redirect()->back()->with('success', 'Distributor details have been added successfully.');
}




 public function showdistributorDetailsForm()
 {
    $result=$this->obj->getLastData('distributor_details','dis_id');
    if($result==null)
    {
        $result['dis_id']=0;
    }
     return view('Distributor')->with('data',$result);
 }

    function c_Table()
    {
        $where=[
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('customer_details',$where);
        // $where1=[
        //     'customerId'=>$result[0]->id
        // ];
        // $result1=$this->obj->getDatasWhere('contact_details',$where1);
        return view('C_Table')->with('datas',$result);
    }
    function s_Table()
    {
        // $where=[
        //     'status'=>0
        // ];
        $result=$this->obj->getDatas('supplier_details');
        return view('S_Table')->with('datas',$result);
    }
    function d_Table()
    {
        // $where=[
        //     'status'=>0
        // ];
        $result=$this->obj->getDatas('distributor_details');
        return view('D_Table')->with('datas',$result);
    }

    function c_edit($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'customerId'=>$id
        ];
        $result=$this->obj->getDataWhere('customer_details',$where);
        $result2=$this->obj->getDatasWhere('contact_details',$where1);
        return view('c_edit')->with('data2',$result2)->with('data',$result);
    }

    function c_dlt($id)
    {
        $where=[
            'customerId'=>$id
        ];
        $where1=[
            'id'=>$id
        ];
        $this->obj->dltWhere('customer_details',$where1);
        $this->obj->dltWhere('contact_details',$where);

        return redirect('C_Table');
    }

    function c_view($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'customerId'=>$id
        ];
        $result=$this->obj->getDataWhere('customer_details',$where);
        $result2=$this->obj->getDatasWhere('contact_details',$where1);
        return view('c_view')->with('data2',$result2)->with('data',$result);
    }

    function s_edit($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'supplierId'=>$id
        ];
        $result=$this->obj->getDataWhere('supplier_details',$where);
        $result2=$this->obj->getDatasWhere('s_contact_details',$where1);
        return view('s_edit')->with('data2',$result2)->with('data',$result);
    }

    function s_dlt($id)
    {
        $where=[
            'supplierId'=>$id
        ];
        $where1=[
            'id'=>$id
        ];
        $this->obj->dltWhere('supplier_details',$where1);
        $this->obj->dltWhere('s_contact_details',$where);

        return redirect('S_Table');
    }

    function s_view($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'supplierId'=>$id
        ];
        $result=$this->obj->getDataWhere('supplier_details',$where);
        $result2=$this->obj->getDatasWhere('s_contact_details',$where1);
        return view('s_view')->with('data2',$result2)->with('data',$result);
    }

    function d_edit($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'distributorId'=>$id
        ];
        $result=$this->obj->getDataWhere('distributor_details',$where);
        $result2=$this->obj->getDatasWhere('d_contact_details',$where1);
        return view('d_edit')->with('data2',$result2)->with('data',$result);
    }

    function d_dlt($id)
    {
        $where=[
            'distributorId'=>$id
        ];
        $where1=[
            'id'=>$id
        ];
        $this->obj->dltWhere('distributor_details',$where1);
        $this->obj->dltWhere('d_contact_details',$where);

        return redirect('S_Table');
    }

    function d_view($id)
    {
        $where=[
            'id'=>$id
        ];
        $where1=[
            'distributorId'=>$id
        ];
        $result=$this->obj->getDataWhere('distributor_details',$where);
        $result2=$this->obj->getDatasWhere('d_contact_details',$where1);
        return view('d_view')->with('data2',$result2)->with('data',$result);
    }

}
?>
