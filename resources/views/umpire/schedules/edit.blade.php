@extends('layouts.umpire')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Schedule</h1>
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

                        <div class="card-body">
                            {!! Form::model($schedule, ['method' => 'PATCH', 'action' => ['UmpireSchedulesController@update', $schedule->id]]) !!}


                            <div class="form-group">
                                {!! Form::label('title', 'Participant Team: ') !!}
                                <select name="teamA" class="form-control"  >
                                    @foreach ($selectedTeams as $selectedTeam)
                                        <option value="{{ $selectedTeam->name }}"
                                        >
                                            {{ $selectedTeam->name }}
                                        </option>
                                    @endforeach
                                </select>
                                vs
                                <select name="teamB" class="form-control"  >
                                    @foreach ($selectedTeams as $selectedTeam)
                                        <option value="{{ $selectedTeam->name }}"
                                        >
                                            {{ $selectedTeam->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                {!! Form::label('', 'Date And Time: ') !!}
                                {!! Form::date('date_time', null) !!}

                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Venue: ') !!}
                                {!! Form::text('', null, ['class'=>'form-control']) !!}
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






