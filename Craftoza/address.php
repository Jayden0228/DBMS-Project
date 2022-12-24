<?php
    session_start();
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['raddr'])){
            $sql="DELETE FROM `address` WHERE `hno` = '{$_POST['removeaddr']}' AND `uid` = '{$_SESSION['UserID']}'";
            mysqli_query($db,$sql);
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
                    $sql2="SELECT * FROM `user` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sql);
                    $res2=mysqli_query($db,$sql2);

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
                        $row2=mysqli_fetch_assoc($res2);
                        $fname=$row2["fname"];
                        $mnum=$row2["pnum"];
                        ?>
                        <div id='box1'>
                            <p id='atext'>Saved Address</p>
                        <?php
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                                <div id='addr'>
                                    <div class='center addarea'>
                                        <span class='fulladd'>
                                            <span>Name: <?php echo $fname?></span><br>
                                            <span>Address: <?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></span><br>
                                            <span>Mobile No: <?php echo $mnum?></span><br>
                                        </span>
                                        <span class='link remove'>
                                            <form action="#" method="post" style="margin:0;">
                                                <input type="hidden" name="removeaddr" value=<?php echo $row['hno']?>>
                                                <input type="submit" name="raddr" value="Remove" style="color: #FE981B;background: white; border:none; margin:0; padding:0">
                                            </form >
                                        </span>
                                    </div>
                                </div>
                            <?php
                        }
                        ?>
                        <hr>
                        <div style='margin-top: 20px; margin-bottom: 30px;'><span id='newaddr' class='link' >New Address</span></div>
                        </div>
                        <?php
                    }
                }
                ?>
                <script>
                    document.getElementById('newaddr').onclick = function(){
                        displayNone(`box1`);
                        displayBlock(`box2`);
                    }
                </script>
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
            <?php
                mysqli_close($db);
            ?>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
    
</body>
</html>