<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "fashion_shop";
    $con = new mysqli($servername, $username, $password, $database);

    if($con->connect_error) {
        die("CONNECTION FAILTED");
    }
?>