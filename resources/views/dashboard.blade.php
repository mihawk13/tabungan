@extends('layouts.app')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h5 class="txt-dark">Dashboard</h5>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="/">Dashboard</a></li>
    </ol>
</div>
@endsection
@section('content')
    <div class="">
        <p>{{ url()->current() . ' | ' . route('dashboard') }}</p>
    </div>
@endsection
