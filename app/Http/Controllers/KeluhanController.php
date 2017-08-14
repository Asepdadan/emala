<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keluhan;
use App\keluhan_photo;
use App\Notifikasi;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use Illuminate\Support\Facades\Input;
use App\custombackend;
use DB;


class KeluhanController extends Controller
{
	public function __construct(){
		//$this->middleware('auth');
		//$this->middleware('rule:Superadmin');
	}
    //
	public function index(){
		$keluhan = new Keluhan();
        $keluhan::all();
        
        $data["title"] = "Keluhan";
		$data["header"] = "Admin Keluhan";
		$data["deskripsi"] = "Menampung Segala Keluhan";
		$get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
		return view("backend/keluhan/keluhan",$data);
	}

	public function getDataKeluhan(){
		$keluhan = new Keluhan();
        $data = $keluhan::OrderBy("created_at","DESC")->get();

        $array = array();
        $no = 1;
        foreach ($data as $row) {
        	$arr = array();
        	$arr[] = $row->nama_pelapor;
        	$arr[] = $row->no_telp;
        	$arr[] = $row->sebagai;
        	$arr[] = $row->isi_laporan;
        	$arr[] = $row->created_at->format('Y-m-d');
        	if(Auth()->user()->rule_id == 1){
        		$arr[] = "<a href='#' class='btn btn-danger' onclick='hapus(".$row->id.")'><i class='fa fa-trash'></i> </a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-primary' onclick='view(".$row->id.")'><i class='fa fa-eye'></i></a>";
        	}else{
        		$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-primary' onclick='view(".$row->id.")'><i class='fa fa-eye'></i></a>";
        	}
        	$array[] = $arr;
        }

        $output = array("data" => $array);
        return json_encode($output);

	}

    public function store(Request $request)
    {
        //
	    $keluhan = new Keluhan;
        $keluhan->nama_pelapor = $request->nama;
        //$keluhan->no_telp = $request->no_telp;
        $keluhan->sebagai = $request->sebagai;
        $keluhan->isi_laporan = $request->isi_laporan;
        
        try {
		
    		if(!$keluhan->save()) {
		        $error = "tidak dapat menyimpan";
		        throw new Exception($error);
		 	}else{

		 			$get_id = $keluhan->save();
		 			$keluhan_id = $keluhan->id;
			 		
				 	$keluhan_photo = new keluhan_photo;
			 		$dataSet = [];
			 		foreach (Input::file('file') as $row) {
			 			//echo $row->guessClientExtension();
			 			//$image = $request->file[$i];
			 		 	$namaorigin = $row->getClientOriginalName();
			 		 	$tipe = $row->guessClientExtension();
			 		 	$image_resize = Image::make($row);              
	                    //$image_resize->resize(100, 50);
	                    $name = "file-".rand(5, 15)."".date('y-m-d-h-i-s').".".$tipe;
	                    $image_resize->save(base_path('/uploads/keluhan/'.$name));

	                    $dataSet = [
					        "keluhan_id" => $keluhan_id,
	                    	"file" => $name,
	                    	"created_at" => date('Y-m-d h:i:s')
					    ];
					    DB::table('keluhan_photos')->insert($dataSet);
			 		}
		 		
		 				 		
		  		$request->session()->flash('status', 'Keluhan berhasil di ajukan!');
		 		return redirect('keluhan');
		 	}      
		} catch (Exception $e) {
		    //echo $e->getMessage();
		    echo "simpan data gagal";
		}
    }

    public function delete(){
    	$id = $_GET['id'];
    	$delete = new Keluhan;
    	$data = $delete::find($id);
		$data->delete();
         $json = array("info" => "Data berhasil di hapus");
    	return json_encode($json);
    }

    public function show(){
    	$id = $_GET['id'];
    	$get = new Keluhan;
    	$data = $get::where("id",$id)->get();
        
    	echo "<table class='table table-striped'>";
    	foreach ($data as $row) {
    		
    		echo "<tr>";
    		echo "<td>Nama Pelapor</td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->nama_pelapor."</td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>No Telephone</td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->no_telp."</td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Sebagai</td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->sebagai."</td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Isi Laporan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->isi_laporan."</td>";
    		echo "</tr>";
    		echo "<tr>";
    		echo "<td>Tanggal Keluhan</td>";
    		echo "<td>:</td>";
    		echo "<td>".$row->created_at."</td>";
    		echo "</tr>";
            $photo = DB::table('keluhan_photos')
            ->where("keluhan_id",$row->id)
            ->get();
            foreach ($photo as $key) {
                echo "<tr>";
                echo "<td>Gambar</td>";
                echo "<td>:</td>";
                echo "<td><a data-fancybox='gallery' href='".url('/')."/uploads/keluhan/".$key->file."'><img src='".url('/')."/uploads/keluhan/".$key->file."' width='100' height='100'></a></td>";
                echo "</tr>";
            }


        
    		
    	}
    	echo "</table>";

    }
   
}

