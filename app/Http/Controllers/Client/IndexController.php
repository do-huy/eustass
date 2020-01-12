<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryMain;
use App\Models\Slide;
use App\Models\TypeCategory;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class IndexController extends Controller
{
    public function index()
    {

        $products = Product::paginate(10);
        $search_msg = '';
        if(request()->has('keyword')){
            $time_start = round(microtime(true) * 1000);
            $keyword = request('keyword');
            $products = Product::where('name','like',"%$keyword%")->paginate(30);
            $time_end = round(microtime(true) * 1000);
            $execution_time = ($time_end - $time_start)/60;
            $execution_time = count($products)>0?round($execution_time,2):0;
            $total_products = count($products);
            $search_msg = "Kết quả tìm kiếm cho '$keyword': $total_products kết quả ($execution_time giây)";
        }
        $categories = Category::all();
        $category_mains = CategoryMain::with('categories.typeCategories')->get();
        $slides = Slide::all();

        // nhận diện mobile
        $agent = new Agent();

        return view($agent->isMobile() ? 'mobile.modules.index' : 'client.index', compact(
            'products',
            'categories',
            'slides',
            'search_msg',
            'category_mains'
        ));
    }
    public function productDetail($slug)
    {
        $product = Product::where('slug',$slug)->first();
        !$product?abort(404):true;
        // $product = Product::find($id);
        $categories = Category::all();
        $slides = Slide::all();
        return view('client.product.detail',compact('product','categories','slides'));
    }
}
