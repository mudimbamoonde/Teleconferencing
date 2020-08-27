<!DOCTYPE html>
<html lang="en">
<?php

include "include/head.php";
?>

<body style="font-size: 15px">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo bg-success" href="index.php">
<!--          <img src="images/logo.svg" alt="logo" />-->
            TC System
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.php">
<!--          <img src="images/logo-mini.svg" alt="logo" />-->
            Tc System
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Teleconferencing System</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
<!--            $_SESSION["email"] = $row->email;-->
<!--            $_SESSION["uid"] = $rw->user_id;-->
<!--            $_SESSION["username"] = $row->username;-->
<!--            $_SESSION["name"] = $row->name;-->
<!--            $_SESSION["accessLevel"] =  $row->access_level;-->
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hello, <?php echo $_SESSION["name"] ?></span>

            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
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
              </a>
              <a  href="#" class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a href="#"  class="dropdown-item">
                Change Password
              </a>
              <a href="logout.php" class="dropdown-item">
                Logout Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "include/Leftmenu.php"; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">

          </div>
          <?php include "include/widgets.php"?>;


          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title mb-4"><h1><span class="mdi mdi-message-image text-info icon-lg"></span>Messages</h1></h5>
                  <div class="fluid-container">
            <!--Messages-->
                        <div id="message"></div>
            <!--End of message-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<?php
include "include/footer.php";
?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<?php
include "include/javaSc.php";
?>
</body>

</html>