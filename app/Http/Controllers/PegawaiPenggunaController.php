<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Pegawai_pengguna;

use DB;

use App\CustomHeaderFrontend;

class PegawaiPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = new CustomHeaderFrontend;
        $header = $data::where('status',1)->get();
        $data["header"] = $header[0]->header;
        $data["title"] = "Formulir Pengguna";
        $tahun = date("Y");
        $data["header_besar"] = "FORMULIR ISIAN DATABASE PEGAWAI PENGGUNA SPSE TAHUN {$tahun}";
        $data["header_kecil"] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
        $data["class"] = "homea";
        return view('pegawai_pengguna.formulir',$data);
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
        $input = new Pegawai_pengguna;
        $tipe = Input::file('file')->guessClientExtension();
        $input->nama = Input::get("nama");
        $input->nip = Input::get("nip");
        $input->userid = Input::get("userid");
        $input->alamat = Input::get("alamat");
        $input->no_telp = Input::get("no_telp");
        $input->no_hp = Input::get("no_hp");
        $input->email = Input::get("email");
        $input->golongan = Input::get("golongan");
        $input->pangkat = Input::get("pangkat");
        $input->jabatan = Input::get("jabatan");
        $input->no_sk = Input::get("no_sk");
        $input->masa_berlaku = Input::get("masa_berlaku");
        $input->file_sk = "file-".date('y-m-d-h-i-s').".".$tipe;
        
        try {

            if(!$input->save()) {
                $error = "You cannot save this data";
                throw new Exception($error);
            } else{
                $input->save();
                $request->file('file')->move(
                    base_path() . '/uploads/', "file-".date('y-m-d-h-i-s').".".$tipe
                );
                return redirect('formulir-pegawai-pengguna');   
            }  
            
        } catch (Exception $e) {
            //echo $e->getMessage();
            echo "tidak dapat di simpan";
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkEmail(){
        $data = new Pegawai_pengguna();
        $email = $_GET['email'];
        //$username = "asdan15";
        $app = DB::table('pegawai_pengguna')->where('email', $email)->first();
        
        if($app == true){
            $isAvailable = false; // or false
        }else{
            $isAvailable = true; // or false
        }       

        // Finally, return a JSON
        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }

    public function checkUsername(){
        $data = new Pegawai_pengguna();
        $userId = $_GET['userid'];
        //$username = "asdan15";
        $app = DB::table('pegawai_pengguna')->where('userId', $userId)->first();
        
        if($app == true){
            $isAvailable = false; // or false
        }else{
            $isAvailable = true; // or false
        }       

        // Finally, return a JSON
        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }
}
