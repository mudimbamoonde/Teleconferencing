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
            <section class="content-header">
                <h1>
                    Lecturer
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3><span class="text-danger mdi mdi-message-image"></span>
                                <?php  if(isset($_GET["upload"])){?> Upload Material<?php }else{?> Questions<?php } ?>
                            </h3></div>
                        <div class="panel-body">
                            <!--                       Message-->
                            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                <div class="btn-group" data-toggle="btn-toggle">
                                </div>
                            </div>
                        </div>
                        <div class="box-body chat" id="chat-box">


                                <!-- chat item -->
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Question Name</th>
                                        <th>Control</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $lsa = "SELECT * FROM question AS q INNER JOIN course as sc 
                                            ON q.courseID = sc.course_id WHERE q.courseID =?";
                                    $b = $conn->prepare($lsa);
                                    $b->bindValue(1,$_GET["courseID"]);
                                    $b->execute();
                                    $n = 0;
                                    while ($row = $b->fetch(PDO::FETCH_OBJ)){
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?php echo $n ?></td>
                                            <td><a href="Question.php?q=<?php echo $row->questionID ; ?>"><?php echo $row->QuestionName; ?></a></td>
                                            <td><a href="" class="btn btn-danger">Remove</a></td>
                                        </tr>
                                    <?php } ?>
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
