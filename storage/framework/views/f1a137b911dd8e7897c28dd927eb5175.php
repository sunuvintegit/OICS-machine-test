<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php echo e(__('You are logged in!')); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<br>
    <a href="<?php echo e(route('addEmployeeForm')); ?>" class="btn btn-success" id="addemployee" style="width:250px;">Add Employee</a>

    <a href="<?php echo e(route('addTaskForm')); ?>" class="btn btn-success" id="addTask" style="width:250px;">Add Task</a>
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


<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td><?php echo e($e->id); ?></td>

<td><?php echo e($e->name); ?></td>

<td><?php echo e($e->email); ?></td>

<td><?php echo e($e->mobile_no); ?></td>

<td><?php echo e($e->department); ?></td>

<td><?php echo e($e->status); ?></td>


<td><a class="btn btn-success" href="<?php echo e(route('Employees.edit',$e->id)); ?>">Edit</a></td>
    
<td> <a class="btn btn-danger" href="<?php echo e(route('Employees.delete',$e->id)); ?>">Delete</a</td>

<td> <a class="btn btn-success" href="<?php echo e(route('Employees.assignTaskForm',$e->id)); ?>">Assign Task</button></td>


</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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


<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td><?php echo e($t->id); ?></td>

<td><?php echo e($t->title); ?></td>

<td><?php echo e($t->description); ?></td>

<td><?php echo e($t->status); ?></td>

<td><?php echo e($t->employee == null ? '' : $t->employee->name); ?></td>

<td><a class="btn btn-success" href="<?php echo e(route('Tasks.edit',$t->id)); ?>">Edit</a></td>
<?php if($t->status !== 'Unassigned'): ?>
<td><a class="btn btn-success" href="<?php echo e(route('Tasks.work_status', ['id' => $t->id, 'status' => 'InProgress'])); ?>">In Progress</a>
<a class="btn btn-success" href="<?php echo e(route('Tasks.work_status', ['id' => $t->id, 'status' => 'Done'])); ?>">Done</a></td>

<td><a class="btn btn-success" href="<?php echo e(route('Tasks.changeAssignee',$t->id)); ?>">Change Assignee</a></td>
<?php endif; ?>






</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
      
      <form id="task_assign_form" method="POST" action="<?php echo e(route('assignTask')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <label for="task" class="col-md-4 col-form-label text-md-end"><?php echo e(__('Select Task')); ?></label>
                            <div class="col-md-6">
                               <select class="form-control <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="task" name="task">
                               <option value="">Select Task</option>
                               <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </select>

                                <?php $__errorArgs = ['task'];
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

                            <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Assign')); ?>

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
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\otaskit\resources\views/home.blade.php ENDPATH**/ ?>