@extends('index')
@section('title', 'Balasan')

@section('isihalaman')
    <h3><center>Balasan Siswa Praktik Kerja Lapangan</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBalasanTambah"> 
        Tambah Balasan
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">NIS</td>
                <td align="center">Nama Siswa</td>
                <td align="center">Nama Pembimbing</td>
                <td align="center">Dinas</td>
                <td align="center">Balasan</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($balasan as $index=>$bn)
                <tr>
                    <td align="center" scope="row">{{ $index + $balasan->firstItem() }}</td>
                    <td>{{$bn->nis_siswa}}</td>
                    <td>{{$bn->nama_siswa}}</td>
                    <td>{{$bn->nama_pembimbing}}</td>
                    <td>{{$bn->dinas}}</td>
                    <td>{{$bn->balasan}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBalasanEdit{{$bn->nis_siswa}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data  -->
                        <div class="modal fade" id="modalBalasanEdit{{$bn->nis_siswa}}" tabindex="-1" role="dialog" aria-labelledby="modalBalasanEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBalasanEditLabel">Form Edit Balasan</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbalasanedit" id="formbalasanedit" action="/balasan/edit/{{ $bn->nis_siswa}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="nis_siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ $bn->nama_siswa}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_pembimbing" class="col-sm-4 col-form-label">Nama Pembimbing</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" value="{{ $bn->nama_pembimbing}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="dinas" class="col-sm-4 col-form-label">Dinas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="dinas" name="dinas" value="{{ $bn->dinas}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="balasan" class="col-sm-4 col-form-label">Balasan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="balasan" name="balasan" value="{{ $bn->balasan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="balasantambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT -->
                        |
                        <a href="balasan/hapus/{{$bn->nis_siswa}}" onclick="return confirm('Anda Yakin Data Ini Dihapus?')">
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
    Halaman : {{ $balasan->currentPage() }} <br />
    Jumlah Data : {{ $balasan->total() }} <br />

    {{ $balasan->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah -->
    <div class="modal fade" id="modalBalasanTambah" tabindex="-1" role="dialog" aria-labelledby="modalBalasanTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBalasanTambahLabel">Form Input Balasan</h5>
                </div>
                <div class="modal-body">
                    <form name="formbalasantambah" id="formbalasantambah" action="/balasan/tambah " method="post" enctype="multipart/form-data">
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
                            <label for="nama_pembimbing" class="col-sm-4 col-form-label">Nama Pembimbing</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" placeholder="Masukkan Nama Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="dinas" class="col-sm-4 col-form-label">Dinas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="dinas" name="dinas" placeholder="Masukkan Dinas Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="balasan" class="col-sm-4 col-form-label">Balasan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="balasan" name="balasan" placeholder="Masukkan Balasan Anda">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="balasantambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah -->
    
@endsection