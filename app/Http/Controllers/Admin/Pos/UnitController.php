<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Auth;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function UnitAll()
    {
        $units = Unit::latest()->get();

        return view('admin.backend.unit.index', compact('units'));
    }

    public function UnitCreate()
    {
        return view('admin.backend.unit.create');
    }

    public function UnitStore(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'Name is required',

        ]);

        $unit = Unit::create([
            'name' => $request->name,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Unit created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('unit.all')->with($notification);
    }

    public function UnitEdit($id)
    {
        $unit = Unit::findOrFail($id);

        return view('admin.backend.unit.edit', compact('unit'));
    }

    public function UnitUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'Name is required',

        ]);

        $unit = Unit::findOrFail($id);

        $unit->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Unit updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('unit.all')->with($notification);
    }

    public function UnitDelete($id)
    {
        Unit::findOrFail($id)->delete();

        $notification = [
            'message' => 'Unit deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('unit.all')->with($notification);
    }
}
