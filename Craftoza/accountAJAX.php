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
            // $sql="SELECT * FROM `address` WHERE `hno` = '{$_POST['AddrHno']}' AND `uid`='{$_SESSION['UserID']}'";
            // $res1=mysqli_query($db,$sql);
            // $row1=mysqli_fetch_assoc($res1);
            $_SESSION['HnoUp']=$_POST['AddrHno'];
            echo "Update";
        }
        if(isset($_POST['updateaddr'])){
            $hfno=$_POST["hfno"];
            $wname=$_POST["wname"];
            $villcity=$_POST["villcity"];
            $taluka=$_POST["taluka"];
            $state=$_POST["state"];
            $pcode=$_POST["pcode"];
            $sql="UPDATE `address` SET `hno`='$hfno',`wname`='$wname',`villageCity`='$villcity',`taluka`='$taluka',`state`='$state',`pincode`='$pcode' WHERE `uid`='{$_SESSION['UserID']}' AND `hno`='{$_SESSION['HnoUp']}'";

            $res=mysqli_query($db,$sql);
            if(!$res)
            {
                echo "Record not updated.....";
            }else{
                unset($_SESSION['HnoUp']);
                echo "Updated";
            }
        }
    }
    mysqli_close($db);
?>