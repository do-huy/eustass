<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $srcname = uniqid().'-'.$request->src[0]->getClientOriginalName();
        $request->src[0]->move('upload',$srcname);
        $category->image = url('upload/'.$srcname);
        $category->save();
        return redirect()->route('category.index')->with('Category','Bạn đã thêm thể loại thành công');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request , $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        if($request->hasFile('src')){
            $srcname = uniqid().'-'.$request->src[0]->getClientOriginalName();
            $request->src[0]->move('upload',$srcname);
            $category->image = url('upload/'.$srcname);
        }
        $category->save();
        return redirect()->route('category.index')->with('Category','Sửa thể loại thành công');
    }
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('Category','Bạn đã xóa thể loại thành công');
    }
}
