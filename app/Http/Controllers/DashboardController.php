<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\custombackend;

class DashboardController extends Controller
{
    //

    public function index(){
    	$data["title"] = "Dashboard";
    	$data["header"] = "Dashboard";
    	$data["deskripsi"] = "Dashboard E-MALA";
    	$get = new custombackend;
    	$data["profil"] = $get::where("status",1)->get();
    	return view("backend.dashboard.dashboard",$data);

    }

    
}
