<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Model\User;
use App\Model\Anggota;


class LoginController extends Controller
{

    public function formlogin(Request $request)
    {
        return view('login');
    }
    public function login(Request $request)
    {
        if(!auth()->guard('user')->attempt([
            'username'=>$request->username,
            'password'=>$request->password
        ]))
        {
           return redirect()->back();
        }
        if(Auth::guard('user')->user()->id_level==1){
            return redirect()->route('dash.pemilik');
        }else if (Auth::guard('user')->user()->id_level==2) {

            $id_user = auth()->guard('user')->user()->id_user;
            $id_usaha = auth()->guard('user')->user()->id_usaha;
            $now=Carbon::now('Asia/Singapore');
            Anggota::where('date_expiry','<',$now)
            ->where('id_usaha','=',$id_usaha)
            ->update(['status' => 0]);

            return redirect()->route('dash.pegawai');
        }
    }
    public function logout(Request $request)
    {
        auth()->guard('user')->logout();
        return redirect()->route('login');
    }

}
