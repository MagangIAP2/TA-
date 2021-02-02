<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;

use Excel;
use App\Imports\TransactionImport;
use App\Exports\TransactionExport;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 5;
        $data =[
            'transactions' => \App\Models\Transaction::paginate($paginate)

        ];
        return view('admin.transaction.index', $data)->with('i', ($request->input('page', 1) - 1) * $paginate);

    }

    public function import()
    {
        return view('admin.transaction.import');

    }
    
    public function store_import(Request $request)
    {
         // setting validasi data
         $rules = [
            'transaction_import' => 'required|mimes:xls,xlsx',

        ];
        // menyiapkan pesan error
        $messages = [
            'transaction_import.required' => 'File excel wajib diisi',
            'transaction_import.mimes' => 'File excel hanya boleh bertipe .xls atau xlsx'
        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        //cek apakah ada error validasi atau tidak
        if($validator->fails()){
            return redirect()->to('transaction_import')->withErrors($validator);
        }

        // tampung file excel
        $path = $request->file('transaction_import')->getRealPath();

        // import
        Excel::import(new TransactionImport, $path);

        return redirect()->to('transaction')->with('success', 'Berhasil import data transaction');

        


    }
    public function export()
        {
            return Excel::download(new TransactionExport, 'transaction'.time().'.xlsx');
        }
}
