@extends('layout.v_template')

@section('title', 'Tagihan')

@section('content')
    <h1>Data Tagihan</h1>
    <a href="/tagihan/add" class="btn btn-primary btn-sm">Add</a><br><br>
    @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        {{ session('pesan') }}
    </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No.Tagihan</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Periode</th>
                <th>NIS</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
            @foreach ($user as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->no_tagihan }}</td>
                    <td>{{ $data->tanggal }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>{{ $data->periode }}</td>
                    <td>{{ $data->nis }}</td>
                    <td><a href="/tagihan/detail/{{$data->no_tagihan}}" class="btn btn-sm btn-info">Detail</a></td>   </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

