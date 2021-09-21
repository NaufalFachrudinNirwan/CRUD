@extends('layout.v_template')

@section('title', 'Add Tagihan')

@section('content')

<form action="/tagihan/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>No.Tagihan</label>
                    <input name="no_tagihan" class="form-control" value="{{ old('no_tagihan') }}">
                    <div class="text-danger">
                        @error('no_tagihan')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Tanggal</label>
                    <input name="tanggal" type="date" class="form-control" value="{{ old('tanggal') }}">
                    <div class="text-danger">
                        @error('tanggal')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input name="keterangan" class="form-control" value="{{ old('keterangan') }}">
                    <div class="text-danger">
                        @error('keterangan')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Periode</label>
                    <input name="periode" class="form-control" value="{{ old('periode') }}">
                    <div class="text-danger">
                        @error('periode')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>NIS</label>
                    <input name="nis" class="form-control" value="{{ old('nis') }}">
                    <div class="text-danger">
                        @error('nis')
                        {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Save</button>
                </div>

            </div>
        </div>
    </div>

</form>

@endsection
