<?php $__env->startSection('content'); ?>
<div class="mx-auto">
    <div class="row">
    <div class="col-xl-12">
        <div class="card bg-gradient-info font-12">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>Request Product
              </h3>
              <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <!--table--->
            <table class="table table-bordered data-table">
                    <thead>
                    <tr>
                    <th>Purchase ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Totals</th>
                    <th>Status</th>
                    <th>Locate</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <?php $__currentLoopData = $product_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $purchase = DB::table('purchases')->where('production_id', $data->id)->get();
                    foreach($purchase as $p){
                        echo "<tbody>";
                            echo "<td>".$p->purchase_id."</td>";
                            echo "<td>".base64_decode($data->name_products)."</td>";
                            echo "<td>".$p->sum_purchase."</td>";
                            echo "<td>Rp. ".$p->price."</td>";
                            echo "<td>".$p->status."</td>";
                            echo "<td>".$p->locate."</td>";
                            echo "<td style='text-align: center;'>
                        <form action='id' method='delete'>".csrf_field()."
                        <select>
                            <option>Pending</option>
                            <option>Processing</option>
                            <option>Shipped</option>
                            <option>Decline</option>
                            <option>Accepted</option>                        
                        </select>
                        <a style='color: white;cursor: pointer;' class='btn btn-danger font-12' data-toggle='modal' data-target='#deleteDataid}'><i class='far fa-envelope'></i></a>
                            </form>
                        </td>";
                        echo "</tbody>";//end
                    }
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
            </div><!-- /.card-body -->
        </div><!-- /.card --><!-- /.Left col -->
    </div>
    </div>
</div>

<?php $__currentLoopData = $product_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal -->
<div class="modal fade" id="edit<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div><form>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-xl-6 form-group">
                        <input type="text" name="" class="form-control">
                        <input type="text" name="" class="form-control">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div></form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product\resources\views\home\production\request.blade.php ENDPATH**/ ?>