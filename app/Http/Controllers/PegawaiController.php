<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//use Image;

use App\Model\Anggota;
use App\Model\PaketDetail;
use App\Model\Transaksi;

class PegawaiController extends Controller
{
    private $id_usaha;
    private $id_user;
    public function __construct()
    {
        $this->middleware('auth:user');//middleware guard user dapat login sesuai guard user
        $this->middleware('user:2');//middleware denga user 2 = pegawai
        $this->middleware(function ($request, $next){
            $this->id_usaha=auth()->guard('user')->user()->id_usaha;//get auth berdasarkan id_usaha
            return $next($request);
        });
        $this->middleware(function ($request, $next){
            $this->id_user=auth()->guard('user')->user()->id_user;//get auth berdasarkan id_user
            return $next($request);
        });
    }

    public function dashpegawai()
    {
        return view('dashboard.dash_pegawai');
    }

    public function anggota()// menampilkan data anggota aktif
    {
        $no=1;
        $anggota = Anggota::whereIn('status',[1,0])->where('id_user',$this->id_user)->where('id_usaha',$this->id_usaha)->get();
        $paketdtl=PaketDetail::where('type_paket',1)->get();//get untuk perpanjangan paket
        return view('pegawai.anggota.anggota', ['anggota' => $anggota, 'no'=>$no, 'paketdtl' => $paketdtl]);
    }

    public function anggotanon()// menampilkan data anggota yang tidak aktif
    {
        $no=1;
        $anggota = Anggota::whereIn('status',[2])->where('id_user',$this->id_user)->where('id_usaha',$this->id_usaha)->get();//query untuk memanggil anggota dengan status 2 yang berarti non anggota
        $paketdtl=PaketDetail::where('type_paket',1)->get();//query untuk memanggil detail paket dengan tipe_paket 1
        return view('pegawai.anggota.anggotanon', ['anggota' => $anggota, 'no'=>$no, 'paketdtl' => $paketdtl]); //data di kembalikan
    }

    public function anggotaform()// menampilkan form anggota atau from pendaftaran
    {
        $paketdtl=PaketDetail::where('type_paket',1)->orderBy('id_paket')->get();//get paket bulan dengan kode 1
       // dd($paketdtl);
        return view('pegawai.anggota.anggota_tambah',  ['paketdtl' => $paketdtl]);// mengembalikan data
    }

    public function anggotanonform()// menampilkan form no anggota
    {
        $paketdtl=PaketDetail::where('type_paket',0)->where('id_usaha',$this->id_usaha)->get();//query untuk memanggil PaketDetail
       // dd($paketdtl);
        return view('pegawai.anggota.anggota_nontambah',  ['paketdtl' => $paketdtl]);// mengembalikan data
    }

    public function anggotainsert(Request $request)//menambah data anggota
    {
        $id=date('y') . rand(0, 9999);
        $now=Carbon::now('Asia/Singapore');
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $paket=PaketDetail::find($request->paket);// memanggil paket detail berdasarkan id paket
        $anggotas = new Anggota;
        $anggotas->no_ang = $id;
        $anggotas->nm_ang = $request->nama;
        $anggotas->tgl_lahir = $request->tgl_lahir;
        $anggotas->alamat = $request->alamat;
        $anggotas->jk = $request->jk;
        $anggotas->pekerjaan = $request->pekerjaan;
        $anggotas->tlp = $request->tlp;
        $anggotas->status = 1; //status anggota aktif
        $anggotas->id_paketdtl = $request->paket;
        $anggotas->date_actv = $now;
        $expiry=(new Carbon($anggotas->date_actv))->addMonths($paket->bulan);
        $anggotas->date_expiry = $expiry;
        $anggotas->id_user = $this->id_user;
        $anggotas->id_usaha = $this->id_usaha;

        //upload foto
        $file=$request->file('foto');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/foto_anggota')) {
          mkdir('images/upload/foto_anggota', 0777, true);
        }
        $file->move('images/upload/foto_anggota/',$filename);
        $anggotas->foto=$filename;
        $anggotas->save();// menyimpan data anggota
        //dd($id);
        $get=Anggota::where('no_ang','=',$id)->first();// memanggil berdasarkan field no_ang
        $trans = new Transaksi;
        $trans->id_ang=$get->id_ang;
        $trans->harga = $paket->harga;
        $trans->id_user = $this->id_user;
        $trans->id_usaha = $this->id_usaha;
        $trans->save();// menyimpan transaksi dari anggota
        return redirect()->route('anggota.form')->with('success', 'Anggota Berhasil Terdaftar !!');
    }

    public function anggotanoninsert(Request $request)// menambah yang bukan anggota
    {
        $id=date('y') . rand(0, 9999);
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $paket=PaketDetail::find($request->paket);// memanggil paket detail
        $anggotas = new Anggota;
        $anggotas->no_ang = $id;
        $anggotas->nm_ang = $request->nama;
        $anggotas->tgl_lahir = $request->tgl_lahir;
        $anggotas->alamat = $request->alamat;
        $anggotas->jk = $request->jk;
        $anggotas->pekerjaan = $request->pekerjaan;
        $anggotas->tlp = $request->tlp;
        $anggotas->status = 2;//status 2 = non-anggota
        $anggotas->id_user = $this->id_user;
        $anggotas->id_usaha = $this->id_usaha;
        $anggotas->id_paketdtl = $request->paket;
        $anggotas->foto = "0";
        $anggotas->save();// menyimpan data yang bukan anggota

        $get=Anggota::where('no_ang','=',$id)->first();// memanggil no_ang berdasarkan id
        $trans = new Transaksi;
        $trans->id_ang=$get->id_ang;
        $trans->harga = $paket->harga;
        $trans->id_user = $this->id_user;
        $trans->id_usaha = $this->id_usaha;
        $trans->save();// menyimpan transaksi bukan anggota
        return redirect()->route('anggota.nonform')->with('success', 'Transaksi non-Anggota berhasil !!');
    }

    public function anggotaedit($id)// untuk memanggil data anggota
    {
        $anggotas=Anggota::find($id);// memanggil anggota berdasarkan id
        return \Response::json($anggotas);// data di kembalikan dengan json
    }

    public function anggotaupdate(Request $request, $id)// proses update data anggota
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $anggota=Anggota::find($id);
        $anggota->nm_ang=$request->nama;
        $anggota->tgl_lahir=$request->tgl_lahir;
        $anggota->alamat=$request->alamat;
        $anggota->jk=$request->jk;
        $anggota->pekerjaan=$request->pekerjaan;
        $anggota->tlp=$request->tlp;
        $anggota->id_paketdtl=$request->paket;
        if (!empty($request->file('foto'))) {
            //unlink(public_path('images/upload/foto_anggota/'.$anggota->foto));
            //unlink(public_path('images/upload/foto_anggota/thumbs/'.$anggota->foto));

            $file=$request->file('foto');
            $filename=uniqid().'.'.$file->getClientOriginalExtension();
            if (!file_exists('images/upload/foto_anggota')) {
              mkdir('images/upload/foto_anggota', 0777, true);
            }
            $file->move('images/upload/foto_anggota/',$filename);

          // if (!file_exists('images/upload/foto_anggota/thumbs')) {
            // mkdir('images/upload/foto_anggota/thumbs', 0777, true);
           //}
          // $thumb = Image::make('images/upload/foto_anggota/'.$filename)
          // ->resize(171, 180)
           //->save('images/upload/foto_anggota/thumbs/'.$filename,100);
            $anggota->foto=$filename;
            }
        $anggota->save();// meyimpan update anggota
        return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Diubah !!');
    }

    public function anggotadelete($id)// fungsi untuk menghapus anggota
    {
        $anggota=Anggota::find($id);
        $anggota->delete();
        return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Dihapus !!');
    }

    public function anggotaperpanjang(Request $request, $id)// fungsi untuk memperpanjang anggota
    {
        $now=Carbon::now('Asia/Singapore');
        $paket=PaketDetail::find($request->paket);
        $anggota=Anggota::find($id);
        $expiry=(new Carbon($now))->addMonths($paket->bulan);
        $anggota->id_paketdtl=$request->paket;
        $anggota->date_actv=$now;
        $anggota->date_expiry=$expiry;
        $anggota->status=1;
        $anggota->save();

        $trans = new Transaksi;
        $trans->id_ang = $id;
        $trans->harga = $paket->harga;
        $trans->id_user = $this->id_user;
        $trans->id_usaha = $this->id_usaha;
        $trans->save();
        return redirect()->route('anggota')->with('success', 'Paket Anggota Berhasil Diperpanjang !!');
    }

    public function getpaket($id){

        $paket = DB::table('tb_paketdetail')
        ->join('tb_paket', 'tb_paket.id_paket', '=', 'tb_paketdetail.id_paket')
        ->select(
            'tb_paket.nm_paket','tb_paketdetail.harga', 'tb_paketdetail.bulan'
        )
        ->where('tb_paketdetail.id_paketdtl', $id)
        ->first();
        return \Response::json($paket);
    }

    public function transaksi()//memanggil transaksi
    {
        $no=1;
        $transaksi=Transaksi::orderBy('created_at','desc')->where('id_user',$this->id_user)->where('id_usaha', $this->id_usaha)->get();// memanggil data transaksi berurutan dari besal ke kecil berdasarkan created_at
        return view('pegawai.transaksi.transaksi', ['transaksi'=>$transaksi, 'no'=>$no]);
    }

}
