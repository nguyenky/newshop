<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUser;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Auth;
class LoginController extends Controller
{
    public function login(){
    	return view('public.auth.login');
    }
    public function postLogin(LoginRequest $request){
    	$email 	= trim($request->email);
    	$password 	= trim($request->password);
    	if (Auth::attempt(['email' => $email, 'password' => $password]))
	        {   
                $arUser = Auth::user();
                return redirect()->route('public.index');
	        }else
	        {
	        	$request ->Session()->flash('msg','Sai Email hoặc Password !!!');
	            return redirect()->back();
	        }
    }
    public function register(RegisterUser $request){
    	$input = $request->all();

    	User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);

    	return redirect()->route('public.index');
    }
    public function logout(){
    	Auth::logout();
        Cart::destroy();
    	return redirect()->route('public.index');
    }
}
