@extends('layouts.admin')

@section('content')
    <h1 style="padding:20px">Sport</h1>
    @if(Session::has('deleted_sport'))
        <p style="padding:20px" class="bg-danger">{{session('deleted_sport')}}</p>
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
                    <th>Sport Name</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($sports)
                    @foreach($sports as $sport)
                        <tr>
                            <td>{{$sport->id}}</td>
                            <td>{{$sport->name}}</td>
                            <td><button type="button" class="btn btn-success" onclick="location.href='{{route('admin.sports.edit', $sport->id)}}'">Edit</button> </td>
                            <td>
                                {!! Form::open( ['method' => 'DELETE', 'action' => ['AdminSportsController@destroy', $sport->id]]) !!}

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
