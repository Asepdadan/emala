<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
   public function __construct(){
        $this->middleware('guest');
    }


    public function getlogin(Request $request){
    	
    	if(Auth::attempt([
    		'email' => $request->username_email,
    		'password' => $request->inputPassword
    	])){
    		return redirect('/backend/dashboard');
    	}elseif(Auth::attempt([
    		'username' => $request->username_email,
    		'password' => $request->inputPassword
    	])){
    		return redirect('/backend/dashboard');
    	}else{
    		$request->session()->flash('pesan', "Koreksi Username/Email dan password yang anda masukan salah");
    		return redirect("backend/login");
    	}

    	
    }


}
