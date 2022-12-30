<?php
    session_start();
    include "Php/_connectDatabase.php";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['raddr'])){
            $sql="DELETE FROM `address` WHERE `hno` = '{$_POST['AddrHno']}' AND `uid` = '{$_SESSION['UserID']}'";
            mysqli_query($db,$sql);
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
                echo "NotUpdated";
            }else{
                echo "Inserted";
            }
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
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/footer.css">

    <script>
        function move(){
            document.getElementById('craftie').style.left="85%";
        }
    </script>
    
    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>
    <div id="AddFormBox">
        <div class='Formbox'>
            <span class='arrow1' onclick='displayNone(`AddFormBox`)'>&#8592;</span>
            <p id='atext'>Enter the Details</p>
            <hr>
            <form action="" method="POST" class='center2' style='width: 80%;' id="AddressForm">
                <div class="FormRow">
                    <div class="FormCol">
                        <label for='Hno/fno'>H.No/Flat NO</label>
                        <input type='text' name='hfno' id='hfno' required>
                    </div>
                    <div class="FormCol">
                        <label for='Wname'>Ward Name</label>
                        <input type='text' name='wname' id='wname' required>
                    </div>
                </div>

                <div class="FormRow" style="display: block;">
                    <div class="FormCol">
                        <label for='vill/city'>Village/City</label>
                        <input type='text' name='villcity' id='villcity' required>
                    </div>
                </div>

                <div class="FormRow">
                    <div class="FormCol">
                        <label for='Taluka'>Taluka</label>
                        <input type='text' name='taluka' id='taluka' required>
                    </div>
                    <div class="FormCol">
                        <label for='state'>State</label>
                        <input type='text' name='state' id='state'  required>
                    </div>
                </div>
                
                
                <div class="FormRow" style="justify-content: center;">
                    <div class="FormCol">
                        <label for='pcode'>Pincode</label>
                        <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                    </div>
                </div>

                <div class="FormRow" style="justify-content: center;">
                    <input type='submit' id='newaddr' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
                </div>
                <br>
            </form>
        </div>
    </div>
    
    <div id="AddFormBoxU">
        <?php
            if(isset($_SESSION['HnoUp'])){
                $sql1="SELECT * FROM `address` WHERE `hno` = '{$_SESSION['HnoUp']}' AND `uid`='{$_SESSION['UserID']}'";
                $res1=mysqli_query($db,$sql1);
                $row1=mysqli_fetch_assoc($res1);
            }
        ?>
        <div class='FormboxU'>
            <span class='arrow1' onclick='displayNone(`AddFormBoxU`)'>&#8592;</span>
            <p id='atext'>Enter the Details</p>
            <hr>
            <form class='center2' style='width: 80%;' id="AddressFormU">
                <div class="FormRow">
                    <div class="FormCol">
                        <label for='Hno/fno'>H.No/Flat NO</label>
                        <input type='text' name='hfno' id='hfno1' value="<?php if(isset($row1)) echo $row1['hno']; else echo "";?>" required>
                    </div>
                    <div class="FormCol">
                        <label for='Wname'>Ward Name</label>
                        <input type='text' name='wname' id='wname1' value="<?php echo isset($row1)? $row1['wname']: ""?>" required>
                    </div>
                </div>

                <div class="FormRow" style="display: block;">
                    <div class="FormCol">
                        <label for='vill/city'>Village/City</label>
                        <input type='text' name='villcity' id='villcity1' value="<?php echo isset($row1)? $row1['villageCity']: ""?>" required>
                    </div>
                </div>

                <div class="FormRow">
                    <div class="FormCol">
                        <label for='Taluka'>Taluka</label>
                        <input type='text' name='taluka' id='taluka1' value="<?php echo isset($row1)? $row1['taluka']: ""?>" required>
                    </div>
                    <div class="FormCol">
                        <label for='state'>State</label>
                        <input type='text' name='state' id='state1' value="<?php echo isset($row1)? $row1['state']: ""?>" required>
                    </div>
                </div>
                
                
                <div class="FormRow" style="justify-content: center;">
                    <div class="FormCol">
                        <label for='pcode'>Pincode</label>
                        <input type='number' name='pcode' id='pcode1' oninput='this.value=this.value.replace(/[^0-9]/g,``)' value="<?php echo isset($row1)? $row1['pincode']: ""?>" required>
                    </div>
                </div>

                <div class="FormRow" style="justify-content: center;">
                    <?php //if(isset($row1)){?>
                        <input type='submit' id='updateaddr'  name='updateaddr' value='Update' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
                    <?php //}else{?>
                        <!-- <input type='submit' id='newaddr' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'> -->
                    <?php //}?>
                </div>
                <br>
            </form>
        </div>
    </div>
    <?php include 'Php/_nav.php'?>

    <main>
        <div id="top">
            <p id="Headtext">MY ADDRESS</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="addbox">

            <?php
                if(isset($_SESSION['UserID']))
                {
                    $userid=$_SESSION['UserID'];
                    $sqla="SELECT * FROM `address` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sqla);

                    ?>
                   
                    <p id='atext'>Saved Address</p>
                    <?php
                    if(mysqli_num_rows($res)==0)
                    {
                        ?>   
                        <br>
                        <p style='text-align:center'>No Address</p>
                        <br>
                        <?php
                    }
                    else
                    {
                        $i=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                                <div class='center addarea'>
                                    <h5>Address #<?php echo $i?></h5>
                                    <p><?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></p>
                                    <div style="display: flex;">
                                        <form action='' method="POST" style="margin:0;">
                                            <input type="hidden" name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="raddr" id="AddressButton">Remove</button>
                                        </form>
                                        <div style="width:1%"></div>
                                        <form style="margin:0;" id=<?php echo "AddressUpdate".$i?>>
                                            <input type="hidden" id=<?php echo "AddrHno".$i?> name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="uaddr" id="AddressButton">Update</button>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            $i++;
                        }
                    }
                }
                mysqli_close($db);
                ?>
              
                <hr>
                <div style='margin: 20px 28px 30px 80%;'><button class="NewAddressButton" id="AddressButton" style="width: 100%;padding: 9px">New Address</button></div>
                </div>
                <br><br><br>
            </div>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> -->
    
    <?php
    
    if(isset($_SESSION['HnoUp'])){
        echo "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae quae incidunt non! Quis maiores, excepturi id earum quisquam, mollitia fugit suscipit rem consequuntur velit assumenda, ducimus minus! Expedita sapiente, natus perspiciatis nostrum officia perferendis?";
        ?>
            <script>$('#AddFormBoxU').show();</script>
        <?php
    }
    ?>
    <script src="JS/validationjQuery.js"></script>
    <script src="JS/accountjQuery.js"></script>
</body>
</html>