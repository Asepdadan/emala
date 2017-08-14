<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return redirect('home');
});

Route::get('home','HomeController@index')->name('home');

Route::get('tentang',function(){
	$data = new App\CustomHeaderFrontend;
	$header = $data::where('status',1)->get();
	$data['title'] = "Tentang";
	$data['class'] = "tentang";
	$data["header"] = $header[0]->header;
	$new = new App\Tentang_kami();
	$data["data"] = $new::where('status',1)->get();
	return view('tentang.tentang',$data);
})->name('tentang');

Route::get('survey',function(){
	$data = new App\CustomHeaderFrontend;
	$header = $data::where('status',1)->get();
	$data["header"] = $header[0]->header;
	$data['title'] = "Survey";
	$data['class'] = "survey";
	$data['soal'] = DB::select("select * from soal_surveys where status = 1");
	$data['pilihan'] = DB::select("select * from pilihan_survey where status = 1");
	

	return view('survey.survey',$data);
})->name('survey');

Route::get('keluhan',function(){
	$data = new App\CustomHeaderFrontend;
	$header = $data::where('status',1)->get();
	$data["header"] = $header[0]->header;
	$data['title'] = "Keluhan";
	$data['class'] = "keluhan";
	return view('keluhan.keluhan',$data);
})->name('keluhan');

Route::get('pelatihan',function(){
	$data = new App\CustomHeaderFrontend;
	$header = $data::where('status',1)->get();
	$data["header"] = $header[0]->header;
	$data['title'] = "Pelatihan";
	$data['class'] = "pelatihan";
	return view('pelatihan.pelatihan_penyedia',$data);
})->name('pelatihan');

Route::get('formulir-rekanan',function(){
	$data['title'] = "Formulir Rekanan";
	$data['class'] = "rekanan";
	$data['header_kecil'] = "LAYANAN PENGADAAN SECARA ELEKTRONIK";
	$data['header_besar'] = "FORMULIR PENDAFTARAN PELATIHAN BAGI PENYEDIA/REKANAN";
	$waktu_pelatihan = DB::table('waktu_pelatihan')->where("pelatihan_id",1)->get();
	$kuota = DB::table('waktu_pelatihan')->select('kuota')->get();
	$check_kuota = DB::table("pelatihan")
					->where("status",1)
					->where("id_pelatihan",1)
					->count();

	if($check_kuota >= $kuota[0]->kuota){
		echo  "<script>alert('Maaf Kuota Untuk Pelatihan Sudah Penuh')
		window.location.href = '".url('pelatihan')."';		
		</script>";
		
	}else{
		return view('pelatihan.formulir_rekanan',$data,["waktu_pelatihan" => $waktu_pelatihan]);
	}

	
	
})->name('rekanan');

Route::post("pelatihan/rekanan","PelatihanController@aksiPelatihanRekanan");
Route::get("pelatihan/getDataPenyedia","PelatihanController@getDataPenyedia");

Route::get("pelatihan/form_pejabat_pengadaan","PelatihanController@form_pejabat_pengadaan");
Route::get("pelatihan/form_ppk","PelatihanController@form_ppk");
Route::get("pelatihan/form_auditor","PelatihanController@form_auditor");
Route::get("pelatihan/form_pokja_ulp","PelatihanController@form_pokja_ulp");

Route::get("pelatihan/get/pejabat_pengadaan","PelatihanController@get_pejabat_pengadaan");
Route::get("pelatihan/get/ppk","PelatihanController@get_ppk");
Route::get("pelatihan/get/auditor","PelatihanController@get_auditor");
Route::get("pelatihan/get/pokja","PelatihanController@get_pokja");



Route::post("aksiKeluhan","KeluhanController@store");
Route::get("Keluhan","KeluhanController@index");


Route::get('formulir-pegawai-pengguna','PegawaiPenggunaController@index')->name('formulir_pengguna');;
Route::get('formulir-buku-tamu','BukuTamuController@index')->name('buku_tamu');
Route::post('aksi/buku_tamu','BukuTamuController@store');

Route::post('aksi/pegawai_pengguna','PegawaiPenggunaController@store');
Route::get('aksi/pegawai_pengguna/checkEmail','PegawaiPenggunaController@checkEmail');
Route::get('aksi/pegawai_pengguna/checkUsername','PegawaiPenggunaController@checkUsername');


// Route backend
use App\custombackend;
	Route::get("backend/login",function(){
		$get = new custombackend;
		$data["profile"] = $get::where("status",1)->get();
		return view("backend/login/form_login",$data);
	})->middleware('guest')->name("login");
	Route::get("backend/logout",function(){
		Auth::logout();
		return redirect('');
	});
	

	Route::post('getlogin','LoginController@getlogin');

// Route::get("backend/daftar",function(){
// 	$user = new App\User;
//     $user->rule_id = 1;
//     $user->username = "Super4dmin";
//     $user->name = "SuperAdmin";
//     $user->email = "superadmin@gmail.com";
//     $user->password = bcrypt("Super4dm1n");
//     $user->save();
//     if($user->save == TRUE){
//         return redirect('login');    
//     }    
// });

Route::group(['middleware' => ['auth']], function () {
   

  Route::get("backend/keluhan","KeluhanController@index")->name('backend/keluhan');
  Route::get("backend/get/keluhan","KeluhanController@show");
 



	Route::get("backend/tentang-kami","TentangKamiController@index");

	Route::get("getIsiTentangKami",function(){
		$cari = new App\Tentang_kami();
		$id = $_GET['id'];
		$data = $cari::find($id);
		return $data->isi;
	});

	Route::get("getDataTentangKami","TentangKamiController@show");

	Route::get("backend/getDataTentangKami","TentangKamiController@getDataTentangKami");

	Route::get("backend/deleteTentangKami","TentangKamiController@destroy");

	Route::post("backend/aksi/tentang-kami","TentangKamiController@store");

	Route::get("backend/edit/tentang-kami/{id}","TentangKamiController@edit");

	Route::post("backend/aksi/edit/tentang-kami","TentangKamiController@update");
	

	Route::get("backend/permintaan-akun-pengguna","PermintaanAkunController@index");
	Route::get("backend/getPegawaiPengguna","PermintaanAkunController@getPegawaiPengguna");
	Route::get("backend/getDetailPegawaiPengguna","PermintaanAkunController@getDetailPegawaiPengguna");
	Route::get("backend/getDaftarTamu","BackenBukuTamuController@getDaftarTamu");
	Route::get("backend/buku-tamu","BackenBukuTamuController@index");
	Route::get("backend/delete/buku-tamu","BackenBukuTamuController@delete");
	Route::get("backend/getDetailBukuTamu","BackenBukuTamuController@getDetailBukuTamu");


	Route::group(array('prefix'=>'backend'),function(){
		Route::resource('pembuatan-akun','PembuatanAkunController',array('except'=>array('create','edit')));
	});
	Route::get("backend/getAkunPimpinan","PembuatanAkunController@show");
	Route::get("backend/deleteAkunPimpinan","PembuatanAkunController@destroy");

	Route::get("backend/checkUsername",function(){
		$user = new App\User;
		 $username = $_GET['username'];
        //$username = "asdan15";
	        $app = DB::table('users')->where('username', $username)->first();
	        
	        if($app == null){
	            $isAvailable = true; // or false
	        }else{
	            $isAvailable = false; // or false
	        }       

	        // Finally, return a JSON
	        echo json_encode(array(
	            'valid' => $isAvailable,
	        ));
	});

	Route::get("backend/checkEmail",function(){
		$user = new App\User;
		 $email = $_GET['email'];
        //$username = "asdan15";
	        $app = DB::table('users')->where('email', $email)->first();
	        
	        if($app == null){
	            $isAvailable = true; // or false
	        }else{
	            $isAvailable = false; // or false
	        }       

	        // Finally, return a JSON
	        echo json_encode(array(
	            'valid' => $isAvailable,
	        ));
	});

	Route::get("backend/customize-frontend","CustomizeHeader@index");

	Route::post("backend/aksi/customize_frontend","CustomizeHeader@create");

	Route::get("backend/getDataCustomeHeader","CustomizeHeader@getDataCustomeHeader");

	Route::get("backend/deleteCustomHeader","CustomizeHeader@destroy");

	Route::get("backend/getDataKeluhan","KeluhanController@getDataKeluhan");

	Route::get("backend/deleteKeluhan","KeluhanController@delete");	

	Route::get("backend/template-email","TemplateEmailController@index");	

	Route::get("backend/getTemplateEmail","TemplateEmailController@getTemplateEmail");	

	Route::get("backend/ubah/template-email","TemplateEmailController@edit");	

	Route::put("backend/update/template-email","TemplateEmailController@update");	

	Route::get("backend/deleteTemplateEmail","TemplateEmailController@delete");	

	Route::post("backend/postTemplateEmail","TemplateEmailController@store");	

	Route::get("backend/pegawai_pengguna","BackendPegawaiPenggunaController@index");	

	Route::get("backend/getPegawaiPengguna","BackendPegawaiPenggunaController@getPegawaiPengguna");	

	Route::get("backend/deletePegawaiPengguna","BackendPegawaiPenggunaController@delete");	

	Route::get("backend/form_pembuatan_akun","BackendPegawaiPenggunaController@form_pembuatan_akun");		

	Route::post("backend/create_akun_pengguna","BackendPegawaiPenggunaController@create_akun");		

	Route::get("backend/gambar-home","HomeGambarController@index");		

	Route::post("backend/aksi/header_home","HomeGambarController@store");		

	Route::get("backend/get/header_home","HomeGambarController@get");		

	Route::get("backend/delete/gambar-home","HomeGambarController@destroy");		

	Route::get("backend/get/gambar-home","HomeGambarController@getGambar");		

	Route::get("backend/survey","SurveyController@index");		
	Route::get("backend/get/survey","SurveyController@get");		
	Route::get("backend/delete/survey","SurveyController@destroy");		
	Route::post("backend/aksi/survey","SurveyController@store");		
	Route::get("backend/getSurvey","SurveyController@show");		
	Route::post("backend/ubah/survey","SurveyController@update");		

	Route::get("backend/dashboard","DashboardController@index")->name("backend/dashboard");		

	Route::get("backend/customize-slider","CustomizeSlider@index");
	Route::post("backend/aksi/customize-slider","CustomizeSlider@store");
	Route::get("backend/get/customize-slider","CustomizeSlider@get");
	Route::get("backend/delete/customize-slider","CustomizeSlider@destroy");
	Route::get("backend/show/customize-slider","CustomizeSlider@getGambar");
	Route::get("backend/get/detail/customize-slider","CustomizeSlider@detail");
	Route::post("backend/edit/customize-slider","CustomizeSlider@update");
	Route::get("backend/get/users","PembuatanAkunController@edit");

	Route::get("backend/waktu_pelatihan","WaktuPelatihan@index");
	Route::get("backend/get/waktu_pelatihan","WaktuPelatihan@get_waktu_pelatihan");
	Route::post("backend/post/waktu_pelatihan","WaktuPelatihan@store");
	Route::get("backend/delete/waktu_pelatihan","WaktuPelatihan@delete");
	Route::get("backend/get/detail_waktu_pelatihan","WaktuPelatihan@detail_waktu_pelatihan");
	Route::post("backend/post/ubah_waktu_pelatihan","WaktuPelatihan@update");

	Route::get("backend/customize-backend","CustomizeBackendController@index");
	Route::get("backend/get/customize-backend","CustomizeBackendController@get");
	Route::post("backend/post/customize-backend","CustomizeBackendController@store");
	Route::get("backend/delete/customize-backend","CustomizeBackendController@destroy");
	Route::get("backend/edit/customize-backend","CustomizeBackendController@edit");


	Route::get("backend/pengajuan-peserta-pelatihan","PengajuanPesertaPelatihanController@index");
	Route::get("backend/get/peserta-pelatihan","PengajuanPesertaPelatihanController@get_peserta");
	Route::get("backend/delete/peserta-pelatihan","PengajuanPesertaPelatihanController@delete_peserta");
	Route::get("backend/get/detail-peserta-pelatihan","PengajuanPesertaPelatihanController@detail_peserta");
	Route::get("backend/ubah_status/peserta-pelatihan","PengajuanPesertaPelatihanController@ubah_status");


});


Route::post("kepuasan",function(){
	$data = $_POST;
	foreach($data as $row => $key){
		$dataSet = [
	            	"id_soal" => $row,
			        "id_pilihan" => $key,
                	"created_at" => date('Y-m-d h:i:s')
			    ];
		DB::table('penilaian_surveys')->insert($dataSet);
	}
	return redirect('survey');
});


Route::get("hasil-survey",function(){



	$name = DB::select("select id,nama_pilihan from pilihan_survey");
	$array = array();

	foreach($name as $row){
		$json = array();
		$json["name"] = $row->nama_pilihan;
		$data = DB::select("select count(id_soal) as hitung from penilaian_surveys where id_pilihan = {$row->id} group by id_soal");
		$arr_data = array();
		foreach($data as $key){
			$arr = (int)$key->hitung;
			$arr_data[] = $arr;
		}
		$json["data"] = $arr_data;	
		$array[] = $json;
	}


		return $array;

});


