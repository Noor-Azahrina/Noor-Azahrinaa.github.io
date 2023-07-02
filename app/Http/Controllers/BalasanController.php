<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//panggil model BalasamModel
use App\Models\BalasanModel;

class BalasanController extends Controller

{
    //method untuk tampil balasan
    public function balasantampil()
    {
        $databalasan = BalasanModel::orderby('nis_siswa')
        ->paginate(5);

        return view('halaman/view_balasan', ['balasan'=>$databalasan]);
    }

    //method untuk tambah balasan

    public function balasantambah(Request $request)
    {
        $this->validate($request, [
            'nis_siswa' => 'required',
            'nama_siswa' => 'required',
            'nama_pembimbing' =>'required',
            'dinas' => 'required',
            'balasan' => 'required',
        ]);

        BalasanModel::create([
            'nis_siswa' => $request->nis_siswa,
            'nama_siswa' => $request->nama_siswa,
            'nama_pembimbing' => $request->nama_pembimbing,
            'dinas' => $request->dinas,
            'balasan' => $request->balasan,
        ]);
        return redirect('/balasan');
    }
    //method untuk hapus balasan
    
    public function balasanhapus($nis_siswa)
    {
        $databalasan=BalasanModel::find($nis_siswa);
        $databalasan->delete();

        return redirect()->back();
    }
    //method untuk edit balasan
    public function balasanedit($nis_siswa, Request $request)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'nama_pembimbing' =>'required',
            'dinas' => 'required',
            'balasan' => 'required',
        ]);
        $nis_siswa = BalasanModel::find($nis_siswa);
        $nis_siswa-> nama_siswa = $request->nama_siswa;
        $nis_siswa-> nama_pembimbing = $request->nama_pembimbing;
        $nis_siswa-> dinas = $request->dinas;
        $nis_siswa-> balasan = $request->balasan;

        $nis_siswa->save();

        return redirect()->back();
    }
}
