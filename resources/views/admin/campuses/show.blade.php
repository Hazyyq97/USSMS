@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Campus Detail</h1>
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
                            <h3 class="card-title">{{$campus->shortname}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <div class="card-body">
                                    <table class="table table-unbordered">
                                        <tbody>
                                        <tr>
                                            <td>Campus Full Name: </td>
                                            <td><p class="text-primary">{{$campus->fullname}} </p> </td>
                                        </tr>
                                        <tr>

                                            <td>Campus Phone Number: </td>
                                            <td><p class="text-primary">{{$campus->phonenumber}}</p> </td>
                                        </tr>
                                        <tr>

                                            <td>Campus Address</td>
                                            <td><p class="text-primary">{{$campus->address}}</p> </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn-primary" onclick="location.href='{{route('admin.campuses.index')}}'">Back</button>
                        </div>


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
