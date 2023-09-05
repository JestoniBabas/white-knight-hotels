<?php
session_start();
include_once 'db/dbh.php';

if($_SESSION['theme'] === "dark"){
    $darkHeader = "dark-header";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>White Knight Hotels</title>
            <meta charset="utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="stylesheet" type="text/css" href="css/glyphicons.css"/>
            <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
            <link rel="stylesheet" type="text/css" href="css/main.css"/>
            <script src="js/fade.js"></script>
            <link rel="icon" href="images/favicon.ico"/>
    </head>
<body id="<?php echo $_SESSION['theme'];?>">
<div class="inner">
    <span class="close_inner" onclick="close_inner()" title="Close"><b>&times;</b></span>
    <div class="outer"  id="<?php echo $_SESSION['theme']; ?>"></div>
</div>
    <script>

        setInterval(() => {

            fetch('ajax/num_stay_counter.php')

        
         }, 1000);

    </script>