<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Auth;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function change_password()
    {
        $user = Auth::user();
        return view('client.changepassword.index',array('user' => Auth::user()));
    }
    public function update(Request $request)
    {
        $this->validate($request,[
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ],[
            "current_password.required"=>"Bạn chưa nhập mật khẩu cũ",
            "new_password.required"=>"Bạn chưa nhập mật khẩu mới",
            "new_confirm_password.same"=>"Mật khẩu mới không khớp ! Xin vui lòng kiểm tra lại.",
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/change-password')->with('success','Thành công !!!');
    }
}
