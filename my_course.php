<!DOCTYPE html>
<html>
<?php
include "include/head.php";
?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include "include/nav.php";?>
<?php
//course_id	CourseName	CourseCode	year	semester

//asign_id	student_ID programID	course_ID	Semester	grade
$select = "SELECT*FROM student_course INNER JOIN course  ON course.course_id = student_course.course_ID
AND  student_course.Semester = course.semester WHERE student_ID =".$_SESSION["username"];
$stmt = $conn->prepare($select);
$stmt->execute();
?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Student
                    <small>TCsystem</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Courses</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">

                    <div class="panel panel-default">
<!--                        <div class="panel-heading"><h4>Courses</h4></div>-->
                        <div class="panel-body">
                            <!--                       Message-->

                            <table class="table table-bordered">
                                <thead>
                                <?php

                                $sq = "SELECT*FROM student_program WHERE student_id=".$_SESSION["username"];
                                $sr = $conn->prepare($sq);
                                $sr->execute();
                                $r = $sr->fetch(PDO::FETCH_OBJ);
                                ?>
                                  <tr class="text-center">
                                      <td><b>Confirmed Courses for</b> : <?php echo $r->programName ?></td>
                                  </tr>
                                </thead>

                                <tbody>
                                <?php
                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                $course = $row->CourseName;
                                $course_ID = $row->course_ID;
                                ?>
                                   <tr>
                                       <td>
                                          <a href="S_course.php?id=<?php echo $course_ID?>" class="nav-link"><?php echo $course ?></a>
                                       </td>
                                   </tr>
                                <?php }?>
                                </tbody>
                            </table>

                        </div>

                        <!-- /.chat -->
                    </div>
                    <!--                       Message-->
                </div>
        </div>

    </div>

    <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.container -->
</div>
<!-- /.content-wrapper -->
<?php include "include/footer.php";?>
</div>
<!-- ./wrapper -->

<?php
include "include/javaScript.php";

?>
</body>
</html>