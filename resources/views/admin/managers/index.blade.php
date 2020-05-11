@extends('layouts.admin')

@section('content')
    <h1 style="padding:20px">Manager</h1>
    @if(Session::has('deleted_event'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_event')}}</p>
    @endif
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Manager Name</th>
                    <th>Event</th>
                    <th>Team</th>
                    <th>Sport</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($managers)
                    @foreach($managers as $manager)
                        <tr>
                            <td>{{$manager->id}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->event ? $manager->event->name : 'No event'}}</td>
                            <td>{{$manager->team ? $manager->team->name : 'No Team'}}</td>
                            <td>{{$manager->sport ? $manager->sport->name : 'No Team'}}</td>


                            <td><button  class="btn btn-primary" onclick="location.href='{{route('admin.managers.show', $manager->id)}}'">View</button> </td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('admin.managers.edit', $manager->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminManagersController@destroy', $manager->id]]) !!}

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
