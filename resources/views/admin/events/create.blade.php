@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Event</h1>
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
                            {!! Form::open(['method' => 'POST', 'action' => 'AdminEventsController@store', 'files'=>true]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Event Name: ') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter event name']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('detail', 'Event Detail: ') !!}
                                {!! Form::textarea('detail', null, ['class'=>'form-control', 'placeholder'=>'Enter event detail', 'rows'=>'3']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('campus_id', 'Organizer: ') !!}
                                {!! Form::select('campus_id', [''=>'Choose Campus'] + $campuses, null,  ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('team[]', 'Team: ') !!}
                                {!! Form::select('teams[]',  $teams, null,  ['class'=>'form-control', 'multiple']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('sports[]', 'Sport: ') !!}
                                {!! Form::select('sports[]',  $sports, null,  ['class'=>'form-control', 'multiple']) !!}
                            </div>

                            <div class="form-group">
                                <i class="far fa-calendar-alt"></i>     {!! Form::label('date_range', 'Date Range: ') !!}
                                {!! Form::text('date_range', null, ['class'=>'form-control', 'placeholder'=>'Enter start date', 'id'=>'datepicker']) !!}
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

@section('scripts')
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <!-- InputMask -->
    <script src="../../plugins/moment/moment.min.js"></script>
    <script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
    <!-- date-range-picker -->
    <script src="../../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script>
        $(function() {
            $('#datepicker').daterangepicker();
        });

    </script>
@endsection




