<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function all_status()
    {
        OrderStatu::all();
    }
}


class OrderProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
}

class OrderHistory extends Model
{
    use HasFactory;
    public $timestamps = false;
}

class OrderStatu extends Model
{
    use HasFactory;
}
