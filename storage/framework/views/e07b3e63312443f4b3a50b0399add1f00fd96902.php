<?php $__env->startPush('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
<?php $__env->stopPush(); ?>

<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand brand-logo" href="<?php echo e(url('/')); ?>">
      <img src="<?php echo e(url('images/logo.png')); ?>" alt="logo" /> </a>
    <!-- <a class="navbar-brand brand-logo-mini" href="<?php echo e(url('/')); ?>">
      <img src="<?php echo e(url('assets/images/logo-mini.svg')); ?>" alt="logo" /> </a> -->
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    
     <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="count bg-success"><?php echo e(session('new_client_notification') ? 1 : 0); ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
          <a class="dropdown-item py-3 border-bottom">
            <p class="mb-0 font-weight-medium float-left"><?php echo e(session('new_client_notification') ? 1 : 0); ?> new notifications </p>
            <span class="badge badge-pill badge-primary float-right">View all</span>
          </a>
          <div class="dropdown-divider"></div>
          <?php if(session('new_client_notification')): ?>
          <a class="dropdown-item preview-item py-3">
            <div class="preview-thumbnail">
              <img src="<?php echo e(url('images/jeyram-favicon.jpg')); ?>" alt="image" class="img-sm profile-pic">
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal text-dark mb-1"><?php echo e(session('new_client_notification')['name']); ?></h6>
              <p class="font-weight-light small-text mb-0"><?php echo e(session('new_client_notification')['message']); ?></p>
            </div>
          </a>
          <?php endif; ?>
        </div>
      </li>
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text d-none d-md-inline-flex">Admin</span>
          <img class="img-xs rounded-circle" src="<?php echo e(url('images/jeyram-favicon.jpg')); ?>" alt="Profile image"> </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <!-- <a class="dropdown-item p-0">
            <div class="d-flex border-bottom w-100 justify-content-center">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
              </div>
            </div>
          </a> -->
          <!-- <a class="dropdown-item mt-2"> Manage Accounts </a> -->
          <a class="dropdown-item"> Change Password </a>
          <!-- <a class="dropdown-item"> Check Inbox </a> -->
          <a class="dropdown-item"> Sign Out </a>
        </div>
      </li>
    </ul> 
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu icon-menu"></span>
    </button>
  </div>
</nav><?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/layout/header.blade.php ENDPATH**/ ?>