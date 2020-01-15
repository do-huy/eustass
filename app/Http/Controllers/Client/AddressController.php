<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Province;
use App\Models\Address;

class AddressController extends Controller
{
    public function index_address()
    {
        $user = Auth::user();
        $addresses = Auth::user()->addresses;
        $provinces = Province::with('districts','districts.wards')->get();
        // dd($provinces);
        return view('client.address.index',compact('provinces','addresses'),array('user' => Auth::user()));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ],[
            "name.required"=>"Tên người nhận không được bỏ trống.",
            "phone.required"=>"Số điện thoại không được bỏ trống.",
            "description.required"=>"Chi tiết địa chỉ không được bỏ trống.",
        ]);
        $address = new Address;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->province_id = $request->province_id;
        $address->district_id = $request->district_id;
        $address->ward_id = $request->ward_id;
        $address->user_id = Auth::user()->id;
        $address->description = $request->description;
        $address->save();
        return redirect('/store-address')->with('success','Bạn đã cập nhập thông tin cá nhân thành công !!!');
    }
}
