<?php
session_start();
include_once 'db/dbh.php';

if(isset($_POST['btn-login'])){
    
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

        $pwd_hash = hash('sha512', $pwd);

        $log = $conn->query("SELECT * FROM users WHERE email='".$email."' AND pwd='".$pwd_hash."'");
        $log->execute();

        if($log->rowCount() < 1){
            header("Location:index.php?log=failed"); 
        } else {
            //get data 
            $r = $log->fetch(PDO::FETCH_OBJ);

            $_SESSION['uid'] = $r->uid;
            $_SESSION['fullname'] = $r->fullname;
            $_SESSION['email'] = $r->email;
            $_SESSION['avatar'] = $r->avatar;
            $_SESSION['theme'] = $r->theme;
            $_SESSION['utype'] = $r->utype;

            //update status log 
            $set = $conn->query("UPDATE users SET status='1' WHERE uid='".$r->uid."'");
            $set->execute();

            header("Location:index.php?log=success");
           
        }

}