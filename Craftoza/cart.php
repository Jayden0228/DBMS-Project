<?php
    session_start();
    include "Php/_connectDatabase.php";
    // $_SESSION['cnt']=1;
    if(isset($_SESSION['AddrChoice'])){ //for order page
        unset($_SESSION['AddrChoice']);
    }
    if(isset($_SESSION['cnt'])){ //for order page
        unset($_SESSION['cnt']);
    }
    if(isset($_SESSION['CardChoice'])){ //for order page
        unset($_SESSION['CardChoice']);
    }
    if(isset($_SESSION['taluka'])){ //for order page
        unset($_SESSION['taluka']);
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
                ?><script>
                    window.location ='order.php';
                </script>
                <?php
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
            <p id="Headtext">My Cart</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <?php
                $sql="SELECT * FROM `view` NATURAL JOIN `product`  NATURAL JOIN `seller` WHERE `uid`='{$_SESSION['UserID']}' AND `status`='cart'";
                $res=mysqli_query($db,$sql);
                ?>
                <?php
                if(mysqli_num_rows($res)==0)
                {
                ?>
                    <div class="item">
                    <br><p style="text-align:center">No Items in your cart</p><br>
                    </div>
                <?php    
                }
                else{
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $dprice=$row['price']*(1-$row['discnt']*0.01);
                        ?>
                        <div class="item">
                            <div id="image">
                                <img src=<?php echo $row['ParentImgLink'].'.png'?> width='110%' height='auto'><!-- height="100%"> -->
                            </div>
                            <div id="text">
                                <div class="text1"><?php echo $row['pname']?></div>
                                <div class="text1"><?php echo $row['company_name']?></div>
                                <div class="text2">MRP: Rs <s><?php echo $row['price']?></s><span style="color: #fd5353fe;"><?php echo " ".$dprice?></span></div>

                                <div class="text3">
                                    <?php
                                        $i=1;
                                        $t=explode('/',$row['rating']);
                                        if($t[1]==0) $t[1]=1;
                                        $rate=$t[0]/$t[1];
                                        while($i<=$rate)
                                        {
                                            ?>
                                                <img src="Images/star.png" alt="star" style="width: 9%;">
                                            <?php
                                            $i++;
                                        }
                                        $rate*=100;
                                        $rate%=100;
                                        if($rate>0 and $rate<=25)
                                        {
                                            ?>
                                                <img src="Images/star2.png" alt="star" style="width: 2.7%;">
                                            <?php
                                        }
                                        if($rate>25 and $rate<=50)
                                        {
                                            ?>
                                                <img src="Images/star5.png" alt="star" style="width: 4.5%;">
                                            <?php
                                        }
                                        if($rate>50)
                                        {
                                            ?>
                                                <img src="Images/star7.png" alt="star" style="width: 6.6%;">
                                            <?php
                                        }
                                        ?>
                                </div>
                                <div class="text3"><img src="Images/craftfied.png" alt="craftfied" style="width: 36%;height: auto;"></div>
                                <div class="text4">
                                <?php
                                    if($row['qnt']==0){
                                        ?>
                                            <div style="color:#fd5353fe;">Out of stock</div>
                                        <?php
                                    }
                                    else{
                                        ?><div style="color:green">In stock<?php if($row['qnt']<=10){echo "   (".$row['qnt']."left)";}?></div><?php
                                    }
                                ?>
                                </div>
                            </div>
                            <div id="btn">
                                <form action="" method="POST">
                                    <input type="hidden" name="pid" value=<?php echo $row['pid']?>>
                                    <?php
                                        if($row['qnt']==0){
                                            ?><input type="submit" value="Buy now" name="order" class="btn1" style="text-align: center;" disabled><?php
                                        }
                                        else{
                                            ?><input type="submit" value="Buy now" name="order" class="btn1" style="text-align: center;"><?php
                                        }
                                    ?>          
                                    <input type="submit" value="Remove From Cart" name="cart" class="btn2" style="text-align: center;">
                                </form>
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

    <script src="JS/Login.js"></script>

</body>
</html>