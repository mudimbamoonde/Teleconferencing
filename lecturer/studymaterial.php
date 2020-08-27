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
                          <?php  if(isset($_GET["upload"])){?> Upload Material<?php }else{?> Material<?php } ?>
                      </h3></div>
                   <div class="panel-body">
<!--                       Message-->
                       <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                           <div class="btn-group" data-toggle="btn-toggle">
                           </div>
                       </div>
                   </div>
                   <div class="box-body chat" id="chat-box">
                       
                       <br>
                       <?php
                       if(isset($_GET["upload"])){?>
                           <?php
                              if (isset($_POST["addmaterial"])){
                                  $targetDir = "../Material/";
                                  $targetfile = $targetDir.basename($_FILES["thefile"]["name"]);

                                $filename = $_FILES["thefile"]["name"];
                                $writtable = $_POST["filename"];
                                $sql = "INSERT INTO materialcourse(materialID,courseID,fileName,lectureID) 
                                        VALUES(?,?,?,?)";
                                $bin = $conn->prepare($sql);
                                $bin->bindValue(1,null);
                                $bin->bindValue(2,$_GET["course"]);
                                $bin->bindValue(3,$filename);
                                $bin->bindValue(4,$_SESSION["uid"]);
                                if(move_uploaded_file($_FILES["thefile"]["tmp_name"],$targetfile)){
                                    $bin->execute();
                                    echo "<div class='alert alert-success'>File Uploaded!</div>";
                                }else{
                                    echo "<div class='alert alert-danger'>".$conn->errorInfo()."</div>";
                                }
                              }
                             ?>
                       <form method="post" enctype="multipart/form-data">
                           <div class="row">
                               <div class="col-md-5">
                                    <label>File Name</label>
                                    <input type="text" class="form-control" name="filename" placeholder="Enter the Name of the file">
                               </div>
                                
                               <div class="col-md-5">
                                    <label>File</label>
                                    <input type="file" name="thefile"  class="form-control-file" />

                               </div>

                           </div>
                           <br>
                           <div class="row">
                           <div class="col-md-5">
                                    <input type="submit" name="addmaterial" value="Add Material"  class="btn btn-info" />

                               </div>
                           </div>
                       </form>
                       <?php 
                      }else if(isset($_GET["courseID"])){
                       ?>
                       <a href="?upload=true & course=<?php echo $_GET['courseID'] ?>" class="btn btn-info">Upload material</a>
                       <a href="quiz.php?courseID=<?php echo $_GET['courseID'] ?>" class="btn btn-info">Post Quiz</a>
                       <a href="?discussion=true & course=<?php echo $_GET['courseID'] ?>" class="btn btn-info">Discussions</a>
                       <!-- chat item -->
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>SN</th>
                                  <th>File type</th>
                                  <th>File Name</th>
                                  <th>Control</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          $lsa = "SELECT*FROM materialcourse AS mt INNER JOIN course as sc 
                          ON mt.courseID = sc.course_id WHERE sc.course_id =?";
                          $b = $conn->prepare($lsa);
                          $b->bindValue(1,$_GET["courseID"]);
                          $b->execute();

                          $n = 0;
                          while ($row = $b->fetch(PDO::FETCH_OBJ)){
                              $n++;
                          ?>
                              <tr>
                                  <td><?php echo $n ?></td>
                                  <td>.docx</td>
                                  <td><a href="../Material/<?php echo $row->fileName; ?>"><?php echo $row->fileName; ?> </a></td>
                                  <td><a href="" class="btn btn-danger">Remove</a></td>
                              </tr>
                          <?php } ?>
                          </tbody>
                      </table>
                       <?php }else{?>
                       <!-- chat item -->
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>SN</th>
                                  <th>Course Name</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php 
                        
                                $l = "SELECT*FROM course AS c INNER JOIN course_assigned AS ca 
                                ON c.course_id = ca.courseID WHERE ca.lecturerID=?";
                                $op = $conn->prepare($l);
                                // session_start();
                                $op->bindValue(1,$_SESSION["uid"]);
                                $op->execute();
                                $n = 0;
                                while($f = $op->fetch(PDO::FETCH_OBJ)){
                                    $n++;
                                ?>
                            
                              <tr>
                                  <td><?php echo $n; ?></td>
                                  <td><a href="?courseID=<?php echo $f->courseID ?>"><?php echo $f->CourseName ?></a></td>
                               
                              </tr>
                                   
                            <?php } ?>
                          </tbody>
                      </table>
                       <?php }?>

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
