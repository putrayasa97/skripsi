<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

//use Image;

use App\Model\Anggota;
use App\Model\PaketDetail;

class PegawaiController extends Controller
{
    public function anggota()
    {
        $no=1;
        $anggota = Anggota::where('status',1)->get();
        $paketdtl=PaketDetail::orderBy('id_paket')->get();
        $tarif=PaketDetail::orderBy('id_paket')->get();
        return view('pegawai.anggota.index', ['anggota' => $anggota, 'no'=>$no ], ['paketdtl' => $paketdtl]);
    }

    public function anggotaform()
    {
        $paketdtl=PaketDetail::where('type_paket',1)->orderBy('id_paket')->get();//get paket bulan dengan kode 1
       // dd($paketdtl);
        return view('pegawai.anggota.anggota_tambah',  ['paketdtl' => $paketdtl]);
    }

    public function anggotanonform()
    {
        $paketdtl=PaketDetail::where('type_paket',0)->get();
       // dd($paketdtl);
        return view('pegawai.anggota.anggota_nontambah',  ['paketdtl' => $paketdtl]);
    }

    public function anggotainsert(Request $request)
    {
        $now=Carbon::now('Asia/Singapore');
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $paket=PaketDetail::find($request->paket);
        $anggotas = new Anggota;
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
        $anggotas->id_user = 2;

        //upload foto
        $file=$request->file('foto');
        $filename=uniqid().'.'.$file->getClientOriginalExtension();
        if (!file_exists('images/upload/foto_anggota')) {
          mkdir('images/upload/foto_anggota', 0777, true);
        }
        $file->move('images/upload/foto_anggota/',$filename);
        $anggotas->foto=$filename;



        $anggotas->save();

    return redirect()->route('anggota.form')->with('success', 'Anggota Berhasil Terdaftar !!');
    }

    public function anggotanoninsert(Request $request)
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        $anggotas = new Anggota;
        $anggotas->nm_ang = $request->nama;
        $anggotas->tgl_lahir = $request->tgl_lahir;
        $anggotas->alamat = $request->alamat;
        $anggotas->jk = $request->jk;
        $anggotas->pekerjaan = $request->pekerjaan;
        $anggotas->tlp = $request->tlp;
        $anggotas->status = 2;//status 2 = non-anggota
        $anggotas->id_user = 2;
        $anggotas->id_paketdtl =  $request->id_paketdtl;
        $anggotas->foto = "0";
        $anggotas->save();

    return redirect()->route('anggota.nonform')->with('success', 'Anggota Berhasil Terdaftar !!');
    }

    public function anggotaedit($id)
    {
        $anggotas=Anggota::find($id);
    return \Response::json($anggotas);
    }

    public function anggotaupdate(Request $request, $id){
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
        $anggota->save();

    return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Diubah !!');
    }

    public function anggotadelete($id){
        $anggota=Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Dihapus !!');
    }

    public function anggotaperpanjang(Request $request, $id){
        $now=Carbon::now('Asia/Singapore');
        $paket=PaketDetail::find($request->paket);
        $anggota=Anggota::find($id);
        $expiry=(new Carbon($now))->addMonths($paket->bulan);
        $anggota->id_paketdtl=$request->paket;
        $anggota->date_actv=$now;
        $anggota->date_expiry=$expiry;
        $anggota->status=1;
        $anggota->save();
      return redirect()->route('anggota')->with('success', 'Paket Anggota Berhasil Diperpanjang !!');
    }

}
