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

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['pid']))
        {
            $_SESSION['pid']=$_POST['pid'];
        }    
        $sql1="SELECT * FROM `product` NATURAL JOIN `seller` WHERE `pid`='{$_SESSION['pid']}'";
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
        }
        if(isset($_POST['wishlist']))
        {
            echo"";
            $sql4="SELECT * FROM `view` WHERE `uid`='{$_SESSION['UserID']}' AND `pid`='{$_SESSION['pid']}'";
            $res4=mysqli_query($db,$sql4);
            if(mysqli_num_rows($res4)==0)
            {
                $sql5="INSERT INTO `view` (`uid`, `pid`, `status`) VALUES ('{$_SESSION['UserID']}', '{$_SESSION['pid']}', 'wishlist')";
                mysqli_query($db,$sql5);
            }

            // $sql4="INSERT INTO `view` (`uid`, `pid`, `status`) VALUES ('{$_SESSION['UserID']}', '{$_SESSION['pid']}', 'wishlist')";
            // mysqli_query($db,$sql4);
            // $row4=mysqli_fetch_assoc($res1);
        }

        if(isset($_POST['reviewinp']))
        {
            $sql5="INSERT INTO `reviews`(`pid`, `uid`, `comment`) VALUES ('{$_SESSION['pid']}','{$_SESSION['UserID']}','{$_POST['review']}')";
            mysqli_query($db,$sql5);
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
    <div id="ReviewFormBox">
        <div class="Formbox">
            <form action="" method="post" class="center" >
                <br>
                <span class='arrow1' onclick='displayNone(`ReviewFormBox`);displayBlock(`addreview`)'>&#10005;</span>
                <br><br>
                <div class="FormCol">
                    <label style="font-size: larger;margin-bottom: 4%;">Enter your Review!!</label>
                    <textarea name="review" cols="40" rows="5" style="resize:none" required></textarea>
                    <button type="submit" name="reviewinp" id="reviewinp">Submit</button>
                </div>
                <br><br>
            </form>
        </div>
    </div>
    
    <?php include 'Php/_nav.php'?>
    <main>
        <div id="backgd">
            <br><br><br>
            <div class="item">
                <div class="simg">
                    <div id="simg1">
                        <img src=<?php echo $row1['ParentImgLink'].'a.png'?> width='110%' height='100%' onclick="swap('simg1','image')">
                    </div>
                    <br>
                    <div id="simg2">
                        <img src=<?php echo $row1['ParentImgLink'].'b.png'?> width='110%' height='100%' onclick="swap('simg2','image')">
                    </div>
                    <br>
                    <div id="simg3">
                        <img src=<?php echo $row1['ParentImgLink'].'c.png'?> width='110%' height='100%' onclick="swap('simg3','image')">
                    </div>
                </div>
                <div id="image">
                    <img src=<?php echo $row1['ParentImgLink'].'.png'?> width='110%' height='100%'>
                </div>
                <hr id="divider">
            </div>


            <div id="lv1">
                <div id="text">
                    <div class="text1"><?php echo $row1['pname']?></div>
                    <div class="text1"><?php echo $row1['company_name']?></div>
                </div>
                <div class="star" style="margin-left: auto;">
                    <?php
                        $i=1;
                        $t=explode('/',$row1['rating']);
                        if($t[1]==0) $t[1]=1;
                        $rate=$t[0]/$t[1];
                        while($i<=$rate)
                        {
                            ?>
                                <img src="Images/star.png" alt="star" style="width: 30%;">
                            <?php
                            $i++;
                        }
                        $rate*=100;
                        $rate%=100;
                        if($rate>0 and $rate<=25)
                        {
                            ?>
                                <img src="Images/star2.png" alt="star" style="width: 8.7%;">
                            <?php
                        }
                        if($rate>25 and $rate<=50)
                        {
                            ?>
                                <img src="Images/star5.png" alt="star" style="width: 15.1%;">
                            <?php
                        }
                        if($rate>50)
                        {
                            ?>
                                <img src="Images/star7.png" alt="star" style="width: 20.9%;">
                            <?php
                        }
                    ?>
                </div>
                <?php
                    if($row1['qnt']==0){
                        ?>
                            <button id="buybtn" style="background: #9c9c9c;" disabled>BUY NOW</button>
                        <?php
                    }else{
                        if(isset($_SESSION['UserID']))
                        {
                        ?>
                            <button id="buybtn" onclick='window.location ="order.php"'>BUY NOW</button>
                        <?php
                        }else{
                        ?>
                            <button id="buybtn" onclick="displayBlock('login')">BUY NOW</button>
                        <?php
                    }
                }
                ?>
            </div>

            <hr>
            <div id="lv2">
                <div id="lv2cn1">
                    <?php
                        $dprice=$row1['price']*(1-$row1['discnt']*0.01);
                    ?>
                    <div class="text1" style="color: #fd5353fe;">-<?php echo $row1['discnt']?>% <span style="color: black;">Rs <?php echo $dprice?></span></div>
                    <div class="text1">MRP <s><?php echo $row1['price']?></s></div>
                    <div class="text2" style="font-weight: normal;">Inclusive of all taxes</div>
                </div>
                <div id="lv2cn2">
                    <div class="text4">
                        <?php
                            if($row1['qnt']==0){
                                ?>
                                    <div style="color:#fd5353fe;">Out of stock</div>
                                <?php
                            }
                            else{
                                ?>
                                    <div style="color:green">In stock</div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <div id="lv2cn3">
                    <form action="#" method="POST">
                        <input type="submit" value="Add To Cart" name="cart" class="btn1">
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
                    <span ></span>
                    <button id="addreview"onclick="displayBlock('ReviewFormBox');displayNone('addreview')">ADD REVIEW</button>
                    <div id="review">
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
            </div>

            <br><br><br>
        </div>
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>
</body>
</html>