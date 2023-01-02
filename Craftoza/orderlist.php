<?php
    session_start();
    include "Php/_connectDatabase.php";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['rate'])){
            $pid=$_POST['pid'];
            $rating=$_POST['rating'];
            $currate=explode('/', $_POST['currate']);;
            
            if($rating!=0){
                $currate[0]=(float)$currate[0]+(float)$rating;
                
                $sql2="UPDATE `orders` SET `status`='Rated' WHERE `pid`='$pid' AND `uid`='{$_SESSION['UserID']}'";
                mysqli_query($db,$sql2);
            }
            
            $currate[1]=(int)$currate[1]+1;
            $x=$currate[0]."/".$currate[1];
            $sql1="UPDATE `product` SET `rating`='$x' WHERE `pid`='$pid'";
            mysqli_query($db,$sql1);
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
    <link rel="stylesheet" href="Css/Wish_list.css">
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
    <div id="ThankYouBox">
        <div id="ThankYou">
            <span class='arrow1' onclick='displayNone(`ThankYouBox`)'>&#10005;</span>
            <br><br>
            <img src="Images/check-mark.png" style="width:20%; margin-left:40%">
            <p>Thanks you for Shopping at Craftoza.</p>
            <p>Your order will be delivered within 2days</p>
            <br><br>
        </div>
    </div>
    <?php include 'Php/_nav.php'?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST['ConfirmButton'])){
                //setting Delivery agent
                $sql2="SELECT * FROM `deliverymember` WHERE `location`='{$_SESSION['taluka']}'";
                $row2=mysqli_fetch_assoc(mysqli_query($db,$sql2));

                //Inserting order
                $sql3="INSERT INTO `orders`(`pid`, `uid`, `did`, `oqnt`, `status`, `OrderDate`) VALUES ('{$_SESSION['pid']}','{$_SESSION['UserID']}','{$row2['did']}','{$_SESSION['cnt']}','Pending',current_date()); ";
                $res3=mysqli_query($db,$sql3);

                if($res3){
                    ?><script>document.getElementById("ThankYouBox").style.display = "block"</script><?php

                    //Getting the qnt
                    $sql5="SELECT * FROM `product` WHERE `pid`='{$_SESSION['pid']}'";
                    $row5=mysqli_fetch_assoc(mysqli_query($db,$sql5));
                    $qnt=(int)$row5['qnt']-(int)$_SESSION['cnt'];
                    
                    //Updating the qnt
                    $sql4="UPDATE `product` SET `qnt`='$qnt' WHERE `pid`='{$_SESSION['pid']}'";
                    $res4=mysqli_query($db,$sql4);
                }
               

                
                
            }
            if(isset($_POST['order']))
            {
                $_SESSION['pid']=$_POST['pid'];
                echo "<script>
                    function load() {
                        window.location ='order.php';
                    }
                </script>";
            }
            if(isset($_POST['cart']))
            {
                $sql2="DELETE FROM `view` WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_POST['pid']}'";
                $res2=mysqli_query($db,$sql2);
            }
            if(isset($_POST['cancelorder']))
            {
                $sql2="DELETE FROM `orders` WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_POST['pid']}'";
                $res2=mysqli_query($db,$sql2);

                $sql5="SELECT * FROM `product` WHERE `pid`='{$_POST['pid']}'";
                $row5=mysqli_fetch_assoc(mysqli_query($db,$sql5));
                $qnt=(int)$row5['qnt']+(int)$_POST['qnt'];
                
                $sql4="UPDATE `product` SET `qnt`='$qnt' WHERE `pid`='{$_POST['pid']}'";
                $res4=mysqli_query($db,$sql4);
            }
        }
    ?>
    <main>
        <div id="top">
            <p id="Headtext">Order List</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <?php
                $sql="SELECT * FROM `orders` JOIN `product` ON `product`.`pid`=`orders`.`pid` WHERE `uid`='{$_SESSION['UserID']}'";
                $res=mysqli_query($db,$sql);
                ?>
                <?php
                if(mysqli_num_rows($res)==0)
                {
                ?>
                    <div class="item">
                    <br><p style="text-align:center">No Orders</p><br>
                    </div>
                <?php    
                }
                else{
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $price=$row['price']*$row['oqnt']*(1.08-($row['discnt']*0.01));
                        ?>
                        <div class="item">
                            <div id="image">
                                <img src=<?php echo $row['ParentImgLink'].".png"?> alt="" width="110%" height="100%">
                            </div>
                            <div id="text">
                                <div class="text1"><?php echo $row['pname']?></div>
                                <div class="text2">Total<span style="color: #fd5353fe"><?php echo " Rs ".$price?></span></div>
                                <div class="text4"><?php echo "Quantity: ".$row['oqnt']?></div>
                                <div class="text4"><?php if($row['status']=="Rated") echo"Status: Delivered"; else echo "Status: ".$row['status'];?></div>
                            </div>
                            <div id="btn">
                                <?php
                                    if($row['status']=="Delivered"){
                                        ?>
                                        <form action="" method="POST">
                                            <input type="hidden" name="pid" value=<?php echo $row['pid']?>>
                                            <input type="hidden" name="currate" value=<?php echo $row['rating']?>>
                                            <div style="margin-left: 10%;margin-bottom: 5%;font-size: 16px;">
                                                <label>Rate</label>
                                                <select name="rating" required>
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <input type="submit" value="Rate" name="rate" class="btn1" style="text-align: center">
                                        </form>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <input type="submit" value="Rate" name="rate" class="btn1" style="text-align: center;background: #f44;" disabled>
                                            <?php if($row['status']!="Rated"){?>
                                            <form action="" method="POST">
                                                <input type="hidden" name="pid" value=<?php echo $row['pid']?>>
                                                <input type="hidden" name="qnt" value=<?php echo $row['oqnt']?>>
                                                <input type="submit" value="Cancel Order" name="cancelorder" class="btn1" style="text-align: center">
                                            </form>
                                        <?php
                                        }
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <br><br><br>
                        <?php
                    }
                }
            ?>
        </div>
        
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>
</body>
</html>