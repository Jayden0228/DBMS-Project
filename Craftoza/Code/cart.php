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
    <div id="login">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_login.php";?>
    </div>
    <div id="signup">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_signup.php";?>
    </div>
    <div id="fpwd">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_forgotpassword.php";?>
    </div>
    <div id="gotp">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_getOTP.php";?>
    </div>
    <div id="npwd">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_newpassword.php";?>
    </div>

    <?php include 'Php/_nav.php'?>

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
            <div class="item">
                <div id="image">
                    <!-- <img src="Images/card3.png" alt="" width="110%" height="100%"> -->
                    <img src="Images/card3.png" alt="" width="110%" height="auto">
                </div>
                <div id="text">
                    <div class="text1">Proud Bardezkar Bamboo</div>
                    <div class="text2">Basket</div>
                    <div class="text3" style="color: #fd5353fe;">Rs 299</div>
                    <div class="text4"></div>
                    <div class="text5">Qnt <button id="min" onclick="decrement()">-</button><input type="number" id="pqnt" min="1" value="1"><button id="max" onclick="increment()">+</button></div>
                </div>
                <div id="btn">
                    <button class="btn1">Add To Cart</button>
                    <button class="btn2">Remove From Wish List</button>
                </div>
            </div>
            <br><br><br>
            <div class="item">
                <div id="image">
                    <!-- <img src="Images/card3.png" alt="" width="110%" height="100%"> -->
                    <img src="Images/card3.png" alt="" width="110%" height="auto">
                </div>
                <div id="text">
                    <div class="text1">Proud Bardezkar Bamboo</div>
                    <div class="text2">Basket</div>
                    <div class="text3" style="color: #fd5353fe;">Rs 299</div>
                    <div class="text4"></div>
                    <div class="text5">Qnt <button id="min" onclick="decrement()">-</button><input type="number" id="pqnt" min="1" value="1"><button id="max" onclick="increment()">+</button></div>
                </div>
                <div id="btn">
                    <button class="btn1">Add To Cart</button>
                    <button class="btn2">Remove From Wish List</button>
                </div>
            </div>
            <br><br><br>
            <!-- <div id="billtable">
                <p style="font-weight: bold;">Price Details</p>
                <p>Price <span>Rs 2000</span></p>
                <p>Discount <span>20%</span></p>
                <p>Delivery Charges <span>Rs 40</span></p>
                <hr>
                <p style="font-weight: bold;">Total Amount <span>Rs 1640</span></p>
            </div>
            <br>
            <button id="orderplc">Place Order</button>
            <br><br><br> -->
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>