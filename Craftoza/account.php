<?php
    session_start();
    function printn(){
        if(isset($_SESSION['Name'])){
            echo "{$_SESSION['Name']}";
         }
         else{
            echo "USER";
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
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/account.css">
    <link rel="stylesheet" href="Css/footer.css">

    <script>
        function move(){
            document.getElementById('craftie').style.left="85%";
        }
    </script>
    
    <title>Craftoza</title>
</head>

<body>
    <?php include "Php/_register.php";?>

    <?php include 'Php/_nav.php'?>

    <main>
        <div id="top">
            <p id="Headtext">HELLO <?php printn();?></p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="Box">
                <p id="BoxTopText">ACCOUNT SETTING</p>
                <hr>
                <div class="option">
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="profile.php"'>
                            <img src="Images/account/profile.png">
                            <br>
                        </button>
                        <p>Profile</p>
                    </div>
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="credit.php"'>
                            <img src="Images/account/creditcard.png">
                        </button>
                        <p>Cards & Wallets</p>
                    </div>
                </div>
                <div class="option">
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="address.php"'>
                            <img src="Images/account/address.png">
                        </button>
                        <p>Address</p>
                    </div>
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="orderlist.php"'>
                            <img src="Images/account/order.png">
                        </button>
                        <p>Your Order</p>
                    </div>
                </div>
                <div class="option">
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="wish_list.php"'>
                            <img src="Images/account/wishlist.png">
                        </button>
                        <p>Your Wish List</p>
                    </div>
                    <div>
                        <button id="AccOpBtn" onclick="displayBlock('fpwd')">
                            <img src="Images/account/changepwd.png">
                        </button>
                        <p>Change Password</p>
                    </div>
                </div>
                <div class="option">
                    <div>
                        <button id="AccOpBtn" onclick='window.location ="Php/_logout.php"'>
                            <img src="Images/account/logout.png">
                        </button>
                        <p>Log Out</p>
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="JS/loginjQuery.js"></script>
</body>
</html>