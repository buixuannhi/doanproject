<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['customer_id', 'name', 'email', 'phone', 'address', 'status', 'total_price', 'token'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function cus()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
