<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shifts extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name', 'time_in', 'time_out',
    ];
}
