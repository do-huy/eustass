<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryMain;
use App\Models\Image;
use App\Models\Product;
use App\Models\Property;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }
    public function create()
    {
        $category_mains = CategoryMain::with('categories','categories.typeCategories')->get();
        return view('admin.product.create',compact('category_mains'));
    }
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->category_main_id = $request->category_main_id;
        $product->category_id = $request->category_id;
        $product->category_type_id = $request->category_type_id;
        $product->amount = $request->amount;
        $product->weight = $request->weight;
        $product->price = $request->price;
        $product->note = $request->note;
        $product->description = $request->description;
        $product->slug = str::slug(uniqid().'-'.$request->name, '-');
        $srcname = uniqid().'-'.$request->src[0]->getClientOriginalName();
        $request->src[0]->move('upload',$srcname);
        $product->image = url('upload/'.$srcname);
        $product->save();

        if($request->hasFile('src')){
            $index = 0;
            foreach($request->src as $src)
            {
                if ($index++ >= 1) {
                    $srcname = uniqid().'-'.$src->getClientOriginalName();
                    $src->move('upload',$srcname);
                    $image = new Image;
                    $image->product_id = $product->id;
                    $image->src = url('upload/'.$srcname);
                    $image->save();
                }
            }
        }

        foreach($request->key as $index => $property_name)
        {
            $property = new Property;
            $property->product_id = $product->id;
            $property->name = $property_name;
            $property->description = $request->value[$index];
            $property->save();
        }

        return redirect()
        ->route('product.index')
        ->with('Product','Bạn đã thêm sản phẩm thành công !!!');
    }
    public function show(Request $request)
    {
        # code...
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('admin.product.edit',compact('categories','product'));
    }
    public function update(Request $request , $id)
    {
        //edit product
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->weight = $request->weight;
        $product->amount = $request->amount;
        $product->price = $request->price;
        $product->note = $request->note;
        $product->description = $request->description;
        if($request->hasFile('src')){
            $srcname = uniqid().'-'.$request->src[0]->getClientOriginalName();
            $request->src[0]->move('upload',$srcname);
            $product->image = url('upload/'.$srcname);
        }
        $product->save();

        if($request->hasFile('src')){
            $index = 0;
            Image::where('product_id',$id)->delete();
            foreach($request->src as $src){
                if ($index++ >= 1) {
                    $srcname = uniqid().'-'.$src->getClientOriginalName();
                    $src->move('upload',$srcname);
                    $image = new Image;
                    $image->product_id = $product->id;
                    $image->src = url('upload/'.$srcname);
                    $image->save();
                }
            }
        }

        Property::where('product_id',$id)->delete();
        foreach($request->key as $index => $property_name)
        {
            $property = new Property;
            $property->product_id = $product->id;
            $property->name = $property_name;
            $property->description = $request->value[$index];
            $property->save();
        }

        return redirect()
        ->route('product.index')
        ->with('Product','Bạn đã sửa sản phẩm thành công !!!');

    }
    public function destroy($id)
    {
        Image::where('product_id',$id)->delete();
        Property::where('product_id',$id)->delete();
        Product::destroy($id);
        return redirect()
        ->route('product.index')
        ->with('Product','Bạn đã xóa sản phẩm thành công !!!');
    }
}
