

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Register employee')); ?></div>
                <div class="card-body">
                    <?php if(isset($employee)): ?>
                    <form method="POST" id="employee_update" action="<?php echo e(route('Employees.update',$employee->id)); ?>">
                    <?php endif; ?>
                    <form method="POST" id="employee_add" action="<?php echo e(route('addEmployee')); ?>">
                       <?php echo csrf_field(); ?>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(isset($employee->name)?$employee->name : old('name')); ?>" autocomplete="name" autofocus>

                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Email')); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(isset($employee->email)?$employee->email : old('email')); ?>"  autocomplete="email">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="mobile_no" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Mobile')); ?></label>

                            <div class="col-md-6">
                            <input id="mobile_no" type="text" class="form-control <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mobile_no" value="<?php echo e(isset($employee->mobile_no)?$employee->mobile_no : old('mobile_no')); ?>"  autocomplete="mobile_no" autofocus>
                                <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                     

                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Department')); ?></label>

                            <div class="col-md-6">
                               <select class="form-control <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="department" name="department">
                               <option value="">Select a Department</option>
                               
                                <option value="Sales" <?php if(@$employee->department == 'Sales'): ?> selected <?php endif; ?>>Sales</option>
                                <option value="Marketing" <?php if(@$employee->department == 'Marketing'): ?> selected <?php endif; ?>>Marketing</option>
                                <option value="IT" <?php if(@$employee->department == 'IT'): ?> selected <?php endif; ?>>IT</option>
                               </select>

                                <?php $__errorArgs = ['department'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <?php if(isset($employee)): ?>
                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Status')); ?></label>
                            <div class="col-md-6">
                               <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="status" name="status">
                               <option value="">Select Status</option>
                               
                                <option value="Active" <?php if(@$employee->status == 'Active'): ?> selected <?php endif; ?>>Active</option>
                                <option value="Inactive" <?php if(@$employee->status == 'Inactive'): ?> selected <?php endif; ?>>Inactive</option>
                               </select>

                                <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Save')); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\otaskit\resources\views/Employee_form.blade.php ENDPATH**/ ?>