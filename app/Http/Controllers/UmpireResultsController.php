<?php

namespace App\Http\Controllers;

use App\Event;
use App\Result;
use App\Umpire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class UmpireResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Result::all();
        return view('umpire.results.index', compact('results'));
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

        return view('umpire.results.create', compact('sports', 'events', 'selectedTeams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Result::create($input);

        return redirect('umpire/results');
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
        $result = Result::findOrfail($id);

        $sports = Umpire::with('sports')->get();
        $events = Umpire::with('events')->get();
        $getEventId = Umpire::with('events')->first();
        $eventId = $getEventId->id;
        $teams = Event::findOrFail($eventId);
        $selectedTeams = $teams->teams->all();

        return view('umpire.results.edit', compact('result' , 'sports', 'events' ,'selectedTeams'));
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
        $result = Result::findOrFail($id);
        $result->update($request->all());
        return redirect('umpire/results');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Result::findOrFail($id)->delete();
        Session::flash('deleted_result', 'The result has been deleted');
        return redirect('umpire/results');
    }
}
