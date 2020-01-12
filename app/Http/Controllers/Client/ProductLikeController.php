<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use App\Models\ProductLike;

class ProductLikeController extends Controller
{
    public function index()
    {
        return view('client.product.like');
    }
    public function store_product_like($product_id , Request $request)
    {
        $issetProductLikeInCart = ProductLike::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if($issetProductLikeInCart){
            $issetProductLikeInCart->amount++;
            $issetProductLikeInCart->save();
        }else{
            $product = Product::find($product_id);
            $ProductLike = new ProductLike;
            $ProductLike->user_id = Auth::id();
            $ProductLike->product_id = $product_id;
            $ProductLike->name = $product->name;
            $ProductLike->amount = '1';
            $ProductLike->image = $product->image;
            $ProductLike->price = $product->price;
            $ProductLike->save();
        }
        return redirect()->back()->with(['success'=>'Có một sản phẩm mới']);
    }
}
