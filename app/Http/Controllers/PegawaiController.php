<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Anggota;

class PegawaiController extends Controller
{
    public function anggota()
    {
        $no=1;
        $anggota = Anggota::all();
        return view('pegawai.anggota.index', ['anggota' => $anggota, 'no'=>$no ]);
    }

    public function anggotaform()
    {
        return view('pegawai.anggota.anggota_tambah');
    }

    public function anggotainsert(Request $request)
    {
        $this->validate($request, [
            'success' => 'berhasil'
        ]);
        Anggota::create([
            'nm_ang' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'jk' => $request->jk,
            'pekerjaan' => $request->pekerjaan,
            'tlp' => $request->tlp,
            'status' => 1,
            'id_user' => 2
        ]);

    return redirect()->route('anggota.form')->with('success', 'Anggota Berhasil Terdaftar !!');
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
        $anggota->save();

    return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Diubah !!');
    }

    public function anggotadelete($id){
        $anggota=Anggota::find($id);
        $anggota->delete();

        return redirect()->route('anggota')->with('success', 'Data Anggota Berhasil Dihapus !!');
      }
}
