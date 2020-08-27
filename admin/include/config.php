<?php
$host = 'localhost';
$db_name = 'teleconference';
$username = 'root';
$password = '';

$data = array();
session_start();
try{
    $conn = new PDO('mysql:host='.$host.';dbname='.$db_name, $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if ($conn){
        //->
        $data["success"] =true;
        // echo json_encode($data);
    }else{
        $data["error"] =  'Error'.$conn->errorCode();
        echo json_encode($data);
    }
}catch (PDOException $exception){
    $data["error"] =  'Connection Error: '.$exception->getMessage();
    echo json_encode($data);
}

