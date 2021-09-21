@extends('layout.v_template')

@section('title', 'Detail Tagihan')

@section('content')

<table class="table">
    <tr>
        <th width="100px">No.Tagihan</th>
        <th width="30px">:</th>
        <th>{{ $user->no_tagihan }}</th>
    </tr>
    <tr>
        <th width="100px">Tanggal</th>
        <th width="30px">:</th>
        <th>{{ $user->tanggal }}</th>
    </tr>
    <tr>
        <th width="100px">Keterangan</th>
        <th width="30px">:</th>
        <th>{{ $user->keterangan }}</th>
    </tr>
    <tr>
        <th width="100px">Periode</th>
        <th width="30px">:</th>
        <th>{{ $user->periode }}</th>
    </tr>
    <tr>
        <th width="100px">NIS</th>
        <th width="30px">:</th>
        <th>{{ $user->nis }}</th>
    </tr>
    <tr>
        <th>
        <a href="/tagihan" class="btn btn-success tbn-sm">Back</a>
        </th>
    </tr>
</table>

@endsection
