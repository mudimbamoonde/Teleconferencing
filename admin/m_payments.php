
<html>
<head>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
</head>
<body>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<p><br></p>
<div class="col-md-1"></div>
<div class="col-md-2"></div>
<div class="col-md-6">
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="readtick" >
        <input type="text" class="form-control" name="filename" placeholder="Enter File">
        <select name="extension" class="form-control">
            <option>SELECT EXTENSION</option>
            <option>csv</option>
            <option>doc</option>
            <option>json</option>
            <option>pdf</option>
            <option>txt</option>
        </select>
        <textarea class="form-control" style="font-family: 'Times New Roman',serif" name="content"></textarea>
        <input type="submit" class="btn btn-default" name="submit" value="Create File">
        <input type="submit" class="btn btn-default" name="ViewFile" value="View File">
    </form>
</div>

<!--<video controls>-->
<!--    <source src="kk.mp3">-->
<!--</video>-->

</body>
</html>

<?php
$out = "";
if (isset($_POST["submit"])){

    $filename = $_POST["filename"];
    $extension = $_POST["extension"];
    $content = $_POST["content"];
    $file = fopen("$filename.$extension","a");

    if ($extension=="json"){
        $con = json_encode($content);
        fwrite($file,$con);
    }
//   $out .="Loading...";
    $f = fwrite($file,$content);
    $ha = fgetcsv($file);
    fclose($file);
   $out .="Writing to file complete";
}//View File
//if (isset($_POST["ViewFile"])){
//    $filetype = $_FILES["readtick"]["name"];
////    echo readfile($filetype);
//    $myfile  = fopen($filetype,"r") or die("Failed to Open file");
////    echo fread($myfile,filesize($filetype));
////    echo fgets($myfile);
//    while (!feof($myfile)){
////      echo fgets($myfile);
//        echo fgetc($myfile);
//   }
////    pathinfo()
//   fclose($myfile);
//
//$f = ftp_connect("");
//}

print $out;
