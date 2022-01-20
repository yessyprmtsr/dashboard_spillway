<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KetinggianAir;


class KetinggianAirController extends Controller
{
    public function index(Request $request)
    {
        $bulan = ($request['bulan'] != null)?$request['bulan']:'';
        $data = KetinggianAir::select('status_iot.name','ketinggian_air.debit_ketinggian_air','ketinggian_air.status','ketinggian_air.created_at')
                 ->leftjoin('status_iot','ketinggian_air.sensor_id','=','status_iot.id')->where('status_iot.jenis','Ketinggian Air')
                 ->orderBy('ketinggian_air.created_at', 'DESC');
        if ($bulan != "") {
            $data = $data->whereRaw('MONTH(ketinggian_air.created_at) = '.$bulan);
        }
        $data = $data->get()->all();
      return view('ketinggianair.index',compact('data','bulan'));
    }
}
