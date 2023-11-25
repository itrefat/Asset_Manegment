@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3>User List ({{$total_user}})</h3>
                </div>

                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile_photo</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($users as $key=>$user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td><a href="{{route ('users.delete', $user->id)}}" class="btn btn-danger">Delete</a></td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection