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
                    Student
                    <small>TC system</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="col-md-3">
                    <div class="panel panel-primary skin-blue">
                        <div class="panel-heading text-center"><?php echo $_SESSION["name"] ?></div>
                        <div class="panel-body">
                            <div class="text-center">
                                <p class="message">
                                    <a href="#" class="name text-sm text-primary">
                                        <?php
                                        $sq = "SELECT*FROM student_program WHERE student_id=?";
                                        $sr = $conn->prepare($sq);
                                        $sr->bindValue(1,$_SESSION["username"]);
                                        $sr->execute();
                                        $r = $sr->fetch(PDO::FETCH_OBJ);
                                        ?>
                                        <?php echo $r->programName ?>
                                    </a>
                                    <br>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
           <div class="col-md-9">
               <div class="panel panel-warning">
                   <div class="panel-heading"><h3><span class="text-danger mdi mdi-message-image"></span>Notice</h3></div>
                   <div class="panel-body">
<!--                       Message-->
                       <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                           <div class="btn-group" data-toggle="btn-toggle">

                           </div>
                       </div>
                   </div>
                   <div class="box-body chat" id="chat-box">
                       <!-- chat item -->
                       <div  id="messages">
                       </div>

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
