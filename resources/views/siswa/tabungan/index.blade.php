@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Tabungan</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Siswa</a></li>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($tabungan as $tbg)
                                    @php
                                        $total += $tbg->jumlah;
                                    @endphp
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($tbg->tanggal)->translatedFormat('d M Y') }}</td>
                                        <td>{{ $tbg->kelas }}</td>
                                        <td>{{ $tbg->nama }}</td>
                                        <td>{{ number_format($tbg->jumlah) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-center"><strong>Total Tabungan</strong></td>
                                        <td><strong>{{ number_format($total) }}</strong></td>
                                    </tr>
                                </tfoot>
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
