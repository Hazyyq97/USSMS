@extends('layouts.admin')

@section('content')
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>

    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Manager</h1>
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
                            {!! Form::open(['method' => 'POST', 'action' => 'AdminManagersController@store', 'files'=>true]) !!}

                            <div class="form-group">
                                {!! Form::label('name', 'Manager Name: ') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Enter manager name']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('email', 'Email: ') !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Enter manager email']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('password', 'Password: ') !!}
                                {!! Form::text('password', null, ['class'=>'form-control', 'placeholder'=>'Enter manager password']) !!}
                            </div>


                            <div class="form-group">
                                {!! Form::label('', 'Phone Number: ') !!}
                                {!! Form::text('phone_number', null, ['class'=>'form-control', 'placeholder'=>'Enter manager phone number']) !!}
                            </div>


                            <div class="form-group">
                                <select name="event" class="form-control">
                                    <option value="">--- Select Event ---</option>
                                    @foreach ($events as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Select Team:</label>
                                <select name="team" class="form-control">
                                </select>
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="event"]').on('change', function() {
                var eventID = $(this).val();
                if(eventID) {
                    $.ajax({
                        url:'/admin/managers/createa/ajax/'+eventID,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            $('select[name="team"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="team"]').append('<option value="'+ value +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="team"]').empty();
                }
            });
        });
    </script>

@endsection




