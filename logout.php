<?php
require_once "include/config.php";
//four steps to closing a session
//(i.e logging out)

//1. Find the session
session_start();
//2. unset all the session variables
$_SESSION =array();

//3. Destroy the sessoion cookie
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '' , time()-4200, '/');
}
//4. Destroy the session
session_destroy();
header("location:login.php");
