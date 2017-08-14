<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;

use App\Buku_tamu;

use App\CustomHeaderFrontend;

class BukuTamuController extends Controller
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
        $data["title"] = "Buku Tamu";
        $data["class"] = "Buku Tamu";
        $data["header_kecil"] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
        $data["header_besar"] = "FORMULIR ISIAN BUKU TAMU LPSE";
        return view('buku_tamu.formulir_buku_tamu',$data);
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
        $data = $request->all();
        $buku_tamu = new Buku_tamu;
        $buku_tamu->tanggal_kunjungan = $data["tanggal_kunjungan"];
        $buku_tamu->nama = $data["nama"];
        $buku_tamu->sebagai = $data["sebagai"];
        $buku_tamu->panggilan = $data["panggilan"];
        $buku_tamu->nama_perusahaan = $data["nama_perusahaan"];
        $buku_tamu->nama_admin = $data["nama_admin"];
        $buku_tamu->email = $data["email"];
        $buku_tamu->no_hp = $data["no_telp"];
        $buku_tamu->alamat = $data["alamat"];
        $buku_tamu->tujuan = $data["tujuan"];

        try {

            if(!$buku_tamu->save()) {
                $error = "You cannot save this data";
                throw new Exception($error);
            } else{
                $buku_tamu->save();
                $request->session()->flash('pesan', "FORMULIR ISIAN BUKU TAMU LPSE berhasil di input");
                return redirect('formulir-buku-tamu');   
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
    public function destroy()
    {
        //
       
    }
}
