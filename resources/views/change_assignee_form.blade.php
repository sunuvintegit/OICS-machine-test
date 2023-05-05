@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change Assignee') }}</div>

                <div class="card-body">
               
                   
                <form id="change_assignee_form" method="POST" action="{{ route('changeAssignee') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="employee" class="col-md-4 col-form-label text-md-end">{{ __('Select Employee') }}</label>
                            <div class="col-md-6">
                               <select class="form-control @error('employee') is-invalid @enderror" id="employee" name="employee">
                               <option value="">Select Employee</option>
                               @foreach($employees as $e)
                                <option value="{{$e->id}}">{{$e->name}}</option>
                                @endforeach
                               </select>

                                @error('employee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br><br>
                            <input type="hidden" id="task_id" value="{{$task_id}}" name="task_id"><br><br>

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


@endsection
