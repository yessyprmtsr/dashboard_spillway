@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    @php $data_ketinggian = []; @endphp
    @foreach ($ketinggianAir as $key => $value)
        @php
            $data_ketinggian[] = [
                'id' => $value->id,
                'name' => $value->name,
                'status' => $value->status,
            ];
        @endphp
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ketinggian Air ({{ $value->name }})</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <canvas id="ketinggian_air_chart_{{ $key }}" height="800px" width="1300px"></canvas>
                    </div>
                    <div class="col-md-3">
                        <canvas id="ketinggian_air_bar_{{ $key }}" height="350px" width="200px;"
                            style="margin-left: 20px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Spillway Status</h6>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($spillway as $spk => $spv)
                    <div class="col-md-6">
                        <canvas id="spillway_{{ $spk }}" height="200px" width="500px"></canvas>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript">
        var _ketinggian_air = JSON.parse('<?= json_encode($data_ketinggian) ?>');
        var _spillway = JSON.parse('<?= json_encode($spillway) ?>');
        console.log(_spillway);
        $(document).ready(function() {
            setInterval(function() {
                fill_chart();
                spillway_chart();
            }, 1000);
        });
    </script>

    <script type="text/javascript">
        function fill_chart() {
            $.each(_ketinggian_air, function(index, val) {
                $.ajax({
                        url: '{{ URL::to('/latest-ketinggian-air/20') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            sensor_id: val['id']
                        },
                    })
                    .done(function(parse) {
                        var _label = [];
                        var _data_x = [];
                        var _last_ketinggian = 0;
                        var _last_ketinggian_word = 'Rendah';

                        $.each(parse, function(ii, vv) {
                            _label.push(vv['label'])
                            _data_x.push(parseInt(vv['debit_ketinggian_air']))

                            _last_ketinggian = parseInt(vv['debit_ketinggian_air'])
                            _last_ketinggian_word = vv['status'].toLowerCase()
                        });

                        generate_chart(val['name'], index, _label, _data_x)
                        generate_chart_ketinggian(val['name'], index, ['Ketinggian (' + _last_ketinggian + ')'],
                            [_last_ketinggian], _last_ketinggian_word)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
            });
        }

        function generate_chart(_name, _id_chart, _label, _data_x) {
            var ctxLine = document.getElementById("ketinggian_air_chart_" + _id_chart).getContext("2d");

            const colors = {
                green: {
                    fill: '#e0eadf',
                    stroke: '#5eb84d',
                },
                lightBlue: {
                    stroke: '#6fccdd',
                },
                darkBlue: {
                    fill: '#92bed2',
                    stroke: '#3282bf',
                },
                blue: {
                    fill: '#2980b97a',
                    stroke: '#2980b9'
                },
                purple: {
                    fill: '#8fa8c8',
                    stroke: '#75539e',
                },
            };

            const myLine = new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: _label,
                    datasets: [{
                        label: _name,
                        fill: true,
                        backgroundColor: colors.blue.fill,
                        borderColor: colors.blue.stroke,
                        borderCapStyle: 'butt',
                        borderWidth: 0,
                        data: _data_x,
                    }]
                },
                options: {
                    responsive: true,
                    animation: true,
                    legend: {
                        display: true
                    }
                }
            });
        }

        function generate_chart_ketinggian(_name, _id_chart, _label, _data_x, _last_ketinggian_word) {
            var ctxLine = document.getElementById("ketinggian_air_bar_" + _id_chart).getContext("2d");

            var color = '#2ecc71';
            if (_last_ketinggian_word == 'tinggi') {
                color = '#e74c3c';
            } else if (_last_ketinggian_word == 'sedang') {
                color = '#f1c40f';
            } else if (_last_ketinggian_word == 'normal') {
                color = '#f1c40f';
            }

            const myLine = new Chart(ctxLine, {
                type: 'bar',
                data: {
                    labels: _label,
                    datasets: [{
                        label: _name,
                        fill: true,
                        backgroundColor: color,
                        borderColor: color,
                        borderCapStyle: 'butt',
                        borderWidth: 0,
                        data: _data_x,
                    }]
                },
                options: {
                    responsive: true,
                    animation: true,
                    legend: {
                        display: true
                    }
                }
            });
        }
    </script>

    <script type="text/javascript">
        function spillway_chart() {
            $.each(_spillway, function(index, val) {
                $.ajax({
                        url: '{{ URL::to('/latest-spillway') }}',
                        type: 'GET',
                        dataType: 'JSON',
                        data: {
                            sensor_id: val['id']
                        },
                    })
                    .done(function(e) {
                        status = 'TERBUKA';
                        if (e['kondisi'] == '1.0') {
                            status = 'TERTUTUP';
                        }
                        generate_chart_pie(val['name'], index, [val['name'] + ' (' + status + ')'], [100], e[
                            'kondisi'])
                        console.log(e)
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });

            });
        }

        function generate_chart_pie(_name, _id_chart, _label, _data_x, _kondisi) {
            var ctxLine = document.getElementById("spillway_" + _id_chart).getContext("2d");

            var color = '#2ecc71';
            if (_kondisi == 'MERAH'.toLowerCase()) {
                color = '#e74c3c';
            }
            else if(_kondisi == 'KUNING'.toLowerCase()) {
                color = '#f1c40f';
            }

            const myLine = new Chart(ctxLine, {
                type: 'pie',
                data: {
                    labels: _label,
                    datasets: [{
                        label: _name,
                        fill: true,
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 0,
                        data: _data_x,
                    }]
                },
                options: {
                    responsive: true,
                    animation: true,
                    legend: {
                        display: true
                    }
                }
            });
        }
    </script>
@endsection
