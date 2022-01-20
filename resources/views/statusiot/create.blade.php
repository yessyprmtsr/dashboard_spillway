@extends('layouts.app')
@section('title','Tambah Status IoT')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Status IoT</h6>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('status-iot/store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="" class="form-control" required>
                            <option>Aktif</option>
                            <option>Tidak Aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Jenis</label>
                        <select name="jenis" id="" class="form-control" required>
                            <option>Ketinggian Air</option>
                            <option>Spillway</option>
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
