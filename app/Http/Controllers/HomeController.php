<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CustomHeaderFrontend;
use App\home_gambar;
use DB;


class HomeController extends Controller
{
    //

    public function index(){
    	$header = new CustomHeaderFrontend;
    	$data = $header::where('status',1)->get();

    	$data["title"] = "Beranda";
    	$data["header"] = $data[0]->header;
    	$data["class"] = "home";
		$data["img"] = "./uploads/header/file-17-07-31-04-25-20.png";
        $get = new home_gambar;
        $get_gambar1 = $get::where([["tipe_gambar","=", 1],["status" ,"=", 1]])->get();;
        foreach ($get_gambar1 as $row) {
            $data["pengguna"] = $row->gambar;
        }
        $get_gambar2 = $get::where([["tipe_gambar","=", 2],["status" ,"=", 1]])->get();
        foreach ($get_gambar2 as $row) {
            $data["pengunjung"] = $row->gambar;
        }
        $get_gambar3 = $get::where([["tipe_gambar","=", 3],["status" ,"=", 1]])->get();
        foreach ($get_gambar3 as $row) {
            $data["training"] = $row->gambar;
        }
        
    	return view('home.home',$data);
    }
}
