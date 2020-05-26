@extends('layouts.umpire')

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Result </h1>
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

                        <br class="card-body">

                            {!! Form::open(['method' => 'POST', 'action' => 'UmpireResultsController@store']) !!}

                            <div class="form-group">
                                {!! Form::label('', 'Sport: ') !!}

                                <select name="sport_id" class="form-control"  >
                                    @foreach ($sports as $sport)
                                        <option value="{{ $sport->sports->id}}"

                                        >
                                            {{ $sport->sports->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                {!! Form::label('', 'Event: ') !!}

                                <select name="event_id" class="form-control"  >
                                    @foreach ($events as $event)
                                        <option value="{{ $event->events->id }}"
                                        >
                                            {{ $event->events->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Participant Team: ') !!}
                                <select name="teamA" class="form-control"  >
                                    @foreach ($selectedTeams as $selectedTeam)
                                        <option value="{{ $selectedTeam->id }}"
                                        >
                                            {{ $selectedTeam->name }}
                                        </option>
                                    @endforeach
                                </select>
                                vs
                                <select name="teamB" class="form-control"  >
                                    @foreach ($selectedTeams as $selectedTeam)
                                        <option value="{{ $selectedTeam->id }}"
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
                                {!! Form::label('name[]', 'Add/Remove Game Set: ') !!}
                                <button type="button" name="add" id="add" class="btn btn-success">+</button>
                            </div>

                            <div id ='dynamic_field'>
                            </div>

                        </br>
                            <div class="form-group">
                                {!! Form::label('', 'Game Point: ') !!}
                                {!! Form::text('game_pointA', null) !!} :  {!! Form::text('game_pointB', null) !!}
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
        $(document).ready(function(){
            var i=0;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="a_set'+i+'" placeholder="Team A Set '+ i + '"   class=""/></td>  <td> VS </td> <td><input type="text" name="b_set'+i+'" placeholder="Team B Set '+ i + '"   class=""/></td><td><button type="button" name="remove" id="'+i+'" class="btn-danger btn_remove" >X</button></td></tr></br>');
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
            // $('#submit').click(function(){
            //     $.ajax({
            //         // url:"name.php",
            //         method:"POST",
            //         data:$('#add_name').serialize(),
            //         success:function(data)
            //         {
            //             alert(data);
            //             $('#add_name')[0].reset();
            //         }
            //     });
            // });
        });
    </script>
@endsection






