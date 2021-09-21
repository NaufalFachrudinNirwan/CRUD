@extends('layout.v_template')

@section('title', 'Siswa')

@section('content')
    <h1>Data Siswa</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($siswa as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->mapel }}</td>
                    <td><a href="/siswa/detail/{{$data->nis}}" class="btn btn-sm btn-info">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
