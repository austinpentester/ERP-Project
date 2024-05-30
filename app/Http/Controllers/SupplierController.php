<?php

namespace App\Http\Controllers;
use App\Models\MainModel;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public $obj;

    function __construct()
    {
        $this->obj=new MainModel();
    }

    function sup_products()
    {
        $result=$this->obj->getDatas('sup_products');
        return view('supplier.sup_products')->with('datas',$result);
    }
    function sup_product_cr()
    {
        return view('supplier.sup_product_cr');
    }

    function sup_product_ins(Request $req)
    {
        $pr_name=$req->input('pr_name');
        $pr_cat=$req->input('pr_cat');
        $branch=$req->input('branch');
        $pr_img=$req->file('pr_img');
        $measurement=$req->input('measurement');
        $hsn_code=$req->input('hsn_code');
        $desc=$req->input('desc');
        $stock=$req->input('stock');
        $lot_no=$req->input('lot_no');
        $qty=$req->input('qty');
        $pr_prize=$req->input('pr_prize');
        $mrp=$req->input('mrp');
        $sale=$req->input('sale');
        $exp_date=$req->input('exp_date');

        $data=[
            'pr_name'=>$pr_name,
            'pr_cat'=>$pr_cat,
            'branch'=>$branch,
            'measurement'=>$measurement,
            'hsn_code'=>$hsn_code,
            'description'=>$desc,
            'stock'=>$stock,
            'lot_no'=>$lot_no,
            'qty'=>$qty,
            'pr_prize'=>$pr_prize,
            'mrp'=>$mrp,
            'sale'=>$sale,
            'exp_date'=>$exp_date,
        ];

        $image_path = null;
        if ($pr_img) {
            $image_name = $pr_img->getClientOriginalName();
            $image_path = '/uploads/Supplier_Product_Images/' . $image_name; // Concatenate directory path with filename
            $pr_img->move(public_path('/uploads/Supplier_Product_Images'), $image_name);
        }
        $data['pr_img']=$image_path;
        $result=$this->obj->insert('sup_products',$data);
        if($result)
        {
            return redirect('sup_products')->with('ins','Product Created');
        }
        else
        {
            return back()->with('ins','Product not Create');   
        }
    }
}
?>