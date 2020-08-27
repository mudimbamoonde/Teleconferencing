<?php
include "include/config.php";

//Get query String
$student = $_REQUEST['student'];

$stud = " ";

//Get Student

try{

    $sql = "SELECT*FROM student_program WHERE student_id = ? OR programName = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bindValue(1,$student);
    $stmt->bindValue(2,$student);
    $stmt->execute();


    if ($stmt->rowCount() >0) {
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        $sin = $row->student_id;
        $semester = $row->semester_id;
        $studentID = $row->studentID;
        ////
        $qu ="SELECT*FROM student1 WHERE st_id = ?";
        $pr = $conn->prepare($qu);
        $pr->bindValue(1,$studentID);
        $pr->execute();
        $rx = $pr->fetch(PDO::FETCH_OBJ);
        $st_id = $rx->st_id;
        $fullname = $rx->firstname ." ".$rx->lastname;

        $stud .= "
<table class='table table-responsive table-bordered'>
    <thead class='bg bg-primary text-white'>
      <tr>
      <th>SIN</th>
      <th>Student Name</th>
      <th>Semester</th>
      <th>Action</th>
</tr>  
   </thead>
   <tbody>";
        $stud .= "<tr>
        <td><a href='viewDetails.php?internal=$st_id'>$sin</a></td>
        <td>$fullname</td>
        <td>$semester</td>
        <td><a href='edit_student.php?internalID=$st_id' class='btn btn-warning'>Edit</a> | <a href='#'  class='btn btn-danger'>
                        <span class='mdi mdi-delete-circle'></span></a></td>
      </tr> ";

        $stud .= "
		</tbody>
  <tr>
  <td>".$stmt->rowCount()."</td>
</tr>
</table>";
    }else{
        $stud .="<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b><span class='mdi mdi-alert'></span> No Student /".$stmt->rowCount()."</b>
        </div>";
    }


}catch (Exception $e){
    $stud .=$e->getMessage();

}

echo $stud;






//if ($student != ""){
//    $student = strtolower($student);
//    $len = strlen($student);
//
//    $stud .="         <table class='table table-responsive'>
//    <thead>
//      <tr>
//      <th>SIN</th>
//      <th>Student Name</th>
//      <th>Semester</th>
//      <th>Action</th>
//</tr>
//   </thead>
//   <tbody>";
//    foreach ($stmt->fetch(PDO::FETCH_OBJ) as $ss){
//        if (stristr($student,substr($ss,0,$len))){
//            if ($stud ==""){
//                $stud= $ss;
//            }else{
//                $stud .="
//
//      <tr>
//        <td>$ss->student_id</td>
//        <td>$ss->firstname $row->lastname</td>
//        <td>1</td>
//        <td>Edit</td>
//      </tr> ";
//            }
//        }
//    }
//    $stud .="  </tbody>
//</table>";
//}

