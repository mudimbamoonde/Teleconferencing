<?php
include "include/config.php";

$output = "";
//display messages
if (isset($_POST["fetchMessage"])){
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
     <div class='item'>

                           <img src='dist/img/user4-128x128.jpg' alt='user image' class='online'>

                           <p class='message'>
                               <a href='' class='name'>
                                   <small class='text-muted pull-right'><i class='fa fa-clock-o'></i> $date</small>
                                   $from($from)
                               </a>
                               $message
                           </p>
                           <!-- /.attachment -->
                       </div>";
            }
        }else{

            $output = "
            <div class='item'>

                          <div class='callout callout-danger'>

                          <span class='mdi mdi-alert'></span>&nbsp; No Notification !
                        </div>

                           <!-- /.attachment -->
                       </div>";

        }
    }catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }


//Login to server

    //from	to	subject	message	date	read	msg_id
//    $sql = "SELECT*FROM message";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute();
//    if ($stmt->rowCount() > 0 ) {
//        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//           $from = $row->from;
//           $to = $row->to;
//           $subject = $row->subject;
//           $message = $row->message;
//           $date = $row->date;
//           $msg_id = $row->msg_id;
//
//
////           $output["from"] = $from;
////           $output["to"] = $to;
////           $output["subject"] = $subject;
////           $output["message"] = $message;
////           $output["date"] = $date;
//            $output = "
//            <div class='item'>
//
//                           <img src='dist/img/user4-128x128.jpg' alt='user image' class='online'>
//
//                           <p class='message'>
//                               <a href='' class='name'>
//                                   <small class='text-muted pull-right'><i class='fa fa-clock-o'></i> $date</small>
//                                   $from($from)
//                               </a>
//                               $message
//                           </p>
//                           <!-- /.attachment -->
//                       </div>";
//        }
//
//    }else{
//        $output = "
//            <div class='item'>
//                           <img src='dist/img/user4-128x128.jpg' alt='user image' class='online'>
//                           <p class='message'> No Messages </p>
//                           <!-- /.attachment -->
//                       </div>";
//    }


}

//Login to server
if(isset($_POST["loginUser"])) {
    //loginUser:1,username:username,password:password
    try{
        $username = htmlentities(htmlspecialchars(trim($_POST["username"])));
        $password = md5(htmlentities(htmlspecialchars(trim($_POST["password"]))));

     $sql = "SELECT*FROM user WHERE username =:username AND password = :password";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(":username",$username,PDO::PARAM_STR);
     $stmt->bindParam(":password",$password,PDO::PARAM_STR);
     $stmt->execute();

     $row = $stmt->fetch(PDO::FETCH_OBJ);

     if ($stmt->rowCount()==1){
         session_start();

         $sl = "SELECT*FROM admin  WHERE email =:email";
         $stt = $conn->prepare($sl);
         $stt->bindParam(":email",$row->email,PDO::PARAM_STR);
         $stt->execute();

         $rw = $stt->fetch(PDO::FETCH_OBJ);

          $_SESSION["email"] = $row->email;
          $_SESSION["uid"] = $rw->user_id;
          $_SESSION["username"] = $row->username;
          $_SESSION["name"] = $row->name;
          $_SESSION["accessLevel"] =  $row->access_level;

          if($stmt->rowCount() == 1){
            echo $row->access_level;
          }else{
              echo "failed";
          }

     }else{
         $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Invalid Username / password</b>
        </div>";
     }

    }catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }

//close file

}




//examRegistration:1,examCentre:examCentre,sin:sin,courseName:CourseName
if (isset($_POST["examRegistration"])){
//    examRegistration:1,examCentre:examCentre,sin:sin,courseName:CourseName

    try{
        $examCentre = $_POST["examCentre"];
        $sin = $_POST["sin"];
        $courseName = $_POST["courseName"];
//examID 	student_ID 	CourseCode 	examCentre 	ReferenceNum
        $refere = "EXAM/".date("Y")."/".$sin;
        foreach ($courseName as $course) {
//            echo $course."<br>";
            $sql = "INSERT INTO examRegister VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, NULL);
            $stmt->bindValue(2, $sin);
            $stmt->bindValue(3, $course);
            $stmt->bindValue(4, $examCentre);
            $stmt->bindValue(5, $refere);
//            $stmt->execute();
            if ($stmt->execute()){
                $output .= "<div class='alert alert-success'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Successfully Registration Exam. $refere</b>
        </div>";
            }

             }

    }catch (Exception $e){
        $output .= "<div class='alert alert-danger'>
           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
        </div>";
    }

}
echo $output;
//echo json_encode($output);
