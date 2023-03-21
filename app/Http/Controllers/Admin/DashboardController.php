<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $products, $product;

    public function index ()
    {
        return view('backend.dashboard.index');
    }

    public function addProducts ()
    {
        return view('backend.product.add');
    }

    public function newProducts (Request $request)
    {
        $this->product = Product::newProducts($request);
        return redirect()->back()->with('success', 'Product Created Successfully');
    }

    public function manageProducts ()
    {
        $this->products = Product::all();

        return view('backend.product.manage', [
            'products' => $this->products
        ]);
    }

    public function deleteProducts ($id)
    {
        $this->product = Product::find($id);
        if(isset($this->product->image))
        {
            if (file_exists($this->product->image))
            {
                unlink($this->product->image);
            }
        }
        $this->product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function editProducts ($id)
    {
        $this->product = Product::find($id);
        return view('backend.product.edit', [
            'product' => $this->product
        ]);
    }

    public function updateProducts (Request $request, $id)
    {
        $this->product = Product::updateProducts($request, $id);
        return redirect()->route('products.manage')->with('success', 'Product Updated Successfully');
    }
}
