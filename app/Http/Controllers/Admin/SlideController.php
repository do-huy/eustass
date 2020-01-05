<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index',compact('slides'));
    }
    public function create()
    {
        return view('admin.slide.create');
    }
    public function store(Request $request)
    {
        $slide = new Slide;

        $slide->name = $request->name;
        $slide->theme = $request->theme;
        $slide->content = $request->content;

        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/slide', $file->getClientOriginalName());
            $slide->src = $file->getClientOriginalName();
        }
        $slide->save();
        return redirect()->route('slide.index')->with('Slide','Thêm slide thành công !!!');
    }

    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit',compact('slide'));
    }

    public function update(Request $request , $id)
    {
        $slide = Slide::find($id);
        $slide->name = $request->name;
        $slide->theme = $request->theme;
        $slide->content = $request->content;

        if($request->hasFile('src'))
        {
            $file = $request->file('src');
            $file->move('upload/slide', $file->getClientOriginalName());
            $slide->src = $file->getClientOriginalName();
        }
        $slide->save();
        return redirect()->route('slide.index')->with('Slide','Sửa slide thành công !!!');
    }

    public function destroy($id)
    {
        Slide::destroy($id);
        return redirect()->route('slide.index')->with('Slide','Xóa slide thành công !!!');
    }
}
