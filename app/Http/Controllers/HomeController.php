<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusIot;
use App\KetinggianAir;
use App\Spillway;
use DateTime;
use DateInterval;
use DatePeriod;

use Phpml\Regression\LeastSquares;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tahun = date('Y');
        $jam   = '';
        $hari  = '';
        if (isset(request()->tahun)) {
            $tahun = request()->tahun;
        }
        if (isset(request()->jam)) {
            $jam = (int) request()->jam;
        }
        if (isset(request()->hari)) {
            $hari = request()->hari;
        }
        $statusiot     = StatusIot::get()->all();
        $ketinggianAir = StatusIot::where('jenis', 'Ketinggian Air')->get()->all();
        $spillway      = StatusIot::where('jenis', 'Spillway')->get()->all();

        return view('homenew',compact('statusiot','tahun','jam','hari', 'ketinggianAir', 'spillway'));
    }

    public function getLatestKetinggianAir(Request $request, $limit)
    {
        $data = KetinggianAir::where('sensor_id', $request->sensor_id)
            ->limit($limit)
            ->orderBy('created_at', 'DESC')
            ->get()->all();

        foreach ($data as $key => $value) {
            $data[$key]['label'] = date('d M y - H:i:s', strtotime($value->created_at));
        }

        $data = array_reverse($data);

        return response()->json($data);
    }

    public function getLatestSpillway(Request $request)
    {
        $date_now = date("Y-m-d H:i:s");
        $data = Spillway::where('spillway_id', $request->sensor_id)
            ->orderBy('created_at', 'DESC')
            ->first();
        return response()->json($data);
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

    public function prediksi(Request $request)
    {
        $ketinggianAir = StatusIot::where('jenis', 'Ketinggian Air')->get()->all();
        return view('prediksi.index', compact('ketinggianAir'));
    }

    public function doPrediksi(Request $request)
    {
        $returnData = [
            'code'    => 200,
            'data'    => [],
            'message' => ''
        ];
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        if(strtotime($start_date) > strtotime($end_date))
        {
            $returnData['code'] = 201;
            $returnData['message'] = 'Error.! Start Date lebih besar dari End Date';
            return response()->json($returnData);
        }

        // Minimal 14 Hari untuk data nya dengan asumsi data ada semua
        $calculate_days = $this->calculate_days($start_date, $end_date);

        if ($calculate_days < 14) {
            $returnData['code']    = 202;
            $returnData['message'] = 'Minimal range tanggal 14 Hari';
            $returnData['data']    = [$calculate_days, $start_date, $end_date];
            return response()->json($returnData);
        }

        // Maksimal 31 hari
        if ($calculate_days > 30) {
            $returnData['code']    = 202;
            $returnData['message'] = 'Maksimal range tanggal 31 Hari';
            $returnData['data']    = [$calculate_days, $start_date, $end_date];
            return response()->json($returnData);
        }

        // Ambil data dari dates tersebut
        $begin    = new DateTime($start_date);
        $end      = new DateTime($end_date);

        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($begin, $interval, $end);

        $dates = [];
        foreach ($period as $dt) {
            $dates['tanggal'][] = $dt->format("Y-m-d");
        }
        $dates['tanggal'][count($dates['tanggal'])] = $end_date;
        

        $dataset = [];
        foreach ($dates['tanggal'] as $dk => $dv) {
            $getAverage = KetinggianAir::where('sensor_id', $request->id)->whereRaw('DATE(created_at) = '."'".$dv."'")->avg('debit_ketinggian_air');
            if(!empty($getAverage)){
                $dataset[] = round($getAverage);
            }
        }
        if (count($dataset) < 14) {
            $returnData['code']    = 202;
            $returnData['message'] = 'Dataset pada tanggal tersebut kurang, silahkan pilih range tanggal lain.!';
            $returnData['data']    = $dataset;
            return response()->json($returnData);
        }

        $samples     = [];
        $targets     = [];
        $last_number = 0;
        foreach ($dataset as $b => $z) {
            $last_number = $b+1;
            $samples[]   = [$b+1];
            $targets[]   = $z;
        }

        $dates['samples'] = $samples;
        $dates['targets'] = $targets;

        $regression = new LeastSquares();
        $regression->train($samples, $targets);

        $t = 1;
        $data_to_predict = [];
        while ($t <= 7) {
            $last_number = $last_number+1;
            $data_to_predict[] = [$last_number];
            $t+=1;
        }

        $predict = $regression->predict($data_to_predict);

        foreach ($predict as $pkey => $pvalue) {
            $predict[$pkey] = floor($pvalue);
        }

        $dates['predict']      = $predict;
        $dates['predict_date'] = $this->predict_date();
        foreach ($dates['predict_date'] as $vkey => $vvalue) {
            $dates['predict_date'][$vkey] = $vvalue.' ('.$dates['predict'][$vkey].')';
        }
        $returnData['data']    = $dates;
        return response()->json($returnData);
    }

    function predict_date()
    {
        $start_date = date('Y-m-d', strtotime('+1 day'));
        $end_date   = date('Y-m-d', strtotime('+7 day'));

        $begin    = new DateTime($start_date);
        $end      = new DateTime($end_date);

        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($begin, $interval, $end);

        $dates = [];
        foreach ($period as $dt) {
            $dates[] = $dt->format("Y-m-d");
        }

        $dates[count($dates)] = $end_date;

        return $dates;
    }

    function calculate_days($date1, $date2)
    {
        // Creates DateTime objects
        $datetime1 = date_create($date1);
        $datetime2 = date_create($date2);

        // Calculates the difference between DateTime objects
        $interval = date_diff($datetime1, $datetime2);
        return $interval->format('%a');
        $diff   = abs(strtotime($date2) - strtotime($date1));
        $years  = floor($diff / (365*60*60*24));
        $months = floor(($diff - ($years * 365*60*60*24)) / (30*60*60*24));
        $days   = floor(($diff - ($years * 365*60*60*24) - ($months*30*60*60*24))/ (60*60*24));
        return $days;
    }

    function generate_dataset_waduk()
    {
        $sensor_id  = 1;
        $start_date = "2021-12-01";
        $end_date   = "2021-12-30";

        $begin    = new DateTime($start_date);
        $end      = new DateTime($end_date);

        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($begin, $interval, $end);

        $dates = [];
        foreach ($period as $dt) {
            $dates['tanggal'][] = $dt->format("Y-m-d");
        }
        $dates['tanggal'][count($dates['tanggal'])] = $end_date;

        foreach ($dates['tanggal'] as $dk => $dv) {
            $getAverage = KetinggianAir::where('sensor_id', $sensor_id)->whereRaw('DATE(created_at) = '."'".$dv."'")->avg('debit_ketinggian_air');
            if(empty($getAverage)){
                $rand = rand(1,20);
                $kt = new KetinggianAir;
                $kt->sensor_id            = $sensor_id;
                $kt->debit_ketinggian_air = $rand;
                $kt->status               = ($rand >= 8 && $rand <=11 )  ? 'Normal' : (($rand >= 12 && $rand <= 14 ||  $rand > 14 ) ? 'Tinggi' : 'Rendah');
                $kt->created_at           = $dv;
                $kt->save();
            }
        }
    }
    function generate_dataset_sungai()
    {
        $sensor_id  = 4;
        $start_date = "2021-12-01";
        $end_date   = "2021-12-30";

        $begin    = new DateTime($start_date);
        $end      = new DateTime($end_date);

        $interval = DateInterval::createFromDateString('1 day');
        $period   = new DatePeriod($begin, $interval, $end);

        $dates = [];
        foreach ($period as $dt) {
            $dates['tanggal'][] = $dt->format("Y-m-d");
        }
        $dates['tanggal'][count($dates['tanggal'])] = $end_date;

        foreach ($dates['tanggal'] as $dk => $dv) {
            $getAverage = KetinggianAir::where('sensor_id', $sensor_id)->whereRaw('DATE(created_at) = '."'".$dv."'")->avg('debit_ketinggian_air');
            if(empty($getAverage)){
                $rand = rand(1,20);
                $kt = new KetinggianAir;
                $kt->sensor_id            = $sensor_id;
                $kt->debit_ketinggian_air = $rand;
                $kt->status               = ($rand >= 2 && $rand <=5 )  ? 'Normal' : (($rand >= 6 && $rand <= 8 ||  $rand > 8 ) ? 'Tinggi' : 'Rendah');
                $kt->created_at           = $dv;
                $kt->save();
            }
        }
    }
}
