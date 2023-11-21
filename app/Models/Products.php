<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'article_number',
        'price',
        'stock',
    ];

    public function orderitems()
    {
        return $this->hasMany(OrderItems::class, 'product_id', 'id');
    }
}
