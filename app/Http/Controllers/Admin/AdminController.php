<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $noti = [
            'message' => 'Logged out successfully',
            'alert-type' => 'success',
        ];

        return redirect('/login')->with($noti);
    }

    public function Profile()
    {
        return view('admin.profile.index');
    }

    public function EditProfile()
    {
        $id = Auth::id();
        $editProfile = User::find($id);

        return view('admin.Profile.edit', compact('editProfile'));
    }

    public function UpdateProfile(Request $request)
    {
        $user = Auth::user();

        $filename = $user->user_img;

        if ($request->hasfile('user_img')) {
            $file = $request->file('user_img');
            $filename = date('YmdHis').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images/'), $filename);

            File::delete(public_path('uploads/admin_images/'.$user->user_img));
        }

        $data = $request->except(['email']);
        $data['user_img'] = $filename;
        $user->update($data);

        $noti = [
            'message' => 'Profile updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->Route('admin.profile')->with($noti);
    }

    public function ChangePassword()
    {
        return view('admin.Profile.change-password');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required | same:new_password',
        ]);

        $oldPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $oldPassword)) {
            $user = Auth::user();
            $user->password = Hash::make($request->new_password);
            $user->save();

            session()->flash('message', 'Password updated successfully');

            return redirect()->Route('admin.profile');

        } else {
            session()->flash('message', 'Current password is not correct');

            return redirect()->back();

        }

    }
}
