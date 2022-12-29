<?php
    session_start();
    include "Php/_connectDatabase.php";

    if(isset($_SESSION['HnoUp'])){
        $sql1="SELECT * FROM `address` WHERE `hno` = '{$_SESSION['HnoUp']}' AND `uid`='{$_SESSION['UserID']}'";
        $res1=mysqli_query($db,$sql1);
        $row1=mysqli_fetch_assoc($res1);
    }

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
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
            header("location: address.php");
        }
        if(isset($_POST['newaddr']))
        {
            $hfno=$_POST["hfno"];
            $wname=$_POST["wname"];
            $villcity=$_POST["villcity"];
            $taluka=$_POST["taluka"];
            $state=$_POST["state"];
            $pcode=$_POST["pcode"];

            $sql="INSERT INTO `address` (`uid`, `hno`, `wname`, `villageCity`, `taluka`, `state`, `pincode`) VALUES ('{$_SESSION['UserID']}', '$hfno', '$wname', '$villcity', '$taluka', '$state', '$pcode');";

            $res=mysqli_query($db,$sql);
            if(!$res)
            {
                echo "Record not updated";
            }else{
                echo "Inserted";
            }
            header("location: address.php");
        }
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Goan Handicraft E-commerce site">
    <meta name="keywords" content="Goa ,Goan, Handicraft">
    <meta name="author" content="Jayden Viegas, LLoyd Aldrich Costa">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/nav.css">
    <link rel="stylesheet" href="Css/address.css">
    <title>Craftoza</title>
</head>

<body>
    <div class='Formbox'>
        <span class='arrow1' onclick='displayNone(`AddFormBoxU`)'>&#8592;</span>
        <p id='atext'>Enter the Details</p>
        <hr>
        <form action="" method="POST" class='center2' style='width: 80%;' id="AddressForm">
            <div class="FormRow">
                <div class="FormCol">
                    <label for='Hno/fno'>H.No/Flat NO</label>
                    <input type='text' name='hfno' id='hfno' value="<?php if(isset($row1)) echo $row1['hno']; else echo "";?>" required>
                </div>
                <div class="FormCol">
                    <label for='Wname'>Ward Name</label>
                    <input type='text' name='wname' id='wname' value="<?php echo isset($row1)? $row1['wname']: ""?>" required>
                </div>
            </div>

            <div class="FormRow" style="display: block;">
                <div class="FormCol">
                    <label for='vill/city'>Village/City</label>
                    <input type='text' name='villcity' id='villcity' value="<?php echo isset($row1)? $row1['villageCity']: ""?>" required>
                </div>
            </div>

            <div class="FormRow">
                <div class="FormCol">
                    <label for='Taluka'>Taluka</label>
                    <input type='text' name='taluka' id='taluka' value="<?php echo isset($row1)? $row1['taluka']: ""?>" required>
                </div>
                <div class="FormCol">
                    <label for='state'>State</label>
                    <input type='text' name='state' id='state' value="<?php echo isset($row1)? $row1['state']: ""?>" required>
                </div>
            </div>
            
            
            <div class="FormRow" style="justify-content: center;">
                <div class="FormCol">
                    <label for='pcode'>Pincode</label>
                    <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' value="<?php echo isset($row1)? $row1['pincode']: ""?>" required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <?php if(isset($row1)){?>
                    <input type='submit' id='updateaddr'  name='updateaddr' value='Update' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
                <?php }else{?>
                    <input type='submit' id='newaddr' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
                <?php }?>
            </div>
            <br>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="JS/loginjQuery.js"></script>
    <script src="JS/validationjQuery.js"></script>
    <script src="JS/accountjQuery.js"></script>
    <?php mysqli_close($db);?>
</body>
</html>