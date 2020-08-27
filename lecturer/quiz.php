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
                            <p><br>
                            <form method="post">
                                <?php
                                  if (isset($_POST["addQuestion"])){
                                      $qname = htmlspecialchars($_POST["qname"]);
                                      $answer = htmlspecialchars($_POST["finalAnswer"]);

                                      $choices =  [
                                          $_POST["answer1"],
                                          $_POST["answer2"],
                                          $_POST["answer3"],
                                          $_POST["answer4"]

                                      ];

                                      $sql = "INSERT INTO question(questionID,QuestionName,answer1,answer2,answer3,answer4,finalAnswer,courseID)
                                                   VALUES(?,?,?,?,?,?,?,?)";
                                      $nq = $conn->prepare($sql);
                                      $nq->bindValue(1,null);
                                      $nq->bindValue(2,$qname);
                                      $nq->bindValue(3,$choices[0]);
                                      $nq->bindValue(4,$choices[1]);
                                      $nq->bindValue(5,$choices[2]);
                                      $nq->bindValue(6,$choices[3]);
                                      $nq->bindValue(7,$answer);
                                      $nq->bindValue(8,$_GET["courseID"]);
                                      if ($nq->execute()){
                                          echo "<div class='alert alert-info'>Successfully Insert</div>";
                                      }else{
                                          echo $conn->errorInfo();
                                      }



                                  }

                                ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Question Name </label>
                                        <textarea name="qname" class="form-control"></textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label>Answer </label>
                                        <select name="finalAnswer" class="form-control">
                                            <option>SELECT ANSWER</option>
                                            <option value="answer1">A</option>
                                            <option value="answer2">B</option>
                                            <option value="answer3">C</option>
                                            <option value="answer4">D</option>
                                        </select>
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>A</label>
                                        <input type="text" name="answer1" class="form-control">
                                    </div>

                                    <div class="col-md-6">
                                        <label>B</label>
                                        <input type="text" name="answer2" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>C</label>
                                        <input type="text" name="answer3" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label>D</label>
                                        <input type="text" name="answer4" class="form-control">
                                    </div>

                                </div>

                            <p><br></p>
                            <p><br></p>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="submit" name="addQuestion" value="ADD Questions" class="btn btn-info">
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
