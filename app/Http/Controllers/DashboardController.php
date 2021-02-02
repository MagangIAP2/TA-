<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataPerut;


class DashboardController extends Controller
{
    
    public function Index()
    {
            $dataperut = DataPerut::get();
            return view('admin.dashboard', $dataperut);
        }

    
}