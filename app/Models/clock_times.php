<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clock_times extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'clock_times';

    protected $fillable = [
        'emp_id',
        'time_in',
        'time_out',
        'Date',

    ];
}
