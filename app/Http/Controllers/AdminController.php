<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service;

class AdminController extends Controller
{
    public function dashadmin()
    {
        return view('dashboard.dash_admin');
    }
    public function service()
    {
        $no=1;
        $service=Service::all();
        return view('admin.service.service',['service'=>$service, 'no'=>$no]);
    }
    public function serviceinsert(Request $request)
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $serv = new Service;
        $serv->nm_service = $request->nm_service;
        $serv->data_limit = $request->data_limit;
        $serv->harga = $request->harga;
        $serv->type_service = $request->type_service;
        $serv->save();
        return redirect()->route('service')->with('success', 'Service Berhasil Simpan !!');
    }
    public function serviceedit($id)
    {
        $serv=Service::find($id);
        return \Response::json($serv);
    }
    public function serviceupdate(Request $request, $id)
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $serv = Service::find($id);
        $serv->nm_service = $request->nm_service;
        $serv->data_limit = $request->data_limit;
        $serv->harga = $request->harga;
        $serv->type_service = $request->type_service;
        $serv->save();
        return redirect()->route('service')->with('success', 'Service Berhasil Ubah !!');
    }
    public function servicedelete($id)
    {
        $serv=Service::find($id);
        $serv->delete();

        return redirect()->route('service')->with('success', 'Service Berhasil Dihapus !!');
    }
}
