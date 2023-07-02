@extends('index')
@section('title', 'Pembimbing')

@section('isihalaman')
    <h3><center>Pembimbing Siswa Praktik Kerja Lapangan</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPembimbingTambah"> 
        Tambah Data Pembimbing
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID</td>
                <td align="center">Nama Pembimbing</td>
                <td align="center">Dinas</td>
                <td align="center">Jabatan</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pembimbing as $index=>$pb)
                <tr>
                    <td align="center" scope="row">{{ $index + $pembimbing->firstItem() }}</td>
                    <td>{{$pb->id_pembimbing}}</td>
                    <td>{{$pb->nama_pembimbing}}</td>
                    <td>{{$pb->nama_dinas}}</td>
                    <td>{{$pb->jabatan}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPembimbingEdit{{$pb->id_pembimbing}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data  -->
                        <div class="modal fade" id="modalPembimbingEdit{{$pb->id_pembimbing}}" tabindex="-1" role="dialog" aria-labelledby="modalPembimbingEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPembimbingEditLabel">Form Edit Pembimbing</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpembimbingedit" id="formpembimbingedit" action="/pembimbing/edit/{{ $pb->id_pembimbing}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pembimbing" class="col-sm-4 col-form-label">Nama Pembimbing</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_pembimbing" name="nama_pembimbing" value="{{ $pb->nama_pembimbing}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_dinas" class="col-sm-4 col-form-label">Dinas</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" value="{{ $pb->nama_dinas}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $pb->jabatan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pembimbingtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT -->
                        |
                        <a href="pembimbing/hapus/{{$pb->id_pembimbing}}" onclick="return confirm('Anda Yakin Data Ini Dihapus?')">
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
    Halaman : {{ $pembimbing->currentPage() }} <br />
    Jumlah Data : {{ $pembimbing->total() }} <br />

    {{ $pembimbing->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah -->
    <div class="modal fade" id="modalPembimbingTambah" tabindex="-1" role="dialog" aria-labelledby="modalPembimbingTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPembimbingTambahLabel">Form Input Pembimbing</h5>
                </div>
                <div class="modal-body">
                    <form name="formpembimbingtambah" id="formpembimbingtambah" action="/pembimbing/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_pembimbing" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="id_pembimbing" name="id_pembimbing" placeholder="Masukkan ID Anda">
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
                            <label for="nama_dinas" class="col-sm-4 col-form-label">Nama Dinas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_dinas" name="nama_dinas" placeholder="Masukkan Dinas Anda">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-4 col-form-label">Jabatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan Anda">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pembimbingtambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah -->
    
@endsection