<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyOrders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'date',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orderitems()
    {
        return $this->hasMany(MyOrderItems::class, 'id', 'order_id');
    }
}
