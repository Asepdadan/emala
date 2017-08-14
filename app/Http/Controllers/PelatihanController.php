<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Facades\Input;

use DB;

class PelatihanController extends Controller
{
    //

    public function aksiPelatihanRekanan(Request $request){
    	//dd($request->all());
    	$input = $request->all();

        if(isset($_POST["rekanan"])){
            $id_pelatihan = 1;
        }else if(isset($_POST["pejabat_pengadaan"])){
            $id_pelatihan = 2;
        }else if(isset($_POST["ppk"])){
            $id_pelatihan = 3;
        }else if(isset($_POST["auditor"])){
            $id_pelatihan = 4;
        }else if(isset($_POST["pokja_ulp"])){
            $id_pelatihan = 5;
        }else{
            return "no";
        }
        //$request->session()->flash('pesan', "FORMULIR PENDAFTARAN PELATIHAN BAGI PENYEDIA/REKANAN berhasil di ajukan");
        DB::table('pelatihan')->insert(
            ['nama' => $input["nama"] , 
            "id_pelatihan" => $id_pelatihan,
            "nama_perusahaan" => $input["nama_perusahaan"],
            "alamat" => $input["alamat"],
            "no_hp" => $input["no_hp"],
            "email" => $input["email"],
            "tanggal_pelatihan" => $input["tanggal_pelatihan"],
            "status" => 0
            ]
        );
        return "<script>
        alert('Berhasil di ajukan tunggu konfirmasi verifikasi admin')
        window.location.href = '".url('pelatihan')."'
        </script>";
        //redirect("formulir-rekanan");
    }

    public function getDataPenyedia(){
	$json= DB::table('pelatihan')
            ->where("status",1)
            ->where("id_pelatihan",1)
            ->get();
	
	$array = array();
	$no = 1;
	foreach ($json as $row) {
		$arr = array();
		$arr[] = $no++;
		$arr[] = $row->nama;
		$arr[] = $row->nama_perusahaan;
		$arr[] = $row->alamat;
		$arr[] = $row->tanggal_pelatihan;
		$array[] = $arr;
	}

	$output = array(
            "data" => $array
        );
    return json_encode($output);
    }

    public function form_pejabat_pengadaan(){
    	$data["title"] = "Formulir Pejabat Pengadaan";
    	$data['class'] = "";
    	$data["header_kecil"] = "Formulir Pejabat Pengadaan";
    	$data["header_besar"] = "Formulir Pejabat Pengadaan";
    	$waktu_pelatihan = DB::table('waktu_pelatihan')->where("pelatihan_id",2)->get();
        $kuota = DB::table('waktu_pelatihan')->select('kuota')->where("pelatihan_id",2)->get();
        $check_kuota = DB::table("pelatihan")
                        ->where("status",1)
                        ->where("id_pelatihan",2)
                        ->count();

        dd($kuota);
        if($check_kuota >= $kuota[0]->kuota){
            echo  "<script>alert('Maaf Kuota Untuk Pelatihan Sudah Penuh')
            window.location.href = '".url('pelatihan')."';      
            </script>";
            
        }else{
            return view('pelatihan.formulir_pejabat_pengadaan',$data,["waktu_pelatihan" => $waktu_pelatihan]);
        }
    }

    public function get_pejabat_pengadaan(){
        $data["data"] = DB::table("pelatihan")->where("id_pelatihan",2)->orderBy("created_at","DESC")->get();
       

        return view("pelatihan.tabel_pejabat_pengadaan",$data);
    }

    public function get_ppk(){
        $data["data"] = DB::table("pelatihan")->where("id_pelatihan",3)->orderBy("created_at","DESC")->get();
       

        return view("pelatihan.tabel_pejabat_pengadaan",$data);
    }

    public function get_auditor(){
        $data["data"] = DB::table("pelatihan")->where("id_pelatihan",4)->orderBy("created_at","DESC")->get();
       

        return view("pelatihan.tabel_pejabat_pengadaan",$data);
    }

    public function get_pokja(){
        $data["data"] = DB::table("pelatihan")->where("id_pelatihan",5)->orderBy("created_at","DESC")->get();
       

        return view("pelatihan.tabel_pejabat_pengadaan",$data);
    }

    public function form_ppk(){
    	$data["title"] = "Formulir Pendaftaran Pelatihan PPK";
    	$data['class'] = "";
    	$data['pelatihan'] = "ppk";
    	$data["header_kecil"] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
    	$data["header_besar"] = "Formulir Pendaftaran Pelatihan PPK";
    	$waktu_pelatihan = DB::table('waktu_pelatihan')->where("pelatihan_id",3)->get();
        $kuota = DB::table('waktu_pelatihan')->select('kuota')->where("pelatihan_id",3)->get();
        $check_kuota = DB::table("pelatihan")
                        ->where("status",1)
                        ->where("id_pelatihan",3)
                        ->count();
        
        if($check_kuota >= $kuota[0]->kuota){
            echo  "<script>alert('Maaf Kuota Untuk Pelatihan Sudah Penuh')
            window.location.href = '".url('pelatihan')."';      
            </script>";
            
        }else{
         return view("pelatihan.formulir_ppk",$data,["waktu_pelatihan" => $waktu_pelatihan]);
        }
    	
    }

    public function form_auditor(){
        $data["title"] = "Formulir Pendaftaran Pelatihan Auditor";
        $data['class'] = "";
        $data['pelatihan'] = "ppk";
        $data["header_kecil"] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
        $data["header_besar"] = "Formulir Pendaftaran Pelatihan Auditor";
        $waktu_pelatihan = DB::table('waktu_pelatihan')->where("pelatihan_id",4)->get();
        $kuota = DB::table('waktu_pelatihan')->select('kuota')->where("pelatihan_id",4)->get();
        $check_kuota = DB::table("pelatihan")
                        ->where("status",1)
                        ->where("id_pelatihan",4)
                        ->count();

        if($check_kuota >= $kuota[0]->kuota){
            echo  "<script>alert('Maaf Kuota Untuk Pelatihan Sudah Penuh')
            window.location.href = '".url('pelatihan')."';      
            </script>";
            
        }else{
            return view("pelatihan.formulir_auditor",$data,["waktu_pelatihan" => $waktu_pelatihan]);
        }
        
    }

    public function form_pokja_ulp(){
        $data["title"] = "Formulir Pendaftaran Pelatihan POKJA ULP";
        $data['class'] = "";
        $data['pelatihan'] = "ppk";
        $data["header_kecil"] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
        $data["header_besar"] = "Formulir Pendaftaran Pelatihan POKJA ULP";
        $waktu_pelatihan = DB::table('waktu_pelatihan')->where("pelatihan_id",5)->get();
        $kuota = DB::table('waktu_pelatihan')->select('kuota')->where("pelatihan_id",5)->get();
        $check_kuota = DB::table("pelatihan")
                        ->where("status",1)
                        ->where("id_pelatihan",5)
                        ->count();

        if($check_kuota >= $kuota[0]->kuota){
            echo  "<script>alert('Maaf Kuota Untuk Pelatihan Sudah Penuh')
            window.location.href = '".url('pelatihan')."';      
            </script>";
            
        }else{
            return view("pelatihan.formulir_pokja_ulp",$data,["waktu_pelatihan" => $waktu_pelatihan]);
        }
        
    }

}
