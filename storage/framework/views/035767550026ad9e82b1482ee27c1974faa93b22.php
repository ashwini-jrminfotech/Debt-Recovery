<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
  <ul class="nav">

    <!-- Profile Start -->
    <li class="nav-item nav-profile not-navigation-link">
      <div class="nav-link">
        <div class="user-wrapper">
          <!-- <div class="profile-image">
            <img src="<?php echo e(url('assets/images/faces/face8.jpg')); ?>" alt="profile image">
          </div> -->
          <!-- <div class="text-wrapper">
            <p class="profile-name">Admin</p> -->
            <!-- <div class="dropdown">
              <a class="nav-link d-flex user-switch-dropdown-toggler" data-toggle="dropdown">
                <small class="designation text-light">Manager</small>
                <span class="status-indicator online"></span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item">Manage Accounts</a>
                <a class="dropdown-item">Change Password</a>
                <a class="dropdown-item">Check Inbox</a>
                <a class="dropdown-item">Sign Out</a>
              </div>
            </div> -->
          <!-- </div> -->
        </div>
      </div>
    </li>

    <!-- Manage Clients -->
    <li class="nav-item <?php echo e(active_class(['clients/*'])); ?>">
      <a class="nav-link" data-toggle="collapse" href="#clients-menu"
         aria-expanded="<?php echo e(is_active_route(['clients/*'])); ?>"
         aria-controls="clients-menu">
        <i class="menu-icon mdi mdi-account-multiple"></i>
        <span class="menu-title">Manage Clients</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse <?php echo e(show_class(['clients/*'])); ?>" id="clients-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item <?php echo e(active_class(['clients/new'])); ?>">
            <a class="nav-link" href="<?php echo e(url('/admin/new')); ?>">Add New Client</a>
          </li>
          <li class="nav-item <?php echo e(active_class(['clients/view'])); ?>">
            <a class="nav-link" href="<?php echo e(url('/clients/view')); ?>">View Clients</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Manage Debtors -->
    <li class="nav-item <?php echo e(active_class(['debtors/*'])); ?>">
      <a class="nav-link" data-toggle="collapse" href="#debtors-menu"
         aria-expanded="<?php echo e(is_active_route(['debtors/*'])); ?>"
         aria-controls="debtors-menu">
        <i class="menu-icon mdi mdi-cash"></i>
        <span class="menu-title">Manage Debtors</span>
        <i class="menu-arrow"></i>
      </a>

      <div class="collapse <?php echo e(show_class(['debtors/*'])); ?>" id="debtors-menu">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item <?php echo e(active_class(['debtors/debtor-form'])); ?>">
            <a class="nav-link" href="<?php echo e(url('/debtors/debtor-form')); ?>">Add Debtor</a>
          </li>
          <li class="nav-item <?php echo e(active_class(['debtors/view'])); ?>">
            <a class="nav-link" href="<?php echo e(url('/debtors/view')); ?>">View Debtors</a>
          </li>
        </ul>
      </div>
    </li>

  </ul>
</nav>
<?php /**PATH B:\JRM InterFiles\Debt-Recovery-main\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>