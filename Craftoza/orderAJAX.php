<?php
    session_start();
    include "Php/_connectDatabase.php";

    if(isset($_POST['Address'])){
        $_SESSION['hno']=$_POST['addr'];
        echo "Set";
    }
    mysqli_close($db);
?>