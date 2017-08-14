<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buku_tamu;
use DB;
use App\custombackend;
class BackenBukuTamuController extends Controller
{
    //

    public function __construct(){
    	//$this->middleware('auth');
    }

    public function index(){
        $get = new custombackend;
    	$data["title"] = "Buku Tamu";
    	$data["deskripsi"] = "Buku Tamu";
    	$data["header"] = "Pengelolaan Buku Tamu";
        $data["profil"] = $get::where("status",1)->get();
    	return view("backend/buku_tamu/buku_tamu",$data);
    }

    public function getDaftarTamu(){
    	$data = new Buku_tamu;
    	$daftar = $data::orderBy("created_at","DESC")->get();

    	$array = array();
        $no = 1;
        foreach ($daftar as $row) {
            $arr = array();
            $arr[] = $row->nama;
            $arr[] = $row->nama_perusahaan;
            $arr[] = $row->email;
            $arr[] = $row->no_hp;
            $arr[] = $row->tanggal_kunjungan;
            $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a> ";
            $array[] = $arr;
        }

        $output = array(
                "data" => $array
            );
        return json_encode($output);
    }

    public function getDetailBukuTamu(){
    	$data = new Buku_tamu;
    	$id = $_GET["id"];
    	$json = $data::where("id",$id)->get();

    	echo "<table class='table table-striped'>";
    	foreach ($json as $key) {
    		echo "<tr>";
    		echo "<td>Nama</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->nama."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Sebagai</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->sebagai."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Panggilan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->panggilan."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Nama Perusahaan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->nama_perusahaan."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Nama Admin</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->nama_admin."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>No Handphone</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->no_hp."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Email</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->email."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Alamat</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->alamat."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Tujuan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->tujuan."</td>";
    		echo "</tr>";


    		echo "<tr>";
    		echo "<td>Tanggal Kunjungan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->created_at->format('Y-m-d h:i:s')."</td>";
    		echo "</tr>";

    	}
    	echo "</table>";
    }

    public function edit($id){
        return $id;
    }

    public function delete(){
        $id = $_GET['id'];
        DB::table('daftar_tamu')->where('id', '=', $id)->delete();

    }
}
