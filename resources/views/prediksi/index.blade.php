@extends('layouts.app')
@section('title','Prediksi')
@section('content')
@foreach($ketinggianAir AS $key => $val)
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">{{ $val->name }}</h6>
    </div>
    <div class="card-body">
    	<div class="row">
    		<div class="col-md-6">
    			Prediksi berdasarkan dataset dari tanggal : 
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-2">
    			<label>Start Date :</label>
    			<input type="date" name="start_date" id="start_date_{{ $key }}" class="form-control">
    		</div>
    		<div class="col-md-2">
    			<label>End Date :</label>
    			<input type="date" name="end_date" id="end_date_{{ $key }}" class="form-control">
    		</div>
    		<div class="col-md-8">
    			<button type="button" class="bnt btn-primary btn-sm" style="margin-top:33px;" onclick="doPrediction({{$key}}, {{ $val->id }})">Prediksi</button>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
    			<h3 id="error_{{ $key }}"></h3>
				<canvas id="ketinggian_air_chart_{{ $key }}" height="500px" width="1300px"></canvas>
			</div>
    	</div>
    </div>
</div>
@endforeach
@endsection

@section('js')
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">

	function doPrediction(_key, _id)
	{
		var start_date = $("#start_date_"+_key).val();
		var end_date   = $("#end_date_"+_key).val();
		if (start_date.length < 1) {
			alert('Isi Start Date');
			return false;
		}
		if (end_date.length < 1) {
			alert('Isi End Date');
			return false;
		}

		$.ajax({
			url: '{{ URL::to('/do-prediction') }}'+'?start_date='+start_date+'&end_date='+end_date+'&id='+_id,
			type: 'GET',
			dataType: 'JSON',
			async: true
		})
		.done(function(e) {
			if (e['code'] != 200) {
				$("#error_"+_key).html(e['message'])
			}else{
				$("#error_"+_key).html('')
				console.log(e['data']['predict'])
				generate_chart('Prediksi', _key, e['data']['predict_date'], e['data']['predict'])
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}

	function generate_chart(_name, _id_chart, _label, _data_x){
		var ctxLine = document.getElementById("ketinggian_air_chart_"+_id_chart).getContext("2d");

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
            blue:{
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
                    data: _data_x,
                }]
            },
            options: {
                responsive: true,
                animation:  true,
                legend: {display:true},
                scales: {
			        yAxes: [{
			            ticks: {
			                beginAtZero: true
			            }
			        }]
			    },
			    plugins: {
			    	tooltip: {
			    		mode: 'index',
			    		intersect: false
			    	}
			    },
			    hover: {
			    	mode: 'index',
			    	intersec: false
			    },
            }
        });
	}
</script>
@endsection