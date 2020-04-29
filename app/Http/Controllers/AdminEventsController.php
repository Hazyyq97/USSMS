<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Event;
use App\Http\Requests\EventRequest;
use App\Photo;
use App\Sport;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campus::pluck('shortname', 'id')->all();
        $sports = Sport::pluck('name', 'id')->all();
        $teams = Team::pluck('name','id')->all();
        return view('admin.events.create', compact('campuses', 'teams', 'sports'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {

        $event = new Event(request(['name', 'detail', 'campus_id','date_range']));

        if($file= $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $event['photo_id'] = $photo->id;
        }

        $event->save();

        $event->teams()->attach(request('teams'));
        $event->sports()->attach(request('sports'));



        return redirect('admin/events');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('admin.events.show', compact('event'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $campuses = Campus::pluck('shortname', 'id')->all();
        return view('admin.events.edit', compact('event', 'campuses'));
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

        if($file= $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        Event::whereId($id)->first()->update($input);
        return redirect('admin/events');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        Session::flash('deleted_event', 'The event has been deleted');
        return redirect('admin/events');

    }
}
