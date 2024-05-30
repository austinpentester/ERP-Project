<?php

namespace App\Http\Controllers;

use App\Models\MainModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $mainModel;

    public function __construct(MainModel $mainModel)
    {
        $this->mainModel = $mainModel;
    }

    public function index()
    {
        return view('Product');
    }

    public function indexTable()
    {
        $products = $this->mainModel->getDatas('products');
        return view('P_Table', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_name' => 'required',
            'category' => 'required',
            'product_name' => 'required',
            'measurement' => 'required',
            'hsn_code' => 'required',
            'initial_stocks' => 'required|integer',
            'production_prize' => 'required|numeric',
            'mrp' => 'required|numeric',
            'sale_prize' => 'required|numeric',
            'expiry_date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data = [
            'branch_name' => $request->branch_name,
            'category' => $request->category,
            'product_name' => $request->product_name,
            'measurement' => $request->measurement,
            'hsn_code' => $request->hsn_code,
            'description' => $request->description,
            'initial_stocks' => $request->initial_stocks,
            'lot_no' => $request->lot_no,
            'quantity_alert' => $request->quantity_alert,
            'production_prize' => $request->production_prize,
            'mrp' => $request->mrp,
            'sale_prize' => $request->sale_prize,
            'expiry_date' => $request->expiry_date,
            'image' => $imageName,
        ];

        $this->mainModel->insert('products', $data);

        return redirect()->route('products.Table')->with('success','Product created successfully.');
    }

    public function destroy($id)
    {
        $where = ['id' => $id];
        $product = $this->mainModel->dltWhere('products', $where);
        return redirect()->route('products.Table')->with('success', 'Product deleted successfully.');
    }

    public function indexUpdate($id)
    {
        $where = ['id' => $id];
        $updatedProduct = $this->mainModel->getDataWhere('products', $where);
        return view('EditProduct', compact('updatedProduct'));
    }


    public function indexView($id)
    {
        $where = ['id' => $id];
        $updatedProduct = $this->mainModel->getDataWhere('products', $where);
        return view('ViewProduct', compact('updatedProduct'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'branch_name' => 'required',
            'category' => 'required',
            'product_name' => 'required',
            'measurement' => 'required',
            'hsn_code' => 'required',
            'initial_stocks' => 'required|integer',
            'production_prize' => 'required|numeric',
            'mrp' => 'required|numeric',
            'sale_prize' => 'required|numeric',
            'expiry_date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Assuming image is optional for editing
        ]);

        $data = [
            'branch_name' => $request->branch_name,
            'category' => $request->category,
            'product_name' => $request->product_name,
            'measurement' => $request->measurement,
            'hsn_code' => $request->hsn_code,
            'description' => $request->description,
            'initial_stocks' => $request->initial_stocks,
            'lot_no' => $request->lot_no,
            'quantity_alert' => $request->quantity_alert,
            'production_prize' => $request->production_prize,
            'mrp' => $request->mrp,
            'sale_prize' => $request->sale_prize,
            'expiry_date' => $request->expiry_date,
        ];

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $id = $request->id;
        $where = ['id' => $id];
        $this->mainModel->updateWhere('products', $data, $where);

        return redirect()->route('products.Table', ['id' => $id])->with('success', 'Product updated successfully.');
    }
}

