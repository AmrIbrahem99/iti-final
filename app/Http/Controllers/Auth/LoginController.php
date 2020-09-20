<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\AuthProvider;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function callback()
    {
       /** @var   \Laravel\Socialite\Two\User $user */
         $user=Socialite::driver('facebook')->user();
            $providerUser=\App\AuthProvider::where('provider_user_id',$user->getId())->first();

            if($providerUser){
           \Illuminate\Support\Facades\Auth::loginUsingId($providerUser->user_id);
                return redirect('/home');
            }

            $createdUser=\App\User::create(
              ['user_name'=>$user->getName(),'email'=>$user->getEmail(),'password'=>'empty']
            );
        $createdUser->authProviders()->save(

            new \App\AuthProvider(
                ['provider'=>'facebook','provider_user_id'=>$user->getId()])
            );
       return redirect('/home');
    }


    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function authenticated(Request $request, $user)
    {
        redirect('/');
    }


    //    public function connectcallback()
//    {
//        /** @var   \Laravel\Socialite\Two\User $user */
//         $user=Socialite::driver('facebook')->user();
//        $providerUser=\APP\AuthProvider::where('provider_user_id',$user->getId());
//
//        if($providerUser) return response();
//        Auth::user()->authProviders()->save(
//
//        new \App\AuthProvider(
//            ['provider'=>'facebook','provider_user_id'=>$user->getId()])
//        );


}
