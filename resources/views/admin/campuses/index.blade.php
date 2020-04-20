@extends('layouts.admin')

@section('content')
<h1 style="padding:20px">Campus</h1>
@if(Session::has('deleted_campus'))
    <p style="padding:20px" class="bg-danger">{{session('deleted_campus')}}</p>
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
                    <th>Campus Fullname</th>
                    <th style="width: 10px">Shortname</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($campuses)
                    @foreach($campuses as $campus)
                <tr>
                    <td>{{$campus->id}}</td>
                    <td>{{$campus->fullname}}</td>
                    <td class="text-center">{{$campus->shortname}}</td>
                    <td><button  class="btn btn-primary" onclick="location.href='{{route('admin.campuses.show', $campus->id)}}'">View</button> </td>
                    <td><button type="button" class="btn btn-success" onclick="location.href='{{route('admin.campuses.edit', $campus->id)}}'">Edit</button> </td>
                    <td>
                        {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminCampusesController@destroy', $campus->id]]) !!}

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
