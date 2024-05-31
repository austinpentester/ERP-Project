<?php

namespace App\Http\Controllers;
use App\Models\MainModel;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public $obj;

    function __construct()
    {
        $this->obj=new MainModel();
    }

    function sup_products()
    {
        $where=[
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('sup_products',$where);
        return view('supplier.sup_products')->with('datas',$result);
    }
    function sup_product_cr()
    {
        $where=[
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('category',$where);
        return view('supplier.sup_product_cr')->with('cat',$result);
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

    function sup_pr_edit($id)
    {
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->getDataWhere('sup_products',$where);
        return view('supplier.sup_pr_edit')->with('data',$result);
    }

    function sup_product_upd(Request $req,$id)
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

        if($pr_img)
        {
            $image_path = null;
            if ($pr_img) {
                $image_name = $pr_img->getClientOriginalName();
                $image_path = '/uploads/Supplier_Product_Images/' . $image_name; // Concatenate directory path with filename
                $pr_img->move(public_path('/uploads/Supplier_Product_Images'), $image_name);
            }
            $data['pr_img']=$image_path;
        }
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->updateWhere('sup_products',$data,$where);
        if($result)
        {
            return redirect('sup_products')->with('ins','Product Updated');
        }
        else
        {
            return back()->with('ins','Product not Updated');
        }
    }

    function sup_pr_dlt($id)
    {
        $where=[
            'id'=>$id
        ];

        $data=[
            'status'=>1
        ];

        $result=$this->obj->updateWhere('sup_products',$data,$where);
        if($result)
        {
            return redirect('sup_products')->with('ins','Product Deleted');
        }
        else
        {
            return redirect('sup_products')->with('ins','Product not Deleted');
        }
    }

    function sup_pr_view($id)
    {
        $where=[
            'id'=>$id
        ];
        $result=$this->obj->getDataWhere('sup_products',$where);
        return view('supplier.sup_pr_view')->with('data',$result);
    }

    // purchase table lists
    function sup_purchase()
    {
        $where=[
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('sup_purchase_ins',$where);
        return view('supplier.sup_purchase')->with('datas',$result);
    }
    function sup_purchase_cr()
    {
        $result['sup_dts']=$this->obj->getDatas('supplier_details');
        $where=[
            'status'=>0
        ];
        $result['sup_prd']=$this->obj->getDatas('sup_products');
        return view('supplier.sup_purchase_cr')->with('datas',$result);
    }

    // getting product details via ajax
    function sup_prd_dts_ajx(Request $req)
    {
        $where=[
            'id'=>$req->input('pr_id'),
            'status'=>0
        ];
        $result=$this->obj->getDatasWhere('sup_products',$where);
        if($result)
        {
            return response()->json($result);
        }
        else
        {
            return response()->json(['message' =>'hi']);
        }
    }

    function sup_purchase_ins(Request $req)
    {
        $invoice = $req->input('invoice');
        $supplier = $req->input('supplier');
        $purchase_date = $req->input('purchase_date');
        $pr_names = $req->input('pr_name');
        $quantities = $req->input('quantity');
        $pr_prizes = $req->input('pr_prize');
        $pr_imgs = $req->input('pr_img');
        $stocks = $req->input('stock');
        $mrps = $req->input('mrp');
        $sales = $req->input('sale');
        $exp_dates = $req->input('exp_date');
        $sub_totals = $req->input('sub_total');
        $grandTotal_v = $req->input('grandTotal_v');

        $result = [];

        // Loop through each product entry
        for ($i = 0; $i < count($pr_names); $i++) {
            $data = [
                'invoice' => $invoice,
                'supplier_id' => $supplier,
                'purchase_date' => $purchase_date,
                'pr_name' => $pr_names[$i],
                'quantity' => $quantities[$i],
                'pr_prize' => $pr_prizes[$i],
                'pr_img' => $pr_imgs[$i],
                'stock' => $stocks[$i],
                'mrp' => $mrps[$i],
                'sale' => $sales[$i],
                'exp_date' => $exp_dates[$i],
                'sub_total' => $sub_totals[$i],
                'grandTotal_v' => $grandTotal_v,
            ];

            // Insert the data into the database
            $result[] = DB::table('sup_purchase_ins')->insert($data);
        }

        // Check if any insert failed
        $success = !in_array(false, $result);

        // dd($success);

        if($success)
        {
            return redirect('sup_purchase')->with('ins',"Purchase Order Confirmed");
        }
        else
        {
            return back()->with('ins',"Not Purchase");
        }
    }

}
?>
