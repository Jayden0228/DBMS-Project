<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="craftoza2";

    $db=mysqli_connect($servername,$username,$password,$dbname);

    if(!$db){
        die("Sorry failed to connect: ".mysqli_connect_error());
    }
?>