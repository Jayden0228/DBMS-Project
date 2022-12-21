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
            <div id="accbox">
                <p id="acctext">ACCOUNT SETTING</p>
                <hr>
                <div class="accopt center">Edit profile<a href="profile.php"><span class="arrw">&#8680;</span></a></div>
                <hr>
                <div class="accopt center">Save Cards & Wallets<a href="credit.php"><span class="arrw">&#8680;</span></a></div>
                <hr>
                <div class="accopt center">Address<a href="address.php"><span class="arrw">&#8680;</span></a></div>
                
            </div>
            <br><br><br>
            <button class="obtn">Your Order</button>
            <br><br>
            <a href="wish_list.php"><button class="obtn">Your Wish List</button></a>
            <br><br>
            <button class="obtn" onclick="displayBlock('fpwd')">Change Password</button>
            <br><br>
            <a href="Php/_logout.php"><button class="obtn">Log Out</button></a>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="JS/loginjQuery.js"></script>
</body>
</html>