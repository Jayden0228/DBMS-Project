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
    <!-- <link rel="stylesheet" href="Css/style.css"> -->
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/order.css">
    <link rel="stylesheet" href="Css/footer.css">

    <script>
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
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST['caddr'])){
                $_SESSION['hno']=$_POST['cadd'];
                echo "<script>
                        displayNone(`mainbox1`);
                        displayBlock(`mainbox2`);
                </script>";
            }
            if(isset($_POST['ccard'])){
                $_SESSION['cdno']=$_POST['choosecard'];
                // echo $_SESSION['cdno'];
                echo "<script>
                        displayNone(`mainbox1`);
                        displayBlock(`mainbox2`);
                </script>";
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
                }    
                // echo "<script>displayNone(`box2`);displayBlock(`box1`)</script>";
            }
            if(isset($_POST['newcard'])){
                $cardno=$_POST["cardno"];
                $cvv=$_POST["cvv"];
                $exptdate=$_POST["exptdate"];
                $clabel=$_POST["clabel"];
                $sql="INSERT INTO `creditcard` (`uid`, `cardno`, `cvv`, `expdate`, `label`) VALUES ('{$_SESSION['UserID']}', '$cardno', '$cvv', '$exptdate', '$clabel');";

                $res=mysqli_query($db,$sql);

                if(!$res)
                {
                    echo "Record not updated";
                }    
            }
        }
    ?>

    <main>
        <div id="backgd">
            <!-- address odersummary payment
            address
            product
            price details
            craft credit -->
            <br><br><br>


            <div id="mainbox1">
                <p id="toptext">Delivery To</p>
                <hr>
                <?php
                    if(isset($_SESSION['UserID']))
                    {
                        $userid=$_SESSION['UserID'];
                        $sql="SELECT * FROM `address` WHERE `uid`='$userid'";
                        $sql2="SELECT * FROM `user` WHERE `uid`='$userid'";
                        $res=mysqli_query($db,$sql);
                        $res2=mysqli_query($db,$sql2);
                        
                        $row2=mysqli_fetch_assoc($res2);

                        $fname=$row2["fname"];
                        $mnum=$row2["pnum"];

                        if(mysqli_num_rows($res)==0)
                        {
                            echo "<script>
                                    displayNone(`box1`);
                                    displayBlock(`box2`);
                            </script>";
                        }
                        else
                        {   
                            echo "<script>
                                    displayNone(`box2`);
                                    displayBlock(`box1`);
                            </script>";
                            echo "<div id='box1'>";

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
                                            <span class='link choose'>
                                                <form action="#" method="post" style="margin:0;">
                                                    <input type="hidden" name="cadd" value=<?php echo $row['hno']?>>
                                                    <input type="submit" name="caddr" value="Choose" style="color: #FE981B;background: white; border:none; margin:0; padding:0;width: 83px;">
                                                </form >
                                            </span>
                                        </div>
                                    </div>
                                <?php
                            }
                            echo "<hr>";
                            echo "<div style='margin-top: 20px; margin-bottom: 30px;text-align: end;'><span id='newaddr' class='link' >New Address</span></div>";//onclick='displayNone(`box1`);displayBlock(`box2`);
                            echo "</div>";
                        }
                        echo "<div id='box2'>";
                            echo "<form action='' method='post' class='center2' style='width: 40%;'>";
                                echo "<label for='Hno/fno'>H.No/Flat NO</label>";
                                echo "<br>";
                                echo "<input type='text' name='hfno' id='hfno' required>";
                                echo "<br><br>";
                                echo "<label for='Wname'>Ward Name</label>";
                                echo "<br>";
                                echo "<input type='text' name='wname' id='wname' required>";
                                echo "<br><br>";
                                echo "<label for='villageCity'>Village/City</label>";
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
                    }
                ?>
            </div>
            

            
            <div id="mainbox2">
                <p id="toptext">Delivery Address</p>
                <hr>
                <?php
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `address` WHERE `uid`='$userid' AND `hno`='{$_SESSION['hno']}'";
                    $res=mysqli_query($db,$sql);
                    if(mysqli_num_rows($res)==0)
                    {
                        echo "Address not found in the database";
                    }
                    else
                    {   
                        $row=mysqli_fetch_assoc($res);
                        ?>
                            <div id='addr'>
                                <div class='center addarea'>
                                    <span class='fulladd'>
                                        <span>Address: <?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></span><br>
                                    </span>
                                </div>
                            </div>
                        <?php
                        echo "<hr>";
                    }
                    // echo $_SESSION['pid'];

                    $sql1="SELECT * FROM `product` NATURAL JOIN `seller` WHERE `pid`='{$_SESSION['pid']}'";
                    $res1=mysqli_query($db,$sql1);

                    if(mysqli_num_rows($res1)==0)
                    {
                        echo "Product not found in the database";
                    }
                    else
                    {   
                        $row1=mysqli_fetch_assoc($res1);
                        ?>
                            <!-- <div id='addr'>
                                <div class='center addarea'>
                                    <span class='fulladd'>
                                        <span>Address: <?php //echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></span><br>
                                    </span>
                                </div>
                            </div> -->

                            <div class="item">
                                <div id="image">
                                    <img src="Images/card3.png" alt="" style="width: 70%;height: 50%;">
                                </div>
                                <div id="text">
                                    <div class="text1"><?php echo $row1['pname']?></div>
                                    <div class="text2"><?php echo $row1['company_name']?></div>
                                    <?php
                                        $dprice=$row1['price']-$row1['price']*$row1['discnt']*0.01;
                                    ?>
                                    <div class="text2" style="color: #fd5353fe;">-<?php echo $row1['discnt']?>% <span style="color: black;">Rs <?php echo $dprice?></span></div>
                                    <div class="text2">MRP <s><?php echo $row1['price']?></s></div>
                                    <div class="text2" style="font-weight: normal;">Inclusive of all taxes</div>
                                </div>
                                <div id="qnt" style="width: 135%;">
                                    <div class="text3">Qnt 
                                        <button id="min" onclick="decrement()">-</button><input type="number" id="pqnt" min="1" value="1"><button id="max" onclick="increment()">+</button>
                                    </div>
                                </div>
                            </div>
                            
                        <?php
                        echo "<hr>";
                    }
                    ?>
                    <div id="msg">
                        <p style="text-align: center;">Congrats you have earn <?php echo $row1['credit']?> Craft Credits</p>
                    </div>
                    <button class="center continue" onclick="(`mainbox2`);displayBlock(`mainbox3`);">Continue</button>
            </div>
            

            
            <div id="mainbox3">
                <p id="toptext">Payment</p>
                <hr>
                <label for="">Choose The Payment Method</label><br>
                <form action="" method="POST" class="center">
                    <input type="radio" name="payment" value="UPI">
                    <label>UPI</label><br>
                    <input type="radio" name="payment" value="Credit/Wallet">
                    <label>Credit/Wallet</label><br>
                    <input type="radio" name="payment" value="Net Banking">
                    <label>Net Banking</label><br>
                    <input type="radio" name="payment" value="Cash on Delivery">
                    <label>Cash on Delivery</label><br>
                    <br><br>
                    <button class="center" type="submit">Choose</button>
                </form>
                <?php
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sql);
                    if(mysqli_num_rows($res)==0)
                    {
                        echo "<script>
                                displayNone(`box3`);
                                displayBlock(`box4`);
                        </script>";
                    }
                    else
                    {   
                        echo "<script>
                                displayNone(`box4`);
                                displayBlock(`box3`);
                        </script>";
                        echo "<div id='box3'>";
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                            <div id='card'>
                                <div class='center cardarea'>
                                    <span class='cardname'><?php echo "{$row['label']}"?></span>
                                    <span class='ncard'>
                                        <form action="#" method="post" style="margin:0;">
                                            <input type="hidden" name="choosecard" value=<?php echo $row['cardno']?>>
                                            <input type="submit" name="ccard" id="ccard" value="choose" style="color: #FE981B;background: white; border:none; margin:0; padding:0">
                                        </form >
                                    </span>
                                </div>
                            </div>

                        <?php
                        }
                        echo "<hr>";
                        echo "<div style='margin-top: 20px; margin-bottom: 30px;'><span id='newcd' class='ncard' >New Card</span></div>";
                        ?>
                        <button class="center order" onclick="displayNone(`mainbox2`);displayBlock(`mainbox3`);">Order</button>
                        <?php
                        echo "</div>";
                    }

                    echo "<div id='box4'>";
                    echo "<form action='' method='post' class='center2' style='width: 40%;' onsubmit='return validateCard(this)'>";
                    echo "<label for='Card No'>Card Number</label>";
                    echo "<br>";
                    echo "<input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)' maxlength='16' required>";
                    echo "<br><br>";
                    echo "<label for='CVV'>CVV</label>";
                    echo "<br>";
                    echo "<input type='number' name='cvv' id='cvv' maxlength='3' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>";
                    echo "<br><br>";
                    echo "<label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>";
                    echo "<br>";
                    echo "<input type='date' name='exptdate' id='exptdate' required>";
                    echo "<br><br>";
                    echo "<label for='Card Label'>Card Label</label><br>";
                    echo "<input type='text' name='clabel' id='clabel' required>";
                    echo "<br>";
                    echo "<input type='submit' value='Submit' name='newcard' style='width: 30%; padding: 4px 0;'>";
                    echo "</form>";
                    echo "</div>";
                    ?>
            </div>


            <br><br><br>
            <br><br><br>
        </div>
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>
    <script>
        document.getElementById('newaddr').onclick = function(){
            displayNone(`box1`);
            displayBlock(`box2`);
        }
        document.getElementById('newcd').onclick = function(){
            displayNone(`box3`);
            displayBlock(`box4`);
        }
    </script>
</body>
</html>