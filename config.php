<?php
    $domain = "";
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "urlshortner";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if(!$conn){ //if database is not connected 
        echo "Database connection erorr".mysqli_connect_error();
     }
?>