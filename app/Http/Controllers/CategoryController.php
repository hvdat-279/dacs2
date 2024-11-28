<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redis;


class CategoryController extends Controller
{
    public function create()
    {
        return view('partials.admin.category.add');
    }
    public function store(Request $request)
    {
        $newCategory = new Category();
        $newCategory->name = $request->input('name');
        $newCategory->save();
        // Thêm thông báo thành công vào session
        session()->flash('success', 'Thêm danh mục thành công!');
        return redirect('/admin/categories');
    }

    public function index()
    {
        // $categories = Category::latest()->paginate(5);
        // $categories = Category::oldest()->paginate(5);
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('partials.admin.category.index', compact('categories'));
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('partials.admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);
        // Thêm thông báo thành công vào session
        session()->flash('success', 'Sửa danh mục thành công!');
        return redirect('/admin/categories');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        // Thêm thông báo thành công vào session
        session()->flash('success', 'Xóa danh mục thành công!');
        return redirect('/admin/categories');
    }
}
