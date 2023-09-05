<?php
session_start();
include 'db/dbh.php';

session_destroy();
session_abort();


header("Location:./index.php");