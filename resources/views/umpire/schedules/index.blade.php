@extends('layouts.umpire')

@section('content')
    <h1 style="padding:20px">Schedules</h1>
    @if(Session::has('deleted_schedule'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_schedule')}}</p>
    @endif
    <div class="card">

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th>Sports</th>
                    <th>Date & Time</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($schedules)
                    @foreach($schedules as $schedule)
                        <tr>
                            <td>{{$schedule->id}}</td>
                            <td>{{$schedule->teamA}}</td>
                            <td>{{$schedule->teamB}}</td>
                            <td>{{$schedule->sports->name}}</td>
                            <td>{{$schedule->date_time}}</td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('umpire.schedules.edit', $schedule->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['UmpireSchedulesController@destroy', $schedule->id]]) !!}

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
