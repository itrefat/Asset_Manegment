<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\ProductType;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use App\Models\Desktop;
use Illuminate\Support\Facades\DB;



class StoreController extends Controller
{
    function store(Request $request){  
        $search = $request['search']??'';
        if ($search !==""){
            $stores = Store::where('model_no', 'LIKE', "%$search%")->orwhere('product_sl_no', 'LIKE', "%$search%")->get();
        }
        else{
            $stores = Store::all();

        }

        $product_types = ProductType::all();
        return view('admin.store.store_list',[
            'stores'=>$stores,
            'product_types'=>$product_types,

        ]);
    }

    function store_store(Request $request){
        $picture_id = Store::insertGetId([
            'products_id'=>$request->products_id,
            'model_no'=>$request->model_no,
            'product_details'=>$request->product_details,
            'product_sl_no'=>$request->product_sl_no,
            'vendor'=>$request->vendor,
            'purchase_date'=>$request->purchase_date,
            'challan_no'=>$request->challan_no,
            'others'=>$request->others,
            'status'=>$request->status,
            'created_at'=>Carbon::now(),

        ]);

        $product_picture = $request->picture;
        $extension = $product_picture->getClientOriginalExtension();
        $file_name = $picture_id.'.'.$extension;

        Image::make($product_picture)->save(public_path('uploads/store/'.$file_name));

        Store::where('id', $picture_id)->update([
            'picture'=>$file_name,

        
        ]);
        return back();
    }
//delete start
    function store_delete ($stores_id){
        Store::find ($stores_id)->delete();
        return back ();
    }
//delete end


//Edit start

    function store_edit($stores_id){
        $stores = Store::all();
        $stores_info = Store::find($stores_id);
        $product_types = ProductType::all();
        return view ('admin.store.store_edit', [
            'stores_info'=>$stores_info,
            'stores'=>$stores,
            'product_types'=>$product_types,

        ]);
    }

//update
    function store_update(Request $request){
        if($request->picture ==''){
            Store::find($request->stores_id)->update([
            'model_no'=>$request->model_no,
            'product_details'=>$request->product_details,
            'product_sl_no'=>$request->product_sl_no,
            'vendor'=>$request->vendor,
            'purchase_date'=>$request->purchase_date,
            'challan_no'=>$request->challan_no,
            'others'=>$request->others,
            ]);
            
        }

        else{
            $image = Store::find($request->stores_id);
            $delete_from = public_path('uploads/store/'.$image->picture);
            unlink($delete_from);
  
            $picture = $request->picture;
            $extension = $picture->getClientOriginalExtension();
            $file_name = $request->stores_id.'.'.$extension;
            Image::make($picture)->save(public_path('uploads/store/'.$file_name));
            Store::find($request->stores_id)->update([
                'model_no'=>$request->model_no,
                'product_details'=>$request->product_details,
                'product_sl_no'=>$request->product_sl_no,
                'vendor'=>$request->vendor,
                'purchase_date'=>$request->purchase_date,
                'challan_no'=>$request->challan_no,
                'others'=>$request->others,

            ]);
            
           
        }
        return back();
    }
//Edit end


//view start
    function store_view($stores_id){
        $stores_info = Store::find($stores_id);
        return view ('admin.store.store_printview', [
            'stores_info'=>$stores_info,
        ]);
    }

//view end


    //issue start
    function issue ($stores_id){
        $product_types = ProductType::all();
        $departments = Department::all();
        $designation = designation::all();
        $stores = Store::all();
        $store_info = Store::find($stores_id);
        return view ('admin.store.issue', [
            'store_info'=>$store_info,
            'stores'=>$stores,
            'departments'=>$departments,
            'designation'=>$designation,
            'product_types'=>$product_types,


        ]);
    }
    //issue end

    //status start
    function store_status($stores_id){
        $stores = DB::table('stores')->select('status')->where('id', '=', $stores_id)->first();
        if ($stores->status == '1'){
            $status = '0';
        }
        else{
            $status = '1';
        }

        //update Status
        $value = array('status' => $status);
        DB::table('stores')->where('id', $stores_id)->update($value);

        return back();
    }
    //status end


}