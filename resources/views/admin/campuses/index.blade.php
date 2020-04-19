@extends('layouts.admin')

@section('content')
<h1 style="padding:20px">Campus</h1>
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
                    <th>Campus Fullname</th>
                    <th style="width: 10px">Shortname</th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                    <th style="width: 10px"></th>
                </tr>
                </thead>
                <tbody>
                @if($campuses)
                    @foreach($campuses as $campus)
                <tr>
                    <td>{{$campus->id}}</td>
                    <td>{{$campus->fullname}}</td>
                    <td class="text-center">{{$campus->shortname}}</td>
                    <td><button  class="btn btn-primary">View</button> </td>
                    <td><button class="btn btn-success">Edit</button> </td>
                    <td><button class="btn btn-danger">Delete</button> </td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>




@endsection
