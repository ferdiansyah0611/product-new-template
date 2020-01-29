<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="col-xl-12 mx-auto">
    <div class="col-xl-12">
        <div class="card resizable draggable">
        <div class="card-header">
            <h5 class="card-title">Your Session Display</h5>
            <div class="card-tools">
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Refresh Session</a>
                      <a href="#" class="dropdown-item">Reset Session</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
        </div>
        <iframe src="http://product.com/preview" width="100%" height="100%"></iframe>
    </div>
    </div>
    <div class="card col-xl-6 float-right">
    <div class="card-header">Preview</div>
    <div class="card-body">
    <div class="bd-example">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="8"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="9"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="<?php echo e(asset('image/walpaper-1.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 1</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-2.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 2</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-3.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 3</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-4.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 4</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-5.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 5</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-6.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 6</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-7.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 7</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-8.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 8</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-9.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 9</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img src="<?php echo e(asset('image/walpaper-10.jpg')); ?>" class="d-block w-100" style="height:550px;" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Walpaper 10</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    
    </div>
</div>
<div class="col-xl-6">
<div class="card col-xl-12 float-left resizable">
    <div class="card-header">Body Settings
    <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-wrench"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                      <a href="#" class="dropdown-item">Change Date</a>
                      <a href="#" class="dropdown-item">Reset data</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
    <div class="card-body">
        <form><?php echo csrf_field(); ?>
        <div class="col-md-12 float-left form-group">
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">font-size</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>10 px</option>
                <option>11 px</option>
                <option>12 px</option>
                </select></p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">color</label>
                <input type="color" name="" class="form-control col-xl-6 float-left font-12">
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-color</label> 
                <input type="color" name="" class="form-control col-xl-6 float-left"></p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-image</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Walpaper 1</option>
                <option>Walpaper 2</option>
                <option>Walpaper 3</option>
                <option>Walpaper 4</option>
                <option>Walpaper 5</option>
                <option>Walpaper 6</option>
                <option>Walpaper 7</option>
                <option>Walpaper 8</option>
                <option>Walpaper 9</option>
                <option>Walpaper 10</option>
            </select></p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-attachment</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Scroll</option>
                <option>Fixed</option>
            </select></p>
        <div class="dropdown-divider"></div>
        </div>
        </form>
    </div>
    <div class="card-footer"></div>
    </div>
<div class="card col-xl-12 float-left resizable">
    <div class="card-header">Header Settings
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Change Date</a>
            <a href="#" class="dropdown-item">Reset data</a>
        </div>
        </div>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
    </div>
    <div class="card-body">
        <form><?php echo csrf_field(); ?>
        <div class="col-md-12 float-left form-group">
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">font-size</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>10 px</option>
                <option>11 px</option>
                <option>12 px</option>
                </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">color</label>
                <input type="color" name="" class="form-control col-xl-6 float-left font-12">
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-color</label> 
                <input type="color" name="" class="form-control col-xl-6 float-left"></p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-image</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Walpaper 1</option>
                <option>Walpaper 2</option>
                <option>Walpaper 3</option>
                <option>Walpaper 4</option>
                <option>Walpaper 5</option>
                <option>Walpaper 6</option>
                <option>Walpaper 7</option>
                <option>Walpaper 8</option>
                <option>Walpaper 9</option>
                <option>Walpaper 10</option>
            </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-attachment</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Scroll</option>
                <option>Fixed</option>
            </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">position</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Absolute</option>
                <option>Fixed</option>
                <option>Static</option>
                <option>None</option>
            </select>
            </p>
        </div>
        </form>
    </div>
    <div class="card-footer"></div>
    </div>
<div class="card col-xl-12 float-left resizable">
    <div class="card-header">Footer Settings
    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i></button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
            <a href="#" class="dropdown-item">Change Date</a>
            <a href="#" class="dropdown-item">Reset data</a>
        </div>
        </div>
        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
    </div>
    </div>
    <div class="card-body">
        <form><?php echo csrf_field(); ?>
        <div class="col-md-12 float-left form-group">
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">font-size</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>10 px</option>
                <option>11 px</option>
                <option>12 px</option>
                </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">color</label>
                <input type="color" name="" class="form-control col-xl-6 float-left font-12">
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-color</label> 
                <input type="color" name="" class="form-control col-xl-6 float-left"></p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-image</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Walpaper 1</option>
                <option>Walpaper 2</option>
                <option>Walpaper 3</option>
                <option>Walpaper 4</option>
                <option>Walpaper 5</option>
                <option>Walpaper 6</option>
                <option>Walpaper 7</option>
                <option>Walpaper 8</option>
                <option>Walpaper 9</option>
                <option>Walpaper 10</option>
            </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">background-attachment</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Scroll</option>
                <option>Fixed</option>
            </select>
            </p>
            <p><label class="col-form-label col-xl-6 float-left font-12 col-6">position</label> 
                <select class="form-control col-xl-6 float-left font-12">
                <option>Absolute</option>
                <option>Fixed</option>
                <option>Static</option>
                <option>None</option>
            </select>
            </p>
        </div>
        </form>
    </div>
    <div class="card-footer"></div>
    </div>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( ".resizable" ).resizable();
  } );
  $( function() {
    $( ".draggable" ).draggable();
  } );
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('templates', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\product2\resources\views/home/settings/display.blade.php ENDPATH**/ ?>