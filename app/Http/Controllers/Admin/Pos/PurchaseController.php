<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;

class PurchaseController extends Controller
{
    public function PurchaseAll()
    {
        $purchase = Purchase::orderby('date', 'desc')->orderby('id', 'desc')->get();

        return view('admin.backend.purchase.index', compact('purchase'));
    }

    public function PurchaseCreate()
    {
        $suppliers = Supplier::all();
        $categories = Category::all();
        $products = Product::all();
        $units = Unit::all();

        return view('admin.backend.purchase.create', compact('suppliers', 'categories', 'products', 'units'));
    }
}
