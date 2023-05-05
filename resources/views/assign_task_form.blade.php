@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Tasks') }}</div>

                <div class="card-body">
               
                   
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
                            <input type="hidden" id="employee_id" value="{{$employee_id}}" name="employee_id"><br><br>

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
