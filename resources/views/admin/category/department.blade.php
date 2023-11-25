@extends('master')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <h3>Department List</h3>
                </div>
                <div class="card-body">
                <table class="table table-striped">
            <tr>
                <th>SL</th>
                <th>Department Name</th>
                <th>Action</th>
            </tr>


            @if (session ('delete_department'))
                    <div class="alert alert-success">{{ session('delete_department') }}</div>
                @endif

            
            @foreach($all_departments as $key=>$department)
               <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$department->department_name}}</td>
                    <td><a href="{{ route ('department.delete', $department->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach


        </table>
                </div>
            </div>
        </div>
       
    </div>
    <div class="col-lg-4">
        <div class="car">
            <div class="card">
                <div class="card-header bg-primary ">
                    <h3 class="text-white">Add Department</h3>
                </div>
                <div class="card-body">
                    <form action="{{route ('department.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Department_name</label>
                            <input type="text" class="form-control" name="department_name">

                            @error('department_name')
                                <strong>{{$message}}</strong>

                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

