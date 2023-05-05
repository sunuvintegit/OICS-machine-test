<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    //

    public function addTaskForm()
    {
        return view('task_form');
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',

         ]);
  
        //  Store data in database
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
       
        if($task->save()){
            return redirect()->route('home')->with('success', 'Your task has been added.');
        }else{
            return false;
        }
    }

    public function assignTaskForm(Request $request,$id)
    {
       $employee_id = $id;
       $tasks = Task::all();
       return view('assign_task_form',compact('employee_id','tasks'));
    }

    public function assignTask(Request $request)
    {
        $request->validate([
            'task' => 'required',
         ]);
  
        //  Store data in database
       $task_id = $request->task;
       $task = Task::find($task_id);
       $task->status = 'Assigned';
       $task->assigned_to = $request->employee_id;
       if($task->save())
       {
        return redirect()->route('home')->with('success', 'Task assigned successfully.');
       }
    }

    public function editTask(Request $request,$id)
    {

        $task = Task::find($id);
        return view('task_form',compact('task'));
    }


    public function updateTask(Request $request,$id)
    {

        $task = Task::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        if($task->save())
        {
            return redirect()->route('home')->with('success', 'Task updated successfully.');
        }
    }

    public function changeAssigneeForm(Request $request,$id)
    {
        $task_id = $id;
        $employees = Employee::all();
        return view('change_assignee_form',compact('task_id','employees'));
    }

    public function changeAssignee(Request $request)
    {

        $task_id = $request->task_id;
        $employee_id = $request->employee;
        $task = Task::find($task_id);
        $task->assigned_to = $employee_id;
        if($task->save())
        {
            return redirect()->route('home')->with('success', 'Assignee has been changed successfully.');
        }
    }

    public function workStatus($id,$status)
    {
      $task = Task::find($id);
      $task->status = $status;
      if($task->save()){
        return redirect()->route('home')->with('success', 'Task Status has been Updated.');
      }    
    }
    
}

