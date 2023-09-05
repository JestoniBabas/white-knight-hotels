<?php
session_start();
include 'db/dbh.php';

//update my profile 
if(isset($_POST['btn_profile'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $avatar = $_FILES['avatar']['name'];

    if($avatar !== ""){

        $ex = explode(".", $avatar);

        $allowed_ext = array("jpg", "jpeg", "png");

        $new_pic = md5(time()).".".$ex[1];

        if(in_array($ex[1], $allowed_ext)){

            $new_pic = md5(time()).".".$ex[1];

            if(move_uploaded_file($_FILES['avatar']['tmp_name'], "images/".$new_pic)){
                
                if($pwd !== ""){

                    $pwd_hash = hash('sha512', $pwd);
                    
                    $stm = "UPDATE users SET fullname='".$fullname."', email='".$email."', pwd='".$pwd_hash."', avatar='".$new_pic."' WHERE uid='".$_SESSION['uid']."'";
                    $set = $conn->query($stm);
                    $set->execute();

                    //get sessions
                    $get = $conn->query("SELECT * FROM users WHERE uid='".$_SESSION['uid']."'");
                    $get->execute();

                    $r = $get->fetch(PDO::FETCH_OBJ);

                    $_SESSION['uid'] = $r->uid;
                    $_SESSION['fullname'] = $r->fullname;
                    $_SESSION['email'] = $r->email;
                    $_SESSION['avatar'] = $r->avatar;
                    $_SESSION['utype'] = $r->utype;
                    $_SESSION['dtc'] = $r->dtc;
                    $_SESSION['theme'] = $r->theme;
                    $_SESSION['status'] = $r->status;
                    //end


                } else {

                    $stm = "UPDATE users SET fullname='".$fullname."', email='".$email."', avatar='".$new_pic."' WHERE uid='".$_SESSION['uid']."'";
                    $set = $conn->query($stm);
                    $set->execute();

                    //get sessions
                    $get = $conn->query("SELECT * FROM users WHERE uid='".$_SESSION['uid']."'");
                    $get->execute();

                    $r = $get->fetch(PDO::FETCH_OBJ);

                    $_SESSION['uid'] = $r->uid;
                    $_SESSION['fullname'] = $r->fullname;
                    $_SESSION['email'] = $r->email;
                    $_SESSION['avatar'] = $r->avatar;
                    $_SESSION['utype'] = $r->utype;
                    $_SESSION['dtc'] = $r->dtc;
                    $_SESSION['theme'] = $r->theme;
                    $_SESSION['status'] = $r->status;
                    //end

                }
            
                header("Location:profile.php");
            }

        }

    } else {

        if($pwd !== ""){

            $pwd_hash = hash('sha512', $pwd);
            
            $stm = "UPDATE users SET fullname='".$fullname."', email='".$email."', pwd='".$pwd_hash."' WHERE uid='".$_SESSION['uid']."'";
            $set = $conn->query($stm);
            $set->execute();

            //get sessions
            $get = $conn->query("SELECT * FROM users WHERE uid='".$_SESSION['uid']."'");
            $get->execute();

            $r = $get->fetch(PDO::FETCH_OBJ);

            $_SESSION['uid'] = $r->uid;
            $_SESSION['fullname'] = $r->fullname;
            $_SESSION['email'] = $r->email;
            $_SESSION['avatar'] = $r->avatar;
            $_SESSION['utype'] = $r->utype;
            $_SESSION['dtc'] = $r->dtc;
            $_SESSION['theme'] = $r->theme;
            $_SESSION['status'] = $r->status;
            //end

        } else {

            $stm = "UPDATE users SET fullname='".$fullname."', email='".$email."' WHERE uid='".$_SESSION['uid']."'";
            $set = $conn->query($stm);
            $set->execute();

            //get sessions
            $get = $conn->query("SELECT * FROM users WHERE uid='".$_SESSION['uid']."'");
            $get->execute();

            $r = $get->fetch(PDO::FETCH_OBJ);

            $_SESSION['uid'] = $r->uid;
            $_SESSION['fullname'] = $r->fullname;
            $_SESSION['email'] = $r->email;
            $_SESSION['avatar'] = $r->avatar; 
            $_SESSION['utype'] = $r->utype;
            $_SESSION['dtc'] = $r->dtc;
            $_SESSION['theme'] = $r->theme;
            $_SESSION['status'] = $r->status;
            //end

        }
    
        header("Location:profile.php");

    }

}
