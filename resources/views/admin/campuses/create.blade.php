    @extends('layouts.admin')

    @section('content')
        <!-- Content Wrapper. Contains page content -->

            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Campus</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Validation</li>
                            </ol>
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
                                        {!! Form::open(['method' => 'POST', 'action' => 'AdminCampusesController@store']) !!}

                                            <div class="form-group">
                                                {!! Form::label('fullname', 'Campus Full Name: ') !!}
                                                {!! Form::text('fullname', null, ['class'=>'form-control', 'placeholder'=>'Enter campus full name']) !!}
                                            </div>

                                        <div class="form-group">
                                            {!! Form::label('shortname', 'Campus Short Name: ') !!}
                                            {!! Form::text('shortname', null, ['class'=>'form-control', 'placeholder'=>'Enter campus short name']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('phonenumber', 'Phone Number: ') !!}
                                            {!! Form::text('phonenumber', null, ['class'=>'form-control', 'placeholder'=>'Enter campus phone number']) !!}
                                        </div>

                                        <div class="form-group">
                                            {!! Form::label('address', 'Address: ') !!}
                                            {!! Form::textarea('address', null, ['class'=>'form-control', 'placeholder'=>'Enter campus address', 'rows'=>'3']) !!}
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


