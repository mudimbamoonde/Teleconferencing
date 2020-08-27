<?php
 $host = 'localhost';
    $db_name = 'teleconference';
   $username = 'root';
   $password = '';

//   $dsn["connection"] = array(
//       $host,
//       $db_name,
//       $username,
//       $password
//   );

$data = array();
        try{
            $conn = new PDO('mysql:host='.$host.';dbname='.$db_name, $username,$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            if ($conn){
                //->
//                $dsn["success"] =true;
//                $dsn["key"] =md5($db_name);
//                $dsn["username"] = $username;
//                $dsn["database"] = $db_name;
//                $dsn["password"] = "";
                session_start();
                $data["connection"] = array(true,md5($db_name),$username,$db_name, "");
//                echo json_encode($data);

            }else{
                $data["error"] =  'Error'.$conn->errorCode();
                echo json_encode($data);
            }
        }catch (PDOException $exception){
           $data["error"] =  'Connection Error:'.$exception->getMessage();
           echo json_encode($data);
        }


