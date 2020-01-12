<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryMain;
use App\Models\Slide;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_detail($id)
    {
        $slides = Slide::all();
        $products = Product::where('category_id',$id)->get();
        $category = Category::find($id);
        $categories = Category::all();
        $category_mains = CategoryMain::with('categories.typeCategories')->get();
        // $category = Category::with('products')->find($id);
        // foreach ($category->products as  $product) {
        //     echo $product->name;
        // }die;
        return view('client.category.category-detail',compact('products','slides','category','categories','category_mains'));
    }
}
