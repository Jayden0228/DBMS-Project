<?php
    session_start();
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['raddr'])){
            $sql="DELETE FROM `address` WHERE `hno` = '{$_POST['AddrHno']}' AND `uid` = '{$_SESSION['UserID']}'";
            mysqli_query($db,$sql);
        }
        if(isset($_POST['uaddr'])){
            $sql="SELECT * FROM `address` WHERE `hno` = '{$_POST['AddrHno']}' AND `uid`='{$_SESSION['UserID']}'";
            $res1=mysqli_query($db,$sql);
            $row1=mysqli_fetch_assoc($res1);
            // header("location: addressform.php");
        }
    }
?>