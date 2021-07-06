<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function all_status()
    {
        OrderStatu::all();
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(OrderStatu::class, 'status_id', 'id');
    }


}


class OrderProduct extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
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
