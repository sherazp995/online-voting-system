<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo h-100">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>V</b>TS</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Voting</b>System</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="height: 50px !important;">
    <div class="navbar-custom-menu col" style="height: 40px !important;">
      <ul class="nav navbar-nav h-100">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu h-100">
          <a href="#" class="dropdown-toggle h-100" data-toggle="dropdown">
            <img src="<?php echo (!empty($voter['photo'])) ? 'images/' . $voter['photo'] : 'images/profile.jpg'; ?>" class="user-image" alt="Voter Image">
            <span class="hidden-xs"><?php echo $voter['firstname'] . ' ' . $voter['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($voter['photo'])) ? 'images/' . $voter['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="Voter Image">
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
              </div>
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="text-center text-light col">Your Voters ID is <span class="ms-4"><?php echo $voter['voters_id'] ?></span></div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>