<?php

namespace App\Http\Controllers\Admin\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryAll()
    {
        $categories = Category::latest()->get();

        return view('admin.backend.category.index', compact('categories'));
    }

    public function CategoryCreate()
    {
        return view('admin.backend.category.create');
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'Name is required',

        ]);

        Category::create([
            'name' => $request->name,
            'created_by' => Auth::id(),
        ]);

        $notification = [
            'message' => 'Category created successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('category.all')->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.backend.category.edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',

        ], [
            'name.required' => 'Name is required',

        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Category updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('category.all')->with($notification);
    }

    public function CategoryDelete($id)
    {
        Category::findOrFail($id)->delete();

        $notification = [
            'message' => 'Category deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('category.all')->with($notification);
    }
}
