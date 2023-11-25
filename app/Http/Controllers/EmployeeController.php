<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class EmployeeController extends Controller
{
    //
    function employee(){
        $product_types = ProductType::all();
        $departments = Department::all();
        $designation = designation::all();
        $employees = Employee::all();
        return view('admin.employee.employee_list',[
            'product_types'=>$product_types,
            'departments'=>$departments,
            'designation'=>$designation,
            'employees' =>$employees,

        ]);
    }
    function employee_store(Request $request){
        Employee::insert([
            'emp_id'=>$request->emp_id,
            'emp_name'=>$request->emp_name,
            'department_id'=>$request->department_id,
            'designation_id'=>$request->designation_id,
            'join_date'=>$request->join_date,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
        ]);
        return back();

}
    function employee_edit($employees_id){
        $departments = Department::all();
        $designation = designation::all();
        $employees = Employee::all();
        $employees_info = Employee::find($employees_id);
        return view ('admin.employee.employee_edit', [
            'employees_info'=>$employees_info,
            'employees'=>$employees,
            'departments'=>$departments,
            'designation'=>$designation,
        ]);
    }



//Edit end
  
//autofill start
    function search_by_id(Request $request){
        $emp_details = Employee::where('emp_id',$request->emp_id)->first();
        return json_encode($emp_details,);    
    }
//autofill end



    


}

