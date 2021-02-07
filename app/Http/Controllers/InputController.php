<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataPerut;
use App\Models\Models\Dokumen;
use Illuminate\Support\Facades\Storage;

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

    // public function storeDokumen(Request $req)
    // {
    //     $path = Storage::put('images', $req->file('dokumen'));
    //     DB::begintransaction();
    //     try {
    //         //code...
    //         $dokumen = Dokumen::create([
    //             'user_id'       => auth()->user()->id,
    //             'name'          => $req->name,
    //             'dokumen'       => $path,
    //         ]);
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         throw $e;
    //     }
    //     DB::commit();
    //     return redirect()->route('dashboard.user.index');
    // }
}
