<?php
    session_start();
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
        function increment(){
            let a=document.getElementById('pqnt');
            let cnt=parseInt(a.value)+1
            a.value=cnt.toString();
        }
        function decrement(){
            let a=document.getElementById('pqnt');
            if(a.value!=1){
                let cnt=parseInt(a.value)-1
                a.value=cnt.toString();
            }
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
                include "Php/_connectDatabase.php";
                
                if(isset($_POST['newaddr']))
                {
                    $hfno=$_POST["hfno"];
                    $wname=$_POST["wname"];
                    $villcity=$_POST["villcity"];
                    $taluka=$_POST["taluka"];
                    $state=$_POST["state"];
                    $pcode=$_POST["pcode"];

                    $sql="INSERT INTO `address` (`uid`, `hno/fno`, `wname`, `vill/city`, `taluka`, `state`, `pincode`) VALUES ('{$_SESSION['UserID']}', '$hfno', '$wname', '$villcity', '$taluka', '$state', '$pcode');";

                    $res=mysqli_query($db,$sql);
                    if(!$res)
                    {
                        echo "Record not updated";
                    }    
                    echo "<script>displayNone(`box2`);displayBlock(`box1`)</script>";
                }

                if(isset($_SESSION['UserID']))
                {
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `address` WHERE `uid`='$userid'";
                    $sql2="SELECT * FROM `user` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sql);
                    $res2=mysqli_query($db,$sql2);



                    if(mysqli_num_rows($res)==0)
                    {
                            echo "<div id='box1'>";
                            echo "<p id='atext'>Saved Address</p>";

                            echo "<div id='addr'>";
                                echo "<br>";
                                echo "<p style='text-align:center'>No Address</p>";
                                echo "<br>";
                            echo "</div>";
                            echo "<hr>";
                            echo "<div style='margin-top: 20px; margin-bottom: 30px;'><span id='newaddr' class='link' >New Address</span></div>";//onclick='displayNone(`box1`);displayBlock(`box2`);
                        echo "</div>";
                        
                    }
                    else
                    {
                        $row2=mysqli_fetch_assoc($res2);
                        $fname=$row2["fname"];
                        $mnum=$row2["pnum"];
                        
                        echo "<div id='box1'>";
                        echo "<p id='atext'>Saved Address</p>";

                        while($row=mysqli_fetch_assoc($res))
                        {
                            echo "<div id='addr'>";
                                echo "<div class='center addarea'>";
                                    echo "<span class='fulladd'>";
                                        echo "<span>Name: $fname</span><br>";
                                        echo "<span>Address: {$row['hno/fno']} {$row['wname']} {$row['vill/city']} {$row['taluka']} {$row['state']} {$row['pincode']}</span><br>";
                                        echo "<span>Mobile No: $mnum</span><br>";
                                    echo "</span>";
                                    echo "<span class='link remove'>Remove</span>";
                                echo "</div>";
                            echo "</div>";
                        }
                            echo "<hr>";
                            echo "<div style='margin-top: 20px; margin-bottom: 30px;'><span id='newaddr' class='link' >New Address</span></div>";//onclick='displayNone(`box1`);displayBlock(`box2`);
                        echo "</div>";
                    }
                }
                echo "<script>
                    document.getElementById('newaddr').onclick = function(){
                        displayNone(`box1`);
                        displayBlock(`box2`);
                    }
                </script>";
                echo "<div id='box2'>";
                    echo "<p id='atext'>Enter the Details</p>";
                    echo "<hr>";
                    echo "<form action='' method='post' class='center2' style='width: 40%;'>";
                        echo "<label for='Hno/fno'>H.No/Flat NO</label>";
                        echo "<br>";
                        echo "<input type='text' name='hfno' id='hfno' required>";
                        echo "<br><br>";
                        echo "<label for='Wname'>Ward Name</label>";
                        echo "<br>";
                        echo "<input type='text' name='wname' id='wname' required>";
                        echo "<br><br>";
                        echo "<label for='vill/city'>Village/City</label>";
                        echo "<br>";
                        echo "<input type='text' name='villcity' id='villcity' required>";
                        echo "<br><br>";
                        echo "<label for='Taluka'>Taluka</label>";
                        echo "<br>";
                        echo "<input type='text' name='taluka' id='taluka' required>";
                        echo "<br><br>";
                        echo "<label for='state'>State</label>";
                        echo "<br>";
                        echo "<input type='text' name='state' id='State' required>";
                        echo "<br><br>";
                        echo "<label for='pcode'>Pincode</label>";
                        echo "<br>";
                        echo "<input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' maxlength='6' required>";
                        echo "<br><br>";
                        echo "<input type='submit' name='newaddr' value='Submit' style='width: 30%; padding: 4px 0;'>";
                    echo "</form>";
                echo "</div>";  
        
                mysqli_close($db);
            ?>

                <!-- <div id="box1">
                    <p id="atext">Saved Address</p>

                    <div id="addr">
                        <div class="center addarea">
                            <span class="fulladd">
                                <span>Name:</span><br>
                                <span>Address:</span><br>
                                <span>Mobile No:</span><br>
                            </span>
                            <span class="link">Remove</span>
                        </div>
                    </div>
                    <hr>
                    <div style="margin-top: 20px; margin-bottom: 30px;"><span class="link">New Address</span></div>
                </div> -->

                <!-- <div id="box2">
                    <p id="atext">Enter the Details</p>
                    <hr>
                    <form action="" method="post" class="center2" style="width: 40%;">
                        
                        <label for="Hno/fno">H.No/Flat NO</label>
                        <br>
                        <input type="number" name="hfno" id="hfno" required>
                        <br><br>
                        <label for="Wname">Ward Name</label>
                        <br>
                        <input type="number" name="wname" id="wname" required>
                        <br><br>
                        <label for="vill/city">Village/City</label>
                        <br>
                        <input type="number" name="villcity" id="villcity" required>
                        <br><br>
                        <label for="Taluka">Taluka</label>
                        <br>
                        <input type="number" name="taluka" id="taluka" required>
                        <br><br>
                        <label for="state">State</label>
                        <br>
                        <input type="number" name="state" id="State" required>
                        <br><br>
                        <label for="pcode">Pincode</label>
                        <br>
                        <input type="number" name="pcode" id="pcode" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="6" required>
                        <br><br>
                        <input type="submit" name="newaddr" value="Submit" style="width: 30%; padding: 4px 0;">
                    </form>
                </div> -->
                

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>