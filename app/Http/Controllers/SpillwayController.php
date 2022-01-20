<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spillway;


class SpillwayController extends Controller
{
    public function index(Request $request)
    {
        $bulan = ($request['bulan'] != null)?$request['bulan']:'';
        $data = Spillway::select('status_iot.name','spillway.kondisi','spillway.status','spillway.created_at')
                ->leftjoin('status_iot','spillway.spillway_id','=','status_iot.id')
                ->where('status_iot.jenis','Spillway')
                ->orderBy('spillway.created_at', 'DESC');
        if ($bulan != "") {
            $data = $data->whereRaw('MONTH(spillway.created_at) = '.$bulan);
        }
        $data = $data->get()->all();
        return view('spillway.index',compact('data', 'bulan'));
    }
}
