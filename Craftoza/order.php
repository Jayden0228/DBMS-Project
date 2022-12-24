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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <style>
        *, ::after, ::before {
            box-sizing: content-box;
        }
        img, svg {
            vertical-align:auto;
        }
        td,th{
            text-align: center;
        }
        .container{
            max-width: 1170px;
            margin: auto;
        }
        .row{
            display: flex;
            flex-wrap:wrap;
            row-gap: 20px;
        }
    </style>

    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

    <?php include 'Php/_nav.php'?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST['QNT'])){
                $_SESSION['cnt']=$_POST['pqnt'];
                ?>
                <script>
                    window.location ="payment.php";
                </script>
                <?php
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
                            ?>
                                <script>displayNone(`box1`);displayBlock(`box2`);</script>
                            <?php
                        }
                        else
                        {   
                            ?>
                                <script>displayNone(`box2`);displayBlock(`box1`);</script>
                                <div id='box1'>
                            <?php
                            $c=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id='AddrForm'.$c;
                                $id2='cadd'.$c;
                                ?>
                                    <div id='addr'>
                                        <div class='center addarea'>
                                            <span class='fulladd'>
                                                <span>Name: <?php echo $fname?></span><br>
                                                <span>Address: <?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></span><br>
                                                <span>Mobile No: <?php echo $mnum?></span><br>
                                            </span>
                                            <span class='link choose'>
                                                <form autocomplete="off" style="margin:0;" id=<?php echo $id?>>
                                                    <input type="hidden" id=<?php echo $id2?> name="cadd" value=<?php echo $row['hno']?>>
                                                    <input type="submit" name="caddr" value="Choose" style="color: #FE981B;background: white; border:none; margin:0; padding:0;width: 83px;">
                                                </form >
                                            </span>
                                        </div>
                                    </div>
                                <?php
                                $c+=1;
                            }
                            ?>
                                <hr>
                                <div style='margin-top: 20px; margin-bottom: 30px;text-align: end;'><span id='newaddr' class='link'>New Address</span></div>
                                </div>
                            <?php
                        }
                        ?>
                            <div id='box2'>
                                <form action='' method='post' class='center2' style='width: 40%;' id="AddressForm">
                                    <label for='Hno/fno'>H.No/Flat NO</label>
                                    <br>
                                    <input type='text' name='hfno' id='hfno' required>
                                    <br><br>
                                    <label for='Wname'>Ward Name</label>
                                    <br>
                                    <input type='text' name='wname' id='wname' required>
                                    <br><br>
                                    <label for='villageCity'>Village/City</label>
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
                                    <input type='number' name='pcode' id='pcode' oninput='this.value=this.value.replace(/[^0-9]/g,``)' maxlength='6' required>
                                    <br><br>
                                    <input type='submit' name='newaddr' value='Submit' style='width: 30%; padding: 4px 0;'>
                                </form>
                            </div>
                        <?php
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
                            <br>
                            <div id='addr'>
                                <div class='center addarea'>
                                    <span class='fulladd'>
                                        <span><b>Address:</b><br> <?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></span><br>
                                    </span>
                                </div>
                            </div>
                            <br>
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

                            <form action="" method="POST" id="ProductQnt">
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
                                        <div class="star" style="margin-left: auto;">
                                            <?php
                                                $i=1;
                                                while($i<=$row1['rating'])
                                                {
                                                    ?>
                                                        <img src="Images/star.png" alt="star" style="width: 7%;">
                                                    <?php
                                                    $i++;
                                                }
                                            ?>
                                        </div>
                                        <div class="text2">MRP <s><?php echo $row1['price']?></s> Rs <?php echo $dprice?> <span style="color: #fd5353fe">-<?php echo $row1['discnt']?>%OFF</span></div>
                                    </div>
                                    <div id="qnt" style="width: 135%;">
                                        <div class="text3">Qnt
                                            <select name="pqnt" id="pqnt" style="width: 15%;" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                                <?php
                                                    $i=1;
                                                    while($i<=$row1['qnt'])
                                                    {
                                                        ?>
                                                            <option value=<?php echo $i?>><?php echo $i?></option>
                                                        <?php
                                                        $i++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="msg">
                                    <p style="text-align: center;">Congrats you have earn <?php echo $row1['credit']?> Craft Credits</p>
                                </div>
                                <button type="submit" name="QNT" style="width: 77%;">Proceed</button>
                            </form>
                        <?php
                    }
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

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/orderjQuery.js"></script>

    <script>
        document.getElementById('newaddr').onclick = function(){
            displayNone(`box1`);
            displayBlock(`box2`);
        }
        document.getElementById('newcd').onclick = function(){
            displayNone(`box3`);
            displayBlock(`box4`);
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
</body>
</html>