<?php
include "include/config.php";
$output = "";
if (isset($_POST["addSchool"])){
    try{
        //    addSchool:1,schname:schname
        $schName = $_POST["schname"];
        if (empty($schName)) {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Don't leave the field blank!</b>
        </div>";
        }else {
//            $output .= $schName;
            $select = "SELECT*FROM school WHERE schoolName='" . $schName . "'";
            $see = $conn->prepare($select);
            $see->execute();
            if ($see->rowCount() == 1) {
                $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>$schName already in the system</b>
        </div>";
            } else {
                $sql = "INSERT INTO school VALUES(?,?)";
                $statement = $conn->prepare($sql);
                $statement->bindValue(1, NULL, PDO::PARAM_INT);
                $statement->bindValue(2, $schName, PDO::PARAM_STR);

                if ($statement->execute()) {
                    $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Inserted</b>
        </div>";
                } else {
                    $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to insert!</b>
        </div>";
                }
            }
        }
    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>".$e->getMessage()."</b>
        </div>";
    }
}


//Fetch School
if (isset($_POST["fetchSchool"])){
    $stmt = $conn->prepare("select*from school");
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $schoolName = $row->schoolName;
            $sch_id = $row->sch_id;
            $output .="<tr>
                           <td>$sch_id</td>
                           <td>$schoolName</td>
                           <td><a class='nav-item'>
        <a class='nav-link' data-toggle='collapse' href='#editSch-$sch_id' aria-expanded='false' aria-controls='editSch-$sch_id'>
                <span class='menu-title bg bg-secondary'>Edit</span>
            
            </a>
            <div class='collapse border-info' id='editSch-$sch_id'>
                <ul class='nav flex-column sub-menu'>
                    <li class='nav-item'>
                           <form class='form-sample'>
                    <div class='row'>                           
                                <div class='col-sm-4'>
                          <input type='text' id='schname-$sch_id' value='$schoolName' name='schname' class='form-control' />
                                </div>
                           
                    </div>
                    <div class='row'>
                        <div class='col-sm-4'>
                        <br>
                            <a href='#'  editSchool='$sch_id'  id='saveEditSchool' class='btn btn-success'>Edit</a>
                        </div>
                        
                    </div>
                </form>
                    </li>
                   

                </ul>
            </div>
        </a> <br> &nbsp;|<a href=\"#\" deleteSchool='$sch_id' id='delSchool' class=\"btn btn-danger\"><span class=\"mdi mdi-delete\"></span></a> </td>
                       </tr>";
            $output.= " ";
        }
    }else{
        $output .="<td>No School Recorded</td>";
    }
}
//Delete School
if (isset($_POST["deleteSchool"])){
    //deleteSchool:1,deleteID:deleteID
    $sch_id = $_POST["deleteID"];
    $del_stmt = $conn->prepare("DELETE FROM school WHERE sch_id=$sch_id");
    if($del_stmt->execute()){
        $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Deleted</b>
        </div>";
    }else{
        $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Delete</b>
         
        </div>".$conn->errorInfo();
    }


}

if (isset($_POST["editSchool"])){
    $schID = $_POST["SchooleditID"];
    $schname = $_POST["schname"];
//    editSchool:1,SchooleditID
//    echo $schname."<br>";
//    echo $schID;
try{

    $sql = "UPDATE school SET schoolName=:schoolName WHERE sch_id=:sch_id";
    $edit= $conn->prepare($sql);
    $edit->bindParam(":schoolName",$schname,PDO::PARAM_STR);
    $edit->bindParam(":sch_id",$schID,PDO::PARAM_INT);
    if($edit->execute()){
        $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>$schname Successfully Edit</b>
        </div>";
    }else{
        $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Edit</b>
        </div>";
    }


}catch (Exception $e){
    $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>".$e->getMessage()."</b>
        </div>";
}

}
//Count schools
if (isset($_POST["countSchool"])){
    $stmt = $conn->prepare("SELECT*FROM program");
    $stmt->execute();
    echo $stmt->rowCount();
}

/**
Programs configuration

 */

if (isset($_POST["schools"])){
    $stmt = $conn->prepare("SELECT*FROM school");
    $stmt->execute();
    $output .="<option selected disabled>SELECT SCHOOL</option>";
   while($row =$stmt->fetch(PDO::FETCH_OBJ)){
       $output .="<option>$row->schoolName</option>";
   }
}

//save Programs
if (isset($_POST["saveProgram"])) {
    $programName = $_POST["programName"];
    $school = $_POST["school"];
    $shrtName = $_POST["shortName"];
//    echo $programName . " " . $school;
    //programName:programName,school:school  :id,:programName,':SchoolName'
    try {
        $sql = "INSERT INTO program VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1, NULL, PDO::PARAM_INT);
        $stmt->bindValue(2, $programName, PDO::PARAM_STR);
        $stmt->bindValue(3, $shrtName, PDO::PARAM_STR);
        $stmt->bindValue(4, $school, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Inserted</b>
        </div>";
        } else {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to insert!</b>
        </div>";
        }
    } catch (Exception $e) {
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";

    }
}
if (isset($_POST["fetchProgram"])){
    $stmt = $conn->prepare("select*from program");
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $schoolName = $row->SchoolName;
            $id = $row->id;
            $programName = $row->programName;
            $pogramcoode = $row->shortname;
            $output .="<tr>
                           <td>$id</td>
                           <td>$programName</td>
                           <td>$pogramcoode</td>
                           <td>$schoolName</td>
                           <td><a href='#' deleteProgram='$id' id='delProgram' class=\"btn btn-danger\"><span class=\"mdi mdi-delete\"></span></a> </td>
                       </tr>";

        }
    }else{
        $output .="<td>No Program Recorded</td>";
    }
}

//Delete Program
if (isset($_POST["deleteProgram"])){
    //deleteProgram:1,deletePID:deleteID
    try{
        $deletePID = $_POST["deletePID"];
        $del_stmt = $conn->prepare("DELETE FROM program WHERE id = ?");
        $del_stmt->bindValue(1,$deletePID);
        if($del_stmt->execute()){
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Deleted</b>
        </div>";
        }else{
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to Delete</b>
         
        </div>".$conn->errorInfo();
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}


//Course
if (isset($_POST["fetchSes"])){
    $stmt = $conn->prepare("SELECT*FROM semester");
    $stmt->execute();
    $output .="<option selected disabled>SELECT SEMESTER</option>";
    while($row =$stmt->fetch(PDO::FETCH_OBJ)){
        $output .="<option>$row->semester</option>";
    }
}

//fetchSemester
if (isset($_POST['fetchSemester'])){
    try{
        $stmt = $conn->prepare("select*from semester");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $semester = $row->semester;
                $semester_id = $row->semester_id;
                $output .= "<tr>
                           <td>$semester</td>
                           <td>$semester_id</td>
                           <td><a href='#' class='btn btn-danger'><span class='mdi mdi-delete'></span></a> </td>
                           </tr>";
            }
        }else{
            $output .="<td>No Semesters Recorded</td>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//Save Semester Conf
if(isset($_POST["saveSemester"])){
    $semester = $_POST["semester"];

    try{
        if (empty($semester)) {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Don't leave the field blank!</b>
        </div>";
        }else {
//            $output .= $schName;
            $select = "SELECT*FROM semester WHERE semester_id = ? ";
            $see = $conn->prepare($select);
            $see->bindValue(1, $semester,PDO::PARAM_INT);
            $see->execute();
            if ($see->rowCount() == 1) {
                $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Semester $semester is already in the system</b>
        </div>";
            }else{
                $sql = "INSERT INTO semester VALUES(?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, NULL, PDO::PARAM_INT);
                $stmt->bindValue(2, $semester, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully inserted</b>
        </div>";
                } else {
                    $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to insert</b>
         
        </div>" . $conn->errorInfo();
                }
            }
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}


/*
 *courses
 *
 * */

if (isset($_POST["saveCourse"])){
    //saveCourse:1,courseName:CourseName,courseCode:CourseCode,year:year,semester:semester
    $courseName = $_POST["courseName"];
    $year = $_POST["year"];
    $semester = $_POST["semester"];
    $courseCode = $_POST["courseCode"];
    try{
        if (empty($semester) || empty($courseName) || empty($year)) {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Don't leave the field blank!</b>
        </div>";
        }else {
//            $output .= $schName;
            $select = "SELECT*FROM course WHERE CourseName = :CourseName ";
            $see = $conn->prepare($select);
            $see->bindParam(":CourseName", $courseName,PDO::PARAM_STR);
            $see->execute();
            if ($see->rowCount() == 1) {
                $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>$courseName is already in the system</b>
        </div>";
            } else {
                //	course_id 	CourseName 	CourseCode 	year 	semester
                $sql = "INSERT INTO course VALUES(?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->bindValue(1, NULL, PDO::PARAM_INT);
                $stmt->bindValue(2, $courseName, PDO::PARAM_STR);
                $stmt->bindValue(3, $courseCode, PDO::PARAM_INT);
                $stmt->bindValue(4, $year, PDO::PARAM_INT);
                $stmt->bindValue(5, $semester, PDO::PARAM_STR);
                if ($stmt->execute()) {
                    $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully inserted</b>
        </div>";
                } else {
                    $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Failed to insert</b>
         
        </div>" . $conn->errorInfo();
                }
            }
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//fetchCourse
if (isset($_POST["fetchCourse"])){
    try{
        $stmt = $conn->prepare("select*from course");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                $n++;
                //course_id	CourseName	CourseCode	year	semester
                $CourseName = $row->CourseName;
                $CourseCode = $row->CourseCode;
                $year = $row->year;
                $semester= $row->semester;
                $output .= "<tr>
                           <td>$n</td>
                           <td>$CourseName</td>
                           <td>$CourseCode</td>
                           <td>$semester</td>
                         
                           <td><a href='#' class='btn btn-danger'><span class='mdi mdi-delete'></span></a> </td>
                           </tr>";
            }
        }else{
            $output .="<td>No Semesters Recorded</td>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}

//count
if(isset($_POST["Countcourses"])){
    $stmt = $conn->prepare("SELECT*FROM course");
    $stmt->execute();
    echo $stmt->rowCount();
}

//user
if(isset($_POST["countUsers"])){
    $stmt = $conn->prepare("SELECT*FROM user");
    $stmt->execute();
    echo $stmt->rowCount();
}


//prgromHint
if (isset($_POST["prgromHint"])) {
    try {
        $stmt = $conn->prepare("select*from program");
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $schoolName = $row->SchoolName;
                $id = $row->id;
                $programName = $row->programName;
                $schName = $row->SchoolName;
                $output .= "<tr>
                         <td>$id</td>
                         <td><a href='#' class='nav-link' programName='$programName' prid='$id'  
                         data-toggle='modal' data-target='#assignCourse'  id='assignCourseID'>$programName</a></td>
                      </tr>";

            }
        }else{
            print "<td>No Program Recorded</td>";
        }


    } catch (Exception $e) {
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}
//programsDisplay
if (isset($_POST["programsDisplay"])) {
    try {
        $stmt = $conn->prepare("select*from program");
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $schoolName = $row->SchoolName;
                $id = $row->id;
                $programName = $row->programName;
                $schName = $row->SchoolName;
                $programCode = $row->shortname;
                $output .= "<tr>
                         <td>$id</td>
                         <td><a href='mag_prog_e.php?pdi=$id' class='nav-link'>$programName</a></td>
                         <td>$programCode</td>
                      </tr>";

            }
        }else{
            print "<td>No Program Recorded</td>";
        }


    } catch (Exception $e) {
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//view
//courseAssign:1,programName:programName,prid:prid
if(isset($_POST["courseAssign"])) {
    $programName = $_POST["programName"];
    $prid = $_POST["prid"];


    $ViewSubject = "SELECT*FROM course ORDER BY CourseName ASC";
    $list = $conn->prepare($ViewSubject);
    $list->execute();
    $output .= " 
       <div class='form-group'>
               <label for='ProgramName' class='col-form-label'>Program Name:</label>
               <input type='text' class='form-control' disabled value='$programName' id='ProgramNameAssin'>
               <input type='hidden' class='form-control' disabled value='$prid' id='programID'>
          </div>
            <div class='form-group'>
               <label for='courseNameAssign' class='col-form-label'>Course Name:</label>
               <select id='courseNameAssign' name='courseNameAssign' class='form-control'>
                        <option selected>SELECT COURSE</option>";
    while ($r = $list->fetch(PDO::FETCH_OBJ)) {
        $output .= "  <option value='$r->course_id'>".$r->CourseName."</option>";
    }
    $output .= "</select>
                   </div>";

}
//Single Assign of course to program
if (isset($_POST["saveAssignSingle"])){
    //saveAssignSingle:1,ProgramName:ProgramName,CourseName:CourseName
      $ProgramName = $_POST["ProgramName"];
      $CourseName= $_POST["CourseName"];
      $programID = $_POST["programID"];
    try{

        $sql = "INSERT INTO program_course VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,NULL,PDO::PARAM_INT);
        $stmt->bindValue(2,$CourseName,PDO::PARAM_INT);
        $stmt->bindValue(3,$programID,PDO::PARAM_INT);
        if($stmt->execute()){
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Assigned</b>
        </div>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}
//Bulk Course fetch
if (isset($_POST["BulkCourse"])){
    try{
        $stmt = $conn->prepare("SELECT*FROM course");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ) ) {
                $n++;
                //course_id	CourseName	CourseCode	year	semester
                $course_id = $row->course_id;
                $CourseName = $row->CourseName;
                $CourseCode = $row->CourseCode;
                $year = $row->year;
                $semester= $row->semester;
                $output .= "<tr>
                           <td><input type='checkbox' value='$course_id' name='courseB[]' id='courseB[]'>
                           </td>
                           <td>$CourseName</td>
                           <td></td>
                          </tr>";
            }

        }else{
            $output .="<td>No Courses Recorded</td>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}
//bulk select
if (isset($_POST["Bulkp"])){
    $program = $conn->prepare("select*from program");
    $program->execute();

    $output .=" <option selected disabled>SELECT PROGRAM</option>";
    while($ft = $program->fetch(PDO::FETCH_OBJ)) {
        $pgName = $ft->programName;
        $programID = $ft->id;
       // $both = array("programID" =>$programID, "programx" => $pgName);
        $output .="<option value='$programID'>$pgName</option>";
    }
}
//insert Bulk
if (isset($_POST["BulkcourseAssign"])){
    $programName = $_POST["programName"];
    $CourseName = $_POST["CourseName"];
//    $cNane= $_POST["cNane"];

    $n =0;
    try{
        foreach ($CourseName as $course){
            $n++;
            $sql = "INSERT INTO program_course VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,NULL,PDO::PARAM_INT);
            $stmt->bindValue(2,$course,PDO::PARAM_STR);
            $stmt->bindValue(3,$programName,PDO::PARAM_STR);
//            $stmt->bindValue(4,$cNane,PDO::PARAM_STR);

            if ($stmt->execute()) {
                $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Assigned</b>
            <ol>
              <li>$course</li>
            </ol>

        </div>";
            }
            }



    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}
/**
Student Management section*/
if(isset($_POST["addStudent"])){
    /*
     * addStudent:1,firstname:firstname,lastname:lastname,othername:othername,
                dateofbirth:dateofbirth,gender:gender,nrc:nrc,programStudy:program_study,address:phyaddress,
                studymode:modeofstudy, email:email,phone:phone*/


    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $othername = $_POST["othername"];
    $dateofbirth = $_POST["dateofbirth"];
    $gender= $_POST["gender"];
    $nrc = $_POST["nrc"];
    $programStudy = $_POST["programStudy"];
    $address = $_POST["address"];
    $studymode = $_POST["studymode"];
    $email = $_POST["email"];
    $phone= $_POST["phone"];

    @$age = date("Y") - $dateofbirth;
    //st_id  firstname   lastname    othername   dob     nrc     age  gender program     doe     address     modeofstudy     email   phone   status
    try{


        //Program
        $sqli = "SELECT * FROM program WHERE shortname='$programStudy'";
        $th = $conn->prepare($sqli);
        $th->execute();
        $fth = $th->fetch(PDO::FETCH_OBJ);
        $programCode = $fth->shortname;
        $programName = $fth->programName;



        //
        $sql = "INSERT INTO student1 VALUES(?,?,?,?,?,?,?,?,?,?,NOW(),?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(1,NULL,PDO::PARAM_INT);
        $stmt->bindValue(2,$fname,PDO::PARAM_STR);
        $stmt->bindValue(3,$lname,PDO::PARAM_STR);
        $stmt->bindValue(4,$othername,PDO::PARAM_STR);
        $stmt->bindValue(5,$dateofbirth);
        $stmt->bindValue(6,$nrc,PDO::PARAM_STR);
        $stmt->bindValue(7,$age,PDO::PARAM_INT);
        $stmt->bindValue(8,$gender,PDO::PARAM_STR);
        $stmt->bindValue(9,$programName,PDO::PARAM_STR);
        $stmt->bindValue(10,$programCode,PDO::PARAM_STR);
        //$stmt->bindValue(10,"NOW()");
        $stmt->bindValue(11,$address,PDO::PARAM_STR);
        $stmt->bindValue(12,$studymode,PDO::PARAM_STR);
        $stmt->bindValue(13,$email,PDO::PARAM_STR);
        $stmt->bindValue(14,$phone,PDO::PARAM_INT);
        $stmt->bindValue(15,"0",PDO::PARAM_STR);
        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Submitted</b>

        </div>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a>$programStudy-><b>" . $e->getMessage() . "</b>
        </div>";
    }


}
//edit student
if(isset($_POST["EditStudent"])){
    /*
     * addStudent:1,firstname:firstname,lastname:lastname,othername:othername,
                dateofbirth:dateofbirth,gender:gender,nrc:nrc,programStudy:program_study,address:phyaddress,
                studymode:modeofstudy, email:email,phone:phone*/


    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $othername = $_POST["othername"];
    $dateofbirth = $_POST["dateofbirth"];
    $gender= $_POST["gender"];
    $nrc = $_POST["nrc"];
    $programStudy = $_POST["programStudy"];
    $address = $_POST["address"];
    $studymode = $_POST["studymode"];
    $email = $_POST["email"];
    $phone= $_POST["phone"];
    $internalID= $_POST["internalID"];
    $programCode= $_POST["programCode"];

    @$age = date("Y") - $dateofbirth;
    //st_id  firstname   lastname    othername   dob     nrc     age  gender program     doe     address     modeofstudy     email   phone   status
    try{




        $sql = "UPDATE student1 SET firstname= ?,lastname= ?,othername= ?,
                            dob= ?, nrc =?,age =?, gender = ?,
                            program = ?,programCode=?,address =?,modeofstudy=?,
                            email = ?,phone = ? WHERE st_id=?";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(1,$fname,PDO::PARAM_STR);
        $stmt->bindValue(2,$lname,PDO::PARAM_STR);
        $stmt->bindValue(3,$othername,PDO::PARAM_STR);
        $stmt->bindValue(4,$dateofbirth);
        $stmt->bindValue(5,$nrc,PDO::PARAM_STR);
        $stmt->bindValue(6,$age,PDO::PARAM_INT);
        $stmt->bindValue(7,$gender,PDO::PARAM_STR);
        $stmt->bindValue(8,$programStudy,PDO::PARAM_STR);
        $stmt->bindValue(9,$programCode,PDO::PARAM_STR);
        //$stmt->bindValue(10,"NOW()");
        $stmt->bindValue(10,$address,PDO::PARAM_STR);
        $stmt->bindValue(11,$studymode,PDO::PARAM_STR);
        $stmt->bindValue(12,$email,PDO::PARAM_STR);
        $stmt->bindValue(13,$phone,PDO::PARAM_INT);
        $stmt->bindValue(14,$internalID,PDO::PARAM_INT);
        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Edited</b>

        </div>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }


}


///

//Count Students
if(isset($_POST["countStudents"])){
    $stmt = $conn->prepare("select*from student1");
    $stmt->execute();
    echo $stmt->rowCount();
}
//fetchStudent
if(isset($_POST["fetchStudent"])){
    /// the acceptance of students should be in a timeline

    try {

//       $frf= date("Y-m-d");doe ='$frf'
        $sql = "SELECT*FROM student1 WHERE status='0' ORDER BY   st_id  DESC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()> 0){
            $n = 0;
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $n++;
                //
               //st_id	firstname	lastname	othername	dob	nrc	age	gender	program	doe	address	modeofstudy	email	phone	status
                $st_id = $row->st_id;
                $fname = $row->firstname;
                $lname = $row->lastname;
                $othername = $row->othername;
                $dob= $row->dob;
                $nrc = $row->nrc;
                $age = $row->age;
                $gender = $row->gender;
                $program = $row->program;
                $doe = $row->doe;
                $address = $row->address;
                $modeofstudy = $row->modeofstudy;
                $email= $row->email;
                $phone= $row->phone;
                $programCode= $row->programCode;
                $status = $row->status;

//                $time = date("Y");
                $is = explode("-",$doe);
                $yearr = $is[0];
                $mt = $is[1];
                $dg = $is[2];
                $forx = date("m-d");
                $fr = explode("-",$forx);
//Generate STUDENT ID -> FORMAT year-month-nrc
                $Year  = date("y");
                $month = $mt;
                $dv = explode("/",$nrc);
                $finalNrc = $dv[0];

                $studentID = $Year.$month.$finalNrc;

                if($is[1]."-".$is[2]==$fr[0].'-'.$fr[1]){
                    $t = "<span class='btn  btn-secondary btn-sm'>Today</span>";
                }else{
                    $i = explode("-",$doe);
                    $year = $i[0];
                    $m = $i[1];
                    $d = $i[2];
                    $for = date("Y-m-D");
                    $f = explode("-",$for);
                    $m =$f[1] ;
                    $d=$f[2];
                    $year=$f[0];
                    $t = "<span class='btn  btn-primary btn-sm'>$doe</span>";
                }
                if($status == 0){
                    $st = "<span class='btn  btn-warning btn-sm'>pending</span>";
                }else{
                    $st = "<span class='btn btn-danger btn-sm '>inActive</span>";
                }
                //id 	student_id 	studentID 	programName 	semester_id 	type 	date_enrolled 	year 	program_duration 	years_studied 	completed
                $output .=" <tr> <th>$n</th>
                                                    <td>$fname</td>
                                                    <td>$lname</td>
                                                    <td>$othername</td>
                                                    <td>$t</td>
                                                    <td>$modeofstudy</td>
                                                    <td>$dob</td>
                                                    <td>$age</td>
                                                    <td>$nrc</td>
                                                    
                                                    <td>$st</td>
                                                    
                                                    <td><a href='#' student_id='$studentID' studentFID='$st_id' 
                                                     status='$status'  date_enroll='$doe' programName='$program' programCode='$programCode'  id='approve'
                                                    class='btn btn-primary'>Approve</a> |
                                                     <a href='#'  rejectFID='$st_id' id='rejectLearner' 
                                                     class='btn btn-danger'>Reject</a> </td>
                                                </tr>";
            }

        }else{
            $output .="<tr>
                          <th>No  Appending Student</th>
                         </tr>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}
//Reject Application
if (isset($_POST["rejectApplication"])){
    //*rejectApplication:1,rejectFID */
    try{
        $fid = $_POST["rejectFID"];
//        echo $fid;

        $sql = "DELETE FROM student1 WHERE st_id=:st_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":st_id",$fid);
        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Rejected</b>

        </div>";
        }
    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }


}

//ManageStudents
if (isset($_POST["ManageStudents"])){
    try {

//       $frf= date("Y-m-d");doe ='$frf'
        $sql = "SELECT*FROM student1 WHERE status='1' ORDER BY st_id  DESC";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount()> 0){
            $n = 0;
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                $n++;
                //
                //st_id	firstname	lastname	othername	dob	nrc	age	gender	program	doe	address	modeofstudy	email	phone	status
                $st_id = $row->st_id;
                $fname = $row->firstname;
                $lname = $row->lastname;
                $othername = $row->othername;
                $dob= $row->dob;
                $nrc = $row->nrc;
                $age = $row->age;
                $gender = $row->gender;
                $program = $row->program;
                $doe = $row->doe;
                $address = $row->address;
                $modeofstudy = $row->modeofstudy;
                $email= $row->email;
                $phone= $row->phone;
                $status = $row->status;

                $output .=" <tr> <th>$n</th>
                                                    <td>$fname</td>
                                                    <td>$lname</td>
                                                    <td>$program</td>
                                                  
                                                    <td><span class='label label-danger'>Active</span></td>
                                                    <td><a href='semester_assign.php?internalID=$st_id ' class='btn btn-info'>Assign Semester</a>|<a href='edit_student.php?internalID=$st_id' class='btn btn-primary'>Edit</a> |
                                                     <a href='viewDetails.php?internal=$st_id' class='btn btn-danger'>View Details</a> </td>
                                                </tr>";
            }

        }else{
            $output .="<tr>
                          <th>No  Active Student</th>
                         </tr>";
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//approve student application
if(isset($_POST["approveApplication"])){
    //approveApplication:1,studentID:studentID,StudentfieldID:StudentfieldID,
    //status:status,date_enroll:date_enroll,programName:programName
    $StudentID = $_POST["studentID"];
    $fieldID = $_POST["StudentfieldID"];
    $status = $_POST["status"];
    $date_enroll = $_POST["date_enroll"];
    $programName = $_POST["programName"];
    $programCode = $_POST["programCode"];
    //id 	student_id 	studentID 	programName 	semester_id 	type 	date_enrolled 	year 	program_duration 	years_studied 	completed
    try{
    $sql = "INSERT INTO student_program VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(1,NULL,PDO::PARAM_INT);
    $stmt->bindValue(2,$StudentID,PDO::PARAM_INT);
    $stmt->bindValue(3,$fieldID,PDO::PARAM_STR);
    $stmt->bindValue(4,$programName,PDO::PARAM_STR);
    $stmt->bindValue(5,$programCode,PDO::PARAM_STR);
    $stmt->bindValue(6,"1",PDO::PARAM_INT);
    $stmt->bindValue(7,"major",PDO::PARAM_STR);
    $stmt->bindValue(8,$date_enroll);
    $stmt->bindValue(9,"1");
    $stmt->bindValue(10,"4",PDO::PARAM_INT);
    $stmt->bindValue(11,"1",PDO::PARAM_INT);
    $stmt->bindValue(12,"0",PDO::PARAM_INT);
        $stmt->execute();

        $sql2 = "UPDATE student1 SET status= ? WHERE st_id= ?";
   $update =$conn->prepare($sql2);
   $update->bindValue(1,"1");
   $update->bindValue(2,$fieldID);


    if( $update->execute()) {
        $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Approved</b>
        </div>";
    }


}catch (Exception $e){
    $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
}

}


//*
//DANGER ZONE ADMIN AT WORK
//
//**/


if (isset($_POST["saveAdmin"])){
    $fname = $_POST["firstname"];
    $lname = $_POST["lastname"];
    $username = $_POST["username"];
    $accessLevel= $_POST["accesslevel"];
    $gender= $_POST["gender"];
    $nrc = $_POST["nrc"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $phone= $_POST["phone"];
    try{
        if (empty($fname) ||empty($lname) || empty($username) || empty($gender)|| empty($phone) || empty($address)||empty($email)) {
            $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Dont leave the form blank</b>
        </div>";
        }else{
          
            $sql = "INSERT INTO admin VALUES(?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1,NULL,PDO::PARAM_INT);
            $stmt->bindValue(2,$lname,PDO::PARAM_STR);
            $stmt->bindValue(3,$fname,PDO::PARAM_STR);
            $stmt->bindValue(4,$username,PDO::PARAM_STR);
            $stmt->bindValue(5,$gender,PDO::PARAM_STR);
            $stmt->bindValue(6,$nrc,PDO::PARAM_STR);
            $stmt->bindValue(7,$accessLevel,PDO::PARAM_STR);
            $stmt->bindValue(8,$address,PDO::PARAM_STR);
            $stmt->bindValue(9,$email,PDO::PARAM_STR);
            $stmt->bindValue(10,$phone,PDO::PARAM_STR);
            $stmt->bindValue(11,"0",PDO::PARAM_STR);

            if ($stmt->execute()){
                $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Added</b>
        </div>";
            }
        }

    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>ERROR:" . $e->getMessage() . "</b>
        </div>";
    }
}

//fetch Admin
if (isset($_POST["fetchAdmin"])){

    try{
        $sql = "SELECT*FROM admin";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                //First Name 	Last Name 	username 	Email 	access Level 	Status 	Action
//              	user_id	firstname	lastname	username	gender	accessLevel	address	email	phone	status
$n++;
                $id = $row->user_id;
                $fname = $row->firstname;
                $lname = $row->lastname;
                $username = $row->username;
                $gender = $row->gender;
                $accessLevel = $row->accessLevel;
                $email = $row->email;
                $address = $row->address;
                $phone = $row->phone;
                $status = $row->status;
                $snrc = $row->nrc;

                if ($status=="0"){
                    $vti = "<label class='btn btn-danger btn-rounded btn-sm'>InActive</label>";
                }else{
                    $vti = "<label class='btn btn-success btn-rounded btn-sm'>Active</label>";
                }
            $output .=" <tr>
                        <td>$n</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$accessLevel</td>
                        <td>$vti</td>
                        <td><a href='#' user_id='$id' accessLevel='$accessLevel' username='$username' nrc='$snrc' name='$fname $lname' email='$email' id='createAccountAdmin' class='btn btn-warning'>Create Account</a> | <a href='#'  class='btn btn-danger'>
                        <span class='mdi mdi-delete-circle'></span></a> </td>
                    </tr> ";

            }

        }


    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}

if (isset($_POST["fetchlecturer"])){

    try{
        $sql = "SELECT*FROM admin WHERE accessLevel=?";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,"lecturer");
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                //First Name 	Last Name 	username 	Email 	access Level 	Status 	Action
//              	user_id	firstname	lastname	username	gender	accessLevel	address	email	phone	status
$n++;
                $id = $row->user_id;
                $fname = $row->firstname;
                $lname = $row->lastname;
                $username = $row->username;
                $gender = $row->gender;
                $accessLevel = $row->accessLevel;
                $email = $row->email;
                $address = $row->address;
                $phone = $row->phone;
                $status = $row->status;
                $snrc = $row->nrc;

                if ($status=="0"){
                    $vti = "<label class='btn btn-danger btn-rounded btn-sm'>InActive</label>";
                }else{
                    $vti = "<label class='btn btn-success btn-rounded btn-sm'>Active</label>";
                }
            $output .=" <tr>
                        <td>$n</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>$accessLevel</td>
                        <td>$vti</td>
                        <td><a href='allocateCourse.php?lecuturer=$id' class='btn btn-warning'>Add Course</a> 
                        | <a href='#'  class='btn btn-danger'>
                        <span class='mdi mdi-delete-circle'></span></a> </td>
                    </tr> ";

            }

        }


    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}

// 
// LecturerassignCourse:1,courseID:courseID,lecturername:lecturername
if(isset($_POST["LecturerassignCourse"])){
    $courseID = $_POST["courseID"];
    $lecturername = $_POST["lecturername"];
    $sql = "INSERT INTO course_assigned VALUES(?,?,?)";
    $lead = $conn->prepare($sql);
    $lead->bindValue(1,null);
    $lead->bindValue(2,$courseID);
    $lead->bindValue(3,$lecturername);
    if($lead->execute()){
        $output .= "<div class='alert alert-success'>
        <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully inserted</b>
     </div>";
    }else{
        $output .= "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $conn->errorInfo() . "</b>
     </div>";
    }
}


//actvatestudents

if (isset($_POST["actvatestudents"])){

    try{
        $sql = "SELECT*FROM student1";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $n = 0;
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)){
                //First Name 	Last Name 	username 	Email 	access Level 	Status 	Action
//              	user_id	firstname	lastname	username	gender	accessLevel	address	email	phone	status
$n++;
                $st_id = $row->st_id;
                $fname = $row->firstname;
                $lname = $row->lastname;
                $gender = $row->gender;
                $nrc = $row->nrc;
                $email = $row->email;
                $address = $row->address;
                $phone = $row->phone;
                $status = $row->status;
                $viewD= "<a href='view_act.php?st=$st_id'  class='btn btn-dark '><span class='mdi mdi-view-array'></span></a>";
                if ($status=="0"){
                    $vti = "<label class='btn btn-danger btn-rounded btn-sm disabled'>InActive</label>";
                    $val = "<a href='#' disabled='disabled'   class='btn btn-warning disabled'>Create Account</a>";
                    $dl = "<a href='#'  class='btn btn-danger disabled'><span class='mdi mdi-delete-circle'></span></a>";
                }else{
                    $vti = "<label class='btn btn-success btn-rounded btn-sm '>Active</label>";
                    $val = "<a href='#'  internalID= '$st_id' nrc='$nrc' name='$fname $lname' email='$email' id='createAccounts'
                          class='btn btn-warning'>Create Account</a> ";
                    $dl = "<a href='#'  class='btn btn-danger '><span class='mdi mdi-delete-circle'></span></a>";

                }
            $output .=" <tr>
                        <td>$n</td>
                        <td>$fname</td>
                        <td>$lname</td>
                        <td>$email</td>
                        <td>$vti</td>
                        <td>$val | $dl | $viewD</td>
                    </tr> ";

            }

        }


    }catch (Exception $e){
        $output .= "<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}

//creat Accout Student
if (isset($_POST["createAccountStudent"])) {
//username 	password 	nrc 	access_level 	name 	email

    try {
//        createAccountStudent:1,name:name,email:email,internalID:internalID
        $nrct = $_POST["nrc"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $internalID = $_POST["internalID"];
//        echo $nrct;

        $query2 = "SELECT*FROM student1 WHERE email='$email'";
        $querye = $conn->prepare($query2);
        $querye->execute();

        $x = $querye->fetch(PDO::FETCH_OBJ);
        $stu = $x->status;


        if ($querye->rowCount()===1){
            $query = "SELECT*FROM student_program WHERE studentID=$internalID";
            $query1 = $conn->prepare($query);
            $query1->execute();

            if($query1->rowCount()==1){
                $se = $query1->fetch(PDO::FETCH_OBJ);
                $student_id = $se->student_id;

                $hash = md5($student_id);

                $sql = "INSERT INTO user VALUES (?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);

                $stmt->bindValue(1,$student_id,PDO::PARAM_INT);
                $stmt->bindValue(2,$hash,PDO::PARAM_STR);
                $stmt->bindValue(3,$nrct,PDO::PARAM_STR);
                $stmt->bindValue(4,'Student',PDO::PARAM_STR);
                $stmt->bindValue(5,$name,PDO::PARAM_STR);
                $stmt->bindValue(6,$email,PDO::PARAM_STR);


                if($stmt->execute()){
                    $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Created</b>
        </div>";
                }
            }

        }else{
            $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Already Created OR The account is not activated </b>
        </div>";

        }




    } catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Already Created-> " . $e->getMessage() . "</b>
        </div>";
    }


}

///Admin
if (isset($_POST["createAccountAdmin"])) {
//username 	password 	nrc 	access_level 	name 	email
//    {createAccountAdmin:1,name:name,nrc:nrc,email:email,user_id:user_id

    try {
//        createAccountStudent:1,name:name,email:email,internalID:internalID
        $nrcx= $_POST["nrc"];
        $email = $_POST["email"];
        $name = $_POST["name"];
        $accessLevel = $_POST["accessLevel"];
        $user_id = $_POST["user_id"];
        $username = $_POST["username"];
//        echo $nrct;

        $query = "SELECT*FROM user WHERE email=?";
        $query1 = $conn->prepare($query);
        $query1->bindValue(1,$email);
        $query1->execute();

        if ($query1->rowCount() == 1) {
            $output .= "<div class='alert alert-danger'>
            <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Email Already used</b>
         </div>";

        } else {
          

        $qu = "UPDATE admin SET status=1 WHERE user_id=$user_id";
        $qu1 = $conn->prepare($qu);
        $qu1->execute();


        $hash = md5($username);

        $sql = "INSERT INTO user VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(1, $username, PDO::PARAM_INT);
        $stmt->bindValue(2, $hash, PDO::PARAM_STR);
        $stmt->bindValue(3, $nrcx, PDO::PARAM_STR);
        $stmt->bindValue(4, $accessLevel, PDO::PARAM_STR);
        $stmt->bindValue(5, $name, PDO::PARAM_STR);
        $stmt->bindValue(6, $email, PDO::PARAM_STR);


        if ($stmt->execute()) {
            $output .= "<div class='alert alert-success'>
       <a href='#' class='close' data-dismiss ='alert' aria-label ='close'><span class='mdi mdi-close'></span></a><b>Successfully Created</b>
    </div>";
        }

        }

    } catch (Exception $e) {
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }
}

//message
if (isset($_POST["message"])){
    try{
        $sql = "SELECT*FROM message";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0 ) {
            while ($row=$stmt->fetch(PDO::FETCH_OBJ)) {
                //from	to	subject	message	date	read	msg_id
                $from = $row->from;
                $to = $row->to;
                $subject = $row->subject;
                $message = $row->message;
                $date = $row->date;
                $msg_id = $row->msg_id;

                //2012-01-17 00:23:33
                $da = explode("-",$date);
                $year = $da[0];
                $month = $da[1];
                $day = $da[2];
//
//                $hour = $da[4];
//                $minute = $da[5];
//                $second = $da[6];

                $output .="
    <div class=\"row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3\">
   
    <div class=\"ticket-details col-md-9\">
        <div class=\"d-flex\">
            <p class=\"text-dark font-weight-semibold mr-2 mb-0 no-wrap\">$from:</p>
            <p class=\"text-primary mr-1 mb-0\">[$from]</p>
            <p class=\"mb-0 ellipsis\">$subject</p>
        </div>
        <p class=\"text-gray ellipsis mb-2\">
        $message
        </p>
        <div class=\"row text-gray d-md-flex d-none\">
            <div class=\"col-4 d-flex\">
                <small class=\"Last-responded mr-2 mb-0 text-muted text-muted\">3 hours ago</small>
            </div>
            <div class=\"col-4 d-flex\">
                <small class=\"mb-0 mr-2 text-muted text-muted\">Due in :</small>
                <small class=\"Last-responded mr-2 mb-0 text-muted text-muted\">6 Days</small>
            </div>
        </div>
    </div>
    <div class=\"ticket-actions col-md-2\">
        <div class=\"btn-group dropdown\">
            <button type=\"button\" class=\"btn btn-success dropdown-toggle btn-sm\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Manage
            </button>
            <div class=\"dropdown-menu\">
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fa fa-reply fa-fw\"></i>reply</a>
                <a class=\"dropdown-item\" href=\"#\">
                    <i class=\"fa fa-history fa-fw\"></i>Delete</a>
                <div class=\"dropdown-divider\"></div>
              
            </div>
        </div>
    </div>
</div>";
            }
        }
    }catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }


}


//assignSemester
if(isset($_POST["assignSemester"])){
//studentID:studentID,semesterID:semesterID
// student_Course->  asign_id 	student_ID 	programID 	course_ID 	Semester 	grade
   try{
       $student_id = $_POST["studentID"];
       $semesterID = $_POST["semesterID"];
       $select = "SELECT programCode FROM student_program WHERE student_id=:student_id";
       $ps = $conn->prepare($select);
       $ps->bindParam(":student_id",$student_id,PDO::PARAM_INT);
       $ps->execute();
       $p = $ps->fetch(PDO::FETCH_OBJ);
       $programCo = $p->programCode;

//echo $programCo;
       //FETCH PROGRAM ID
       $selectx = "SELECT*FROM program WHERE shortname=:programCode";
       $pstm = $conn->prepare($selectx);
       $pstm->bindParam(":programCode",$programCo,PDO::PARAM_STR);
       $pstm->execute();
       $px = $pstm->fetch(PDO::FETCH_OBJ);
       $ids = $px->id;
//    echo $ids;
       //fetch course per Semester

       $cof = "SELECT*FROM course INNER JOIN program_course ON
     course.course_id = program_course.CourseID WHERE programID = :programID AND semester = :semester";
       $prov = $conn->prepare($cof);
       $prov->bindParam(":programID",$ids);
       $prov->bindParam(":semester",$semesterID);
       $prov->execute();

//    $cour = $prov->fetch(PDO::FETCH_OBJ);


       while ($cour =$prov->fetch(PDO::FETCH_OBJ) ){
//        echo "courses->".$cour->CourseName.'<br>';
          $cid = $cour->course_id;
           //check in student Cousers if a course Exist
           $cxsql = "SELECT*FROM student_Course WHERE course_ID  = :course_ID AND student_ID = :student_id ";
           $courseExist = $conn->prepare($cxsql);
           $courseExist->bindParam(":course_ID",$cid);
           $courseExist->bindParam(":student_id",$student_id);
           $courseExist->execute();
           if($courseExist->rowCount() > 0){
               $output .="<div class='alert alert-warning'>
                                  <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Course already Assigned</b>
                               
                                <ul>
               <li>$cour->CourseName</li> 
            </ul>
                                </div>";
           }else{
               //        student_Course-> asign_id 	student_ID 	programID 	course_ID 	Semester 	grade
               $insertSQL = "INSERT INTO student_Course VALUES(?,?,?,?,?,?)";
               $stl = $conn->prepare($insertSQL);
               $stl->bindValue(1,NULL,PDO::PARAM_INT);
               $stl->bindValue(2,$student_id,PDO::PARAM_INT);
               $stl->bindValue(3,$ids,PDO::PARAM_INT);
               $stl->bindValue(4,$cid,PDO::PARAM_INT);
               $stl->bindValue(5,$semesterID,PDO::PARAM_INT);
               $stl->bindValue(6,NULL,PDO::PARAM_INT);

            if ($stl->execute()){
                   $output .="<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Assigned</b>
             <ul>
               <li>$cour->CourseName</li> 
            </ul>
        </div>";
               }
           }
       }

//SELECT*FROM course INNER JOIN program_course ON course.course_id = program_course.CourseID WHERE programID = 3 AND semester = 1
       //insert
       //$insertSQL = "INSERT INTO student_Course VALUES(:ass,:studentID,:prgramID,:CourseID,:semester)";
   }catch (Exception $e){
       $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
   }




}


/**
PAYMENT MANAGEMENT SYSTEM
 **/

if (isset($_POST["viewPayments"])){
    /* id 	student_id 	semester_id 	paid 	paymentType
* paymentimg 	BatchNumber 	Narration 	due
* balance 	date_updated*/
    $sql  ="SELECT*FROM student_balance  WHERE paid=:paid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":paid","NO",PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() >0 ){
            $n = 0;
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $n++;

            $id = $row->id;
            $student_id = $row->student_id;
            $stuname = $row->name;
            $semester_id = $row->semester_id;
            $paid= $row->paid;
            $paymentType = $row->paymentType;
            $paymentimg = $row->paymentimg;
            $BatchNumber = $row->BatchNumber;
            $Narration = $row->Narration;
            $due = $row->due;
            $balance = $row->balance;
            $date_updated = $row->date_updated;
            /**
            <th>#</th>
            <th>Full Name</th>
            <th>Batch Number</th>
            <th>Paid</th>
            <th>Payment Type</th>
            <th>Receipt</th>
            <th>Due</th>
            <th>Balance</th>
            <th>Date sent</th>
            <th>Action</th>
             */
            $output .="
               <tr>
                    <td>$n</td>
                    <td>$stuname</td>
                    <td>$BatchNumber</td>
                    <td>$paid</td>
                    <td>$paymentType</td>
                    <td><a href='../receipts/$paymentimg'>$paymentimg</a> </td>
                    <td>$due</td>
                    <td>$balance</td>
                    <td>$date_updated</td>
                    <td><a href='#' approvePayment='$BatchNumber' id='approveP'  class='btn btn-success'>Approve</a> 
                       | <a href='#' class='btn btn-inverse-dark'>Reject</a> </td>
                </tr>
            ";
        }
    }else{
        $output .="<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>No Payment Made</b>
        </div>";
    }

}if (isset($_POST["approvepaymenttudents"])){
    /* id 	student_id 	semester_id 	paid 	paymentType
* paymentimg 	BatchNumber 	Narration 	due
* balance 	date_updated*/
    $sql  ="SELECT*FROM student_balance  WHERE paid=:paid";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":paid","YES",PDO::PARAM_STR);
    $stmt->execute();
    if($stmt->rowCount() >0 ){
            $n = 0;
        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $n++;

            $id = $row->id;
            $student_id = $row->student_id;
            $stuname = $row->name;
            $semester_id = $row->semester_id;
            $paid= $row->paid;
            $paymentType = $row->paymentType;
            $paymentimg = $row->paymentimg;
            $BatchNumber = $row->BatchNumber;
            $Narration = $row->Narration;
            $due = $row->due;
            $balance = $row->balance;
            $date_updated = $row->date_updated;
            /**
            <th>#</th>
            <th>Full Name</th>
            <th>Batch Number</th>
            <th>Paid</th>
            <th>Payment Type</th>
            <th>Receipt</th>
            <th>Due</th>
            <th>Balance</th>
            <th>Date sent</th>
            <th>Action</th>
             */
            $output .="
               <tr>
                    <td>$n</td>
                    <td>$stuname</td>
                    <td>$BatchNumber</td>
                    <td>$paid</td>
                    <td>$paymentType</td>
                    <td><a href='../receipts/$paymentimg'>$paymentimg</a> </td>
                    <td>$due</td>
                    <td>$balance</td>
                    <td>$date_updated</td>
                   
                </tr>
            ";
        }
    }else{
        $output .="<div class='alert alert-warning'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'></a><b>NO Payment Made</b>
        </div>";
    }

}

//Make payments
if (isset($_POST["makeApprovePayment"])){
    //makeApprovePayment:1,approveID:approveID

try{
    $BatchNumber = $_POST["approveID"];


    //    echo $BatchNumber;
    $b  = "SELECT*FROM student_balance WHERE BatchNumber=?";
    $p = $conn->prepare($b);
    $p->bindValue(1,$BatchNumber);
    $p->execute();

    $x = $p->fetch(PDO::FETCH_OBJ);
    $fb =$x->BatchNumber;
    $semester_id =$x->semester_id;

    if ($BatchNumber == $fb){
//        echo "There are the same";

        $sql = "UPDATE  student_balance SET paid=:paid WHERE BatchNumber = :BatchNumber ";
        $stmt = $conn->prepare($sql);
        $APP = "YES";
        $stmt->bindValue(":paid","YES");
        $stmt->bindParam(":BatchNumber",$BatchNumber);
        if ($stmt->execute()){
            $output .="<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Payment Made</b>
        </div>";
        }
    }else{
        $output .="<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Batch Codes are not the same</b>
        </div>";
    }
}catch (Exception $e){
    $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
}



}

//examStudentRegistration

if (isset($_POST["examStudent"])){
    /**examID	student_ID	CourseCode	examCentre	ReferenceNum
     */
    $sql  = "SELECT*FROM examregister";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0){

        while($row = $stmt->fetch(PDO::FETCH_OBJ)){
            $output .="
            <tr>
                <td>#</td>
                <td>$row->ReferenceNum</td>
                <td>$row->student_ID</td>
                <td><a href='#' class='btn btn-warning'>Print</a> </td>
            </tr>";
        }


    }
}

echo $output;