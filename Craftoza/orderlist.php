<?php
    session_start();
    include "Php/_connectDatabase.php";

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['rate'])){
            $pid=$_POST['pid'];
            $rating=$_POST['rating'];
            $currate=$_POST['currate'];
            
            if($rating!=0){
                $sql="SELECT COUNT(`uid`) as `cnt` FROM `orders` WHERE `status`='Rated' AND `pid`='$pid'";
                $res=mysqli_query($db,$sql);
                if(mysqli_num_rows($res)==0)
                {
                    $x=(int)$rated+(int)$rating;
                }else{
                    $row=mysqli_fetch_assoc($res);
                    $t=(int)$row['cnt'];
                    $t++;
                    $x=(int)$currate+((int)$rating/$t);
                    
                }
                $sql1="UPDATE `product` SET `rating`='$x' WHERE `pid`='$pid'";
                mysqli_query($db,$sql1);
                
                $sql2="UPDATE `orders` SET `status`='Rated' WHERE `pid`='$pid' AND `uid`='{$_SESSION['UserID']}'";
                mysqli_query($db,$sql2);

            }
        }
        if(isset($_POST['paymed'])){
            echo $_SESSION['pid'];
            echo $_SESSION['UserID'];
            echo $_SESSION['cnt'];
        
            $sql3="INSERT INTO `orders`(`pid`, `uid`, `did`, `qnt`, `status`, `OrderDate`) VALUES ('{$_SESSION['pid']}','{$_SESSION['UserID']}','10','{$_SESSION['cnt']}','Pending',current_date()); ";
            mysqli_query($db,$sql3);

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

    <?php include 'Php/_nav.php'?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
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
                        $price=$row['price']*$row['qnt']*(1.08-($row['discnt']*0.01));
                        ?>
                        <div class="item">
                            <div id="image">
                                <img src=<?php echo $row['ParentImgLink'].".png"?> alt="" width="110%" height="100%">
                            </div>
                            <div id="text">
                                <div class="text1"><?php echo $row['pname']?></div>
                                <div class="text2">Total<span style="color: #fd5353fe"><?php echo " Rs ".$price?></span></div>
                                <div class="text4"><?php echo "Quantity: ".$row['qnt']?></div>
                                <div class="text4"><?php echo "Status: ".$row['status']?></div>
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
                                            <input type="submit" value="Rate" name="rate" class="btn1" style="text-align: center" disabled>
                                        <?php
                                    }
                                ?>
                                
                            </div>
                        </div>
                        <br><br><br>
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