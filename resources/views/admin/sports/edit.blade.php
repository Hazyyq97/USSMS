@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Sport</h1>
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
                            {!! Form::model($sport, ['method' => 'PATCH', 'action' => ['AdminSportsController@update', $sport->id]]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Sport Name: ') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter sport name']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('event_id', 'Event: ') !!}
                                {!! Form::select('event_id', [''=>'Choose Event'] + $events, null,  ['class'=>'form-control']) !!}
                            </div>

                            <br>

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


@endsection





