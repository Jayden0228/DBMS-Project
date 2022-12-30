<?php
    session_start();
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['rcard'])){
            $sql="DELETE FROM `creditcard` WHERE `cardno` = '{$_POST['cdno']}' AND `uid` = '{$_SESSION['UserID']}'";
            mysqli_query($db,$sql);
        }
        if(isset($_POST['newcard']))
        {
            $cardno=$_POST["cardno"];
            $cvv=$_POST["cvv"];
            $exptdate=$_POST["exptdate"];
            $clabel=$_POST["clabel"];
            $sql="INSERT INTO `creditcard` (`uid`, `cardno`, `cvv`, `expdate`, `label`) VALUES ('{$_SESSION['UserID']}', '$cardno', '$cvv', '$exptdate', '$clabel');";

            $res=mysqli_query($db,$sql);

            // if(!$res)
            // {
            //     echo "Record not updated";
            // }
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
    <link rel="stylesheet" href="Css/credit.css">
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

    <div id="CardFormBox">
        <div class='Formbox'>
        <span class='arrow1' onclick='displayNone(`CardFormBox`)'>&#8592;</span>
        <p id='ctext'>Enter the Details</p>
        <hr>
        <form action='' method='post' class='center2' style='width: 80%;' id="CreditForm">
            <div class="FormRow" style="display: block;">
                <div class="FormCol">
                <label for='Card No'>Card Number</label>
                <input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)'  required>
                </div>
            </div>

            <div class="FormRow">
                <div class="FormCol">
                <label for='CVV'>CVV</label>
                <input type='password' name='cvv' id='cvv' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                </div>
                <div class="FormCol">
                <label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>
                <input type='date' name='exptdate' id='exptdate' required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <div class="FormCol">
                <label for='Card Label'>Card Label</label><br>
                <input type='text' name='clabel' id='clabel' required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <input type='submit' name='newcard' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
            </div>
            <br>
        </form>
        </div> 
    </div>

    <div id="CardFormBoxU">
        <?php
            if(isset($_SESSION['cdno'])){
                $sql1="SELECT * FROM `creditcard` WHERE `cardno` = '{$_SESSION['cdno']}' AND `uid`='{$_SESSION['UserID']}'";
                $res1=mysqli_query($db,$sql1);
                $row1=mysqli_fetch_assoc($res1);
            }
        ?>
        <div class='Formbox'>
        <span class='arrow1' onclick='displayNone(`CardFormBoxU`)'>&#8592;</span>
        <p id='ctext'>Enter the Details</p>
        <hr>
        <form action='' method='post' class='center2' style='width: 80%;' id="CreditFormU">
            <div class="FormRow" style="display: block;">
                <div class="FormCol">
                <label for='Card No'>Card Number</label>
                <input type='number' name='cardno' id='cardno1' oninput='this.value=this.value.replace(/[^0-9]/g,``)' value="<?php if(isset($row1)) echo $row1['cardno']; else echo "";?>"  required>
                </div>
            </div>

            <div class="FormRow">
                <div class="FormCol">
                <label for='CVV'>CVV</label>
                <input type='password' name='cvv' id='cvv1' oninput='this.value=this.value.replace(/[^0-9]/g,``)' value="<?php if(isset($row1)) echo $row1['cvv']; else echo "";?>"  required>
                </div>
                <div class="FormCol">
                <label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>
                <input type='date' name='exptdate' id='exptdate1' value="<?php if(isset($row1)) echo $row1['expdate']; else echo "";?>"  required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <div class="FormCol">
                <label for='Card Label'>Card Label</label><br>
                <input type='text' name='clabel' id='clabel1' value="<?php if(isset($row1)) echo $row1['label']; else echo "";?>"  required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <input type='submit' name='updatecard' value='Update' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
            </div>
            <br>
        </form>
        </div> 
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
                <?php                    
                    if(isset($_SESSION['UserID']))
                    {
                        $userid=$_SESSION['UserID'];
                        $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                        $res=mysqli_query($db,$sql);
                        ?>
                        <p id='ctext'>Saved Cards</p>
                        <?php
                        if(mysqli_num_rows($res)==0)
                        {
                            ?>
                            <br>
                            <p style='text-align:center'>No Card</p>
                            <br>
                            <?php
                        }
                        else
                        {
                            $i=1;
                            while($row=mysqli_fetch_assoc($res))
                            {
                                ?>  
                                    <div class='center cardarea'>
                                        <h5>Credit Card #<?php echo $i?></h5>
                                        <p><?php echo $row['label']?></p>
                                        <div style="display: flex;">
                                            <form action='' method="POST" style="margin:0;">
                                                <input type="hidden" name="cdno" value="<?php echo $row['cardno']?>">
                                                <button type="submit" name="rcard" id="CreditButton">Remove</button>
                                            </form>
                                            <div style="width:1%"></div>
                                            <form style="margin:0;" id=<?php echo "CardUpdate".$i?>>
                                                <input type="hidden" id=<?php echo "cdno".$i?> name="cdno" value="<?php echo $row['cardno']?>">
                                                <button type="submit" name="ucard" id="CreditButton">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                <?php
                                $i++;
                            }
                        }
                    }
                    ?>
                    <hr>
                    <div style='margin: 20px 28px 30px 80%;'><button class="NewCardButton" id="CreditButton" style="width: 100%;padding: 9px">New Card</button></div>
                <?php
                    mysqli_close($db);
                ?>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>
    <?php
    if(isset($_SESSION['cdno'])){
        ?>
            <script>$('#CardFormBoxU').show();</script>
        <?php
    }
    ?>

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/accountjQuery.js"></script>
</body>
</html>