@extends('master')

@section('content')


<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit Products</h3>
            </div>
            <div class="card-body">
            @foreach ($employees as $key=>$employees)
                <?php ?>
            <form action="{{route('employee.status', $employees->id)}}" method="POST" enctype="multipart/form-data">
            <?php ?>
                
                @endforeach
                @csrf

                <div  class="mb-3">
                    <label class="form-label" for="" >Employee ID</label>
                    <input type="hidden" value="{{ $employees_info->id }}" name="emp_id">
                    <input type="text" class="form-control" value="{{ $employees_info->emp_id }}"  name="emp_id">
                </div>  
                <div  class="mb-3">
                    <label class="form-label" for="" >Employee Name</label>
                    <input type="hidden" value="{{ $employees_info->id }}" name="emp_name">
                    <input type="text" class="form-control" value="{{ $employees_info->emp_name }}"  name="emp_name">
                </div>  
                <div  class="mb-3">
                    <label class="form-label" for="" >Joining Date</label>
                    <input type="hidden" value="{{ $employees_info->id }}" name="join_date">
                    <input type="text" class="form-control" value="{{ $employees_info->join_date }}"  name="join_date">
                </div>     
                <div  class="mb-3">
                    <label class="form-label" for="" >Phone Number</label>
                    <input type="hidden" value="{{ $employees_info->id }}" name="phone_number">
                    <input type="text" class="form-control" value="{{ $employees_info->phone_number }}"  name="phone_number">
                </div>   
                <div  class="mb-3">
                    <label class="form-label" for="" >Email</label>
                    <input type="hidden" value="{{ $employees_info->id }}" name="phone_number">
                    <input type="text" class="form-control" value="{{ $employees_info->email }}"  name="email">
                </div>   

                <button>submit</button>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>

            </div>
        </div>
    </div>
</div>



@endsection
