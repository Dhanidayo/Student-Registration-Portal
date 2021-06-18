<?php
    //database connection code
    $servername = "localhost";
    $databasename = "registration_form";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $databasename) or die("unable to connect to host");    
    //$mysql = mysql_select_db($conn, 'test') or die("unable to connect to database");
?>