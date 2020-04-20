<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class AdminSportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();
        return view('admin.sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::pluck('name', 'id')->all();
        return view('admin.sports.create', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sport::create($request->all());
        return redirect('admin/sports');
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
        $sport = Sport::findOrFail($id);
        $events = Event::pluck('name', 'id')->all();
        return view('admin.sports.edit', compact('sport','events'));
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
        $sport = Sport::findOrFail($id);
        $sport->update($request->all());
        return redirect('admin/sports');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sport::findOrFail($id)->delete();
        Session::flash('deleted_sport', 'The sport has been deleted');
        return redirect('admin/sports');
    }
}
