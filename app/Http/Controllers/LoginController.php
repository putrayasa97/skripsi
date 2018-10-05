<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

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
            $request->session()->push('id_user', Auth::guard('user')->user()->id_user);
            return redirect()->route('dash.pemilik');
        }else if (Auth::guard('user')->user()->id_level==2) {
            $request->session()->push('id_user', Auth::guard('user')->user()->id_user);
            return redirect()->route('dash.pegawai');
        }
    }
    public function logout()
    {
        auth()->guard('user')->logout();
        return redirect()->route('login');
    }
}
