<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {

        $events = [];
        $data = Schedule::where('emp_id', Auth()->user()->employee->id)->get();
        if ($data->count()) {
            foreach ($data as $key => $value) {
                $strat = Carbon::parse("{$value->Date} {$value->shifts->time_in}");

                $end = Carbon::parse("{$value->Date} {$value->shifts->time_out}");

                $events[] = [
                    'id' => $value->id,
                    'title' => $value->employees->firstname,
                    'start' => $strat,
                    'end' => $end,
                    'status' => $value->status,
                    'color' => $value->status == 'ziek' ? '#FF0000' : '#00c0ef',
                ];
            }
        }

        return view('employee.scheduleemployee', compact('events'));

    }
}
