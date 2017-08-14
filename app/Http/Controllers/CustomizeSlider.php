<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\slider;
use Intervention\Image\ImageManagerStatic as Image;
use URL;
use Illuminate\Support\Facades\Input;
use App\custombackend;
class CustomizeSlider extends Controller
{
    //
    public function index(){
    	$data["title"] = "customize-slider";
        $data["deskripsi"] = "Kelola customize-slider";
        $data["header"] = "Kelola customize-slider";
        $custom = new slider;
        $get = new custombackend;
        $data["data"] = $custom::where("status",1)->get();
        $data["profil"] = $get::where("status",1)->get();
        return view('backend/slider.slider',$data);
    }

    public function store(Request $request){

    		$slider = new slider;
    		// $slider::where('status', 1)
      //     	->update(['status' => 0]);
            $image = $request->file('file');
            $no = 1;
            foreach ($image as $row) {
            	
            	$tipe = $row->guessClientExtension();
	            $image_resize = Image::make($row);              
	            //	$image_resize->resize(240,);
	            $name = "file-".rand(5, 15)."".date('y-m-d-h-i-s').".".$tipe;
	            $image_resize->save(base_path('/uploads/slider/'.$name));
	            
	            $dataSet = [
	            	"url" => $request->url,
	            	"isi" => $request->isi,
			        "gambar" => $name,
                	"status" => 1,
                	"created_at" => date('Y-m-d h:i:s')
			    ];
			    DB::table('sliders')->insert($dataSet);
			}
            return redirect("backend/customize-slider");

    }

    public function get(){
    	$get = new slider;
    	$data = $get::orderBy("created_at" ,'DESC')->get();

    	$array = array();
    	$no = 1;
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $no++;
    		$arr[] = $row->url;
    		$arr[] = $row->isi;
    		if($row->status == 1){
    			$arr[] = "Aktif";	
    		}else{	
    			$arr[] = "Tidak Aktif";	
    		}    		
    		$arr[] = $row->created_at->format("Y-m-d h:i:s");
    		if(Auth::user()->rule_id == 1 ){
    		 $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-eye'></i></a> <a href='#editModal' data-toggle='modal' data-target='#editModal' data-whatever=".$row->id." class='btn btn-primary'><i class='fa fa-pencil'></i></a>";
    		}else{
    			$arr[] = " <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-eye'></i></a>";
    		}
    		$array[] = $arr;
    	}

    	$output = array("data" => $array);

    	return json_encode($output);
    }

    public function destroy(){
    	$id = $_GET['id'];
    	$get = new slider;

    	$data = DB::select("select gambar from sliders where id = ?",[$id]);
    	foreach ($data as $row) {
    		unlink(base_path("/uploads/slider/".$row->gambar));
    	}

    	$get::destroy($id);

    }

    public function getGambar(){
        $id = $_GET['id'];
        $get = new slider;
        $json = $get::where("id",$id)->get();
        foreach ($json as $row) {
            echo "<img src='".URL::to('/')."/uploads/slider/".$row->gambar."' height='400px' width='500'>";
        }
    }

    public function detail(){
    	$id = $_GET['id'];
    	$get = new slider;
    	$data = $get::where("id",$id)->get();
    	
    	foreach ($data as $row) {
    		$json["id"] = $row->id;
    		$json["url"] = $row->url;
    		$json["isi"] = $row->isi;
    		$json["status"] = $row->status;
    	}

    	return $json;
    }

    public function update(Request $request){
    	$id = Input::get("id");

    	$get = slider::find($id);
    	$get->url = Input::get("url");
    	$get->isi = Input::get("isi");
    	$get->status = Input::get("status");
    	$get->save();
    	
    	return $request->id;
    }
}
