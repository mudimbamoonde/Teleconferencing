<!DOCTYPE html>
<html lang="en">
<?php

include "include/head.php";
?>

<body style="font-size: 15px">
<div class="container-scroller">
<!-- partial:partials/_navbar.html -->
<?php include "include/p_view.php"; ?>
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
<div class="row">
<div class="col-12 grid-margin">
<div class="card">
<div class="card-body">
<div class="col-12 grid-margin">
<div class="card">
<?php

$getInternalID =$_GET["internalID"];
//student_Course->  asign_id 	student_ID 	programID 	course_ID 	Semester 	grade
$query = "SELECT*FROM student_program WHERE studentID= ? ";
$stmt = $conn->prepare($query);
$stmt->bindValue(1,$getInternalID);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_OBJ);
$student_id = $row->student_id;
//select Name
$ch = "SELECT*FROM student1 WHERE st_id = :st_id";
$chs = $conn->prepare($ch);
$chs->bindParam(":st_id",$getInternalID);
$chs->execute();
$c = $chs->fetch(PDO::FETCH_OBJ);
?>
<div class="card-body">
<h4 class="card-title"><h1 class="text-blue"><?php echo $c->firstname." ". $c->lastname ?></h1></h4>
<small><?php echo $c->program ?></small>
<hr>
<div id="assignMessage"></div>
<div class="col-md-3">
    <h3>Add Semester</h3>
    <form method="post">
        <input type="text" maxlength="1" id="semester_id" name="semester_id" class="form-control" placeholder="Add Semester" style="border: groove">
        <input type="hidden" value="<?php echo $student_id ?>" name="sin" id="sin" >
        <br><a href="#" id="assignSemester" class="btn btn-secondary btn-rounded">Submit</a>
    </form>
</div>
<div class="row">

    <div class="col-md-5">
        <br>
        <br>
        <h3 class="text-danger">Semester Courses</h3>
        <!-- End of Results -->
        <div id="assignVVV">
            <?php
        //student_id
            $feM = "SELECT*FROM student_course  INNER JOIN 
            student_program ON student_program.student_id = student_course.student_ID 
            WHERE studentID = ?";
            $stmtL = $conn->prepare($feM);
            $stmtL->bindValue(1,$getInternalID);
            $stmtL->execute();

            echo "<table class='table table-bordered'>
            <tbody>
            <tr>
            <th>Semester</th>
            <th>Course</th>
            </tr>

            ";

            $xr=$stmtL->fetch(PDO::FETCH_OBJ);
            if ($stmtL->rowCount()>0){
                $cof = "SELECT*FROM course INNER JOIN program_course ON
                course.course_id = program_course.CourseID
                WHERE programID = :programID AND semester= :semester";
                $prov = $conn->prepare($cof);
                $prov->bindParam(":programID", $xr->programID);
                $prov->bindParam(":semester", $xr->Semester);
                $prov->execute();

                while ($courseName = $prov->fetch(PDO::FETCH_OBJ)) {

                    ?>
                    <tr align='left'>
                        <td><?php echo $xr->Semester ?></td>
                        <td>

                            <!-- Results table -->
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td><?php echo $courseName->CourseName ?></td>
                                        <td><?php echo $courseName->CourseCode ?></td>
                                    </tr>

                                </tbody>
                            </table>
                            <!-- End of Results -->
                        </td>
                    </tr>
                    <?php
                }
            }else{
                echo "<p class='alert alert-danger'>You Have no Courses assigned</p>";
            }

            ?>

        </tbody>
    </table>

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