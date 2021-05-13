@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Pegawai</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Pegawai</span></li>
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
            <div class="panel-heading">
                <div class="pull-left">
                    <a href="{{ route('pegawai.tambah') }}" class="btn btn-success">Tambah</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_1" class="table table-hover display  pb-30">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai</th>
                                        <th>JK</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pegawai as $pg)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pg->nama }}</td>
                                        <td>{{ $pg->jk }}</td>
                                        <td>{{ $pg->hp }}</td>
                                        <td>{{ $pg->alamat }}</td>
                                        {{-- <td>{{ $pg->user->level }}</td> --}}
                                        <td>{{ cekWaliKelas($pg->id) }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $pg->id }})" type="button"
                                                    class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Ubah Data Pegawai"><i class="fa fa-pencil"></i></button>
                                                @if(cekWaliKelas($pg->id) == 0)
                                                <button type="button"
                                                    class="btn btn-danger btn-icon-anim btn-square btn-sm"
                                                    data-toggle="modal" data-target="#modalhapus{{ $pg->id }}"
                                                    data-placement="left" title="Hapus Data Pegawai"><i
                                                        class="fa fa-trash"></i></button>
                                                @endif
                                            </center>
                                        </td>
                                    </tr>
                                    {{-- modal hapus --}}
                                    <div id="modalhapus{{ $pg->id }}" class="modal" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Konfirmasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus {{ $pg->nama }} dari data pegawai
                                                        ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $pg->user_id }}">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Tidak</button>
                                                        <button type="submit" class="btn btn-success">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal hapus --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Row -->
@endsection

@section('script')
<script>
    function openLink(id) {
        let url = "{{ route('pegawai.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
