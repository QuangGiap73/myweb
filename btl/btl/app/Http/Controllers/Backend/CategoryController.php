<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,'.$id,
        ]);

        $category = Category::findOrFail($id);
        $category->update(['name' => $request->name]);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công');
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công');
    }
}
