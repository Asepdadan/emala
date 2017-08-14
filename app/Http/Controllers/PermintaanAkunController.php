<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pegawai_pengguna;
use App\custombackend;
class PermintaanAkunController extends Controller
{
    //

    public function index(){
    	$data["title"] = "Permintaan Akun";
    	$data["deskripsi"] = "Permintaan Akun";
    	$data["header"] = "Pengelolaan Permintaan Akun";
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
    	return view("backend/permintaan_akun/permintaan_akun",$data);
    }

    public function getPegawaiPengguna(){
    	$data = new Pegawai_pengguna;
    	$json = $data::orderBy("created_at","DESC")->get();

    	$array = array();
		$no = 1;
		foreach ($json as $row) {
			$arr = array();
			$arr[] = $row->nama;
			$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id.">".$row->nip."</a>";
			$arr[] = $row->userId;
			$arr[] = $row->no_hp;
			$arr[] = $row->created_at->format('d M Y - H:i:s');
			$arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
			$array[] = $arr;
		}

		$output = array(
	            "data" => $array
	        );
	    return json_encode($output);
    }

    public function getDetailPegawaiPengguna(){
    	$data = new Pegawai_pengguna;
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
    		echo "<td>NIP</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->nip."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>UserId</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->userId."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Alamat</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->alamat."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>No Telp</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->no_telp."</td>";
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
    		echo "<td>Golongan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->golongan."</td>";
    		echo "</tr>";

    		echo "<tr>";
    		echo "<td>Pangkat</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->pangkat."</td>";
    		echo "</tr>";


    		echo "<tr>";
    		echo "<td>Jabatan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->jabatan."</td>";
    		echo "</tr>";


    		echo "<tr>";
    		echo "<td>No SK</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->no_sk."</td>";
    		echo "</tr>";


    		echo "<tr>";
    		echo "<td>Masa Berlaku</td>";
    		echo "<td>:</td>";
    		echo "<td>".$key->masa_berlaku."</td>";
    		echo "</tr>";


    		echo "<tr>";
    		echo "<td>File SK</td>";
    		echo "<td>:</td>";
    		echo "<td><a href='../uploads/".$key->file_sk."''>".$key->file_sk."</a></td>";
    		echo "</tr>";

    	}
    	echo "</table>";
    }
}
