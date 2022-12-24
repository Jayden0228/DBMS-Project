<?php
    session_start();
    include "Php/_connectDatabase.php";

    if(isset($_POST['Address'])){
        $_SESSION['hno']=$_POST['addr'];
        echo "Set";
    }
    // if(isset($_POST['Pmethod'])){
    //     if($_POST['payment']==2)
    //         echo "yes";
    //     else
    //         echo "no";
    // }

    if(isset($_POST['Creditcard'])){
        $_SESSION['cdno']=$_POST['card'];
    }
    mysqli_close($db);
?>