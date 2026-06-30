<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function getCategory(Request $request)
    {
        $supplier = $request->supplier_id;

        $category = Product::with('category')->select('category_id')->where('supplier_id', $supplier)->groupBy('category_id')->get();

        return response()->json($category);
    }

    public function getProduct(Request $request)
    {
        $category_id = $request->category_id;

        $product = Product::where('category_id', $category_id)->get();

        return response()->json($product);
    }
}
