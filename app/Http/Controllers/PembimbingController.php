<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//panggil model PembimbingModel
use App\Models\PembimbingModel;

class PembimbingController extends Controller

{
    //method untuk tampil data pembimbing
    public function pembimbingtampil()
    {
        $datapembimbing = PembimbingModel::orderby('id_pembimbing')
        ->paginate(5);

        return view('halaman/view_pembimbing', ['pembimbing'=>$datapembimbing]);
    }

    //method untuk tambah data pembimbing

    public function pembimbingtambah(Request $request)
    {
        $this->validate($request, [
            'id_pembimbing' => 'required',
            'nama_pembimbing' => 'required',
            'nama_dinas' =>'required',
            'jabatan' => 'required',
        ]);

        PembimbingModel::create([
            'id_pembimbing' => $request->id_pembimbing,
            'nama_pembimbing' => $request->nama_pembimbing,
            'nama_dinas' => $request->nama_dinas,
            'jabatan' => $request->jabatan
    
        ]);
        return redirect('/pembimbing');
    }
    //method untuk hapus data pembimbing
    
    public function pembimbinghapus($id_pembimbing)
    {
        $datapembimbing=PembimbingModel::find($id_pembimbing);
        $datapembimbing->delete();

        return redirect()->back();
    }
    //method untuk edit data pembimbing
    public function pembimbingedit($id_pembimbing, Request $request)
    {
        $this->validate($request, [
            'nama_pembimbing' => 'required',
            'nama_dinas' =>'required',
            'jabatan' => 'required'
        ]);
        $id_pembimbing = PembimbingModel::find($id_pembimbing);
        $id_pembimbing-> nama_pembimbing = $request->nama_pembimbing;
        $id_pembimbing-> nama_dinas = $request->nama_dinas;
        $id_pembimbing-> jabatan = $request->jabatan;


        $id_pembimbing->save();

        return redirect()->back();
    }
}
