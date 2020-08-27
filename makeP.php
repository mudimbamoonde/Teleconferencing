<?php
include "include/config.php";
try{
    $username =$_POST["username"];
    $sin =$_POST["sin"];
    $ammountPaid =$_POST["ammountPaid"];
    $paymenttype =$_POST["paymenttype"];
    $semester =$_POST["semester"];
    $desp = $_POST["desp"];
    $BatchNumber = $_POST["btc"];

//File System
//receipt

    $check = "SELECT*FROM student_balance WHERE BatchNumber= ?";
    $stmt1 = $conn->prepare($check);
    $stmt1->bindValue(1,$BatchNumber);
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_OBJ);
    if ($stmt1->rowCount()==1){
        echo "Batch Number Already Used";
    }else{

        ////////////////////////////////////////////////////////////////////////////////////////////
        $fileName = $_FILES["receipt"]["name"];
        $fileTemLoc = $_FILES["receipt"]["tmp_name"];
        $fileNametype = $_FILES["receipt"]["type"];
        $fileNamesize = $_FILES["receipt"]["size"];
        $fileNameError = $_FILES["receipt"]["error"];
        $finalfin = $username." ".date("H-M-Y-d")."_".$fileName;
//echo $fileName;
        //id 	student_id 	semester_id 	paid 	paymentType 	paymentimg 	BatchNumber 	due 	balance 	date_updated
//id 	student_id 	semester_id 	paid 	paymentType 	paymentimg 	due 	balance 	date_updated
        $sql = "INSERT INTO student_balance VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(1,NULL,PDO::PARAM_INT);
        $stmt->bindValue(2,$sin,PDO::PARAM_STR);
        $stmt->bindValue(3,$username,PDO::PARAM_STR);
        $stmt->bindValue(4,$semester,PDO::PARAM_INT);
        $stmt->bindValue(5,"NO",PDO::PARAM_STR);
        $stmt->bindValue(6,$paymenttype,PDO::PARAM_STR);
        $stmt->bindValue(7,$finalfin,PDO::PARAM_STR);
        $stmt->bindValue(8,$BatchNumber,PDO::PARAM_STR);
        $stmt->bindValue(9,$desp,PDO::PARAM_STR);
        $stmt->bindValue(10,$ammountPaid);
        $stmt->bindValue(11,0);
//$stmt->bindValue("0",PDO::PARAM_STR);
        $stmt->execute();

        if (!$fileTemLoc){
            echo "ERROR: Please browse for a file before clicking the upload button";
            exit();
        }


        if (is_uploaded_file($fileTemLoc)){

            if (move_uploaded_file($fileTemLoc,"receipts/$finalfin")){
                echo "$fileName Upload Complete";
                header("location:semester_registration.php");
            }else{
                echo "Failed to move".$fileNameError;
            }

        }else{
            echo "File already uploaded";
        }
    }



}catch (Exception $e){

    echo $e->getMessage();
}

