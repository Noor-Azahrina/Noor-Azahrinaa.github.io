@extends('index')
@section('title', 'Absensi')

@section('isihalaman')
    <h3><center>Absensi Praktik Kerja Lapangan</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbsensiTambah"> 
        Tambah Absensi 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">NIS</td>
                <td align="center">Nama Siswa</td>
                <td align="center">Asal Sekolah</td>
                <td align="center">Dinas</td>
                <td align="center">Tanggal</td>
                <td align="center">Alasan</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($absensi as $index=>$ab)
                <tr>
                    <td align="center" scope="row">{{ $index + $absensi->firstItem() }}</td>
                    <td>{{$ab->nis}}</td>
                    <td>{{$ab->nama}}</td>
                    <td>{{$ab->asal_sekolah}}</td>
                    <td>{{$ab->dinas}}</td>
                    <td>{{$ab->tanggal}}</td>
                    <td>{{$ab->alasan}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAbsensiEdit{{$ab->nis}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data  -->
                        <div class="modal fade" id="modalAbsensiEdit{{$ab->nis}}" tabindex="-1" role="dialog" aria-labelledby="modalAbsensiEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAbsensiEditLabel">Form Edit Absensi</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formabsensiedit" id="formabsensiedit" action="/absensi/edit/{{ $ab->nis}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nis" class="col-sm-4 col-form-label">Nama Siswa</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $ab->nama}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $ab->asal_sekolah}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="dinas" class="col-sm-4 col-form-label">Nama Dinas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="dinas" name="dinas" value="{{ $ab->dinas}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="tanggal" name="tanggal" value="{{ $ab->tanggal}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alasan" class="col-sm-4 col-form-label">Alasan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alasan" name="alasan" value="{{ $ab->alasan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="absensitambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT -->
                        |
                        <a href="absensi/hapus/{{$ab->nis}}" onclick="return confirm('Anda Yakin Data Ini Dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $absensi->currentPage() }} <br />
    Jumlah Data : {{ $absensi->total() }} <br />

    {{ $absensi->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah -->
    <div class="modal fade" id="modalAbsensiTambah" tabindex="-1" role="dialog" aria-labelledby="modalAbsensiTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAbsensiTambahLabel">Form Input Data Absen</h5>
                </div>
                <div class="modal-body">
                    <form name="formabsensitambah" id="formabsensitambah" action="/absensi/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nis" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukkan Asal Sekolah">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="dinas" class="col-sm-4 col-form-label">Nama Dinas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="dinas" name="dinas" placeholder="Masukkan Nama Dinas">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alasan" class="col-sm-4 col-form-label">Alasan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alasan" name="alasan" placeholder="Masukkan Alasan">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="absensitambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah -->
    
@endsection