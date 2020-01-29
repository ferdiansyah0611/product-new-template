<?php $__env->startSection('content'); ?>
<div class="col-md-12 card table-responsive" style="font-family: 'Times New Roman;">
	<div class="card-header">My Products</div>
	<div class="card-body">
<table class="table table-bordered hover table-striped table-hover" style="width:100%;font-family: 'Solway-Medium';">
<form method="get" action="<?php echo e(route('dashboard.searchmanageuser')); ?>">
    <input class="form-group form-control" type="text" name="search" placeholder="Search data users...">
    <button class="btn btn-secondary" type="submit" style="position: absolute;right: 25px;top: 69.5px;width:40px;height:36px;"><i class="fas fa-search"></i></button>
    </form>
    <thead class="table-primary">
    <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Saldo</th>
    <th>Updated</th>
    <th>Action</th>
    </tr>
    </thead>
    <?php $__currentLoopData = $for; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tbody>
    <td><?php echo e($p->name); ?></td>
    <td><?php echo e($p->email); ?></td>
    <td>Rp. <?php echo e($p->saldo); ?></td>
    <td><?php echo e(\Carbon\Carbon::parse($p->updated_at)->diffForHumans()); ?></td>
    <td style="text-align: center;">
    <form action="<?php echo e(route('productions.destroy', $p->id)); ?>" method="post"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#update<?php echo e($p->id); ?>"><i class="fas fa-user-edit" style="margin-left:5px;"></i></a>
    <a style="color: white;cursor: pointer;" class="btn btn-danger" data-toggle="modal" data-target="#deleteData<?php echo e($p->id); ?>"><i class="fas fa-trash-alt"></i></a>
    <!-- Modal -->
<div class="modal fade" id="deleteData<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable|modal-dialog-centered modal-sm|modal-lg|modal-xl" role="document">
<div class="modal-content" style="margin-top:50%;">
<div class="modal-body">
        Do you want delete data ?
        <p><button type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">No
        </button></p>
</div>
</div>
</div>
</div>
        </form>
         <!-- Modal -->
  <div class="modal fade" id="update<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Edit Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="post" action="<?php echo e(route('dashboard.updateusers', $p->id)); ?>"> <?php echo csrf_field(); ?>
                        <div class="form-group col-md-12 float-left">
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="name" class="form-control" value="<?php echo e($p->name); ?>" data-toggle="tooltip" data-placement="right" title="Username">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" value="<?php echo e($p->email); ?>" data-toggle="tooltip" data-placement="right" title="Emails">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-tag"></i></span>
                            </div>
                            <input type="text" name="role" class="form-control" value="<?php echo e($p->role); ?>" data-toggle="tooltip" data-placement="right" title="Roles Account">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-friends"></i></span>
                            </div>
                            <select name="status" class="custom-select" data-toggle="tooltip" data-placement="right" title="Status">
                                    <option value="<?php echo e($p->status); ?>" selected><?php echo e($p->status); ?></option>
                                    <option value="Single" required>Single</option>
                                    <option value="Have girlfriends" required>Have girlfriends</option>
                                    <option value="Have boyfriends" required>Have boyfriends</option>
                            </select>
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-user-graduate"></i></span>
                            </div>
                            <select name="last_study" class="custom-select" data-toggle="tooltip" data-placement="right" title="Last Study">
                                <option value="<?php echo e($p->last_study); ?>" selected><?php echo e($p->last_study); ?></option>
                                <option value="College">College</option>
                                <option value="Vocation School" required>Vocation School</option>
                                <option value="High School" required>High School</option>
                                <option value="Middle School" required>Middle School</option>
                                <option value="Elementary School" required>Elementary School</option>
                        </select>
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-address-card"></i></span>
                            </div>
                            <input value="<?php echo e($p->identity_card); ?>" class="form-control" type="number" name="identity_card" data-toggle="tooltip" data-placement="right" title="Identity Card">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fab fa-cc-amazon-pay"></i></span>
                            </div>
                            <input value="<?php echo e($p->debit_card); ?>" class="form-control" placeholder="debit_card" type="number" name="debit_card" data-toggle="tooltip" data-placement="right" title="Debit Card">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-phone-square"></i></span>
                            </div>
                            <input type="number" name="number" class="form-control" value="<?php echo e($p->number); ?>" data-toggle="tooltip" data-placement="right" title="Number Phone">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" name="born" class="form-control" value="<?php echo e($p->born); ?>" data-toggle="tooltip" data-placement="right" title="Born Date">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-map-marked-alt"></i></span>
                            </div>
                            <input type="text" name="locate" class="form-control" value="<?php echo e($p->locate); ?>" data-toggle="tooltip" data-placement="right" title="Locations">
                            </div><!--./input-group input-group-sm mb-3-->
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-info-circle"></i></span>
                            </div>
                            <textarea type="text" name="description" class="form-control" data-toggle="tooltip" data-placement="right" title="Description"><?php echo e($p->description); ?></textarea>
                            </div><!--./input-group input-group-sm mb-3-->
                        </div>
                        <button class="btn btn-primary" type="submit" style="margin-top:15px;">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </td>
    </tbody>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="ajax"></div>
    <?php echo e($for->links()); ?>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\dashboard\search_users.blade.php ENDPATH**/ ?>