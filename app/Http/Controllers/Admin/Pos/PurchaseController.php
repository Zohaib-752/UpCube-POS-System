<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Unit;
use Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function PurchaseAll()
    {
        $purchase = Purchase::with(['supplier', 'category', 'product'])->orderby('date', 'desc')->orderby('id', 'desc')->get();

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

    public function PurchaseStore(Request $request)
    {

        if ($request->category_id == null) {
            $notification = [
                'message' => 'Select atleast one Category',
                'type' => 'error',
            ];

            return redirect()->back()->with($notification);
        } else {
            $count_cat = count($request->category_id);

            for ($i = 0; $i < $count_cat; $i++) {
                $purchase = new Purchase;

                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->supplier_id = $request->supplier_id[$i];
                $purchase->category_id = $request->category_id[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->description = $request->description[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->created_by = Auth::user()->id;
                $purchase->save();
            }

            $notification = [
                'message' => 'Purchase Added Successfully',
                'type' => 'success',
            ];

            return redirect()->route('purchase.all')->with($notification);
        }
    }

    public function PurchaseDelete($id)
    {
        Purchase::findOrFail($id)->delete();

        $notification = [
            'message' => 'Purchase Deleted Successfully',
            'type' => 'success',
        ];

        return redirect()->route('purchase.all')->with($notification);
    }

    public function PurchasePending()
    {
        $pendings = Purchase::with(['supplier', 'category', 'product'])->where('status', 0)->orderby('date', 'desc')->orderby('id', 'desc')->get();

        return view('admin.backend.purchase.pending', compact('pendings'));
    }

    public function PurchaseApproved($id)
    {
        $purchase = Purchase::findOrFail($id);
        $product = Product::where('id', $purchase->product_id)->first();
        $product_qty = ((float) $product->quantity) + ((float) $purchase->buying_qty);
        $product->quantity = $product_qty;

        if ($product->save()) {
            Purchase::findOrFail($id)->update([
                'status' => 1,
            ]);

            $notification = [
                'message' => 'Purchase Approved Successfully',
                'type' => 'success',
            ];
        } else {
            $notification = [
                'message' => 'Purchase Approval Failed',
                'type' => 'error',
            ];
        }

        return redirect()->route('purchase.all')->with($notification);
    }
}
