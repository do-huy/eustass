<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryMain;
use Illuminate\Http\Request;

class CategoryMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_mains = CategoryMain::all();
        return view('admin.category_main.index',compact('category_mains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category_main.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_mains = new CategoryMain;
        $category_mains->name = $request->name;
        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/CategoryMain', $file->getClientOriginalName());
            $category_mains->image = $file->getClientOriginalName();
        }
        $category_mains->save();
        return redirect()->route('category_main.index')->with('Category_main','Bạn đã thêm thể loại chính thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_mains = CategoryMain::find($id);
        return view('admin.category_main.edit',compact('category_mains'));
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
        $category_mains = CategoryMain::find($id);
        $category_mains->name = $request->name;
        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/CategoryMain', $file->getClientOriginalName());
            $category_mains->image = $file->getClientOriginalName();
        }
        $category_mains->save();
        return redirect()->route('category_main.index')->with('Category','Sửa thể loại thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryMain::destroy($id);
        return redirect()
        ->route('category_main.index')
        ->with('Category','Bạn đã xóa thể loại thành công');
    }
}
