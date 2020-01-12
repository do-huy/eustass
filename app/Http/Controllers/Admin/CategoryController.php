<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryMain;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }
    public function show(Request $request)
    {
        # code...
    }
    public function create()
    {
        $Category_mains = CategoryMain::all();
        return view('admin.category.create',compact('Category_mains'));
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->category_main_id = $request->category_main_id;
        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/Category', $file->getClientOriginalName());
            $category->image = $file->getClientOriginalName();
        }
        $category->save();
        return redirect()->route('category.index')->with('Category','Bạn đã thêm thể loại thành công');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        $category_mains = CategoryMain::all();
        return view('admin.category.edit',compact('category','category_mains'));
    }
    public function update(Request $request , $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->category_main_id = $request->category_main_id;
        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/Category', $file->getClientOriginalName());
            $category->image = $file->getClientOriginalName();
        }
        $category->save();
        return redirect()->route('category.index')->with('Category','Sửa thể loại thành công');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()
        ->route('category.index')
        ->with('Category','Bạn đã xóa thể loại thành công');
    }
}
