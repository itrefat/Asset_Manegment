@extends('master')

@section('content')


<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>Edit Products</h3>
            </div>
            <div class="card-body">
            <form action="{{route ('store.update')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div  class="mb-3">
                    <label class="form-label" for="" >Model No</label>
                    <input type="hidden" value="{{ $stores_info->id }}" name="stores_id">
                    <input type="text" class="form-control" value="{{ $stores_info->model_no }}"  name="model_no">
                </div>     
                <div>
                    <label class="form-label" for="">Product Details</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->product_details}}" name="product_details" id="">
                </div>
                <div>
                    <label class="form-label" for="">product_sl_no</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->product_sl_no}}" name="product_sl_no" id="">
                </div>
                <div>
                    <label class="form-label" for="">vendor</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->vendor}}" name="vendor" id="">
                </div>
                <div>
                    <label class="form-label" for="">purchase_date</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->purchase_date}}" name="purchase_date" id="">
                </div>
                <div>
                    <label class="form-label" for="">challan_no</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->challan_no}}" name="challan_no" id="">
                </div>
                <div>
                    <label class="form-label" for="">others</label>
                    <input type="hidden" value="{{$stores_info->id}}" name="stores_id" id="">
                    <input type="text" class="form-control" value="{{$stores_info->others}}" name="others" id="">
                </div>

                <div  class="mb-3">
                    <input type="file" name="picture" value=""  class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"> <img src="" id="blah" alt="" width="200">
                </div>
                <button  class="btn btn-primary">Submit</button>

       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

      </form>
            </div>
        </div>
    </div>
</div>



@endsection
