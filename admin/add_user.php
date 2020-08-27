s<!DOCTYPE html>
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
                Tc System
            </a>
            <a class="navbar-brand brand-logo-mini" href="index.php">
                <!--          <img src="images/logo-mini.svg" alt="logo" />-->
                Teleconferencing System
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-elevation-rise"></i>Reports</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">


                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, Tina Katongo</span>

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
        <?php
        include "include/Leftmenu.php";
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row purchace-popup">

                </div>

                <?php include "include/widgets.php";?>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="card-title"><h1>Add Users</h1></div>
                                            <hr>
                                            <div id="adminMessage"></div>
                                            <form class="form-sample">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">First Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="fname" name="fname" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Last Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text"  id="lname" name="lname" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Username:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" id="username" name="username" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <!--                                                            CourseName 	CourseCode 	year 	semester -->
                                                            <label class="col-sm-3 col-form-label">Gender:</label>
                                                            <div class="col-sm-9">
                                                                <select name="gender" id="gender" class="form-control" style="border: groove">
                                                                    <option selected>SELECT GENDER</option>
                                                                    <option>Male</option>
                                                                    <option>Female</option>
                                                                    <option>Other</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <!--                                                            CourseName 	CourseCode 	year 	semester -->
                                                            <label class="col-sm-3 col-form-label">Access Level:</label>
                                                            <div class="col-sm-9">
                                                                <select  id="role" name="role" style="border: groove" class="form-control">
                                                                    <option selected>SELECT ROLE</option>
                                                                    <?php
                                                                    require_once 'include/config.php';
                                                                    $check = $conn->prepare("select*from access_level");
                                                                    $check->execute();
                                                                    while ($row = $check->fetch(PDO::FETCH_OBJ)){
                                                                        echo "<option >$row->Role</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Email:</label>
                                                            <div class="col-sm-9">
                                                                <input type="email" class="form-control"  style="border: groove" name="email" id="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="phyaddress" class="col-sm-3 col-form-label">Physical Address:</label>
                                                            <div class="col-sm-9">
                                                                <textarea name="phyaddress" style="border: groove" class="form-control" id="phyaddress"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">National ID:</label>
                                                            <div class="col-sm-3">
                                                                <input type="text" name="nrc1" maxlength="6" id="nrc1" class="form-control" style="border: groove">
                                                            </div>/
                                                            <div class="col-sm-2">
                                                                <input type="text" name="nrc2" maxlength="2" id="nrc2" class="form-control" style="border: groove">
                                                            </div>/
                                                            <div class="col-sm-2">
                                                                <input type="text" disabled value="1" class="form-control" style="border: groove">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <!--                                                            CourseName 	CourseCode 	year 	semester -->
                                                            <label class="col-sm-3 col-form-label">Phone:</label>
                                                            <div class="col-sm-9">
                                                                <input type="tel" id="phone" maxlength="9" name="phone" style="border: groove" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <a href="#" id="saveAdmin" class="btn btn-success">Save</a>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--End of Form Add School         -->


                                        </div>
                                    </div>
                                </div>
                            </div>
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