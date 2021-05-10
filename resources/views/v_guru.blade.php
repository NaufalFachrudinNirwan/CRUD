@extends('layout.v_template')
@section('title', 'Guru')

@section('content')
    <a href="/guru/add" class="btn btn-primary btn-sm">Add</a><br><br>

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
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Mata Pelajaran</th>
                <th>Foto Guru</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($guru as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nip_guru }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>{{ $data->matpel }}</td>
                    <td><img src="{{ url('foto_guru/'.$data->foto_guru) }}" width="100px"></td>
                    <td>
                        <a href="/guru/detail/ {{ $data->id_guru }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="/guru/edit/ {{ $data->id_guru }}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_guru }}">
                            Delete
                          </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @foreach ($guru as $data)
    <div class="modal modal-danger fade" id="delete{{ $data->id_guru }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>PERINGATAN</b></h4>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin menghapus  <b>{{ $data->nama_guru }}</b>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button onclick="window.location.href='/guru/delete/{{ $data->id_guru }}'" class="btn btn-outline">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      @endforeach

@endsection
