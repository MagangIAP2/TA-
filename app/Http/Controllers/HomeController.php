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
        $datas = DataPerut::get();
        return view('admin.dashboard', compact('datas'));
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
            $total[] =  $dp->tbh;
        }

        // dd($minggu);
        return view('diagram', compact('datas', 'minggu', 'total'));
    }
}
