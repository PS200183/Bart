<?php

namespace App\Http\Controllers;

use App\Models\clock_times;
use App\Models\Employees;
use App\Models\Schedule;
use App\Models\shifts;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        //dd(Employees::all());
        $Schedule = Schedule::all();
        $shifts = shifts::all();
        $employees = Employees::all();
        //dd($Schedule[0]->employees);
        $status = ['1' => 'Ingeplanned', '2' => 'optijd', '3' => 'telaat', '4' => 'ziek'];

        //dd($status[1]);
        return view('admin.employee')->with('Schedules', $Schedule)->with('shifts', $shifts)->with('employees', $employees)->with('statuses', $status);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'employee' => 'required',
                'schedule' => 'required|exists:shifts,id',
                'date' => 'required|date',
            ]);
            $Schedule = new Schedule();
            $Schedule->emp_id = $request->employee;
            $Schedule->shift_id = $request->schedule;
            $Schedule->Date = $request->date;
            $Schedule->save();

            return redirect()->route('employeeschedules.index')->with('success', 'Ingeplanned !.');
        } catch (\Exception $e) {
            return redirect()->route('employeeschedules.index')->with('error', 'Deze werknemer is al ingepland op deze dag !.');
        }

    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'schedule' => 'required|exists:shifts,id',
            'date' => 'required|date',
            'status' => 'required|in:1,2,3,4',
        ]);

        $Schedule = Schedule::find($id);
        $Schedule->shift_id = $request->schedule;
        $Schedule->Date = $request->date;
        if ($request->status == 4) {
            $Schedule->isSick = 1;
        } else {
            $Schedule->isSick = 0;
        }
        $Schedule->status = $request->status;
        $Schedule->update();

        return redirect()->route('employeeschedules.index')->with('success', 'Aangepast !.');

    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();

        return redirect()->route('employeeschedules.index')->with('success', 'Verwijderd !.');

    }

    public function sick()
    {
        return view('employee.sick');
    }

    public function klok()
    {
        $date = Carbon::now()->format('Y-m-d');
        $clock = clock_times::where('emp_id', auth()->user()->employee->id)->where('Date', $date)->first();
        $status = 0;
        if ($clock) {
            $status = 1;
        } else {
            $status = 0;
        }

        return view('employee.kloksysteem')->with('status', $status);

    }

    public function klokin()
    {

        $date = Carbon::now()->format('Y-m-d');
        $clock = clock_times::where('emp_id', auth()->user()->employee->id)->where('Date', $date)->first();
        $Schedule = Schedule::where('emp_id', auth()->user()->employee->id)->whereDate('Date', $date)->first();
        // check if de user has schedule
        // dd($Schedule);
        if ($Schedule) {
            if ($clock) {
                return view('employee.kloksysteem')->with('status', 1)->with('clock_messege-success', 'je bent ingeklokt');
            } else {

                $clock = new clock_times();
                $clock->emp_id = auth()->user()->employee->id;
                $clock->time_in = Carbon::now()->format('H:i');
                $clock->Date = Carbon::now()->format('Y-m-d');
                $clock->save();

                return redirect()->route('dashboard');

            }
        } else {
            return view('employee.kloksysteem')->with('status', 0)->with('clock_messege', 'je bent vandaag niet gepland');
        }

    }

    public function klokout()
    {
        $date = Carbon::now()->format('Y-m-d');
        $clock = clock_times::where('emp_id', auth()->user()->employee->id)->where('Date', $date)->first();

        if ($clock) {
            $clock->time_out = Carbon::now()->format('H:i');
            $clock->update();

            return redirect()->route('dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function sickreport(Request $request)
    {

        //dd($request->all());

        $request->validate([
            'reason' => 'required',
            'date' => 'required|date',
        ]);

        $Schedule = Schedule::where('emp_id', auth()->user()->employee->id)->whereDate('Date', $request->date)->where('isSick', 0)->first();

        if ($Schedule) {
            $Schedule->isSick = 1;
            $Schedule->sick_reason = $request->reason;
            $Schedule->status = 4;
            $Schedule->update();

            return redirect()->route('employee.sick')->with('success', 'Aangemeld !.');

        } else {

            return redirect()->route('employee.sick')->with('error', 'Je bent niet ingepland op deze dag !.');
        }
    }

    public function Schedule()
    {
        return view('employee.scheduleemployee');
    }
}
