<?php
session_start();
include 'db/dbh.php';

$theme = $_SESSION['theme'];

if(isset($_GET['mode_id'])){

    if($theme === "dark"){
        $get = $conn->query("UPDATE users SET theme='light' WHERE uid='".$_GET['mode_id']."'");
        $get->execute();
    } else {
        $get = $conn->query("UPDATE users SET theme='dark' WHERE uid='".$_GET['mode_id']."'");
        $get->execute();
    }

    $get = $conn->query("SELECT theme FROM users WHERE uid='".$_GET['mode_id']."'");
    $get->execute();

    $r = $get->fetch(PDO::FETCH_OBJ);

    $_SESSION['theme'] = $r->theme;

}

header("Location:".$_SERVER['HTTP_REFERER']."");