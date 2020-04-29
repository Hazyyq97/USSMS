@extends('layouts.admin')

@section('content')
    <h1 style="padding:20px">Event</h1>
    @if(Session::has('deleted_event'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_event')}}</p>
    @endif
    <div class="card">
    {{--        <div class="card-header">--}}
    {{--            <h3 class="card-title"></h3>--}}
    {{--        </div>--}}
    <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Event Name</th>
                    <th>Organizer</th>
                    <th>Date Range</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($events)
                    @foreach($events as $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->campus ? $event->campus->shortname : 'No Organizer'}}</td>
                            <td>{{$event->date_range}}</td>

                            <td><button  class="btn btn-primary" onclick="location.href='{{route('admin.events.show', $event->id)}}'">View</button> </td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('admin.events.edit', $event->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminEventsController@destroy', $event->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>

                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>




@endsection
