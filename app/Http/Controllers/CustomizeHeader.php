<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\CustomHeaderFrontend;
use App\custombackend;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Storage;
use DB;


class CustomizeHeader extends Controller
{
    //
    public function index(){
        $data["title"] = "customize-frontend";
        $data["deskripsi"] = "Kelola customize-frontend";
        $data["header"] = "Kelola customize-frontend";
        $custom = new CustomHeaderFrontend;
        $get = new custombackend;
        $data["data"] = $custom::where("status",1)->get();
        $data["profil"] = $get::where("status",1)->get();
        return view('backend/customize_frontend.customize_frontend',$data);
    }

    public function create(Request $request){

    	  $simpan = new CustomHeaderFrontend;
          $simpan::where("status",1)
            ->update(['status' => 0]);
    	  $tipe = Input::file('foto')->guessClientExtension();
    	  $simpan->logo = "file-".date('y-m-d-h-i-s').".".$tipe;
    	  $simpan->header = Input::get('judul_header');
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
                    $image_resize->resize(50, 30);
                    $image_resize->save(base_path('/uploads/header/'."file-".date('y-m-d-h-i-s').".".$tipe));

                }

                return redirect('backend/customize-frontend');   
            }  
            
        } catch (Exception $e) {
            //echo $e->getMessage();
            echo "tidak dapat di simpan";
        }

    	

    }

    public function getDataCustomeHeader(){
        $get = new CustomHeaderFrontend;
        $data = $get::orderBy("created_at", "DESC")->get();

        $array = array();
        $no = 1;
        foreach ($data as $row) {
            $arr = array();
            $arr[] = $no++;
            $arr[] = $row->header;
            if($row->status == 1){
                $arr[] = "<span class='badge'>Aktif</span>";    
            }else{
                $arr[] = "<span class='badge'>Tidak Aktif</span>";    
            }
            $arr[] = $row->created_at->format('Y-m-d h:i:s');
            if(Auth()->user()->rule_id == 1){
            $arr[] = "<a href='#' class='btn btn-danger' onclick='hapus(".$row->id.")'><i class='fa fa-trash'></i></a>  ";
            }else{
            $arr[] = "";
            }
            $array[] = $arr;
        }

        $output = array("data" => $array);

        return json_encode($output);
    }

    public function destroy()
    {
        $id = $_GET["id"];
        $get = new CustomHeaderFrontend;
        // hapus file
        $data = DB::select('select logo from custom_header_frontends where id = ?', [$id]);
        foreach ($data as $row) {
            unlink(base_path("/uploads/header/".$row->logo));
        }
        $get::destroy("id",$id);

    }
}
