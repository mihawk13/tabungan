@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Penarikan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Bendahara</a></li>
        <li class="active"><span>Penarikan</span></li>
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
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table id="datable_3" class="table table-hover display pb-30">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kelas</th>
                                        <th>Nama Siswa</th>
                                        <th>Saldo Awal</th>
                                        <th>Jml Penarikan</th>
                                        <th>Saldo Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penarikan as $pnr)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($pnr->tanggal)->translatedFormat('d M Y') }}</td>
                                        <td>{{ $pnr->tabungan->siswa->kelas->kelas }}</td>
                                        <td>{{ $pnr->tabungan->siswa->nama }}</td>
                                        <td>{{ number_format($pnr->saldo_awal) }}</td>
                                        <td>{{ number_format($pnr->jml_tarik) }}</td>
                                        <td>{{ number_format($pnr->saldo_awal - $pnr->jml_tarik) }}</td>
                                    </tr>
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
