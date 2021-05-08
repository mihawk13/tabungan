@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Pegawai</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li><a href="/">Pegawai</a></li>
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
                    <form data-toggle="validator" role="form" action="{{ route('pegawai.ubah', $pgw->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Data
                                Pegawai</h5>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label mb-10">Jabatan</label>
                                <select name="jabatan" class="form-control" required>
                                    <option value="">--Pilih Jabatan--</option>
                                    @foreach (getJabatan() as $jbt)
                                        <option @if($jbt == $pgw->user->level) selected @endif value="{{ $jbt }}">{{ $jbt }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap"
                                    required value="{{ $pgw->nama }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Jenis Kelamin</label>
                                <select name="jk" class="form-control selectpicker" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    @foreach (getJenisKelamin() as $jk)
                                        <option @if($jk == $pgw->jk) selected @endif value="{{ $jk }}">{{ $jk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"
                                    required value="{{ $pgw->alamat }}">
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">No HP</label>
                                <input type="text" class="form-control" name="hp" placeholder="Masukkan No HP"
                                    required value="{{ $pgw->hp }}" data-error="Format Telepone Tidak Valid">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username"
                                    required value="{{ $pgw->user->username }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10">Password <small>(kosongkan jika tidak diubah)</small></label>
                                <input type="password" class="form-control" name="password" placeholder="Masukkan Password"
                                    value="{{ old('password') }}" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('pegawai') }}" type="button" class="btn btn-danger">Kembali</a>
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
