@extends('master')

@section('content')

<div class="container position-sticky z-index-sticky top-0">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-6 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="font-weight-bolder">Product Issue</h4>
                        <p class="mb-0">Enter All information to issue Product</p>
                    </div>
                    <div class="card-body">
                @foreach ($stores as $key=>$stores)
                <?php
                if($stores->status == '1'){?>
                    <form action="{{route('desktop.store', $stores->id)}}" method="POST" enctype="multipart/form-data" class="form-card" >
                <?php } ?>
                @endforeach
                  @csrf
                    <div class="row justify-content-between text-left">
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" value="{{ $store_info->id }}" name="products_id">
                            <input type="text" class="form-control" value="{{ $store_info->rel_to_producttypes->product??'' }}" name="products_id" placeholder="Aeet Tag">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" value="{{ $store_info->id }}" name="model_no">
                            <input type="text" class="form-control" value="{{ $store_info->model_no }}" name="products_id" placeholder="Aeet Type">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" value="" name="emp_id">
                            <input type="text" class="form-control" value="" id="emp_id" name="emp_id" placeholder="Employee ID">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" value="" name="emp_id">
                            <input type="date" class="form-control" id="" name="" placeholder="Issue Date">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" value="{{ $store_info->id }}" name="picture">
                            <input type="file" class="form-control" value="{{ $store_info->picture }}" id="picture" name="picture" placeholder="Picture">
                        </div>
                    </div>
                    <button  class="btn btn-lg bg-gradient-info btn-lg w-100 mt-4 mb-0" >Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



<!--ajax-->
<script type="text/javascript">
$(document).ready(function() {
    $('#emp_id').on('change', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var formData = {
            emp_id: $('#emp_id').val(),
        };
        $.ajax({
            type: "POST",
            url: "{{route('search.by.id')}}",
            data: formData,
            success: function(response)
            {

                var jsonData = JSON.parse(response);
                $('#emp_name').val(jsonData.emp_name);
                $('#phone_number').val(jsonData.phone_number);
                $('#designation_id').val(jsonData.designation_id);
                $('#department_id').val(jsonData.department_id);

 
                // // user is logged in successfully in the back-end 
                // // let's redirect 
                // if (jsonData.success == "1")
                // {
                //     location.href = 'my_profile.php';
                // }
                // else
                // {
                //     alert('Invalid Credentials!');
                // }
           }
       });
     });
});

</script>

@endsection
