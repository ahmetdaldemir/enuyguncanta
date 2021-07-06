<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
//    public function collection()
//    {
//        return Order::all();
//    }
    public function view(): View
    {
        return view('admin.orders.excel', [
            'invoices' => Order::all()
        ]);
    }
}
