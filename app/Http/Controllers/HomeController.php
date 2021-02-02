<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\Models\DataPerut;


class HomeController extends Controller
{
    //
    public function index(){
        $dataperut = DataPerut::get();
        $minggu = DataPerut::get('minggu_ke');
        $total = DataPerut::get('lingkar_total');

        // dd($total);
        
        $usersChart = new UserChart;
        $usersChart->labels($minggu->toArray());
        $usersChart->dataset('Users by trimester', 'line', [10,11,12,14,32]);

        return view('admin.dashboard', compact('usersChart', 'dataperut'));
    }

}
