@extends('master')

@section('content')


<!--Modal Start-->


<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add</button>

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
      <form action="{{route ('store.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <select name="products_id" id="" class="form-control">
                <option value="">--Select Product</option>

                @foreach ($product_types as $product_types)
                  <option  value="{{ $product_types->id}}">{{ $product_types->product}}</option>
                @endforeach
              </select>
                @error('product_type')
                   <strong class="text-danger">{{$message}}</strong>
               @enderror
            </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Model No</label>
            <input class="form-control" name="model_no"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Details</label>
            <textarea class="form-control" name="product_details"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Product Sl No</label>
            <input class="form-control" name="product_sl_no"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Vendor</label>
            <input class="form-control" name="vendor"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Purchase Date</label>
            <input class="form-control" type="date" name="purchase_date"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Challan No</label>
            <input class="form-control" name="challan_no"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Picture</label>
            <input class="form-control" type="file" name="picture"></input>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Others</label>
            <input class="form-control" name="others"></input>
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
                <h1>Products</h1>
            </div>

            <div class="card-body">
            <table class="table table-striped table table-bordered ">
                <thead class=" text-white" style="background-color: #06C7CD;">
                    <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Model No</th>
                    <th scope="col">Product Details</th>
                    <th scope="col">Product Sl No</th>
                    <th scope="col">Vendor</th>
                    <th scope="col">Purchase Date</th>
                    <th scope="col">Challan No</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Others</th>
                    <th scope="col">Action</th>
                    <th scope="col">Stutus</th>
                    </tr>
                </thead>

                <thead>

                <tr>
                @foreach ($stores as $key=>$stores)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$stores->rel_to_producttypes->product??''}}</td>
                        <td>{{$stores->model_no}}</td>
                        <td>{{$stores->product_details}}</td>
                        <td>{{$stores->product_sl_no}}</td>
                        <td>{{$stores->vendor}}</td>
                        <td>{{$stores->purchase_date}}</td>
                        <td>{{$stores->challan_no}}</td>
                        <td><img width="50" src="{{asset('uploads/store')}}/{{$stores->picture}}" alt=""></td>
                        <td>{{$stores->others}}</td>
                        </td>
                        <td>
                          <a href="{{route('store.delete', $stores->id)}}" class=""><span class="material-icons">delete</span></a>
                          <a href="{{route ('store.edit', $stores->id)}}" class=""><span class="material-icons">edit</span></a>
                          <a href="{{route ('store.view', $stores->id)}}" class=""><span class="material-icons">visibility</span></a>
                        </td>
                        <td>
<!--Status Start-->                      
                            <?php
                              if($stores->status == '1'){?>
                                  <a href="{{route('issue', $stores->id)}}" class="btn btn-success">Issue</a>
                            <?php }else{ ?>
                                    <a href="{{route('store.status', $stores->id)}}" class="btn btn-danger">Return</a>
                            <?php } ?>
                        </td>
                    </tr>
<!--Status End-->  
                @endforeach
                </tr>

                </thead>

                </table>
            </div>
        </div>
    </div>
</div>

  <!-- Ajax code -->







<!--display form end-->





@endsection