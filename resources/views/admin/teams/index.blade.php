@extends('layouts.admin')

@section('content')
    <h1 style="padding:20px">Team</h1>
    @if(Session::has('deleted_team'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_team')}}</p>
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
                    <th>Picture</th>
                    <th>Team Name</th>
                    <th>Event</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($teams)
                    @foreach($teams as $team)
                        <tr>
                            <td>{{$team->id}}</td>
                            <td><img style="width:60px;height:60px" src="{{$team->photo ? $team->photo->file : '/images/blankUser.png'}}"></td>
                            <td>{{$team->name}}</td>
                            <td>{{$team->event ? $team->event->name : 'No Event'}}</td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('admin.teams.edit', $team->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminTeamsController@destroy', $team->id]]) !!}

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
