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
        $category_mains = CategoryMain::with('categories.typeCategories')->get();
        $category = Category::with('products')->find($id);
        return view('client.category.category-detail',compact('slides','category','category_mains'));
    }
    public function category_views($id)
    {
        return view('client.category.category-type');
    }
    public function category_main_client($id)
    {
        $category_mains = CategoryMain::with('categories.products')->find($id);
        // dd($category_mains);
        return view('client.category.category-main',compact('category_mains'));
    }
}
