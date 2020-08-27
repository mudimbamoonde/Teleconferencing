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
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    $semester = $row->Semester;
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
                    <li><a href="#">Payments</a></li>
                    <li><a href="#">Semester Registration</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">

                    <div class="panel panel-primary">
                        <div class="panel-heading"><h4>Make Payments</h4></div>
                        <div class="panel-body">
                            <!--                       Message-->

                            <div id="StudentMessage"></div>
                            <form action="makeP.php" method="post" class="form-horizontal" enctype="multipart/form-data" style="margin-left: 115px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="username">Student Name:</label>
                                                <input type="text"  disabled value="<?php echo $_SESSION["name"] ?>"  style="border: groove" class="form-control" />
                                                <input type="hidden" id="username"  value="<?php echo $_SESSION["name"] ?>" name="username" style="border: groove" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="sin">Student identification Number:</label>
                                                <input type="text"   disabled value="<?php echo $_SESSION["username"] ?>"  style="border: groove" class="form-control" />
                                                <input type="hidden"  id="sin"  value="<?php echo $_SESSION["username"] ?>" name="sin" style="border: groove" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="ammountPaid">Amount Paid:</label>
                                                <input type="text"  id="ammountPaid" placeholder="e.g 1500" name="ammountPaid" style="border: groove" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="semester">Semester:</label>
                                                <input type="text" id="semester"   placeholder="<?php echo $semester+1 ?>" name="semester" style="border: groove" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="paymenttype">Payment Type:</label>
                                                <select id="paymenttype" name="paymenttype" class="form-control">
                                                    <option>SELECT PAYMENT TYPE</option>
                                                    <option>Balance Payments</option>
                                                    <option>Semester Registration</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="desp">Description:</label>
                                                <textarea id="desp" name="desp" style="border: groove" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="btc">Receipt Batch Number:</label>
                                                <input type="text"  id="btc" name="btc" style="border: groove" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <label for="btc">Attachment:</label>
                                            <input type="file"  id="receipt" name="receipt"   />
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <input type="submit"  class="btn btn-success" id="confirmPayment" name="confirmPayment" value="Confirm Payment" >
                                        </div>
                                    </div>
                                </div>
                        </div>
                            </form>



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