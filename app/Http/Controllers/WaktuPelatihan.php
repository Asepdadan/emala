<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\waktu_pelatihan;
use DB;
use App\custombackend;
class WaktuPelatihan extends Controller
{
    //

    public function index(){
    	$data["title"] = "Kelola Waktu Pelatihan";
	    $data["header"] = "Kelola Waktu Pelatihan";
	    $data["deskripsi"] = "Menampung Data Waktu Pelatihan";
	    $data["tipe"] = DB::table("tipe_pelatihan")->get();
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
	    return view("backend/waktu_pelatihan/waktu_pelatihan",$data);
    }

    public function get_waktu_pelatihan(){
    	$get = new waktu_pelatihan;
    	$data = DB::table('waktu_pelatihan')
            ->join('tipe_pelatihan', 'waktu_pelatihan.pelatihan_id', '=', 'tipe_pelatihan.id')
            ->select('waktu_pelatihan.*','waktu_pelatihan.id as waktu_id','tipe_pelatihan.*')
            ->orderBy("waktu_pelatihan.tanggal_pelatihan",'DESC')
            ->get();

    	$array = array();
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $row->tipe_pelatihan;
    		$arr[] = $row->judul;
            $arr[] = $row->kuota;
    		$arr[] = $row->tanggal_pelatihan;
    		$arr[] = "<a href='javascript::' class='btn btn-danger' onclick='hapus(".$row->waktu_id.")'><i class='fa fa-trash'></i></a> <a href='".url('backend/get/detail_waktu_pelatihan?id='.$row->waktu_id.'')."' class='btn btn-primary' ><i class='fa fa-pencil'></i></a>";
    		$array[] = $arr;
    	}

    	$output = array("data" => $array);
    	return json_encode($output);

    }

    public function store(Request $request){
    	$get = new waktu_pelatihan;
    	$get->pelatihan_id = $request->tipe_pelatihan;
    	$get->judul = $request->judul;
    	$get->keterangan = $request->keterangan;
        $get->kuota = $request->batas;
    	$get->tanggal_pelatihan = $request->tanggal;
    	$get->save();
    	return redirect("backend/waktu_pelatihan");
        
    }

    public function delete(){
    	$id = $_GET['id'];
    	DB::table('waktu_pelatihan')->where('id', '=', $id)->delete();
    }

    public function detail_waktu_pelatihan(){
    	$id = $_GET['id'];
    	$json = DB::table('waktu_pelatihan')
            ->join('tipe_pelatihan', 'waktu_pelatihan.pelatihan_id', '=', 'tipe_pelatihan.id')
            ->select('waktu_pelatihan.*','waktu_pelatihan.id as waktu_id','tipe_pelatihan.*')
            ->where("waktu_pelatihan.id","=",$id)
            ->get();
    	
         foreach ($json as $row) {
         	$data["id"] = $row->waktu_id;
         	$data["pelatihan_id"] = $row->pelatihan_id;
         	$data["judul"] = $row->judul;
         	$data["keterangan"] = $row->keterangan;
            $data["batas"] = $row->kuota;
         	$data["tanggal_pelatihan"] = $row->tanggal_pelatihan;
         	$data["tipe_pelatihan"] = $row->tipe_pelatihan;
         }
            $get = new custombackend;
            $data["profil"] = $get::where("status",1)->get();
         	$data["title"] = "Kelola Waktu Pelatihan";
		    $data["header"] = "Kelola Waktu Pelatihan";
		    $data["deskripsi"] = "Menampung Data Waktu Pelatihan";
		    $data["tipe"] = DB::table("tipe_pelatihan")->get();

    	return view("backend.waktu_pelatihan.form_ubah_waktu_pelatihan",$data);
    }

    public function update(Request $request){
    	$data = [
    		"pelatihan_id" => $request->tipe_pelatihan,
    		"judul" => $request->judul,
    		"keterangan" => $request->keterangan,
            "kuota" => $request->batas,
    		"tanggal_pelatihan" => $request->tanggal
    	];

    	DB::table('waktu_pelatihan')
            ->where('id', $request->id)
            ->update($data);

            return redirect("backend/waktu_pelatihan");

    }

}
