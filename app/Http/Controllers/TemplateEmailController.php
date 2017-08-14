<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TemplateEmail;

use Auth;

use App\Http\Requests;
use App\custombackend;
class TemplateEmailController extends Controller
{
    //

    public function index(){

    	$data['title'] = "Custom Email";
    	$data['header'] = "Kelola Custom Email";
    	$data['deskripsi'] = "Kelola isi custom Email";
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
    	return view("backend/mail/template_email",$data);
    }

    public function getTemplateEmail(){
    	$get = new TemplateEmail;
    	$data = $get::orderBy('created_at','Desc')->get();

    	$array = array();
    	foreach ($data as $row) {
    		$arr = array();
    		$arr[] = $row->header;
            $arr[] = $row->footer;
            if($row->status == 1){
                $arr[] = "Aktif";    
            }else{
                $arr[] = "Tidak Aktif";    
            }
    		$arr[] = $row->created_at->format('Y-m-d h:i:s');
    		if(Auth::user()->rule_id == 1 ){
    		 $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='".url("backend/ubah/template-email?id=".$row->id."")."'  class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}else{
    			$arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id." class='btn btn-default'><i class='fa fa-search'></i></a>";
    		}
    	
    		$array[] = $arr;
    	}

    	$output = array("data" => $array);

    	return json_encode($output);
    }

    public function delete(){
    	$id = $_GET['id'];
    	$find = new TemplateEmail;
    	$find::destroy("id",$id);
    }

    public function store(Request $request){
    	$email = new TemplateEmail;
    	//$email->subject = $request->subject;
    	$email->header = $request->header;
        $email->footer = $request->footer;
    	$email->status = 1;
    	$email->save();

    	$request->session()->flash('pesan', "Template email berhasil ditambahkan");
    	return redirect("backend/template-email");

    }

    
    public function edit(){
        $id = $_GET["id"];
        $email = new TemplateEmail;
        $get_email = $email::where("id",$id)->get();

        foreach ($get_email as $row) {
            $data["id"] = $row->id;
            $data["header_email"] = $row->header;
            $data["footer"] = $row->footer;
            $data["status"] = $row->status;
        }
        $data['title'] = "Ubah Custom Email";
        $data['header'] = "Kelola Custom Email";
        $data['deskripsi'] = "Kelola isi custom Email";
        return view("backend.mail.form_edit_template_email",$data);
    }

    public function update(Request $request){
        $email = new TemplateEmail;
        $data = $email::find($request->id);
        $data->header = $request->header_email;
        $data->footer = $request->footer;
        $data->status = $request->status;
        $data->save();

        return redirect("backend/template-email");
    }

}
