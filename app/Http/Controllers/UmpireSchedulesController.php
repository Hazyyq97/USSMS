<?php

namespace App\Http\Controllers;




use App\Event;
use App\Schedule;
use App\Sport;
use App\Umpire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UmpireSchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('umpire.schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sports = Umpire::with('sports')->get();
       $events = Umpire::with('events')->get();
       $getEventId = Umpire::with('events')->first();
       $eventId = $getEventId->id;
       $teams = Event::findOrFail($eventId);
       $selectedTeams = $teams->teams->all();

       return view('umpire.schedules.create' , compact('sports', 'events', 'selectedTeams'));




    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Schedule::create($request->all());
        return redirect('umpire/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);

        $getEventId = Umpire::with('events')->first();
        $eventId = $getEventId->id;
        $teams = Event::findOrFail($eventId);
        $selectedTeams = $teams->teams->all();

        return view('umpire.schedules.edit', compact('schedule', 'selectedTeams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        Schedule::whereId($id)->first()->update($input);
        return redirect('umpire/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Schedule::findOrFail($id)->delete();
        Session::flash('deleted_schedule', 'The schedule has been deleted');
        return redirect('umpire/schedules');
    }
}
