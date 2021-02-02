<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataPerut;



class InputController extends Controller
{
    //
    public function index(){
        return view('admin.tambah_data');
    }

    public function store(Request $req){
        DB::begintransaction();
        try {
            //code...
            $dataperut = DataPerut::create([
                'lingkar_perut_atas'    => $req->lingkar_perut_atas,
                'lingkar_perut_kanan'   => $req->lingkar_perut_kanan,
                'minggu_ke'             => $req->minggu_ke,
                'lingkar_total'         => ($req->lingkar_perut_atas + $req->lingkar_perut_kanan),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('tambah.data');
    }
}
