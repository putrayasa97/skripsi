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
        /*$getPerdatang='null';
        $count = Paket::where('type_paket',0)->count();//menjumlahkan type paket nilai '0'
        if(empty($count)){//jika jumlah paket dengan nilai no kosong
        //dd($count);
            $paket = Paket::where('type_paket',1)->get(); //maka get paket dengan type paket '1'
        }else{ //jika tidak
            $get = Paket::where('type_paket',0)->get();//maka get  paket dengan type paket '0'
            $getPerdatang=PaketDetail::find($get[0]->id_paket); // dan get paketdtl dengan id_paket dengan type paket '0'
        }*/
        $count = PaketDetail::where('type_paket',0)->count();//menjumlahkan type paket nilai '0'
        //dd($count);
        if(!empty($count)){
            $paketdtl = PaketDetail::where('type_paket','=',0)->get();//get type paket = 1
        }//else{
           // $paketdtl = PaketDetail::where('type_paket','=',0)->get();//get type paket = 0
        //}
        $paket = Paket::where('nm_paket','!=','Perdatang')->get();//get paket tidak sama dengan Perdatang
        $paketdtl = PaketDetail::where('type_paket','=',1)->get();
        return view('pemilik.paket.index', ['paket' => $paket, 'no'=>$no,  'getPerdatang'=>$paketdtl, 'count'=>$count]);
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
        $paketdtl->type_paket=1;
        $paketdtl->save();

        return redirect()->route('paket.edittarif', $paketdtl->id_paket)->with('success', 'Tarif Paket Berhasil Ditambah !!');
    }

    public function edittarif($id)
    {
        $no=1;
        $paket = Paket::find($id);
        $paketdtl = PaketDetail::where('id_paket', '=', $id)->get();
        return view('pemilik.paket.paket_ubahtarif', ['paketdtl' => $paketdtl, 'no'=>$no, 'paket' => $paket]);
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

    public function insertperdatang(Request $request){
        $paket = new Paket;
        $paket->nm_paket='Perdatang';
        $paket->save();//insert tarif perdatang di table Paket
        $get = Paket::where('nm_paket','=','Perdatang')->get();//get paket dengan typepaket '0'
        $paketdtl= new PaketDetail;
        $paketdtl->id_paket=$get[0]->id_paket;//hasil get data paket di_paket diberikan ke paketdtl FKid_paket
        $paketdtl->harga=$request->harga;
        $paketdtl->bulan=0;
        $paketdtl->type_paket=0;//type paket '0' berati Tarif Perdatang
        $paketdtl->save();

    return redirect()->route('paket')->with('success', 'Tarif Perdatang Berhasil Diubah !!');
    }
    public function getperdatang(){
        $paketdtl = PaketDetail::where('type_paket','=',0)->get();
        return \Response::json($paketdtl);
    }
    public function updateperdatang($id, Request $request){

        $paketdtl=PaketDetail::find($id);
        $paketdtl->harga=$request->harga;
        $paketdtl->save();
        return redirect()->route('paket')->with('success', 'Tarif Perdatang Berhasil Diubah !!');
    }
}
