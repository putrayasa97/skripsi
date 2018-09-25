<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Usaha;
use App\model\User;
use App\model\Userdetail;

class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('registrasi');
    }
    public function insertregistrasi(Request $request)
    {
        $unix=date('y') . rand(0, 9999);
        //Data Usaha Fitness
        $kode_usaha='U'.$unix;
        $usaha = new Usaha;
        $usaha->kode_usaha = $kode_usaha;
        $usaha->nm_usaha = $request->nm_usaha;
        $usaha->email_usaha = $request->email_usaha;
        $usaha->kota = $request->kota;
        $usaha->alamat = $request->alamat_usaha;
        $usaha->web = $request->web;
        $usaha->tlp = $request->tlp;

        $file=$request->file('logo');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/logo_usaha')) {
          mkdir('images/upload/logo_usaha', 0777, true);
        }
        $file->move('images/upload/logo_usaha/',$filename);
        $usaha->logo=$filename;
        $usaha->save();

        //Data Pemilik
        $kode_pemilik='OWN'.$unix;
        $userdtl = new UserDetail;
        $userdtl->kode_userdtl = $kode_pemilik;
        $userdtl->nm_lengkap = $request->nm_pemilik;
        $userdtl->tgl_lahir = $request->tgl_lahir_pemilik;
        $userdtl->alamat = $request->alamat_pemilik;
        $userdtl->tlp = $request->tlp_pemilik;
        $userdtl->jk = $request->jk_pemilik;

        $file=$request->file('foto_pemilik');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/foto_user')) {
          mkdir('images/upload/foto_user', 0777, true);
        }
        $file->move('images/upload/foto_user/',$filename);
        $userdtl->foto=$filename;
        $userdtl->save();

        //Data Pegawai
        $kode_pegawai='EMP'.$unix;
        $userdtl1 = new UserDetail;
        $userdtl1->kode_userdtl = $kode_pegawai;
        $userdtl1->nm_lengkap = $request->nm_pegawai;
        $userdtl1->tgl_lahir = $request->tgl_lahir_pegawai;
        $userdtl1->alamat = $request->alamat_pegawai;
        $userdtl1->tlp = $request->tlp_pegawai;
        $userdtl1->jk = $request->jk_pegawai;

        $file=$request->file('foto_pegawai');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/foto_user')) {
          mkdir('images/upload/foto_user', 0777, true);
        }
        $file->move('images/upload/foto_user/',$filename);
        $userdtl1->foto=$filename;
        $userdtl1->save();

        $getUsaha = Usaha::where('kode_usaha','=',$kode_usaha)->first();
        $getPemilik = UserDetail::where('kode_userdtl','=',$kode_pemilik)->first();
        $getPegawai = UserDetail::where('kode_userdtl','=',$kode_pegawai)->first();

        $user = new User;
        $user->username = $request->username_pemilik;
        $user->email = $request->email_pemilik;
        $user->password = $request->password_pemilik;
        $user->id_level = 1;//pemilik
        $user->id_userdtl=$getPemilik->id_userdtl;
        $user->id_usaha=$getUsaha->id_usaha;
        $user->save();

        $user1 = new User;
        $user1->username = $request->username_pegawai;
        $user1->email = $request->email_pegawai;
        $user1->password = $request->password_pegawai;
        $user1->id_level = 2;//Pegawai
        $user1->id_userdtl=$getPegawai->id_userdtl;
        $user1->id_usaha=$getUsaha->id_usaha;
        $user1->save();

        return redirect()->route('reg')->with('success', 'Usaha Telah Terdaftar !!');
    }
}
