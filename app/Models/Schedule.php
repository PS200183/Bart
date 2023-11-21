<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule_employees';

    public $timestamps = false;

    protected $fillable = [
        'shift_id',
        'emp_id',
        'Date',
        'isSick',
        'isRecoverd',
        'status',
        'sick_reason',

    ];

    public function employees()
    {
        return $this->belongsTo(Employees::class, 'emp_id', 'id');
    }

    public function shifts()
    {
        return $this->belongsTo(shifts::class, 'shift_id', 'id');
    }
}
