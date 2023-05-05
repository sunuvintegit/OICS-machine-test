@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register employee') }}</div>
                <div class="card-body">
                    @if(isset($employee))
                    <form method="POST" id="employee_update" action="{{route('Employees.update',$employee->id)}}">
                    @endif
                    <form method="POST" id="employee_add" action="{{route('addEmployee')}}">
                       @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($employee->name)?$employee->name : old('name')}}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($employee->email)?$employee->email : old('email')}}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                            <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{isset($employee->mobile_no)?$employee->mobile_no : old('mobile_no')}}"  autocomplete="mobile_no" autofocus>
                                @error('mobile_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     

                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('department') is-invalid @enderror" id="department" name="department">
                               <option value="">Select a Department</option>
                               
                                <option value="Sales" @if(@$employee->department == 'Sales') selected @endif>Sales</option>
                                <option value="Marketing" @if(@$employee->department == 'Marketing') selected @endif>Marketing</option>
                                <option value="IT" @if(@$employee->department == 'IT') selected @endif>IT</option>
                               </select>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if(isset($employee))
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                               <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                               <option value="">Select Status</option>
                               
                                <option value="Active" @if(@$employee->status == 'Active') selected @endif>Active</option>
                                <option value="Inactive" @if(@$employee->status == 'Inactive') selected @endif>Inactive</option>
                               </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @endif

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

    //     

        // $('#addemployee').on('click',function(e)
        // {
        //     $('#exampleModal').modal('show');
        // });

        
     $('#country_id').on('change',function(e)
     {
        var country_id = $('#country_id').val();
        $.ajax({ 
  
         method: "get",  
         url: "/getStateByCountry",  
         data:{country_id:country_id},
         dataType: 'json',
         success: function (data) {
          console.log(data);  
             var s = '<option value="-1">Please Select a State</option>';  
             for (var i = 0; i < data.length; i++) {  
                 s += '<option value="' + data[i].id + '">' + data[i].name + '</option>';  
             }  
             $("#state_id").html(s);  
         }  
     });  
     });

       $('#name').on('keyup',function(e)
       {
        var name = $('#name').val();
        var newstring = name.substr(0,1).toUpperCase()+name.substr(1);
        return $('#name').val(newstring);

       });

       $('#mobile_number').on('keypress',function(e)
       {
            var mobile_number = $('#mobile_number').val();
            if(mobile_number.length > 9)
            {
                return false;
            }
       });


    });

  
</script>
@endsection
