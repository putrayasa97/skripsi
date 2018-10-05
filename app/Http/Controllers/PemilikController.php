<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Paket;
use App\model\PaketDetail;
use App\Model\User;
use App\Model\UserDetail;
use App\Model\Anggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PemilikController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:user');//middleware dengan uard user
        $this->middleware('user:1');//middleware denga user 1 = pemilik

    }
    public function dashpemilik()
    {
        return view('dashboard.dash_pemilik');
    }
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

    public function pegawai()
    {

        $no=1;
        $id_usaha=auth()->guard('user')->user()->id_usaha;
        $pegawai=User::where('id_usaha', $id_usaha)->where('id_level',2)->get();
        return view('pemilik.pegawai.pegawai', ['pegawai' => $pegawai, 'no'=>$no]);
    }
    public function pegawaiinsert(Request $request)
    {
        $unix=date('y') . rand(0, 9999);

        $kode_pegawai='EMP'.$unix;
        $userdtl1 = new UserDetail;
        $userdtl1->kode_userdtl = $kode_pegawai;
        $userdtl1->nm_lengkap = $request->nm_lengkap;
        $userdtl1->tgl_lahir = $request->tgl_lahir;
        $userdtl1->alamat = $request->alamat;
        $userdtl1->tlp = $request->tlp;
        $userdtl1->jk = $request->jk;

        $file=$request->file('foto');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/foto_user')) {
          mkdir('images/upload/foto_user', 0777, true);
        }
        $file->move('images/upload/foto_user/',$filename);
        $userdtl1->foto=$filename;
        $userdtl1->save();

        $id_usaha=auth()->guard('user')->user()->id_usaha;
        $getPegawai = UserDetail::where('kode_userdtl','=',$kode_pegawai)->first();
        $user1 = new User;
        $user1->username = $request->username;
        $user1->email = $request->email;
        $user1->password = bcrypt($request->password);
        $user1->id_level = 2;//Pegawai
        $user1->id_userdtl=$getPegawai->id_userdtl;
        $user1->id_usaha=$id_usaha;
        $user1->save();
        return redirect()->route('pegawai')->with('success', 'Pegawai Berhasil Ditambah !!');
    }
    public function getpegawai($id){
        $pegawai = DB::table('tb_user')
            ->join('tb_userdetail', 'tb_user.id_userdtl', '=', 'tb_userdetail.id_userdtl')
            ->select(
                'tb_user.id_user','tb_user.username','tb_user.email',
                'tb_userdetail.nm_lengkap', 'tb_userdetail.tgl_lahir','tb_userdetail.alamat','tb_userdetail.tlp',
                'tb_userdetail.jk','tb_userdetail.foto'
            )
            ->where('tb_user.id_user', $id)
            ->first();
        return \Response::json($pegawai);
    }
    public function pegawaiupdate(Request $request, $id)
    {
        $user1 = User::find($id);
        $user1->username = $request->username;
        $user1->email = $request->email;
        if($request->password !=null ){
            $user1->password = bcrypt($request->password);
        }
        $user1->save();

        $userdtl1 = UserDetail::where('id_userdtl',$user1->id_userdtl)->first();
        $userdtl1->nm_lengkap = $request->nm_lengkap;
        $userdtl1->tgl_lahir = $request->tgl_lahir;
        $userdtl1->alamat = $request->alamat;
        $userdtl1->tlp = $request->tlp;
        $userdtl1->jk = $request->jk;
        if($request->foto != null){
            $file=$request->file('foto');
            $filename=uniqid().'.'.$file->getClientOriginalExtension();
            if (!file_exists('images/upload/foto_user')) {
            mkdir('images/upload/foto_user', 0777, true);
            }
            $file->move('images/upload/foto_user/',$filename);
            $userdtl1->foto=$filename;
        }
        $userdtl1->save();
        return redirect()->route('pegawai')->with('success', 'Data Pegawai Berhasil Diubah!!');
    }
    public function pegawaidelete($id, Request $request){
        $id_usaha=auth()->guard('user')->user()->id_usaha;
        $user1=User::where('id_user',$id)->where('id_usaha',$id_usaha)->first();

        Anggota::Where('id_user',$id)->delete();


        $user1->delete();
        UserDetail::where('id_userdtl',$user1->id_userdtl)->delete();
    return redirect()->route('pegawai')->with('success', 'Pegawai Berhasil Dihapus !!');
    }
}
