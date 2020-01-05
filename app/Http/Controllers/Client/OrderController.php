<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Bill;
use App\Models\Province;
use App\Models\Address;
use App\Models\BillDetail;

class OrderController extends Controller
{
    public function index_order()
    {
        $user = Auth::user();
        $orders = BillDetail::join('bills','bills.id','bill_details.bill_id')->with('bill.user','product')->select('bill_details.*')->where('bill_details.status','new')->where("bills.user_id",Auth::id())->get();
        $billDetails  = BillDetail::join('bills','bills.id','bill_details.bill_id')->with('bill.user','product')->select('bill_details.*')->where('bill_details.status','<>','new')->where("bills.user_id",Auth::id())->paginate(5);
        return view('client.order.index',compact('orders','user','billDetails'));
    }
}
