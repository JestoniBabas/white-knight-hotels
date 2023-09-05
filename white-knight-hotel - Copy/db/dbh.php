<?php

$host = "127.0.0.1";
$db = "hms";
$user = "root";
$pwd = "";

try{
    $conn = new PDO("mysql:host=".$host."; dbname=".$db."", $user, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo $e->getMessage();
    die();
}


//activity log 

function act_log($conn, $a, $b, $c, $d, $e){
    $stm = "INSERT INTO activities(icon, avatar, fullname, act, dt) VALUES('$a', '$b', '$c', '$d', '$e')";

    $conn->prepare($stm)->execute();
}

//date and time 
date_default_timezone_set('Asia/Manila');
$date_default = date('m-d-Y');
$time_default = date('g:i a');