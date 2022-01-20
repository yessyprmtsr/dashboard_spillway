@extends('layouts.app')
@section('title','Spillway')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Spillway</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <p>Note:</p>
                <div class="table-responsive">
                    <table class="table" width="60%" style="font-size: 12px;">
                        <tr>
                            <td>A.</td>
                            <td>ON => Kondisi Spillway Terbuka</td>
                            <td>B.</td>
                            <td>OFF => Kondisi Spillway Tertutup</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <label>Bulan</label>
                <select class="form-control" name="bulan" id="bulan">
                    <option value="">Semua</option>
                    @for($i=1; $i<=12; $i++)
                        @php
                            $dateObj   = DateTime::createFromFormat('!m', $i);
                            $monthName = $dateObj->format('M'); // March
                        @endphp
                        <option value="{{ $i }}"  @if($i == $bulan) selected @endif>{{ $monthName }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <hr>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Waktu</th>
                        <th>Tanggal</th>
                        {{-- <th>Kondisi</th> --}}
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($data as $item)
                            @php
                                $red = '#e74c3c'; // Red
                                $green = '#2ecc71'; // Green
                                if (strtolower($item->kondisi) == 'b') {
                                    $color = $red;
                                    $item->kondisi = 'OFF';
                                } else {
                                    $color = $green;
                                    $item->kondisi = 'ON';
                                }
                            @endphp
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ date('H:i:s', strtotime($item->created_at)) }}</td>
                                <td>{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <span
                                        style="color:{{ $color }}; font-weight: bold;">{{ $item->kondisi }}</span>
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
    <script>
        $(document).ready(function(){
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            });
        })

        $("#bulan").change(function(event) {
            var _val = $(this).val();
            window.location.replace('{{ URL::to('/spillway?bulan=') }}'+_val)
        });
    </script>
@endsection
