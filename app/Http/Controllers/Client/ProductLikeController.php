<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Bill;
use App\Models\Province;
use App\Models\Address;
use App\Models\BillDetail;

class ProductLikeController extends Controller
{
    public function index()
    {
        return view('client.product.like');
    }
}
