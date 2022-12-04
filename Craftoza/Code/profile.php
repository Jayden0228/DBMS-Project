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
    <link rel="stylesheet" href="Css/profile.css">
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
            <p id="Headtext">PROFILE</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="pfbox">
                <form action="">
                    <label class="center" for="fname">First Name</label><br>
                    <input type="text" class="inpbiline center" id="fname" name="fname"><br>
                    <label class="center" for="fname">Last Name</label><br>
                    <input type="text" class="inpbiline center" id="fname" name="fname"><br>
                    <label class="center" for="mnbr">Mobile Number</label><br>
                    <input type="number" class="inpbiline center" id="mnbr" name="mnbr"><br>
                    <label class="center" for="email">Email</label><br>
                    <input type="text" class="inpbiline center" id="email" name="email"><br>
                    <input type="submit" class="center" value="Submit">
                </form>
            </div>
            <br><br><br>
            <button class="obtn">Set Password</button>
            <br><br>
            <button class="obtn">Deactivate Account</button>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>