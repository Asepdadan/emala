<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\custombackend;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class CustomizeBackendController extends Controller
{
    //

     public function index(){
     	$get = new custombackend;
        $data["title"] = "customize-backend";
        $data["deskripsi"] = "Kelola customize-backend";
        $data["header"] = "Kelola customize-backend";
        $data["data"] = $get::where("status",1)->get();
        $data["profil"] = $get::where("status",1)->get();
        return view('backend.customize_backend.customize_backend',$data);
    }

    public function get(){
    	$get = new custombackend;
    	$json = $get::orderBy("created_at","DESC")->get();

    	$array = array();
    	foreach ($json as $row) {
    		$data = array();
    		$data[] = $row->header;
    		$data[] = $row->footer_kiri;
    		$data[] = $row->versi;
    		if($row->status){
    		$data[] = "Aktif";	
    		}else{
    		$data[] = "Tidak Aktif";	
    		}
    		$data[] = $row->created_at->format("Y-m-d h:i:s");
    		 if(Auth()->user()->rule_id == 1){
            $data[] = "<a href='#' class='btn btn-danger' onclick='hapus(".$row->id.")'><i class='fa fa-trash'></i></a> <a href='#' class='btn btn-primary' onclick='ubah(".$row->id.")'><i class='fa fa-pencil'></i></a> ";
            }else{
            $data[] = "";
            }
    		$array[] = $data;
    	}

    	$output = array("data" => $array);

    	return json_encode($output);
    }

    public function store(Request $request){
    	  $simpan = new custombackend;
          $simpan::where("status",1)
            ->update(['status' => 0]);
    	  $tipe = Input::file('foto')->guessClientExtension();
    	  $name = "file-".date('y-m-d-h-i-s').".".$tipe;
    	  $simpan->foto = $name;
    	  $simpan->header = Input::get('judul_header');
    	  $simpan->footer_kiri = Input::get('judul_footer');
    	  $simpan->versi = Input::get('versi');
    	  $simpan->status = 1;
        
    	try {

            if(!$simpan->save()) {
                $error = "You cannot save this data";
                throw new Exception($error);
            } else{
                $simpan->save();
                if($request->hasFile('foto')) {

                    $image       = $request->file('foto');
                    $image_resize = Image::make($image->getRealPath());              
                    $image_resize->resize(70, 50);
                    $image_resize->save(base_path('/uploads/header/'.$name));

                }

                return redirect('backend/customize-backend');   
            }  
            
        } catch (Exception $e) {
            //echo $e->getMessage();
            echo "tidak dapat di simpan";
        }
    }

    public function destroy()
    {
        $id = $_GET["id"];
        $get = new custombackend;
        // hapus file
        $data = DB::select('select foto from custombackends where id = ?', [$id]);
        foreach ($data as $row) {
            unlink(base_path("/uploads/header/".$row->foto));
        }
        $get::destroy("id",$id);

    }

    public function edit(){
        $id = $_GET['id'];
        $get = new custombackend;
        $json = $get::where("id",$id)->get();
        foreach ($json as $row) {
            $data["foto"] = $row->foto;    
            $data["header"] = $row->header;    
            $data["footer"] = $row->footer_kiri;    
            $data["versi"] = $row->versi;    
            $data["status"] = $row->status;    
        }
        return view("backend.customize_backend.form_ubah",$data);
    }
}
