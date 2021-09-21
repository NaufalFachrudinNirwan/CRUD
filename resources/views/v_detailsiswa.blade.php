@extends('layout.v_template')

@section('title', 'Siswa')

@section('content')

    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{ session('pesan') }}
    </div>
    @endif

<table class="table">
    <tr>
        <th width="100px">NIS</th>
        <th width="30px">:</th>
        <th>{{ $siswa->nis }}</th>
    </tr>
    <tr>
        <th width="100px">Nama Siswa</th>
        <th width="30px">:</th>
        <th>{{ $siswa->nama_siswa }}</th>
    </tr>
    <tr>
        <th width="100px">Kelas</th>
        <th width="30px">:</th>
        <th>{{ $siswa->kelas }}</th>
    </tr>
    <tr>
        <th width="100px">Mapel</th>
        <th width="30px">:</th>
        <th>{{ $siswa->mapel }}</th>
    </tr>
    <tr>
        <th>
        <a href="/siswa" class="btn btn-success tbn-sm">Back</a>
        </th>
    </tr>
</table>




@endsection
