@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Team</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Universiti Kuala Lumpur</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="class col-sm-3">
                            <img style="width:60px;height:60px" src="{{$team->photo ? $team->photo->file : '/images/blankUser.png'}}" class="img-responsive">
                        </div>

                        <div class="card-body">
                            {!! Form::model($team, ['method' => 'PATCH', 'action' => ['AdminTeamsController@update', $team->id], 'files'=>true]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Team Name: ') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter team name']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('event_id', 'Event: ') !!}
                                {!! Form::select('event_id', [''=>'Choose Event'] + $events, null,  ['class'=>'form-control']) !!}
                            </div>

                            <br>

                            <div class="form-group">
                                {!! Form::label('photo_id', 'Photo: ') !!}
                                {!! Form::file('photo_id') !!}
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('includes.file_errors')

@endsection






