<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserContoller extends Controller
{
    public function index(){
     return redirect()->route('login.page');
    }
    public function loginPage(){
      return view('login');
    }

    public function login(Request $request){

        $request->validate([
            'email'=> 'required',
            'password' => 'required|min:8'
        ]);
      $user = Auth::attempt($request->only('email','password'));
      if($user){
        return response()->json(['success' => true,'message' => 'Successfully login!','route' => '/dashboard']);
      }
      return  response()->json(['error' => true,'message' => 'Invalid credentials!']);

    }



    public function registerPage(){
        return view('register');
    }
    public function register(Request $request){

        $user = $request->validate([
            'firstname' => 'required',
            'middlename'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        $userInfo = User::create($user);

        if($userInfo){
            return response()->json(['success' => true, 'message' => 'Register successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Register failed!']);

    }

    public function providerRedirect($provider){
        return Socialite::driver($provider)->redirect();
    }
    public function providerAuth($provider){
        $providerUser = Socialite::driver($provider)->stateless()->user();

        $arrayName = explode(' ', $providerUser->getName());
       

        $user = User::where('provider_id',$providerUser->id)->first();

        if(!$user){
             $user = User::create([
               'firstname' => $arrayName[0],
                'middlename' => null,
                'lastname' => end($arrayName),
               'email' => $providerUser->email,
               'provider' => $provider,
               'provider_id' => $providerUser->id,
               'password' => bcrypt('password')
             ]);

            Auth::login($user);
            $user = Auth::user();
            return view('dashboard',compact('user'));
        }

           Auth::login($user);
           $user = Auth::user();
           return view('dashboard',compact('user'));
        
    }

    public function dashboard(){

        return view('dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.page');
    }


}
