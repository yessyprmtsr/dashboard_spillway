@extends('layouts.app')
@section('title','Status IoT')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Status IoT <a href="{{ URL::to('status-iot/create') }}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i></a></h6>
        
    </div>
    <div class="card-body">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                @php 
                    Session::forget('success')
                @endphp
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>                        
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Alat</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->jenis }}</td>
                            <td>
                                <a href="{{ URL::to('/status-iot/'.$item->id.'/destroy') }}" class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable();

            $('.hapus').on('click', function(){
                swal({
                    title: "Apa anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if(willDelete) {
                        $.ajax({
                            url: $(this).attr('href'),
                            type: "DELETE",
                            data: {
                                "_token": "{{ csrf_token() }}"
                            },
                            success:function(){
                                swal("Data berhasil dihapus", {
                                    icon: "success",
                                }).then((willDelete) => {
                                    location.reload();
                                });
                            }
                        });
                    } else {
                        swal("Data aman");
                    }
                });

                return false;
            });
        })
    </script>
@endsection
