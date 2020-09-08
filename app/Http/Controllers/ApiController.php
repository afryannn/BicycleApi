<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use App\ModelUser;
use App\ModelSepeda;
use App\ModelBooking as booking;
use Validator;
use Response;
use Auth;
use DB;

class ApiController extends Controller
{ 
  public function bookingitem(Request $req){
    $i_user = $req->I_USER;
    $i_item = $req->I_ITEM;
    $getdate = date("Y-m-d");
    $booking = booking::insert([
      'user_id' => $i_user,
      'bicycle_id' => $i_item,
      'date_booking' => $getdate,
      'status' => "ACTIVATED" //END
    ]);
    if(!isset($booking)){
      $arr = array("status" => 201, "message" => "Failed");
      return response()->json($arr);
    }
    $arr = array("status" => 200,"message" => "SUCCES");
    return response()->json($arr,201);
  }

  public function getcustomer(){
    $data = ModelUser::get();
    if(!isset($data)){
      $arr = array("status" => 201, "message" => "FAILED","data" =>$data);
      return response()->json($arr);
    }
    $arr = array("status" => 200, "message" => "SUCCES","data" =>$data);
    return response()->json($arr);
  }
  public function postRegister(Request $request){
    $email = $request->email;
    $password = $request->password;
    $nama = $request->nama;
    $nohp = $request->nohp;
    $alamat = $request->alamat;
    $noktp = $request->noktp;
    $rules = [
      'email' =>'required|min:1',
      'password' => 'required|min:1', 
      'nama' => 'required|min:1',
      'nohp' => 'required|min:1',
      'alamat' => 'required|min:1',
      'noktp' => 'required|min:1'
    ];
    $validator = Validator::make($request->all(),$rules);
    if($validator->fails()){
      return response()->json($validator->errors(),400);
    }
    $newUser = ModelUser::insert([
      'email' => $email,
      'password' => $password,
      'nama' => $nama,
      'nohp' => $nohp,
      'alamat' => $alamat,
      'noktp' => $noktp,
      'role_user' => '1',
    ]);
    if(!isset($newUser)){
      $arr = array("status" => 201, "message" => "Failed");
      return response()->json($arr);
    }
    $arr = array("status" => 200,"message" => "SUCCES");
    return response()->json($arr,201);
  }
  public function postLogin(Request $request){
    $email = $request->email;
    $password = $request->password;
    $akun = DB::table('TBUser')->where('email', $request->email)->first();
    if(!isset($akun)){
      $arr = array("status" => 201, "message" => "email incorect");
      return response()->json($arr);
    }
    $valPass = $akun->password;
    if($valPass == $password){
       if($akun->role_user =='1'){
          $getdata = DB::table('TBUser')->where('id', $akun->id)->first();
          $arr = array("status" => 200,"role" => "1","message" => "SUCCES", "data" => $getdata);
          return response()->json($arr);
       }elseif($akun->role_user =='2'){
        $getdata = DB::table('TBUser')->where('id', $akun->id)->first();
          $arr = array("status" => 200,"role" => "2","message" => "SUCCES", "data" => $getdata);
          return response()->json($arr);
       }
    }else{  
      $arr = array("status" => 201, "message" => "password incorect");
      return response()->json($arr);
    } 
  }

  public function postsepeda(Request $request){
    $kodesepeda = $request->kodesepeda;
    $merk = $request->merk;
    $warna = $request->warna;
    $hargasewa = $request->hargasewa;
    $filename = $kodesepeda.'.jpg';
    $path =  $request->file('gambar')->move(storage_path("img"),$filename);
    $url = url('/storage/img/'.$filename);

      $postspd = ModelSepeda::insert([
          'kodesepeda' => $kodesepeda,
          'merk' => $merk,
          'warna' => $warna,
          'gambar' => $url,
          'hargasewa' => $hargasewa
      ]);
      $arr = array("status" => 200, "message" => "Succes","data"=>$postspd,"URL_PATH"=>$url);
      return response()->json($arr);
  }

  public function getdatasepedaall(){
    $data = ModelSepeda::get();
    $arr = array("status" => 200,"role"=> "2","message" => "Succes", "data" => $data);
    return response()->json($arr);
  }
  public function image($fileName){
    $path = storage_path().'/img/'.$fileName;
    return Response::download($path);        
  }
  
  public function destroyitem($id){
     $fd = ModelSepeda::Where('id',$id)->first();
     Storage::delete('upload/'.$fd->name);
    //  $path = storage_path().'/img/'.$fd->kodesepeda;
    //  File::delete($path); 
    //  $a = DB::table('TBSepeda') -> where('id', $id)->delete();
  }
}
