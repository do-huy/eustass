<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Province;
use App\Models\Cart;
use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    public function choseAddress()
    {
        $provinces = Province::with('districts','districts.wards')->get();
        $addresses = Auth::user()->addresses;
        return view('client.order.checkout.chose-address',compact('provinces','addresses'));
    }
    public function chosePayment(Request $request)
    {

        $address = Address::find($request->address_id);
        session(['address' => $address]);
        return view('client.order.checkout.chose-payment',compact('address'));
    }
    public function store(Request $request)
    {
        $bill = new Bill;
        $bill->user_id = Auth::id();
        $bill->address = session()->get('address')->full;
        $bill->phone = session()->get('address')->phone;
        $bill->total = Auth::user()->carts->sum('total');
        $bill->payment = $request->payment;
        $bill->note = $request->note;
        $bill->save();
        foreach (Auth::user()->carts as $cart) {
            $bill_detail = new BillDetail;
            $bill_detail->curent_price = $cart->price;
            $bill_detail->amount = $cart->amount;
            $bill_detail->product_id = $cart->product_id;
            $bill_detail->bill_id = $bill->id;
            $bill_detail->save();
            Cart::destroy($cart->id);
        }
        return redirect(route('bill.show'));
    }
    public function billShow()
    {
        return view('client.order.checkout.display-bill');
    }
}
