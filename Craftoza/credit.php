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
    <link rel="stylesheet" href="Css/credit.css">
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
            <p id="Headtext">MY CARDS & WALLETS</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="creditbox">
                <div id="box1">
                    <p id="ctext">Saved Cards</p>
                    <div id="card">
                        <div class="center cardarea">
                            <span class="cardname">lorem</span>
                            <span class="ncard">Remove</span>
                        </div>
                    </div>
                    <hr>
                    <div style="margin-top: 20px; margin-bottom: 30px;"><span class="ncard">New Card</span></div>
                </div>

                <div id="box2">
                    <p id="ctext">Enter the Details</p>
                    <hr>
                    <form action="" method="post" class="center2" style="width: 40%;">
                        <label for="Card No">Card Number</label>
                        <br>
                        <input type="number" name="cardno" id="cardno" oninput="this.value=this.value.replace(/[^0-9]/g,'')" max="16">
                        <br><br>
                        <label for="CVV">CVV</label>
                        <br>
                        <input type="number" name="cvv" id="cvv" maxlength="3" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        <br><br>
                        <label for="Card No">Exp Date <span style="font-weight: 100;">(month-year)</span></label>
                        <br>
                        <input type="month" name="exptdate" id="exptdate">
                        <br><br>
                        <label for="Card Label">Card Label</label><br>
                        <input type="text" name="clabel" id="clabel">
                        <br>
                        <input type="submit" value="Submit" style="width: 30%; padding: 4px 0;">
                    </form>
                </div>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>