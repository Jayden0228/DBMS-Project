<?php
    session_start();
    // if($_SERVER["REQUEST_METHOD"]=="POST")
    // {
    //     if(isset($_POST['pid']))
    //     {
    //         echo "{$_POST['pid']}";
    //     }
    // }
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['pid']))
        {
            $_SESSION['pid']=$_POST['pid'];
        }    
        $sql1="SELECT * FROM `product` WHERE `pid`='{$_SESSION['pid']}'";
        $res1=mysqli_query($db,$sql1);
        $sql2="SELECT `fname`,`mname`,`lname`, `comment` FROM `user` NATURAL JOIN `reviews` WHERE `pid`='{$_SESSION['pid']}';";
        $res2=mysqli_query($db,$sql2);

        $row1=mysqli_fetch_assoc($res1);
        

        if(isset($_POST['cart']))
        {

            $sql3="SELECT * FROM `view` WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_SESSION['pid']}'";
            $res3=mysqli_query($db,$sql3);
            if(mysqli_num_rows($res3)==0)
            {
                $sql3="INSERT INTO `view` (`uid`, `pid`, `status`) VALUES ('{$_SESSION['UserID']}', '{$_SESSION['pid']}', 'cart')";
                mysqli_query($db,$sql3);
            }
            else{
                $row3=mysqli_fetch_assoc($res3);
                if($row3['status']=="wishlist")
                {
                    $sql3="UPDATE `view` SET `status`='cart' WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_SESSION['pid']}'";
                    mysqli_query($db,$sql3);
                }
            }


            // $row3=mysqli_fetch_assoc($res1);
        }
        if(isset($_POST['wishlist']))
        {
            
            $sql4="SELECT * FROM `view` WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_SESSION['pid']}'";
            $res4=mysqli_query($db,$sql4);
            if(mysqli_num_rows($res4)==0)
            {
                echo"Wishlist";
                $sql4="INSERT INTO `view` (`uid`, `pid`, `status`) VALUES ('{$_SESSION['UserID']}', '{$_SESSION['pid']}', 'wishlist')";
                mysqli_query($db,$sql4);
            }

            // $sql4="INSERT INTO `view` (`uid`, `pid`, `status`) VALUES ('{$_SESSION['UserID']}', '{$_SESSION['pid']}', 'wishlist')";
            // mysqli_query($db,$sql4);
            // $row4=mysqli_fetch_assoc($res1);
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
    <link rel="stylesheet" href="Css/item.css">
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/footer.css">


    <script>
        function swap(i,j){
            let a=document.getElementById(i).children[0];
            let b=document.getElementById(j).children[0];
            let c=a.src;
            a.src=b.src
            b.src=c;
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
        function show(id,arw){
            if(document.getElementById(id).style.display=='block')
            {
                document.getElementById(id).style.display='none';
            }
            else{
                document.getElementById('lv3cn1h').style.display='none';
                document.getElementById('lv3cn2h').style.display='none';
                document.getElementById('lv3cn3h').style.display='none';
                document.getElementById(id).style.display='block';
            }
        }
    </script>

    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>
    <?php include 'Php/_nav.php'?>
    <main>
        <div id="backgd">
            <br><br><br>
            <div class="item">
                <div class="simg">
                    <div id="simg1">
                        <img src="Images/item1.jpg" alt="" width="110%" height="100%" onclick="swap('simg1','image')">
                    </div>
                    <br>
                    <div id="simg2">
                        <img src="Images/item2.jpeg" alt="" width="110%" height="100%" onclick="swap('simg2','image')">
                    </div>
                    <br>
                    <div id="simg3">
                        <img src="Images/item3.jpeg" alt="" width="110%" height="100%" onclick="swap('simg3','image')">
                    </div>
                </div>
                <div id="image">
                    <img src="Images/card3.png" alt="" width="110%" height="100%">
                </div>
                <hr id="divider">
            </div>


            <div id="lv1">
                <div id="text">
                    <div class="text1"><?php echo $row1['pname']?></div>
                    <!-- <div class="text1">Basket</div> -->
                </div>
                <button id="buybtn">BUY NOW</button>
            </div>

            <hr>

            <div id="lv2">
                <div id="lv2cn1">
                    <?php
                        $dprice=$row1['price']-$row1['price']*$row1['discnt']*0.01;
                    ?>
                    <div class="text1" style="color: #fd5353fe;">-<?php echo $row1['discnt']?>% <span style="color: black;">Rs <?php echo $dprice?></span></div>
                    <div class="text1">MRP <s><?php echo $row1['price']?></s></div>
                    <div class="text2" style="font-weight: normal;">Inclusive of all taxes</div>
                </div>
                <div id="lv2cn2">
                    <div class="text3">Qnt 
                        <button id="min" onclick="decrement()">-</button><input type="number" id="pqnt" min="1" value="1"><button id="max" onclick="increment()">+</button>
                </div>
                </div>
                <div id="lv2cn3">
                    <form action="" method="POST">
                        <input type="submit" value="Add To Cart" name="cart" class="btn1">
                    </form>
                    <form action="" method="post">
                        <input type="submit" value="Add To Wish List" name="wishlist" class="btn2">
                    </form>
                </div>
            </div>
            
            <hr>
            

            <div id="lv3" style="display: block;">
                <div id="lv3cn1" onclick="show('lv3cn1h','arw1')">
                    <span>Product Description</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn1h">
                    <?php echo $row1['des']?>
                </div>


                <div id="lv3cn2" onclick="show('lv3cn2h','arw2')">
                    <span>Product Specification</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn2h">
                    <?php echo $row1['spec']?>
                </div>

                
                <div id="lv3cn3" onclick="show('lv3cn3h','arw3')">
                    <span>Customer Reviews</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn3h">
                    <?php
                        if(mysqli_num_rows($res2)==0)
                        {
                            echo "<div class='comments'>";
                            echo "NO REVIEWS";
                            echo "</div>";
                        }
                        else
                        {
                            $i=0;
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                echo "<div class='comments'>";
                                echo "<div class='name'>";
                                echo ++$i;
                                echo ") {$row2['fname']} {$row2['mname']} {$row2['lname']}";
                                echo "</div>";
                                echo "<div class='cmt'>";
                                echo "> {$row2['comment']}";
                                echo "</div>";
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
            </div>

            <br><br><br>
        </div>
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>
    <script src="JS/Login.js"></script>
</body>
</html>