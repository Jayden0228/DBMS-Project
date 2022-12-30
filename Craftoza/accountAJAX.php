<?php
    session_start();
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['uaddr'])){
            $_SESSION['HnoUp']=$_POST['AddrHno'];
            echo $_SESSION['HnoUp'];
        }
        if(isset($_POST['updateaddr']))
        {
            $hfno=$_POST["hfno"];
            $wname=$_POST["wname"];
            $villcity=$_POST["villcity"];
            $taluka=$_POST["taluka"];
            $state=$_POST["state"];
            $pcode=$_POST["pcode"];
            $sql="UPDATE `address` SET `hno`='$hfno',`wname`='$wname',`villageCity`='$villcity',`taluka`='$taluka',`state`='$state',`pincode`='$pcode' WHERE `uid`='{$_SESSION['UserID']}' AND `hno`='{$_SESSION['HnoUp']}'";

            $res=mysqli_query($db,$sql);
            if(!$res){
                echo "NotUpdated";
            }else{
                unset($_SESSION['HnoUp']);
                echo "Updated";
            }
        }
    }
    mysqli_close($db);
?>