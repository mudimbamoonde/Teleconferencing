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

                <?php //include "include/widgets.php";?>
                <?php
                include 'include/config.php';
                $pdi = $_GET["pdi"];
                $sqlz = "SELECT*FROM program INNER JOIN program_course 
                                                    ON  program.id = program_course.programID 
                                                    WHERE id='$pdi'";
                $pstmt = $conn->prepare($sqlz);
                $pstmt->execute();
                $r = $pstmt->fetch(PDO::FETCH_OBJ);

                ?>

                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 grid-margin">
                                    <?php  if ($pstmt->rowCount()>0){?>
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"><h1 class="text-blue"><?php echo $r->programName ?></h1></h4>
                                            <small>School of <?php echo $r->SchoolName ?></small>
                                            <hr>

                                            <br>
                                            <div id="course">
                                                <h3>Courses</h3>

                                                <div id="disp">
                                                    <?php


                                                        $prog = $r->id;

                                                        $sl = "SELECT*FROM course INNER JOIN program_course ON course.course_id=program_course.CourseID
                                                     WHERE program_course.programID ='$prog' ORDER BY semester ASC";
                                                        $course = $conn->prepare($sl);
                                                        $course->execute();
                                                        /*
                                                        course_id CourseName CourseCode year semester pc_id CourseID programID
                                                         * */
                                                        ?>

                                                        <table class="table table-bordered mce-table-striped table-responsive-lg">
                                                            <thead class="bg bg-primary text-white Bold">
                                                            <tr>
                                                                <th>Course</th>
                                                                <th>Semester</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            while($x = $course->fetch(PDO::FETCH_ASSOC)) {
                                                                $couseName = $x["CourseName"];
                                                                $semester = $x["semester"];
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <b class="text-blue"> <?php echo $couseName ?></b>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $semester ?>
                                                                        </td>
                                                                        <td>
                                                                            <a href="#"
                                                                               class="btn btn-dark mdi mdi-delete-circle"></a>
                                                                        </td>
                                                                    </tr>

                                                                <!--                                                            While loop-->
                                                            <?php }?>

                                                            </tbody>
                                                        </table>



                                                </div>
                                            </div>


                                        </div>
                                        <?php }else{
                                            echo "<hr>There are no Courses in this Program";
                                        }?>
<!--                                       GI -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--                here-->
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