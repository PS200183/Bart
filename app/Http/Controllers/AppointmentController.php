<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        // Retrieve all appointments
        if (auth()->user()->role == 'user') {
            $allAppointment = Appointments::where('user_id', auth()->user()->id)->get();

        } else {

            $allAppointment = Appointments::all();
        }

        // Get the current date
        $currentDate = Carbon::now();
        $startOfWeek = $currentDate->startOfWeek();

        // Calculate the end date of the current week (7 days from the start)
        $endOfWeek = $startOfWeek->copy()->addDays(6);

        // Retrieve appointments for the current week
        $currentWeekAppointments = Appointments::whereBetween('date', [$startOfWeek, $endOfWeek])->get();

        // Retrieve appointments for the current date
        $currentAppointment = Appointments::whereDate('date', $currentDate)->get();

        // Pass both sets of appointments to the view
        return view('appointments', [
            'allAppointments' => $allAppointment,
            'currentAppointments' => $currentAppointment,
            'currentWeekAppointments' => $currentWeekAppointments,
        ]);
    }

    public function delete($id)
    {
        $appointment = Appointments::find($id);
        if (! $appointment) {
            return redirect()->route('appointments')->with('error', 'appointment not found.');
        } else {
            $appointment->delete();

            return redirect()->route('appointments')->with('succes', 'Appointment deleted.');
        }
    }

    public function edit($id)
    {
        $appointment = Appointments::find($id);

        return view('edit', [
            'appointment' => $appointment,
        ]);
    }

    public function update($id, Request $request)
    {
        $appointment = Appointments::find($id);
        $appointment->name = $request->input('username');
        $appointment->services = $request->input('services');
        $appointment->time = $request->input('time');
        //$appointment->employee->firstname = $request->input('firstname');
        $appointment->update();

        return redirect()->route('appointments')->with('succes', 'Appointment deleted.');
    }

    public function create(Request $request)
    {

        $appointment = new Appointments();
        $appointment->user_id = auth()->user()->id;
        $appointment->name = $request->input('username');
        $appointment->services = $request->input('services');
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');

        $appointment->save();

        return redirect()->route('appointments')->with('succes', 'Appointment created.');

    }
}
