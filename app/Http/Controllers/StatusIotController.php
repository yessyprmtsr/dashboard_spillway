<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusIot;
use App\KetinggianAir;
use App\Spillway;

class StatusIotController extends Controller
{
    public function index()
    {
        $data     = StatusIot::get()->all();
        $date_now = date("Y-m-d H:i:s");
        foreach ($data as $key => $value) {
            if ($value->jenis == 'Ketinggian Air') {
                $checkLastUpdate = KetinggianAir::where('sensor_id', $value->id)->orderBy('created_at', 'DESC')->first();
                if (empty($checkLastUpdate)) {
                    $date_last = date('Y-m-d H:i:s');
                }else{
                    $date_last = date('Y-m-d H:i:s', strtotime($checkLastUpdate->created_at));
                }

                $calculate = $this->different_minutes($date_last, $date_now);

                if ($calculate > 1) {
                   $data[$key]->status = 'Tidak Aktif';
                   StatusIot::where('id', $value->id)->update(['status' =>'Tidak Aktif']);
                }else{
                    StatusIot::where('id', $value->id)->update(['status' =>'Aktif']);
                }
            }else{
                $checkLastUpdate = Spillway::where('spillway_id', $value->id)->orderBy('created_at', 'DESC')->first();

                if (empty($checkLastUpdate)) {
                    $date_last = date('Y-m-d H:i:s');
                }else{
                    $date_last = date('Y-m-d H:i:s', strtotime($checkLastUpdate->created_at));
                }

                $calculate = $this->different_minutes($date_last, $date_now);

                if ($calculate > 1) {
                   $data[$key]->status = 'Tidak Aktif';
                   StatusIot::where('id', $value->id)->update(['status' =>'Tidak Aktif']);
                }else{
                    StatusIot::where('id', $value->id)->update(['status' =>'Aktif']);
                }

            }
        }
        return view('statusiot.index', compact('data'));
    }

    public function create()
    {
        return view('statusiot.create');
    }

    public function store(Request $request)
    {
        $data = new StatusIot();
        $data->name = $request->name;
        $data->status = $request->status;
        $data->jenis = $request->jenis;
        $data->save();

        return redirect('/status-iot')->with('success','Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = StatusIot::find($id);
        return view('statusiot.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = StatusIot::find($id);
        $data->name = $request->name;
        $data->status = $request->status;
        $data->jenis = $request->jenis;
        $data->save();

        return redirect('/status-iot')->with('success','Data berhasil diperbaharui');
    }

    public function destroy($id)
    {
        $data = StatusIot::find($id);
        $data->delete();
    }

    public function different_minutes($date_last, $date_now)
    {
        $d1 = strtotime($date_last);
        $d2 = strtotime($date_now);
        // $d1 = strtotime('2020-01-01 01:00:00');
        // $d2 = strtotime('2020-01-01 01:01:00');
        $totalSecondsDiff = abs($d1-$d2);
        $totalMinutesDiff = $totalSecondsDiff/60;
        return round($totalMinutesDiff);
    }
}
