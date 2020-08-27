<?php
require "include/config.php";
if(isset($_SESSION["username"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Teleconferencing System : Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!--    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">-->
    <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body >

<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<div class="col-md-1"></div>
<div class="col-md-4 col-md-offset-3 vertical-off-2">
	<div class="panel panel-default login-form"  style="color:black;opacity: 0.9;">
	<div class="panel panel-heading"  align="center" style="background-color: #8f55fe;color:white">
        <h2>Teleconferencing</h2>
    </div>

	  	<div class="panel-body">

	  		<form method="post" >
                <div id="messagePost">
                   <?php
                   //Login to server
                   if(isset($_POST["login"])) {
                       //loginUser:1,username:username,password:password
                       try{

                           $username = htmlentities(htmlspecialchars(trim($_POST["username"])));
                           $password = md5(htmlentities(htmlspecialchars(trim($_POST["password"]))));

                           $sql = "SELECT*FROM user WHERE username =:username AND password =:password";
                           $stmt = $conn->prepare($sql);
                           $stmt->bindParam(":username",$username,PDO::PARAM_STR);
                           $stmt->bindParam(":password",$password,PDO::PARAM_STR);
                           $stmt->execute();
                           $row = $stmt->fetch(PDO::FETCH_OBJ);

                           if ($stmt->rowCount()==1){
//                               session_start();

                               $sl = "SELECT*FROM admin  WHERE email =:email";

                               $stt = $conn->prepare($sl);
                               $stt->bindParam(":email",$row->email,PDO::PARAM_STR);
                               $stt->execute();

                               $rw = $stt->fetch(PDO::FETCH_OBJ);

                               $_SESSION["email"] = $row->email;
                               $_SESSION["username"] = $row->username;
                               $_SESSION["name"] = $row->name;
                               $_SESSION["accessLevel"] =  $row->access_level;

                               if($stmt->rowCount() == 1){
                                   if($row->access_level == "lecturer"){
                                       $_SESSION["uid"] = $rw->user_id;
                                       header("location:lecturer/index.php");
                                   }else if($row->access_level == "student"){
                                       header("location:index.php");
                                   }else if ($row->access_level == "System Admin"){
                                        $_SESSION["uid"] = $rw->user_id;
                                       header("location:admin/index.php");
                                   }

                               }else{
                                   echo "failed";
                               }

                           }else{
                               echo "<div class='alert alert-danger'>
                               <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>Invalid Username / password</b>
                            </div>";
                           }

                       }catch (Exception $e){
                           echo "<div class='alert alert-danger'>
                           <a href='#' class='close' data-dismiss ='alert' aria-label ='close'>&times;</a><b>" . $e->getMessage() . "</b>
                        </div>";
                       }

//close file

                   }
                   ?>
                </div>
		    	<fieldset>

					<div class="form-group">
				    	<label for="username">username</label>
				    	<input type="text" class="form-control" id="username" name="username" placeholder="Username" required autofocus>
  						<div class=""></div>
				  	</div>
				  	<div class="form-group">
				    	<label for="password">Password</label>
				    	<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				  	</div>					  						 
				  	<div class="col-md-3"></div>
<!--                    <a href="#" class="col-md-6 btn btn-info" id="loginpotter">Login</a>-->
                    <Button class="col-md-6 btn btn-info" name="login">Login</Button>
                    <br>
		    	</fieldset>

		    </form>
	  	</div>

	</div>

</div>
<?php //echo include "include/footer.php"; ?>
<?php include "include/javaScript.php"?>

</body>
<style type="text/css">
	
.vertical-off-4 {
	margin-top: 100px;
}


label{
    color: #9f191f;
}


.login-form fieldset legend {
	padding: 5px;
	text-align: center;
	font-size: 10px;
}
.btn-zp{
    border-radius:30px;
    background-color: #7d6e7e;
    color: whitesmoke;
}
.btn-zp:hover{
    color: #ff0046;
}

input{
    color: #001a35;
}

.login-button {
	padding: 10px;
	font-size: 20px;	
}

.calendars-popup {
    z-index: 10000;
}

.create-modal {
	height: 500px;
	overflow: auto;
}

.edit-modal {
	height: 570px;
	overflow: auto;
}

.candidate-photo {
	width: 65px;
	height: 70px;
}

.upload-photo {
	height: 400px;
	width: 345px;
}

.div-hide {
	display: none;
}

.classSideBar {
	cursor: pointer;
}

/*removes the calendar days*/
.alternate-dates {
	display: none;
}

</style>
</html>