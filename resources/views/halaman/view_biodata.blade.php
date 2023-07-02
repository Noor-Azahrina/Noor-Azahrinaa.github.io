@extends('index')
@section('title', 'Biodata')

@section('isihalaman')
    <h3><center>Biodata Siswa Praktik Kerja Lapangan</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBiodataTambah"> 
        Tambah Biodata 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">NIS</td>
                <td align="center">Nama Siswa</td>
                <td align="center">Jenis Kelamin</td>
                <td align="center">Alamat</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($biodata as $index=>$bd)
                <tr>
                    <td align="center" scope="row">{{ $index + $biodata->firstItem() }}</td>
                    <td>{{$bd->nis_siswa}}</td>
                    <td>{{$bd->nama_siswa}}</td>
                    <td>{{$bd->jenis_kelamin}}</td>
                    <td>{{$bd->alamat}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBiodataEdit{{$bd->nis_siswa}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data  -->
                        <div class="modal fade" id="modalBiodataEdit{{$bd->nis_siswa}}" tabindex="-1" role="dialog" aria-labelledby="modalBiodataEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBiodataEditLabel">Form Edit Biodata</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbiodataedit" id="formbiodataedit" action="/biodata/edit/{{ $bd->nis_siswa}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nis_siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $bd->nama_siswa}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="{{ $bd->jenis_kelamin}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $bd->alamat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="biodatatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT -->
                        |
                        <a href="biodata/hapus/{{$bd->nis_siswa}}" onclick="return confirm('Anda Yakin Data Ini Dihapus?')">
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
    Halaman : {{ $biodata->currentPage() }} <br />
    Jumlah Data : {{ $biodata->total() }} <br />

    {{ $biodata->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah -->
    <div class="modal fade" id="modalBiodataTambah" tabindex="-1" role="dialog" aria-labelledby="modalBiodataTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBiodataTambahLabel">Form Input Biodata</h5>
                </div>
                <div class="modal-body">
                    <form name="formbiodatatambah" id="formbiodatatambah" action="/biodata/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nis_siswa" class="col-sm-4 col-form-label">NIS</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nis_siswa" name="nis_siswa" placeholder="Masukkan NIS Anda">
                            </div>
                        </div>

                        <p>

                        <div class="form-group row">
                            <label for="nama_siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Masukkan Nama Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Jenis Kelamin Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="biodatatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah -->
    
@endsection