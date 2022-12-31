<?php
    session_start();
    include "Php/_connectDatabase.php";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['QNT'])){
            $_SESSION['cnt']=$_POST['pqnt'];
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
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/order.css">
    <link rel="stylesheet" href="Css/footer.css">


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
    <?php include 'Php/_nav.php'?>
    

    <main>
        <div id="backgd">
            <br><br><br>

            <!-- Address Option For the user -->
            <div id="mainbox1">
                <p id="toptext">Delivery To</p>
                <hr>
                <?php
                    if(isset($_SESSION['UserID']))
                    {
                        $userid=$_SESSION['UserID'];
                        $sql="SELECT * FROM `address` WHERE `uid`='$userid'";
                        $res=mysqli_query($db,$sql);

                        if(mysqli_num_rows($res)==0)
                        {
                            ?>
                                <script>displayBlock(`AddFormBox`);</script>
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
                                        <form style="margin:0;" id=<?php echo "AddressChoice".$i?>>
                                            <input type="hidden" id=<?php echo "AddrHno".$i?> name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="chooseAddr" id="AddressButton">Choose</button>
                                        </form>
                                    </div>
                                <?php
                                $i++;
                            }
                            ?>
                                 <hr>
                                <div style='margin: 20px 28px 30px 80%;'><button class="NewAddressButton" id="AddressButton" style="width: 100%;padding: 9px">New Address</button></div>
                            <?php
                        }
                    }
                ?>
            </div>

            <!-- Item details and quantity selection -->
            <div id="mainbox2">
                <p id="toptext">Delivery Address</p>
                <hr>
                <?php
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `address` WHERE `uid`='$userid' AND `hno`='{$_SESSION['AddrChoice']}'";
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
                                        <img src=<?php echo $row1['ParentImgLink'].'.png'?> width='90%' height='90%'>
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
                                            <select name="pqnt" id="pqnt">
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
                                <br><hr><br>
                                <div style="display: flex; justify-content:center">
                                    <button type="submit" name="QNT">Proceed</button>
                                </div>
                            </form>
                        <?php
                    }
                ?>
                <!-- Price Table display -->
                <div id="PriceTable">
                    <br><br>
                    <?php
                        $sql1="SELECT * FROM `product` NATURAL JOIN `seller` WHERE `pid`='{$_SESSION['pid']}'";
                        $res1=mysqli_query($db,$sql1);
                        if(mysqli_num_rows($res1)==0)
                            echo "Product not found in the database";
                        else
                            $row1=mysqli_fetch_assoc($res1);

                        $nprice=$row1['price']*$_SESSION['cnt'];
                        $ndiscnt=$row1['price']*$row1['discnt']*0.01*$_SESSION['cnt'];
                        $ntax=$row1['price']*0.08*$_SESSION['cnt'];
                    ?>

                    <p id="toptext">Price Details</p>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Price (<?php echo $_SESSION['cnt']?> item)</td>
                                <td><?php echo "Rs ".$nprice?></td>
                            </tr>
                            <tr>
                                <td>Discount <?php echo $row1['discnt']?>%OFF</td>
                                <td><?php echo "Rs ".$ndiscnt?></td>
                            </tr>
                            <tr>
                                <td>Tax 8%</td>
                                <td><?php echo "Rs ".$ntax?></td>
                            </tr>
                            <tr>
                                <td>Delivery Charge</td>
                                <td>Free Delivery</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td><?php echo "Rs ".($nprice-$ndiscnt+$ntax) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br><br>
                <div style="display: flex; justify-content:center">
                    <button type="submit" onclick='window.location ="payment.php"'>Pay</button>
                </div>
            </div>
            <br><br><br>
            <br><br><br>
        </div>
            
        <br><br><br>
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/orderjQuery.js"></script>

    <?php
        if(isset($_SESSION['AddrChoice'])){
            ?><script>displayNone(`mainbox1`);displayBlock(`mainbox2`);</script><?php
        }
        if(isset($_SESSION['AddrChoice']) && isset($_SESSION['cnt'])){
            ?><script>displayBlock(`PriceTable`);</script><?php
        }
    ?>

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
</body>
</html>