<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TypeCategory;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_types = TypeCategory::all();
        return view('admin.category_type.index',compact('category_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.category_type.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_type = new TypeCategory;
        $category_type->name = $request->name;
        $category_type->category_id = $request->category_id;

        $category_type->save();

        return redirect()
        ->route('category_type.index')
        ->with('category','Bạn đã thêm thể loại danh mục thành công !!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_types = TypeCategory::find($id);
        $categories = Category::all();
        return view('admin.category_type.edit',compact('category_types','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_type = TypeCategory::find($id);
        $category_type->name = $request->name;
        $category_type->category_id = $request->category_id;

        $category_type->save();
        return redirect()->route('category_type.index')->with('category_type','Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeCategory::destroy($id);
        return redirect()->route('category_type.index')->with('category_type','Bạn đã xóa thể loại thành công');
    }
}
