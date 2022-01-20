<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KetinggianAir;
use App\Spillway;
use App\StatusIot;

class ApiController extends Controller
{
    public function inputKetinggianAir(Request $request)
    {
        $data = new KetinggianAir();
        $data->sensor_id = $request->sensor_id;
        $data->debit_ketinggian_air = $request->debit;
        if ($request->debit >= 12 && $request->debit <= 14 ) {
            $data->status = 'Tinggi';
        }elseif ($request->debit >14 ) {
            $data->status = 'Tinggi';
        }elseif ($request->debit >= 8 && $request->debit <= 11 ) {
            $data->status = 'Normal';
        } else {
            $data->status = 'Rendah';
        }
        $data->save();

        return response()->json([200,'success']);
    }

        public function inputKetinggianAirSungai(Request $request)
    {
        $data = new KetinggianAir();
        $data->sensor_id = $request->sensor_id;
        $data->debit_ketinggian_air = $request->debit;
        if ($request->debit >= 6 && $request->debit <= 8 ) {
            $data->status = 'Tinggi';
        }elseif ($request->debit > 8 ) {
            $data->status = 'Tinggi';
        } elseif ($request->debit >= 2 && $request->debit <= 5 ) {
            $data->status = 'Normal';
        } else {
            $data->status = 'Rendah';
        }
        $data->save();

        return response()->json([200,'success']);
    }

    public function inputSpillway(Request $request)
    {
        $data = new Spillway();
        $data->spillway_id = $request->spillway_id;
        $data->kondisi = $request->kondisi;
        $data->status = $request->status;
        $data->save();

        return response()->json([200,'success']);
    }

    public function getData()
    {
        $tgl_sekarang = date('Y-m-d');
        $data = StatusIot::where('jenis','Ketinggian Air')->get()->all();

        $data2 = Spillway::select('status_iot.name','spillway.kondisi','spillway.status','spillway.created_at')
        ->leftjoin('status_iot','spillway.spillway_id','=','status_iot.id')->where('status_iot.jenis','Spillway');

        if (isset(request()->tahun)) {
            $data2 = $data2->whereYear('spillway.created_at','=',request()->tahun)->orderBy('spillway.created_at','desc')->get();
        }else{
            $data2 = $data2->whereDate('spillway.created_at','=',$tgl_sekarang)->orderBy('spillway.created_at','desc')->get();
        }

        // dd($data);

        if ($data) {


            foreach ($data as $key => $value) {
                $ka = KetinggianAir::select('ketinggian_air.sensor_id','status_iot.name','ketinggian_air.debit_ketinggian_air','ketinggian_air.status','ketinggian_air.created_at')
                        ->leftjoin('status_iot','ketinggian_air.sensor_id','=','status_iot.id')->where('ketinggian_air.sensor_id',$value->id);

                if (isset(request()->tahun)) {
                    $ka = $ka->whereYear('ketinggian_air.created_at','=',request()->tahun)->get();
                }elseif(isset(request()->hari)){
                    $ka = $ka->whereDate('ketinggian_air.created_at','=',request()->hari)->get();
                }else{
                    if (isset(request()->jam)) {
                        $jam = (int) request()->jam;
                    }else{
                        $jam = date('H');
                    }
                    $ka = $ka->whereRaw('HOUR(ketinggian_air.created_at) = '.$jam)->whereDate('ketinggian_air.created_at','=',$tgl_sekarang)->get();
                }


                foreach ($ka as $key => $newval) {
                    $val[$newval->sensor_id][] = [
                        'sensor' => $newval->name,
                        'nilai' => $newval->debit_ketinggian_air,
                        'status' => $newval->status,
                        'tanggal' => isset(request()->tahun) ? date('M', strtotime($newval->created_at)) : date('H:i', strtotime($newval->created_at))
                    ];
                }
            }

            // dd($val);

            foreach ($data2 as $key => $value) {
                $val2[] = [
                    'sensor' => $value->name,
                    'tanggal' => date('d-m-Y', strtotime($value->created_at)),
                    'waktu' => date('H:i:s', strtotime($value->created_at)),
                    'kondisi' => $value->kondisi,
                    'status' => $value->status
                ];
            }

            $res = [
                'code' => 200,
                'status' => 'success',
                'data' => isset($val) ? $val : [],
                'data2' => isset($val2) ? $val2 : []
            ];

        }else{

            $res = [
                'code' => 201,
                'status' => 'failed',
                'data' => [],
                'data2' => []
            ];

        }

        return response()->json($res);
    }
}
