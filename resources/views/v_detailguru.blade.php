@extends('layout.v_template')
@section('title', 'Detail Guru')

@section('content')

<table class="table">
<tr>
    <th width="100px">NIP</th>
    <th width="30px">:</th>
    <th>{{ $guru->nip_guru }}</th>
</tr>
<tr>
    <th width="100px">Nama Guru</th>
    <th width="30px">:</th>
    <th>{{ $guru->nama_guru }}</th>
</tr>
<tr>
    <th width="100px">Mata Pelajaran</th>
    <th width="30px">:</th>
    <th>{{ $guru->matpel }}</th>
</tr>
<tr>
    <th width="100px">Foto</th>
    <th width="30px">:</th>
    <th><img src="{{ url('foto_guru/'.$guru->foto_guru) }}" width="250"></th>
</tr>
<tr>
    <th>
    <a href="/guru" class="btn btn-success tbn-sm">Back</a>
    </th>
</tr>
</table>

@endsection
