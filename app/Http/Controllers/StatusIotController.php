<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusIot;

class StatusIotController extends Controller
{
    public function index()
    {
        $data = StatusIot::get()->all();

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

    //    public function getLatestSpillway(Request $request)
    // {
    //     $date_now = date("Y-m-d H:i:s");    
    //     $data = StatusIot::where('id', $request->sensor_id)
    //         ->orderBy('created_at', 'DESC')
    //         ->first();
    //     $date_last = date('Y-m-d H:i:s', strtotime($data->created_at));
    //     $calculate = $this->different_minutes($date_last, $date_now);
    //     $data->ddff = $calculate;
    //     if($calculate > 2){ // Kalo lebih dari 5 menit kondisi tertutup
    //         $data->kondisi = 'Inactive';
    //     }
    //     return response()->json($data);
    // }
}
