<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Auth;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function SupplierAll()
    {
        $supplier = Supplier::latest()->get();

        return view('admin.backend.supplier.index', compact('supplier'));
    }

    public function SupplierCreate()
    {
        return view('admin.backend.supplier.create');
    }

    public function SupplierStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required|max:11',
            'address' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'mobile_no.required' => 'Mobile number is required',
            'mobile_no.max' => 'Mobile number is too long',
            'address.required' => 'Address is required',
        ]);

        $supplier = Supplier::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Supplier created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierEdit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('admin.backend.supplier.edit', compact('supplier'));
    }

    public function SupplierUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_no' => 'required|max:11',
            'address' => 'required',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'mobile_no.required' => 'Mobile number is required',
            'mobile_no.max' => 'Mobile number is too long',
            'address.required' => 'Address is required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'name' => $request->name,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Supplier updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('supplier.all')->with($notification);
    }

    public function SupplierDelete($id)
    {
        Supplier::findOrFail($id)->delete();

        $notification = [
            'message' => 'Supplier deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('supplier.all')->with($notification);
    }
}
