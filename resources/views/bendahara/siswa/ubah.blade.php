@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Siswa</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Siswa</a></li>
        <li class="active"><span>Ubah</span></li>
    </ol>
</div>
@endsection
@section('content')
<!-- alert -->
<x-messages />

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <form data-toggle="validator" role="form" action="{{ route('siswa.ubah', $sw->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                Siswa</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap"
                                    required value="{{ $sw->nama }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Jenis Kelamin</label>
                                <select name="jk" class="form-control selectpicker" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    @foreach (getJenisKelamin() as $jk)
                                        <option @if($sw->jk == $jk) selected @endif value="{{ $jk }}">{{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
                                    required value="{{ $sw->alamat }}" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Nama Wali</label>
                                <input type="text" class="form-control" name="wali" placeholder="Masukkan Nama Wali"
                                    required value="{{ $sw->nama_wali }}" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">No HP Wali</label>
                                <input type="number" class="form-control" name="hp" placeholder="Masukkan No HP Wali"
                                    required data-error="Format HP Tidak Valid" value="{{ $sw->hp }}" >
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Kelas</label>
                                <select name="kelas" class="form-control selectpicker" required>
                                    <option value="">--Pilih Kelas--</option>
                                    @foreach ($kelas as $kl)
                                        <option @if($sw->kelas == $kl->kelas) selected @endif value="{{ $kl->id }}">{{ $kl->kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username"
                                    readonly value="{{ $sw->user->username }}" >
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Biarkan Kosong Jika Tidak Diubah">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('siswa') }}" type="button" class="btn btn-danger">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
@endsection
