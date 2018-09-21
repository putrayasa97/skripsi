<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Paket;
use App\model\PaketDetail;

class PemilikController extends Controller
{
    public function paket()
    {
        $no=1;
        $paket = Paket::all();
        return view('pemilik.paket.paket', ['paket' => $paket, 'no'=>$no]);
    }

    public function paketinsert(Request $request)
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        Paket::create([
            'nm_paket' => $request->nm_paket
        ]);

        return redirect()->route('paket')->with('success', 'Paket Berhasil Ditambah !!');
    }

    public function paketedit($id){
        $pakets=Paket::find($id);
        //$pakets=Paket::where('id_paket', '=', $id)->get();

        return \Response::json($pakets);
    }

    public function paketupdate($id, Request $request){
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $paket=Paket::find($id);
        $paket->nm_paket=$request->nm_paket;
        $paket->save();

    return redirect()->route('paket')->with('success', 'Paket Berhasil Diubah !!');
    }

    public function paketdelete($id){

        $paketdtl=PaketDetail::where('id_paket', '=', $id)->delete();
        $paket=Paket::find($id);
        $paket->delete();

        return redirect()->route('paket')->with('success', 'Paket Berhasil Dihapus !!');
      }

    public function paketdetail($id)
    {
        //$hargas=Harga::where('tb_harga.id_paket', '=', $id)->join('tb_paket','tb_harga.id_paket', '=', 'tb_paket.id_paket')
        //->select('tb_paket.nm_paket','tb_harga.harga', 'tb_harga.hari')->get();

        //$hargas=Harga::where('id_paket', '=', $id)->get();
        $paketdtl=PaketDetail::where('id_paket', '=', $id)->get();
        return \Response::json($paketdtl);
    }

    public function inserttarif(Request $request){
            $paketdtl= new PaketDetail;
            $paketdtl->harga=$request->harga;
            $paketdtl->bulan=$request->langganan;
            $paketdtl->id_paket=$request->id_paket;
            if($request->langganan!=0){
                $paketdtl->type_paket=1;
            }else{
                $paketdtl->type_paket=0;
            }
            $paketdtl->save();

        return redirect()->route('paket.edittarif', $paketdtl->id_paket)->with('success', 'Tarif Paket Berhasil Ditambah !!');
    }

    public function edittarif($id)
    {
        $no=1;
        $count = PaketDetail::where('type_paket',0)->where('id_paket', '=', $id)->count();
        $paket = Paket::find($id);
        $paketdtl = PaketDetail::where('id_paket', '=', $id)->get();
        return view('pemilik.paket.paket_ubahtarif', ['paketdtl' => $paketdtl, 'no'=>$no, 'paket' => $paket, 'count'=>$count]);
    }

    public function gettarif($id){
        $paketdtl = PaketDetail::find($id);
        return \Response::json($paketdtl);
    }

    public function updatetarif($id, Request $request){
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $paketdtl=PaketDetail::find($id);
        $paketdtl->bulan=$request->langganan;
        $paketdtl->harga=$request->harga;
        $paketdtl->save();

    return redirect()->route('paket.edittarif', $request->id_paket)->with('success', 'Tarif Berhasil Diubah !!');
    }

    public function deletetarif($id, Request $request){
        $paketdtl=PaketDetail::find($id);
        $paketdtl->delete();

    return redirect()->route('paket.edittarif', $request->id_paket)->with('success', 'Tarif Berhasil Dihapus !!');
    }


}
