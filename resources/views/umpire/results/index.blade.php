@extends('layouts.umpire')

@section('content')
    <h1 style="padding:20px">Result</h1>
    @if(Session::has('deleted_result'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_result')}}</p>
    @endif
    <div class="card">

        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Sports</th>
                    <th>Category</th>
                    <th>Team A</th>
                    <th>Team B</th>
                    <th class="text-center">Game Point</th>
                    <th>Create at</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($results)
                    @foreach($results as $result)
                        <tr>
                            <td>{{$result->id}}</td>
                            <td>{{$result->sports->name}}</td>
                            <td> {{$result->category}}</td>
                            <td>  <img style="width:60px;height:60px" src="{{$result->team->photo ? $result->team->photo->file : '/images/blankUser.png'}}" class="img-responsive" alt="">  {{$result->team->name}}</td>
                            <td> <img style="width:60px;height:60px" src="{{$result->teams->photo ? $result->teams->photo->file : '/images/blankUser.png'}}" class="img-responsive">   {{$result->teams->name}}</td>
                            <td class="text-center">{{$result->game_pointA}} : {{$result->game_pointB}}</td>
                            <td>{{$result->created_at}}</td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('umpire.results.edit', $result->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['UmpireResultsController@destroy', $result->id]]) !!}

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
