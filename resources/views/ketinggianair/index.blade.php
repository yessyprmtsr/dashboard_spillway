@extends('layouts.app')
@section('title','Ketinggin Air')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ketinggian Air</h6>
    </div>
         <div class="card-body">
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
                        <th>Debit Ketinggian Air</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $item)
                        @php
                            $red    = "#e74c3c";
                            $green  = "#2ecc71";
                            $yellow = "#f1c40f";
                            if (strtolower($item->status) == 'tinggi') {
                                $color = $red;
                            }elseif((strtolower($item->status) == 'normal') or (strtolower($item->status ) == 'sedang')){
                                $color = $yellow;
                            }else{
                                $color = $green;
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ date('H:i:s',strtotime($item->created_at)) }}</td>
                            <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
                            <td>{{ $item->debit_ketinggian_air }}</td>
                            <td>
                                <span style="color:{{ $color }}; font-weight: bold;">{{ $item->status }}</span>
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
    </script>
@endsection
