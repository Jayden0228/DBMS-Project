<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="craftoza";

    $db=mysqli_connect($servername,$username,$password,$dbname);

    if(!$db){
        die("Sorry failed to connect: ".mysqli_connect_error());
    }
?>