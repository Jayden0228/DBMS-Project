<?php
    session_start();
    include "Php/_connectDatabase.php";
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
                    // if(!$res)
                    // {
                    //     echo "Record not updated";
                    // } 
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
                            <div style='margin: 20px 28px 30px 80%;'><button id="AddressButton" style="width: 100%;padding: 9px" onclick="displayBlock(`AddFormBox`);">New Address</button></div>
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
                                            <input type="hidden" id="AddrHno" name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="uaddr" id="AddressButton">Update</button>
                                    </form>
                                </div>
                            <?php
                        }
                        ?>
                        <hr>
                        <div style='margin: 20px 28px 30px 80%;'><button id="AddressButton" style="width: 100%;padding: 9px" onclick="displayBlock(`AddFormBox`);">New Address</button></div>
                        </div>
                        <?php
                    }
                }
                mysqli_close($db);
            ?>
            <div id="AddFormBox">
        <div class='Formbox'>
                    <span class='arrow1' onclick='displayNone(`AddFormBox`)'>&#8592;</span>
                    <p id='atext'>Enter the Details</p>
                    <hr>
                    <form action='' method='post' class='center2' style='width: 80%;' id="AddressForm">
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
                            <input type='text' name='state' id='State' required>
                          </div>
                        </div>
                        
                        
                        <div class="FormRow" style="justify-content: center;">
                          <div class="FormCol">
                              <label for='pcode'>Pincode</label>
                             <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                          </div>
                        </div>
                </div> 
                        </div>
                </div> 
                        </div>

                        <div class="FormRow" style="justify-content: center;">
                            <input type='submit' name='newaddr' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
                        </div>
                        <br>
                    </form>
                </div> 
        </div>
            </div>
            <br><br><br>
        </div>
        
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
</body>
</html>