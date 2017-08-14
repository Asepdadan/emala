<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use Intervention\Image\ImageManagerStatic as Image;
use DB;
use App\home_gambar;
use Auth;
use URL;
use App\custombackend;

class HomeGambarController extends Controller
{
    //
    public function index(){
    	$data["title"] = "Home Gambar";
		$data["header"] = "Gambar Halaman Home";
		$data["deskripsi"] = "Custom Gambar Home";
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
    	return view("backend.gambar_home.gambar_home",$data);
    }

    public function store(Request $request){

    		$home_gambar = new home_gambar;
    		$home_gambar::where('status', 1)
          	->update(['status' => 0]);
            $image = $request->file('file');
            $no = 1;
            foreach ($image as $row) {
            	//$tipe = Input::file('file')->guessClientExtension();
            	$tipe = $row->guessClientExtension();
	            $image_resize = Image::make($row);              
	            $image_resize->resize(240);
	            $name = "file-".rand(5, 15)."".date('y-m-d-h-i-s').".".$tipe;
	            $image_resize->save(base_path('/uploads/home/'.$name));
	            
	            $dataSet = [
	            	"tipe_gambar" => $no++,
			        "gambar" => $name,
                	"status" => 1,
                	"created_at" => date('Y-m-d h:i:s')
			    ];
			    DB::table('home_gambars')->insert($dataSet);
            }
			
            return redirect("backend/gambar-home");

    }

    public function get(){
    	$get = new home_gambar;
    	$data = $get::orderBy("created_at","DESC")->get();
    	$no = 1;
    	$array = array();
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $no++;
    		if($row->tipe_gambar == 1){
                $arr[] = "Pengguna"; 
            }elseif($row->tipe_gambar == 2){
                $arr[] = "Pengunjung"; 
            }else{
                $arr[] = "Pelatihan";    
            }
    		if($row->status == 1){
                $arr[] = "<span class='badge bg-success'>Aktif</span>"; 
            }else{
                $arr[] = "<span class='badge bg-danger'>Tidak Aktif</span>";    
            }
    		$arr[] = $row->created_at->format("Y-m-d h:i:s");
    		if(Auth::user()->rule_id == 1 ){
    		 $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}else{
    			$arr[] = " <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}
    		$array[] = $arr;
    	}
    	$output = array("data" => $array);

    	return json_encode($output);

    }

    public function destroy(){
    	$id = $_GET['id'];
    	$get = new home_gambar;

    	$data = DB::select("select gambar from home_gambars where id = ?",[$id]);
    	foreach ($data as $row) {
    		unlink(base_path("/uploads/home/".$row->gambar));
    	}

    	$get::destroy($id);

    }

    public function getGambar(){
        $id = $_GET['id'];
        $get = new home_gambar;
        $json = $get::where("id",$id)->get();
        foreach ($json as $row) {
            echo "<img src='".URL::to('/')."/uploads/home/".$row->gambar."' height='400px'>";
        }
    }
}
