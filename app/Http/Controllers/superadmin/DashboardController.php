<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Cron\MonthField;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $visitors = Visitor::select(DB::raw('EXTRACT(MONTH FROM created_at) AS month,EXTRACT(YEAR FROM created_at) AS year, COUNT(id) as total'))
            ->groupBy(DB::raw('month'), DB::raw('year'))
            ->get();
        $chart_data = array();
        foreach ($visitors as $data) {
            array_push($chart_data, array($data->year . '-' . $data->month, $data->total));
        }

        return view('superadmin.dashboard', compact(['visitors', 'chart_data']));
    }
}
