@extends('layouts.app')
@section('title','Edit Status IoT')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Status IoT</h6>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('status-iot/'.$data->id.'/update') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ $data->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control" required>
                            <option {{ $data->status == 'Aktif' ? 'selected' :'' }}>Aktif</option>
                            <option {{ $data->status == 'Tidak Aktif' ? 'selected' :'' }}>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" id="" class="form-control" required>
                            <option {{ $data->jenis == 'Ketinggian Air' ? 'selected' :'' }}>Ketinggian Air</option>
                            <option {{ $data->status == 'Spillway' ? 'selected' :'' }}>Spillway</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ URL::to('/status-iot') }}" class="btn btn-info">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
