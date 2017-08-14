<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\custombackend;
use DB;
use Auth;

class PengajuanPesertaPelatihanController extends Controller
{
    //

    public function index(){
    	$data["title"] = "Pengajuan Peserta Pelatihan";
    	$data["deskripsi"] = "Pengajuan Peserta Pelatihan";
    	$data["header"] = "Pengelolaan Pengajuan Peserta Pelatihan";
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
    	return view("backend.pengajuan_peserta_pelatihan.pengajuan_peserta_pelatihan",$data);
    }

    public function get_peserta(){
        $data = DB::table("pelatihan")
        		->select("pelatihan.*","pelatihan.id as pelatihanid","tipe_pelatihan.*")
                ->join('tipe_pelatihan', 'pelatihan.id_pelatihan', '=', 'tipe_pelatihan.id')
                ->orderBy("pelatihan.created_at","DESC")
                ->get();
        $array = array();
        $no = 1	;
        foreach ($data as $key => $row) {
            $arr = array();
        	$arr[] = $no++;    
        	$arr[] = $row->tipe_pelatihan;    
        	$arr[] = $row->nama;    
        	$arr[] = $row->nama_perusahaan;    
        	$arr[] = $row->tanggal_pelatihan;    
        	if($row->status == 1)  	{
        		$arr[] = "Sudah di verifikasi";
        	}else{
        		$arr[] = "Belum di verifikasi";
        	}
        	$arr[] = $row->created_at;    	
        	if(Auth()->user()->rule_id == 1){
        		$arr[] = "<a href='#' class='btn btn-danger' onclick='hapus(".$row->pelatihanid.")'><i class='fa fa-trash'></i> </a> <a href='javascript::' class='btn btn-primary' onclick='lihat(".$row->pelatihanid.")'><i class='fa fa-eye'></i></a>";
        	}else{
        		$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-primary' onclick='view(".$row->pelatihanid.")'><i class='fa fa-eye'></i></a>";
        	}
        	$array[] = $arr;
        }

        $output = array("data" => $array);

        return json_encode($output);
        
    }

    public function delete_peserta(){
    	$id = $_GET['id'];
    	DB::table("pelatihan")->where("id",$id)->delete();
    	return $id;
    }

    public function detail_peserta(){
    	$id = $_GET['id'];
    	$data = DB::table("pelatihan")
    	->select("pelatihan.*","pelatihan.id as pelatihanid","tipe_pelatihan.*")
        ->join('tipe_pelatihan', 'pelatihan.id_pelatihan', '=', 'tipe_pelatihan.id')
    	->where("pelatihan.id",$id)->get();
    	echo "<table class='table table-striped'>";
    	foreach ($data as $row) {
    		echo "<tr>";
    		echo "<td>Tipe Pelatihan<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->tipe_pelatihan."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Nama Peserta<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->nama."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Nama Perusahaan<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->nama_perusahaan."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Alamat<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->alamat."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>No Handphone<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->no_hp."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Email<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->email."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Tanggal Pelatihan<td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->tanggal_pelatihan."<td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Status Verifikasi<td>";
    		echo "<td>:</td>";
    		if($row->status == 1){
    			echo "<td>Sudah di Verifikasi<td>";	
    		}else{
    			echo "<td>Belum di Verifikasi<td>";	
    		}
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Status Verifikasi<td>";
    		echo "<td>:</td>";
    		if($row->status == 1){
    			echo "<td><button class='btn btn-warning' onclick='ubah_status(".$row->pelatihanid.",".$row->status.")'>Matikan Verifikasi</button><td>";	
    		}else{
    			echo "<td><button class='btn btn-warning' onclick='ubah_status(".$row->pelatihanid.",".$row->status.")'>Hidupkan Verifikasi</button><td>";	
    		}
    		echo "</tr>";
    	}
    	echo "</table>";
    }

    public function ubah_status(){
    	$id = $_GET["id"];
    	$status = $_GET["status"];

    	if($status == 1){
    		$status = 0;
    	}else{
    		$status = 1;
    	}

    	$cek = DB::table("pelatihan")
    	->where("id",$id)
    	->update(["status" => $status]);

    	return $id;
    }
}
