<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Slide;
use App\Models\Category;
use App\Models\CategoryMain;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function store_detail($product_id , Request $request)
    {
        $issetProductInCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if($issetProductInCart){
            $issetProductInCart->amount++;
            $issetProductInCart->save();
        }else{
            $product = Product::find($product_id);
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->product_id = $product_id;
            $cart->name = $product->name;
            $cart->amount = $request->amount;
            $cart->image = $product->image;
            $cart->price = $product->price;
            $cart->save();
        }
        return redirect()->back()->with(['success'=>'Có một sản phẩm mới']);
    }
    public function store($product_id)
    {
        $issetProductInCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if($issetProductInCart){
            $issetProductInCart->amount++;
            $issetProductInCart->save();
        }else{
            $product = Product::find($product_id);
            $cart = new Cart;
            $cart->user_id = Auth::id();
            $cart->product_id = $product_id;
            $cart->name = $product->name;
            $cart->image = $product->image;
            $cart->price = $product->price;
            $cart->save();
        }
        return redirect()->back()->with(['success'=>'Có một sản phẩm mới']);
    }
    public function detail()
    {
        $categories = Category::all();
        $products = Product::all();
        $slides = Slide::all();
        $category_mains = CategoryMain::with('categories.typeCategories')->get();
        return view('client.order.cart',compact('products','slides','categories','category_mains'));
    }
    public function update_up($product_id)
    {
        $issetProductInCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if($issetProductInCart){
            $issetProductInCart->amount++;
            $issetProductInCart->save();
            return response()->json(array_merge($issetProductInCart->toArray(),['all'=>auth::user()->carts->sum('total'),'sum_amount'=>Auth::user()->carts->sum('amount')]) ,200);
        }
        return response()->json(['msg' => 'not found'],404);
    }
    public function update_down($product_id)
    {
        $issetProductInCart = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        if($issetProductInCart){
            $issetProductInCart->amount--;
            $issetProductInCart->save();
            return response()->json(
                array_merge($issetProductInCart->toArray(),
                ['all'=>auth::user()->carts->sum('total'),
                'sum_amount'=>Auth::user()->carts->sum('amount')]) ,200);
        }
        return response()->json(['msg' => 'not found'],404);
    }
    public function destroy($id)
    {
        $issetProductInCart = Cart::where('product_id',$id)->where('user_id',Auth::id())->first();
        $issetProductInCart->delete();
        return redirect()->back();
    }

}
