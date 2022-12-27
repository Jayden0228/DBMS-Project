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
    <link rel="stylesheet" href="Css/style.css">
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
                    } 
                    ?>  
                    <script>displayNone(`box2`);displayBlock(`box1`)</script>
                    <?php
                }

                if(isset($_SESSION['UserID']))
                {
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `address` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sql);

                    if(mysqli_num_rows($res)==0)
                    {
                        ?>
                            <div id='box1'>
                                <p id='atext'>Saved Address</p>
                                <div id='addr'>
                                <br>
                                <p style='text-align:center'>No Address</p>
                                <br>
                            </div>
                            <hr>
                            <div style='margin-top: 20px; margin-bottom: 30px;'><span id='newaddr' class='link' >New Address</span></div>
                            </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div id='box1'>
                            <p id='atext'>Saved Address</p>
                        <?php
                        $i=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                                
                                <div class='center addarea'>
                                    <h5>Address #<?php echo $i++?></h5>
                                    <p><?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></p>
                                    <div style="display: flex;">
                                        <form style="margin:0;" id="AddressFormButton1">
                                            <input type="hidden" name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="raddr" id="AddressButton">Remove</button>
                                        </form>
                                        <div style="width:1%"></div>
                                        <form style="margin:0;" id="AddressFormButton2">
                                            <input type="hidden" name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="uaddr" id="AddressButton">Update</button>
                                        </form>
                                    </div>
                                </div>
                              
                            <?php
                        }
                        ?>
                        <hr>
                        <div style='margin: 20px 28px 30px 80%;'><button id="AddressButton" style="width: 100%;padding: 9px" onclick="displayNone(`box1`);displayBlock(`box2`);">New Address</button></div>
                        </div>
                        <?php
                    }
                }
                ?>
                <div id='box2'>
                    <span class='arrow' onclick='displayNone(`box2`);displayBlock(`box1`);' style='position: relative;
                    cursor: pointer;'>&#8592;</span>
                    <p id='atext'>Enter the Details</p>
                    <hr>
                    <form action='' method='post' class='center2' style='width: 40%;' id="AddressForm">
                        <label for='Hno/fno'>H.No/Flat NO</label>
                        <br>
                        <input type='text' name='hfno' id='hfno' required>
                        <br><br>
                        <label for='Wname'>Ward Name</label>
                        <br>
                        <input type='text' name='wname' id='wname' required>
                        <br><br>
                        <label for='vill/city'>Village/City</label>
                        <br>
                        <input type='text' name='villcity' id='villcity' required>
                        <br><br>
                        <label for='Taluka'>Taluka</label>
                        <br>
                        <input type='text' name='taluka' id='taluka' required>
                        <br><br>
                        <label for='state'>State</label>
                        <br>
                        <input type='text' name='state' id='State' required>
                        <br><br>
                        <label for='pcode'>Pincode</label>
                        <br>
                        <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                        <br><br>
                        <input type='submit' name='newaddr' value='Submit' style='width: 30%; padding: 4px 0;'>
                    </form>
                </div> 

                <div id='box3'>
                    <span class='arrow' onclick='displayNone(`box2`);displayBlock(`box1`);' style='position: relative;
                    cursor: pointer;'>&#8592;</span>
                    <p id='atext'>Enter the Details</p>
                    <hr>
                    <form action='' method='post' class='center2' style='width: 40%;' id="AddressForm">
                        <label for='Hno/fno'>H.No/Flat NO</label>
                        <br>
                        <input type='text' name='hfno' id='hfno' required>
                        <br><br>
                        <label for='Wname'>Ward Name</label>
                        <br>
                        <input type='text' name='wname' id='wname' required>
                        <br><br>
                        <label for='vill/city'>Village/City</label>
                        <br>
                        <input type='text' name='villcity' id='villcity' required>
                        <br><br>
                        <label for='Taluka'>Taluka</label>
                        <br>
                        <input type='text' name='taluka' id='taluka' required>
                        <br><br>
                        <label for='state'>State</label>
                        <br>
                        <input type='text' name='state' id='State' required>
                        <br><br>
                        <label for='pcode'>Pincode</label>
                        <br>
                        <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                        <br><br>
                        <input type='submit' name='newaddr' value='Submit' style='width: 30%; padding: 4px 0;'>
                    </form>
                </div> 
            <?php
                mysqli_close($db);
            ?>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/accountjQuery.js"></script>
</body>
</html>