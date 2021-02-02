<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\UserChart;
use App\Models\DataPerut;


class HomeController extends Controller
{
    //
    public function index()
    {
        $dataperut = DataPerut::all();

        // Menyimpan data untuk chart
        $minggu = [];
        $total = [];

        // Looping
        foreach ($dataperut as $dp) {
            $minggu[] = $dp->minggu_ke;
            $total[] =  $dp->lingkar_total;
        }


        return view('admin.dashboard', compact('dataperut', 'minggu', 'total'));
    }

    public function diagram($user_id)
    {
        $datas = DataPerut::where('user_id', $user_id)->get();

        // Menyimpan data untuk chart
        $minggu = [];
        $total = [];

        // Looping
        foreach ($datas as $dp) {
            $minggu[] = $dp->minggu_ke;
            $total[] =  $dp->lingkar_total;
        }

        // dd($total);
        return view('diagram', compact('datas', 'minggu', 'total'));
    }
}
