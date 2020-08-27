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
                                Quiz
                            </h3></div>
                        <div class="panel-body">
                            <!--                       Message-->
                            <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                <div class="btn-group" data-toggle="btn-toggle">
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                                <form method="post">
                                    <?php
                                    $sql  = "SELECT*FROM question WHERE questionID =?";
                                    $bind = $conn->prepare($sql);
                                    $bind->bindValue(1,$_GET["q"]);
                                    $bind->execute();
                                    while ($row = $bind->fetch(PDO::FETCH_OBJ)){
                                    ?>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <h1><?php echo $row->QuestionName ?></h1>
                                            <p>Choose 1 answer</p>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 text-capitalize">
                                            <div id='block-12' style='padding: 10px;'>
                                                <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                                                    <input type='radio' name='option' value='<?php echo $row->answer1?>' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                                    <?php echo $row->answer1?></label>
                                                <span id='result-12'></span>
                                            </div>
                                            <div id='block-12' style='padding: 10px;'>
                                                <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                                                    <input type='radio' name='option' value='<?php echo $row->answer2?>' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                                    <?php echo $row->answer2?></label>
                                                <span id='result-12'></span>
                                            </div>
                                            <div id='block-12' style='padding: 10px;'>
                                                <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                                                    <input type='radio' name='option' value='<?php echo $row->answer3?>' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                                    <?php echo $row->answer3?></label>
                                                <span id='result-12'></span>
                                            </div>
                                            <div id='block-12' style='padding: 10px;'>
                                                <label for='option-12' style=' padding: 5px; font-size: 2.5rem;'>
                                                    <input type='radio' name='option' value='<?php echo $row->answer4?>' id='option-12' style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;' />
                                                    <?php echo $row->answer4?></label>
                                                <span id='result-12'></span>
                                            </div>


                                        </div>
                                    </div>
                                    <?php } ?>

                                    <br>


                            <p><br></p>
                            <p><br></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="submitAnswer" value="answer" class="btn btn-info">
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
