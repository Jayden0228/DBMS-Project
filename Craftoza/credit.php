<?php
    session_start();
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
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

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
                <?php
                    include "Php/_connectDatabase.php";
                    
                    if(isset($_POST['newcard']))
                    {
                        $cardno=$_POST["cardno"];
                        $cvv=$_POST["cvv"];
                        $exptdate=$_POST["exptdate"];
                        $clabel=$_POST["clabel"];
                        $sql="INSERT INTO `creditcard` (`uid`, `cardno`, `cvv`, `expdate`, `label`) VALUES ('{$_SESSION['UserID']}', '$cardno', '$cvv', '$exptdate', '$clabel');";

                        $res=mysqli_query($db,$sql);

                        if(!$res)
                        {
                            echo "Record not updated";
                        }    
                        echo "<script>displayNone(`box2`);displayBlock(`box1`)</script>";
                    }

                    if(isset($_SESSION['UserID']))
                    {
                        $userid=$_SESSION['UserID'];
                        $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                        $res=mysqli_query($db,$sql);

                        if(mysqli_num_rows($res)==0)
                        {
                            echo "<div id='box1'>";
                                echo "<p id='ctext'>Saved Cards</p>";
                                echo "<div id='card'>";
                                echo "<br>";
                                    echo "<p style='text-align:center'>No Card</p>";
                                echo "<br>";
                                echo "</div>";
                                echo "<hr>";
                                echo "<div style='margin-top: 20px; margin-bottom: 30px;'><span id='newcd' class='ncard' >New Card</span></div>";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div id='box1'>";
                                echo "<p id='ctext'>Saved Cards</p>";
                            while($row=mysqli_fetch_assoc($res))
                            {
                                echo "<div id='card'>";
                                    echo "<div class='center cardarea'>";
                                        echo "<span class='cardname'>{$row['label']}</span>";
                                        echo "<span class='ncard remove'>Remove</span>";
                                    echo "</div>";
                                echo "</div>";
                            }
                                echo "<hr>";
                                echo "<div style='margin-top: 20px; margin-bottom: 30px;'><span id='newcd' class='ncard' >New Card</span></div>";
                            echo "</div>";
                        }
                    }
                    echo "<script>
                        document.getElementById('newcd').onclick = function(){
                            displayNone(`box1`);
                            displayBlock(`box2`);
                        }
                    </script>";
                    echo "<div id='box2'>";
                    echo "<span class='arrow' onclick='displayNone(`box2`);displayBlock(`box1`);' style='position: relative;
                    cursor: pointer;'>&#8592;</span>";
                    echo "<p id='ctext'>Enter the Details</p>";
                    echo "<hr>";
                    echo "<form action='' method='post' class='center2' style='width: 40%;'>";
                    echo "<label for='Card No'>Card Number</label>";
                    echo "<br>";
                    echo "<input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)' maxlength='16' required>";
                    echo "<br><br>";
                    echo "<label for='CVV'>CVV</label>";
                    echo "<br>";
                    echo "<input type='number' name='cvv' id='cvv' maxlength='3' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>";
                    echo "<br><br>";
                    echo "<label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>";
                    echo "<br>";
                    echo "<input type='date' name='exptdate' id='exptdate' required>";
                    echo "<br><br>";
                    echo "<label for='Card Label'>Card Label</label><br>";
                    echo "<input type='text' name='clabel' id='clabel' required>";
                    echo "<br>";
                    echo "<input type='submit' value='Submit' name='newcard' style='width: 30%; padding: 4px 0;'>";
                    echo "</form>";
                    echo "</div>";
                
                    mysqli_close($db);
                ?>
                <!-- <div id="box1">
                    <p id="ctext">Saved Cards</p>
                    <div id="card">
                        <div class="center cardarea">
                            <span class="cardname">lorem</span>
                            <span class="ncard">Remove</span>
                        </div>
                    </div>
                    <hr>
                    <div style="margin-top: 20px; margin-bottom: 30px;"><span class="ncard">New Card</span></div>
                </div> -->

                <!-- <div id="box2">
                    <p id="ctext">Enter the Details</p>
                    <hr>
                    <form action="" method="post" class="center2" style="width: 40%;">
                        <label for="Card No">Card Number</label>
                        <br>
                        <input type="number" name="cardno" id="cardno" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="16">
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
                </div> -->

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>