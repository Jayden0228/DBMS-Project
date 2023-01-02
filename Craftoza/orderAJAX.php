<?php
    session_start();
    include "Php/_connectDatabase.php";

    if(isset($_POST['Address'])){
        $_SESSION['AddrChoice']=$_POST['addr'];
        echo "Set";
    }

    if(isset($_POST['ChangeAddr'])){
        unset($_SESSION['AddrChoice']);
        echo "Unset";
    }

    if(isset($_POST['CreditCard'])){
        $_SESSION['CardChoice']=$_POST['card'];
        echo "Set";
    }
    mysqli_close($db);
?>