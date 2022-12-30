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

        //Credit Card logic
        if(isset($_POST['ucard'])){
            $_SESSION['cdno']=$_POST['cdno'];
            echo $_SESSION['cdno'];
        }
        if(isset($_POST['updatecard']))
        {
            $cardno=$_POST["cardno"];
            $cvv=$_POST["cvv"];
            $exptdate=$_POST["exptdate"];
            $clabel=$_POST["clabel"];
            
            $sql="UPDATE `creditcard` SET `cardno`='$cardno',`cvv`='$cvv',`expdate`='$exptdate',`label`='$clabel' WHERE `uid`='{$_SESSION['UserID']}' AND `cardno`='{$_SESSION['cdno']}'";

            $res=mysqli_query($db,$sql);
            if(!$res){
                echo "NotUpdated";
            }else{
                echo "Updated";
                unset($_SESSION['cdno']);
                unset($_SESSION['cdno']);
            }
        }
    }
    mysqli_close($db);
?>