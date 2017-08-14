<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rule;
use App\User;
use DB;
use Mail;
use App\Mail\KirimAkunPimpinan;
use App\TemplateEmail;
use App\Pegawai_pengguna;
use App\custombackend;

class BackendPegawaiPenggunaController extends Controller
{
    //

    public function index(){
    	$get = new custombackend;
        $data["title"] = "Pembuatan Akun Pegawai Pengguna";
        $data["header"] = "Pembuatan Akun Pegawai Pengguna";
        $data["deskripsi"] = "Pengelolaan Pegawai Pengguna";
        $data["profil"] = $get::where("status",1)->get();
        return view("backend.pegawai_pengguna.pegawai_pengguna",$data);
    }

    public function getPegawaiPengguna(){
    	$get = new Pegawai_pengguna;
    	$data = $get::orderBy("created_at","DESC")->get();

    	$array = array();
    	$no = 1;
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $no++;
    		$arr[] = $row->userId;
    		$arr[] = $row->email;
    		$arr[] = $row->created_at->format("Y-m-d h:i:s");
    		if(Auth()->user()->rule_id == 1){
        		$arr[] = "<a href='#' class='btn btn-danger' onclick='hapus(".$row->id.")'><i class='fa fa-trash'></i> </a> <a href='#' class='btn btn-primary' onclick='create(".$row->id.")'><i class='fa fa-pencil'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' class='btn btn-default' onclick='lihat(".$row->id.")'><i class='fa fa-eye'></i></a>";
        	}else{
        		$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' class='btn btn-default' onclick='lihat(".$row->id.")'><i class='fa fa-eye'></i></a>";
        	}
    		$array[] = $arr;
    	}

    	$output = array("data" => $array);
    	return json_encode($output);
    }

    public function delete(){
    	$id = $_GET['id'];
    	$get = new Pegawai_pengguna;
    	$get::destroy(['id',$id]);
    }

    public function form_pembuatan_akun(){
    	$id = $_GET['id'];
    	$get = new Pegawai_pengguna;
    	$data  = $get::where("id",$id)->get();
    	foreach ($data as $row) {
    		$data["userId"] = $row->userId;
    		$data["email"] = $row->email;
    	}
    	//return view("backend.pegawai_pengguna.form_pembuatan_akun_pengguna",$data);
    	return $data;
    }

    public function create_akun(Request $request){
    	$get = new Pegawai_pengguna;
    	$userid = $request->userid;
    	$cari = $get::where("userId",$userid)->get();
    	foreach ($cari as $row) {
    		$nama_lengkap = $row->nama;
	    	$email = $row->email;
	    	$alamat = $row->alamat;
    	}
    	
        $mail = new TemplateEmail;
        $get_mail = $mail::where("status",1)->get()->first();

        $data = array("userid" => $request->userid,"password" => $request->password,"header" => $get_mail["header"],"footer" => $get_mail["footer"]);
    	Mail::to("dadanasep74@gmail.com")->send(new KirimAkunPimpinan($nama_lengkap,$email,$alamat,$data));
        return redirect("backend/pegawai_pengguna");
    }

   
}
