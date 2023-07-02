<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//panggil model AbsensiModel
use App\Models\AbsensiModel;

class AbsensiController extends Controller

{
    //method untuk tampil data absensi
    public function absensitampil()
    {
        $dataabsensi = AbsensiModel::orderby('nis')
        ->paginate(5);

        return view('halaman/view_absensi', ['absensi'=>$dataabsensi]);
    }

    //method untuk tambah data absensi

    public function absensitambah(Request $request)
    {
        $this->validate($request, [
            'nis' => 'required',
            'nama' => 'required',
            'asal_sekolah' =>'required',
            'dinas' => 'required',
            'tanggal' => 'required',
            'alasan' => 'required',
        ]);

        AbsensiModel::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'dinas' => $request->dinas,
            'tanggal' => $request->tanggal,
            'alasan' => $request->alasan
        ]);
        return redirect('/absensi');
    }
    //method untuk hapus data absensi
    
    public function absensihapus($nis)
    {
        $dataabsensi=AbsensiModel::find($nis);
        $dataabsensi->delete();

        return redirect()->back();
    }
    //method untuk edit data absensi
    public function absensiedit($nis, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' =>'required',
            'dinas' => 'required',
            'tanggal' => 'required',
            'alasan' => 'required'
        ]);
        $nis = AbsensiModel::find($nis);
        $nis-> nama = $request->nama;
        $nis-> asal_sekolah = $request->asal_sekolah;
        $nis-> dinas = $request->dinas;
        $nis-> tanggal = $request->tanggal;
        $nis-> alasan = $request->alasan;


        $nis->save();

        return redirect()->back();
    }
}
