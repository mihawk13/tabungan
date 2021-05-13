@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Tabungan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Wali Kelas</a></li>
        <li class="active"><span>Tabungan</span></li>
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
                    <a href="{{ route('wali.tabungan.tambah') }}" class="btn btn-success">Tambah</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_3" class="table table-hover display pb-30">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Nama Siswa</th>
                                        <th>Jml Tabungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabungan as $tbg)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($tbg->tanggal)->translatedFormat('d M Y') }}</td>
                                        <td>{{ $tbg->tabungan->siswa->kelas->kelas }}</td>
                                        <td>{{ $tbg->tabungan->siswa->nama }}</td>
                                        <td>{{ number_format($tbg->jumlah) }}</td>
                                        <td>
                                            <center>
                                                <button onclick="openLink({{ $tbg->id }})" type="button"
                                                    class="btn btn-warning btn-icon-anim btn-square btn-sm"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Ubah Data Tunjangan"><i class="fa fa-pencil"></i></button>
                                                <button type="button"
                                                    class="btn btn-danger btn-icon-anim btn-square btn-sm"
                                                    data-toggle="modal" data-target="#modalhapus{{ $tbg->id }}"
                                                    data-placement="left" title="Hapus Data Tabungan"><i
                                                        class="fa fa-trash"></i></button>
                                            </center>
                                        </td>
                                    </tr>
                                    {{-- modal hapus --}}
                                    <div id="modalhapus{{ $tbg->id }}" class="modal" tabindex="-1" role="dialog">
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
                                                    <p>Apakah anda yakin menghapus data tabungan ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $tbg->id }}">
                                                        <input type="hidden" name="siswa_id" value="{{ $tbg->tabungan->siswa->id }}">
                                                        <input type="hidden" name="jumlah" value="{{ $tbg->jumlah }}">
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
        let url = "{{ route('wali.tabungan.ubah', 'ids') }}"
        url = url.replace('ids', id)
        // console.log();
        window.location.href = url
    }
</script>
@endsection
