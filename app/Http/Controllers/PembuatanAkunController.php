<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Rule;

use App\User;

use DB;

use Mail;

use App\Mail\KirimAkunPimpinan;

use App\TemplateEmail;
use App\custombackend;
class PembuatanAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rule = new Rule;
        $data["title"] = "Pembuatan Akun Pimpinan";
        $data["header"] = "Pembuatan Akun Pimpinan";
        $data["deskripsi"] = "Pengelolaan Pembuatan Akun Pimpinan";
        $data["rule"] = $rule::where("id", '!=', 1)->orderBy("id")->get();
        $get = new custombackend;
        $data["profil"] = $get::where("status",1)->get();
        return view("backend.pembuatan_akun.pembuatan_akun",$data);
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
        $email = new TemplateEmail;
        $get_email = $email::where("status",1)->get();
        $user = new User;
        $user->rule_id = $request->hak_akses;
        $user->username = $request->username;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        try {

            if(!$user->save()) {
                $error = "You cannot save this data";
                throw new Exception($error);
            }elseif ($user->save()) {
                $request->session()->flash('pesan', "User berhasil di tambahkan");
                $data = array("username" => $request->username,"nama" => $request->nama, "password" => $request->password,"email" => $request->email,"email" => $get_email);
                //Mail::to($request->email)->send(new KirimAkunPimpinan($data));
                return redirect("backend/pembuatan-akun");       
            }      
        } catch (Exception $e) {
            //echo $e->getMessage();
            echo $e;
        }        
        
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
        
        $user = DB::table('users')
            ->select('users.id as users_id', 'users.rule_id as rule','users.username as username','users.name as nama','users.email as email','users.created_at as tanggal_pembuatan','rules.namaRule as nama_rule' )
            ->join('rules', 'users.rule_id', '=', 'rules.id')
            ->where("rules.id",'!=',1)
            ->get();
        
        $array = array();
        $no = 1;
        foreach ($user as $row) {
            $arr = array();
            $arr[] = $no++;
            $arr[] = $row->nama_rule;
            $arr[] = $row->username;
            $arr[] = $row->email;
            $arr[] = $row->tanggal_pembuatan;
            $arr[] = "<a href='javascript::' class='btn btn-danger' onclick='hapus(".$row->users_id.")'><i class='fa fa-trash'></i></a>";
            $array[] = $arr;
        }
        $output = array("data" => $array);
        return json_encode($output);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = $_GET["id"];
        $get = new User;
        $data = $get::where("id",$id)->get();

        foreach ($data as $row) {
            $arr["username"] = $row->username;
            $arr["nama"] = $row->name;
            $arr["email"] = $row->email;
            $arr["password"] = $row->password;
        }

        return json_encode($arr);
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
        $id = $_GET["id"];
        $user = new User;
        $user::destroy($id);

    }
}
