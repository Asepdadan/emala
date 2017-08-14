<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tentang_kami;

use Illuminate\Support\Facades\Session;
use App\custombackend;
class TentangKamiController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
        //$this->middleware('rule:Superadmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $data["title"] = "Kelola Tentang Kami";
    $data["header"] = "Kelola Tentang Kami";
    $data["deskripsi"] = "Menampung Data Tentang Kami";
    $get = new custombackend;
    $data["profil"] = $get::where("status",1)->get();
    return view("backend/tentang_kami/tentang_kami",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $tentang_kami1 = new Tentang_kami;
        $tentang_kami1::where('status', 1)
          ->update(['status' => 0]);

        $tentang_kami = new Tentang_kami;
        $data = $request->all();
        $tentang_kami->judul = $data["judul"];
        $tentang_kami->isi = $data["isi"];
        $tentang_kami->judul1 = $data["judul1"];
        $tentang_kami->isi1 = $data["isi1"];
        $tentang_kami->status = 1;
        $tentang_kami->save();

        $data = array("message" => "Success save");
        // return json_encode($data);
        Session::flash('information', 'Tentang kami berhasil tersimpan');
        return redirect("backend/tentang-kami");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id = $_GET["id"];
        $get = new Tentang_kami;
        $data = $get::where("id",$id)->get();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
        $data["title"] = "Form Edit Tentang Kami";
        $data["header"] = "Form Edit Tentang Kami";
        $data["deskripsi"] = "Menampung Data Tentang Kami";
        $get = new Tentang_kami;
        $for = $get::where("id",$id)->get();
        foreach ($for as $row) {
            $data["id"] = $row->id;
            $data["judul"] = $row->judul;
            $data["isi"] = $row->isi;
            $data["judul1"] = $row->judul1;
            $data["isi1"] = $row->isi1;
            $data["status"] = $row->status;
        }
        return view("backend.tentang_kami.form_edit_tentang_kami",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $get = Tentang_kami::find($request->id);
        $get->judul = $request->judul;
        $get->isi = $request->isi;
        $get->judul1 = $request->judul1;
        $get->isi1 = $request->isi1;
        $get->status = $request->status;
        $get->save();
        Session::flash('information', 'Tentang kami berhasil diubah');
        return redirect("backend/tentang-kami");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $id = $_GET["id"];
        $tentang_kami = new Tentang_kami;
        $tentang_kami::destroy("id",$id);
    }

    public function getDataTentangKami(){
        $data = new Tentang_kami;   
        $json= $data::orderBy("created_at","DESC")->get();
        
        $array = array();
        $no = 1;
        foreach ($json as $row) {
            $arr = array();
            $arr[] = $no++;
            $arr[] = "<a href='#viewModal' data-toggle='modal' data-target='#viewModal' data-whatever=".$row->id.">".$row->judul."</a>";
            if($row->status == 1){
                $arr[] = "<span class='badge bg-success'>Aktif</span>"; 
            }else{
                $arr[] = "<span class='badge bg-danger'>Tidak Aktif</span>";    
            }
            $arr[] = "<a href='javascript::' onclick='hapus(".$row->id.")' class='btn btn-danger'><i class='fa fa-trash'></i></a> <a href='edit/tentang-kami/".$row->id."' class='btn btn-default'><i class='fa fa-pencil-square'></i></a>";
            $array[] = $arr;
        }

        $output = array(
                "data" => $array
            );
        return json_encode($output);
    }
}

