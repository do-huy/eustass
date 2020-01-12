<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::attempt($request->only('email','password'),$request->remember)) {
            if (Auth::user()->toAdmin()) {
                return redirect(route('dashboard'));
            }
            return redirect(route('home'));
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('home'));
    }
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser = $this->findOrCreateUser($user , $provider);
        Auth::login($authUser , true);
        return redirect()->to('/home');
        // return $user->name;
    }

    public function findOrCreateUser($user , $provider )
    {
        $authUser = User::where('provider_id',$user->id)->first();
        if($authUser)
        {
            return $authUser;
        }
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'number' => '',
            'password' =>'',
            'day' => '19',
            'month' => '01',
            'year' => '1997',
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
