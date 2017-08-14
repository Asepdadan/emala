<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\custombackend;
class SurveyController extends Controller
{
    //

    public function index(){
    	$data["title"] = "Kelola Survey";
	    $data["header"] = "Kelola Survey";
	    $data["deskripsi"] = "Menampung Data Survey";
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
	    return view('backend/survey/survey',$data);
    }

    public function store(Request $request){
    	$dataSet = [
			        "soal" => $request->soal,
			        "status" => 1,
                	"created_at" => date('Y-m-d h:i:s')
			    ];
		DB::table('soal_surveys')->insert($dataSet);
		return redirect('backend/survey');
    }

    public function get(){
    	$data = DB::select("select id,soal,status,created_at from soal_surveys order by created_at DESC");
    	$array = array();
    	$no = 1;
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $no++;
    		$arr[] = $row->soal;
    		if($row->status == 1){
    			$arr[] = "Aktif";	
    		}else{
    			$arr[] = "Tidak Aktif";	
    		}
    		$arr[] = $row->created_at;
    		if(Auth::user()->rule_id == 1 ){
    		 $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}else{
    			$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}
    		$array[] = $arr;
    	}

    	$output = array("data" => $array);
    	return json_encode($output);
    }

    public function destroy(){
    	$id = $_GET['id'];
    	DB::table('soal_surveys')->where('id', '=', $id)->delete();
    	return "data berhasil dihapus";
    }

    public function show(){
    	$id = $_GET['id'];
    	$json = DB::select('select * from soal_surveys where id = ?',[$id]);
    	foreach ($json as $row) {
    		$data["id"] = $row->id;
    		$data["soal"] = $row->soal;
    		$data["status"] = $row->status;
    	}
    	$output = array("data" => $data);
    	return json_encode($output);
    }

    public function update(Request $request){
    	$id = $request->id;

    	$data = [
    		"soal" => $request->soal,
    		"status" => $request->status
    	];
    	DB::table('soal_surveys')
            ->where('id', $id)
            ->update($data);

    	return redirect("backend/survey");
    }
}
