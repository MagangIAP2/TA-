<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataPerut;



class InputController extends Controller
{
    //
    public function index()
    {

        return view('admin.tambah_data');
    }

    public function store(Request $req)
    {
        DB::begintransaction();
        try {
            //code...
            $dataperut = DataPerut::create([
                'user_id'       => auth()->user()->id,
                'tfu'           => $req->tfu,
                'x'             => $req->x,
                'minggu_ke'     => $req->minggu_ke,
                'tbh'           => ($req->tfu - $req->x) * 155,
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('dashboard.index');
    }
}
