<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\ProductType;
use Carbon\Carbon;


class CategoryController extends Controller
{
    function department (){
        $all_departments = Department::all();
        return view('admin.category.department', [
            'all_departments'=>$all_departments,
        ]);
    }

    function department_store(Request $request){
        department::insert([
             'department_name'=>$request->department_name,
             'created_at'=>Carbon::now(),
  
        ]);
        return back();

    }

    function department_delete($department_id){
        department::find($department_id)->delete();
        return back()->with('delete_department', 'Department delete success');
     }

     
   //designation
   function designation (){
    $all_designations= Designation::all();
    return view('admin.category.designation',[
        'all_designations'=>$all_designations,
    ]);
    }

    function designation_store (Request $request){
        designation::insert([
            'designation_name'=>$request->designation_name,
            'created_at'=>Carbon::now(),
        ]);
    return back();
    }
    function designation_delete($esignation_id){
        designation::find($esignation_id)->delete();
        return back()->with('delete_designation', 'Designation delete success');
    }

      //product Type
      function product_type(){
        $all_producttypes= ProductType::all();
        return view ('admin.category.producttype',[
            'all_producttypes'=>$all_producttypes,
        ]);
     }

     function product_type_store(Request $request){
        ProductType::insert([
            'product'=>$request->product,
            'created_at'=>Carbon::now(),
        ]);
     return back();

     }

     function product_type_delete($ProductType_id){
        ProductType::find($ProductType_id)->delete();
        return back()->with('delete_producttype', 'ProductType delete success');
        
     }

}
