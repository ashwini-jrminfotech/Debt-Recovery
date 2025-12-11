<!DOCTYPE html>
<html>
<head>
  <title>Jeyram Groups - Debit Recovery</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- CSRF Token -->
  <meta name="_token" content="<?php echo e(csrf_token()); ?>">
  
  <link rel="shortcut icon" href="<?php echo e(asset('/favicon.ico')); ?>">

  <!-- plugin css -->
  <?php echo Html::style('assets/plugins/@mdi/font/css/materialdesignicons.min.css'); ?>

  <?php echo Html::style('assets/plugins/perfect-scrollbar/perfect-scrollbar.css'); ?>

  <!-- end plugin css -->

  <?php echo $__env->yieldPushContent('plugin-styles'); ?>

  <!-- common css -->
  <?php echo Html::style('css/app.css'); ?>

  <!-- end common css -->

  <?php echo $__env->yieldPushContent('style'); ?>
</head>
<body data-base-url="<?php echo e(url('/')); ?>">

  <div class="container-scroller" id="app">
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid page-body-wrapper">
      <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </div>
    </div>
  </div>

  <!-- base js -->
  <?php echo Html::script('js/app.js'); ?>

  <?php echo Html::script('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js'); ?>

  <!-- end base js -->

  <!-- plugin js -->
  <?php echo $__env->yieldPushContent('plugin-scripts'); ?>
  <!-- end plugin js -->

  <!-- common js -->
  <?php echo Html::script('assets/js/off-canvas.js'); ?>

  <?php echo Html::script('assets/js/hoverable-collapse.js'); ?>

  <?php echo Html::script('assets/js/misc.js'); ?>

  <?php echo Html::script('assets/js/settings.js'); ?>

  <?php echo Html::script('assets/js/todolist.js'); ?>

  <!-- end common js -->

  <?php echo $__env->yieldPushContent('custom-scripts'); ?>
</body>
</html><?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/layout/master.blade.php ENDPATH**/ ?>