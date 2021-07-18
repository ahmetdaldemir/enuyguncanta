<?php

namespace App\Exports;

use App\Models\Order;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class OrderExport implements FromView
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
