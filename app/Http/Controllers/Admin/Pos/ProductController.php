<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductAll()
    {
        $product = Product::with(['supplier', 'category', 'unit'])->latest()->get();

        return view('admin.backend.product.index', compact('product'));
    }

    public function ProductCreate()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();

        return view('admin.backend.product.create', compact('suppliers', 'categories', 'units'));
    }

    public function ProductStore(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
        ], [
            'name.required' => 'Name is required',
            'supplier_id.required' => 'Supplier is required',
            'category_id.required' => 'Category is required',
            'unit_id.required' => 'Unit is required',
        ]);

        Product::create(array_merge($validatedData, [
            'created_by' => Auth::id(),
        ]));

        $notification = [
            'message' => 'Product created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('product.all')->with($notification);
    }

    public function ProductEdit($id)
    {
        $product = Product::with(['supplier', 'category', 'unit'])->findOrFail($id);
        $suppliers = Supplier::all();
        $categories = Category::all();
        $units = Unit::all();

        return view('admin.backend.product.edit', compact('product', 'suppliers', 'categories', 'units'));
    }

    public function ProductUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
        ], [
            'name.required' => 'Name is required',
            'supplier_id.required' => 'Supplier is required',
            'category_id.required' => 'Category is required',
            'unit_id.required' => 'Unit is required',
        ]);

        Product::findOrFail($id)->update(array_merge($validatedData, [
            'updated_by' => Auth::user()->id,
        ]));

        $notification = [
            'message' => 'Product updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('product.all')->with($notification);
    }

    public function ProductDelete($id)
    {
        Product::findOrFail($id)->delete();

        $notification = [
            'message' => 'Product deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('product.all')->with($notification);
    }
}
