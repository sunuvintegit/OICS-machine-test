<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeController extends Controller
{
    //
    

    public function createEmployeeForm(Request $request)
    {
       return view('Employee_form');
    }

    public function createEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile_no'=>'required|numeric|digits:10',
            'department' => 'required',
         ]);
  
        //  Store data in database
        $insert = Employee::create($request->all());
        if($insert){
            return redirect()->route('home')->with('success', 'Your form has been submitted.');
        }else{
            return false;
        }
      
    }

    public function editEmployee(Request $request,$id)
    {
        $employee = Employee::find($id);
        return view('Employee_form',compact('employee'));
         
    }

    public function updateEmployee(Request $request,$id)
    {
       
        $Employee = Employee::find($id);
        $Employee->name =$request->name;
        $Employee->email =$request->email;
        $Employee->mobile_no =$request->mobile_no;
        $Employee->department =$request->department;
        $Employee->status =$request->status;
        $Employee->save();
        return redirect()->route('home')->with('success','Employee Details Updated successfully');
         
    }

    public function deleteEmployee(Request $request,$id)
    {
       
        $Employee = Employee::find($id);
        
        $Employee->delete();
        return redirect()->route('home')->with('success','Employee Details Deleted successfully');
         
    }
        

       
}
