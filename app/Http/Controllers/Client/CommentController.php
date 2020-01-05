<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;
use Auth;

class CommentController extends Controller
{
    public function post_comment($id , Request $request)
    {
        $idComment = $id;
        $comments = new Comment;
        $products = Product::find($id);

        $comments->product_id = $id;
        $comments->user_id = Auth::user()->id;
        $comments->note = $request->note;
        $comments->save();
        return redirect("home/product/".$products->slug)->with('thongbao','bình luận thành công');
    }
}
