<!DOCTYPE html>
<html>
<?php
include "include/head.php";
?>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include "include/nav.php";?>

    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="col-md-2">

                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="#activity" class="active" id="nav-home-tab" role="tab" data-toggle="tab" aria-controls="nav-home" aria-selected="true"> Study Materials</a></li>
                            <li><a href="#assignment" data-toggle="tab" aria-selected="false">Assignment</a></li>
                            <li><a href="#settings" data-toggle="tab" aria-selected="false">Course Outline</a></li>
                            <li><a href="#quiz" data-toggle="tab" aria-selected="false">Quiz</a></li>
                            <li><a href="#discusion" data-toggle="tab" aria-selected="false">Discussion</a></li>
                        </ul>
<!--                        <nav>-->
<!--                            <div class="nav nav-tabs" id="nav-tab" role="tablist">-->
<!--                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>-->
<!--                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>-->
<!--                                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
<!--                            </div>-->
<!--                        </nav>-->
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>File Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $lsa = "SELECT*FROM materialcourse AS mt INNER JOIN course as sc 
                          ON mt.courseID = sc.course_id WHERE sc.course_id =?";
                                    $b = $conn->prepare($lsa);
                                    $b->bindValue(1,$_GET["id"]);
                                    $b->execute();

                                    $n = 0;
                                    while ($row = $b->fetch(PDO::FETCH_OBJ)){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?php echo $n ?></td>
                                            <td><a href="Material/<?php echo $row->fileName; ?>"><?php echo $row->fileName; ?> </a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="assignment" role="tabpanel" aria-labelledby="nav-profile-tab"> Assignment</div>
                            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="nav-contact-tab">Course Outline</div>
                            <div class="tab-pane fade" id="quiz" role="tabpanel" aria-labelledby="nav-contact-tab">Quiz</div>
                            <div class="tab-pane fade" id="discusion" role="tabpanel" aria-labelledby="nav-contact-tab">Discussion</div>
                        </div>



                <!-- /.col -->
                    </div>

                </div>
            </section>

    <!--dsfdf-->


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