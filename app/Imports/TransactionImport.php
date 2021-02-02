<?php

namespace App\Imports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Transaction([
            'product_id' => $row['product_id'],
            'trx_date' => date('Y-m-d', strtotime($row['trx_date'])),
            'price' => $row['price']
            
        ]);
    }
}
