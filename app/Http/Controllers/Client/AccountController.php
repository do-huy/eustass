<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Address;
use Auth;
use Illuminate\Http\Request;
use Image;

class AccountController extends Controller
{
    public function show()
    {
        $provinces = Province::with('districts','districts.wards')->get();
        $addresses = Auth::user()->addresses;
        return view('client.account.show',compact('provinces','addresses'));
    }
    public function newAddress(Request $request)
    {
        $address = new Address;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->province_id = $request->province_id;
        $address->district_id = $request->district_id;
        $address->ward_id = $request->ward_id;
        $address->description = $request->description;
        $address->user_id = Auth::user()->id;
        $address->save();

        return redirect()->back();

    }
    public function profile_user()
    {
        $user = Auth::user();
        $day = [];
        $month = [];
        $year = [];
        for ($d=1; $d < 31; $d++) {
            $day[$d] = ($d<10)?'0'.$d:$d;
        }
        for ($m=1; $m < 12; $m++) {
            $month[$m] = ($m<10)?'0'.$m:$m;
        }
        for ($y=1800; $y < 2019; $y++) {
            $year[$y] = $y+1;
        }
        $date = (compact('day','month','year'));
        return view('client.account.index',compact('user','date'));
    }
    public function profile_user_update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
        ],[
            "name.required"=>"Tên tài khoản không được bỏ trống.",
            "email.required"=>"Email không được bỏ trống.",
            "email.email"=>"Email phải đúng định dạng.",
            "number.required"=>"Số điện thoại không được bỏ trống.",
        ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->number = $request->number;
        $user->day = $request->day;
        $user->month = $request->month;
        $user->year = $request->year;
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = uniqid().'-'.$request->avatar->getClientOriginalName();
            Image::make($avatar)->resize(300, 300)->save( public_path('/upload/avatars/'. $filename));
            $user->avatar = $filename;
        }
        $user->save();
        // return view('client.account.index',array('user' => Auth::user()));
        return redirect('/profile-user')->with('success','Bạn đã cập nhập thông tin cá nhân thành công !!!');
    }
}
