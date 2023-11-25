@extends('master')

@section('content')


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Designation List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>

                @if (session ('delete_designation'))
                    <div class="alert alert-success">{{ session('delete_designation') }}</div>
                @endif

                    @foreach($all_designations as $key=>$designation)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$designation->designation_name}}</td>
                        <td><a href="{{ route ('designation.delete', $designation->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>

            @endforeach
                    <tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Add Designation</h3>
            </div>
            
            <div class="card-body">
                <form action="{{route ('designation.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Designation</label>
                        <input type="text" class="form-control" name="designation_name">
                        
                        @error('designation_name')
                                <strong>{{$message}}</strong>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">submit</button>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

@endsection