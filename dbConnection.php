<?php

   session_start();
$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = 'root';
$dbName = 'Blogs';

$con = mysqli_connect ($dbHost , $dbUser , $dbPassword , $dbName);


if (! $con) {

    # code...
    die ("Erorr : " .mysqli_connect_error());
}


?>
