<!DOCTYPE html>
<html>
<head>
  <title>Debt Recovery - Jeyram Groups</title>
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

  <!-- plugin css -->
  <?php echo $__env->yieldPushContent('plugin-styles'); ?>
  <!-- end plugin css -->

  <!-- common css -->
  <?php echo Html::style('css/app.css'); ?>

  <!-- end common css -->

  <?php echo $__env->yieldPushContent('style'); ?>
</head>
<body data-base-url="<?php echo e(url('/')); ?>">

  <div class="container-scroller" id="app">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
  </div>

    <!-- base js -->
    <?php echo Html::script('js/app.js'); ?>

    <!-- end base js -->

    <!-- plugin js -->
    <?php echo $__env->yieldPushContent('plugin-scripts'); ?>
    <!-- end plugin js -->

    <?php echo $__env->yieldPushContent('custom-scripts'); ?>
</body>
</html><?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/layout/master-mini.blade.php ENDPATH**/ ?>