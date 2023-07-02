<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//panggil model BiodataModel
use App\Models\BiodataModel;

class BiodataController extends Controller

{
    //method untuk tampil biodata
    public function biodatatampil()
    {
        $databiodata = BiodataModel::orderby('nis_siswa')
        ->paginate(5);

        return view('halaman/view_biodata', ['biodata'=>$databiodata]);
    }

    //method untuk tambah data biodata

    public function biodatatambah(Request $request)
    {
        $this->validate($request, [
            'nis_siswa' => 'required',
            'nama_siswa' => 'required',
            'jenis_kelamin' =>'required',
            'alamat' => 'required',
        ]);

        BiodataModel::create([
            'nis_siswa' => $request->nis_siswa,
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat
    
        ]);
        return redirect('/biodata');
    }
    //method untuk hapus data biodata
    
    public function biodatahapus($nis_siswa)
    {
        $databiodata=BiodataModel::find($nis_siswa);
        $databiodata->delete();

        return redirect()->back();
    }
    //method untuk edit data biodata
    public function biodataedit($nis_siswa, Request $request)
    {
        $this->validate($request, [
            'nama_siswa' => 'required',
            'jenis_kelamin' =>'required',
            'alamat' => 'required'
        ]);
        $nis_siswa = BiodataModel::find($nis_siswa);
        $nis_siswa-> nama_siswa = $request->nama_siswa;
        $nis_siswa-> jenis_kelamin = $request->jenis_kelamin;
        $nis_siswa-> alamat = $request->alamat;


        $nis_siswa->save();

        return redirect()->back();
    }
}
