@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<br>
    <a href="{{route('addEmployeeForm')}}" class="btn btn-success" id="addemployee" style="width:250px;">Add Employee</a>

    <a href="{{route('addTaskForm')}}" class="btn btn-success" id="addTask" style="width:250px;">Add Task</a>
<br><br>
    <div class="container">
    <b>Employee Details</b>

    <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Name</th>

<th>Email</th>

<th>Mobile</th>

<th>Department</th>

<th>Status</th>

<th>Actions</th>

</tr>

</thead>

<tbody>


@foreach($employees as $e)

<tr>

<td>{{ $e->id }}</td>

<td>{{ $e->name }}</td>

<td>{{ $e->email }}</td>

<td>{{ $e->mobile_no }}</td>

<td>{{ $e->department }}</td>

<td>{{ $e->status }}</td>


<td><a class="btn btn-success" href="{{ route('Employees.edit',$e->id) }}">Edit</a></td>
    
<td> <a class="btn btn-danger" href="{{ route('Employees.delete',$e->id) }}">Delete</a</td>

<td> <a class="btn btn-success" href="{{ route('Employees.assignTaskForm',$e->id) }}">Assign Task</button></td>


</tr>

@endforeach

</tbody>

</table>
</div>


<!-- Task details -->
<br><br>
<div class="container">
    <b>Task Details</b>

    <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Title</th>

<th>Description</th>

<th>Status</th>

<th>Assigned To</th>

<th>Actions</th>

<th>Work Status</th>

<th>Change Assignee</th>




</tr>

</thead>

<tbody>


@foreach($tasks as $t)

<tr>

<td>{{ $t->id }}</td>

<td>{{ $t->title }}</td>

<td>{{ $t->description }}</td>

<td>{{ $t->status}}</td>

<td>{{ $t->employee == null ? '' : $t->employee->name }}</td>

<td><a class="btn btn-success" href="{{ route('Tasks.edit',$t->id) }}">Edit</a></td>
@if($t->status !== 'Unassigned')
<td><a class="btn btn-success" href="{{ route('Tasks.work_status', ['id' => $t->id, 'status' => 'InProgress']) }}">In Progress</a>
<a class="btn btn-success" href="{{ route('Tasks.work_status', ['id' => $t->id, 'status' => 'Done'])}}">Done</a></td>

<td><a class="btn btn-success" href="{{ route('Tasks.changeAssignee',$t->id) }}">Change Assignee</a></td>
@endif






</tr>

@endforeach

</tbody>

</table>
</div>




<div class="modal fade" id="taskAssignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form id="task_assign_form" method="POST" action="{{ route('assignTask') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="task" class="col-md-4 col-form-label text-md-end">{{ __('Select Task') }}</label>
                            <div class="col-md-6">
                               <select class="form-control @error('task') is-invalid @enderror" id="task" name="task">
                               <option value="">Select Task</option>
                               @foreach($tasks as $t)
                                <option value="{{$t->id}}">{{$t->title}}</option>
                                @endforeach
                               </select>

                                @error('task')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Assign') }}
                                </button>

                            </div>
                        </div>
                            
</form>
                        </div>


      </div>
      
    </div>
  </div>
</div>




<script type="text/javascript">
    
    $(document).ready(function(e)
    {

        


     

     

       


    });

  
</script>
@endsection


