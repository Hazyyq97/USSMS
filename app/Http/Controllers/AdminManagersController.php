<?php

namespace App\Http\Controllers;

use App\Event;
use App\Manager;
use App\Schedule;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminManagersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $managers= Manager::all();
        return view('admin.managers.index', compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $events = Event::pluck('name','id');
        return view('admin.managers.create', compact('events'));

    }

    public function teamAjax($id)
    {
        $events = Event::findOrFail($id);
        $teams = $events->teams->pluck('name','id');
        return json_encode($teams);
    }
    public function sportAjax($id)
    {
        $events = Event::findOrFail($id);
        $sports = $events->sports->pluck('name','id');
        return json_encode($sports);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
