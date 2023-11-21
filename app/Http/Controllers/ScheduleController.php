<?php

namespace App\Http\Controllers;

use App\Models\shifts;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {

        return view('admin.schedule')->with('shifts', shifts::all());

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|min:3|max:32|alpha_dash|unique:'.shifts::class.',name',
            'time_in' => 'required|date_format:H:i|before:time_out',
            'time_out' => 'required|date_format:H:i',
        ], [
            'name.required' => 'Naam is verplicht',
            'name.string' => 'Naam is niet geldig',
            'name.min' => 'Naam moet minimaal 3 karakters bevatten',
            'name.max' => 'Naam moet Max 32 karakters bevatten',
            'name.alpha_dash' => 'Naam mag geen spatie bevatten',
            'name.unique' => 'Naam bestaat al',

            'time_in.required' => 'begintijd is verplicht',
            'time_in.before' => 'begintijd mag niet later zijn dan eindtijd',
            'time_out.required' => 'eindtijd is verplicht',

        ]

        );

        $shifts = new shifts();
        $shifts->name = $request->name;
        $shifts->time_in = $request->time_in;
        $shifts->time_out = $request->time_out;
        $shifts->save();

        return redirect()->route('shift.index')->with('success', 'De werktijd is toegevoegd !.');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|min:3|max:32|alpha_dash',
            'time_in' => 'before:time_out',

        ], [
            'name.required' => 'Naam is verplicht',
            'name.string' => 'Naam is niet geldig',
            'name.min' => 'Naam moet minimaal 3 karakters bevatten',
            'name.max' => 'Naam moet Max 32 karakters bevatten',
            'name.alpha_dash' => 'Naam mag geen spatie bevatten',
            'name.unique' => 'Naam bestaat al',

            'time_in.required' => 'begintijd is verplicht',
            'time_in.before' => 'begintijd mag niet later zijn dan eindtijd',
            'time_out.required' => 'eindtijd is verplicht',

        ]

        );
        $shifts = shifts::find($id);
        if ($request->all()) {

            $shifts->name = $request->name;
            $shifts->time_in = $request->time_in;
            $shifts->time_out = $request->time_out;
            $shifts->save();

            return redirect()->route('shift.index')->with('success', 'Werktijd is aangepast !.');
        } else {

            return redirect()->route('shift.index');
        }

    }

    public function destroy($id)
    {

        $shifts = shifts::find($id);
        $shifts->delete();

        return redirect()->route('shift.index')->with('success', 'Werktijd is verwijderd !.');

    }
}
