<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class TransactionExport implements FromView
{
    
    public function view() : View
    {
        return view('admin.transaction.export', [
            'transactions' => Transaction::all()
        ]);
    }
}
