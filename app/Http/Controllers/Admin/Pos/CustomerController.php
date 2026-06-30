<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function CustomerAll()
    {
        $customer = Customer::latest()->get();

        return view('admin.backend.customer.index', compact('customer'));
    }

    public function CustomerCreate()
    {
        return view('admin.backend.customer.create');
    }

    public function CustomerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|max:11',
            'email' => 'required|email',
            'address' => 'required',
            'customer_img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $imageName = null;
        if ($request->hasFile('customer_img')) {
            $customerImage = $request->file('customer_img');
            $imageName = hexdec(uniqid()).'.'.$customerImage->getClientOriginalExtension();
            Image::make($customerImage)->resize(200, 200)->save(public_path('uploads/customer_image/'.$imageName));
        }
        $customer = Customer::create([
            'name' => $request->name,
            'customer_img' => $imageName,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Customer created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('customer.all')->with($notification);
    }

    public function CustomerEdit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.backend.customer.edit', compact('customer'));
    }

    public function CustomerUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'mobile_no' => 'required|max:11',
            'email' => 'required|email',
            'address' => 'required',
            'customer_img' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'name.required' => 'Name is required',
            'mobile_no.required' => 'Mobile number is required',
            'mobile_no.max' => 'Mobile number is too long',
            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'address.required' => 'Address is required',
            'customer_img.image' => 'Customer image must be an image',
            'customer_img.mimes' => 'Customer image Only Jpg, Png, Jpeg are allowed',
        ]);
        $customer = Customer::findOrFail($id);
        $currentCustomerimg = $customer->customer_img;
        $imageName = null;

        if (request()->hasfile('customer_img')) {
            $customerImage = request()->file('customer_img');
            $imageName = hexdec(uniqid()).'.'.$customerImage->getClientOriginalExtension();
            Image::make($customerImage)->resize(200, 200)->save(public_path('uploads/customer_image/'.$imageName));
        }
        $customer->update([
            'name' => $request->name,
            'customer_img' => ($imageName) ? $imageName : $currentCustomerimg,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'address' => $request->address,
            'updated_by' => Auth::user()->id,
        ]);
        if ($imageName) {
            File::delete(public_path('uploads/customer_image/'.$currentCustomerimg));
        }

        $notification = [
            'message' => 'Customer Updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('customer.all')->with($notification);

    }

    public function CustomerDelete($id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->customer_img) {
            File::delete(public_path('uploads/customer_image/'.$customer->customer_img));
        }

        $customer->delete();

        $notification = [
            'message' => 'Customer deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('customer.all')->with($notification);
    }
}
