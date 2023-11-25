@extends('master')

@section('content')


<!--Modal Start-->


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route ('employee.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="message-text" class="col-form-label">Employee id</label>
            <input class="form-control" name="emp_id"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Employee Name</label>
            <input class="form-control" name="emp_name"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Department</label>
            <input class="form-control" type="text" name="department_id"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Designation</label>
            <input class="form-control" type="text" name="designation_id"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Joining Date</label>
            <input class="form-control" type="date" name="join_date"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Phone Number</label>
            <input class="form-control" type="number" name="phone_number"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email</label>
            <input class="form-control" type="email"  name="email"></input>
          </div>

          <button  class="btn btn-primary">Submit</button>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Modal end-->

<!--display form start-->


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h1>Employee List</h1>
            </div>

            <div class="card-body">
            <table class="table table-striped table table-bordered ">
                <thead class="bg-info text-white">
                    <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Employee id</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Department</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>

                <thead>
                @foreach ($employees as $key=>$employees)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$employees->emp_id}}</td>
                        <td>{{$employees->emp_name}}</td>
                        <td>{{$employees->department_id}}</td>
                        <td>{{$employees->designation_id}}</td>
                        <td>{{$employees->join_date}}</td>
                        <td>{{$employees->phone_number}}</td>
                        <td>{{$employees->email}}</td>
                        <td>
                            <a href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            <a href="{{route ('employee.edit', $employees->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-edit"></i></a>
                            <a href="" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-eye"></i></a>
                        </td>
                        
                    </tr>

                @endforeach
                </thead>

                </table>
            </div>
        </div>
    </div>
</div>

  <!-- Ajax code -->







<!--display form end-->





@endsection