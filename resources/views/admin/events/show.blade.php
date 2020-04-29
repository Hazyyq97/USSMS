@extends('layouts.admin')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event Detail</h1>
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
                            <h3 class="card-title">Sport Carnival Event</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <div class="card-body">
                                    <div class="class col-sm-3">
                                        <img style="width:60px;height:60px" src="{{$event->photo ? $event->photo->file : '/images/blankUser.png'}}" class="img-responsive">
                                    </div>
                                    <table class="table table-unbordered">
                                        <tbody>
                                        <tr>
                                            <td>Event Name: </td>
                                            <td><p class="text-primary">{{$event->name}} </p> </td>
                                        </tr>

                                        <tr>
                                            <td>Event Detail: </td>
                                            <td><p class="text-primary">{{$event->detail}} </p> </td>
                                        </tr>
                                        <tr>

                                            <td>Duration Of Event:  </td>
                                            <td><p class="text-primary">{{$event->date_range}}</p> </td>
                                        </tr>

                                        <tr>

                                            <td>Participant Team:  </td>
                                            <td>
                                                @foreach($event->teams as $team)
                                                    <p class="text-primary">{{$team->name}}</p>
                                                @endforeach
                                            </td>
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
