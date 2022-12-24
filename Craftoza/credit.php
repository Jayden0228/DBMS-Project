<?php
    session_start();
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['rcard'])){
            $sql="DELETE FROM `creditcard` WHERE `cardno` = {$_POST['removecard']} AND `uid` = {$_SESSION['UserID']} ";
            mysqli_query($db,$sql);
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
                        ?>  
                        <script>displayNone(`box2`);displayBlock(`box1`)</script>
                        <?php
                    }

                    if(isset($_SESSION['UserID']))
                    {
                        $userid=$_SESSION['UserID'];
                        $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                        $res=mysqli_query($db,$sql);

                        if(mysqli_num_rows($res)==0)
                        {
                            ?>
                            <div id='box1'>
                                <p id='ctext'>Saved Cards</p>
                                <div id='card'>
                                <br>
                                    <p style='text-align:center'>No Card</p>
                                <br>
                                </div>
                                <hr>
                                <div style='margin-top: 20px; margin-bottom: 30px;'><span id='newcd' class='ncard' >New Card</span></div>
                            </div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div id='box1'>
                            <p id='ctext'>Saved Cards</p>
                            <?php
                            while($row=mysqli_fetch_assoc($res))
                            {
                                ?>
                                    <div id='card'>
                                        <div class='center cardarea'>
            
                                            <span class='cardname'><?php echo "{$row['label']}"?></span>
                                            
                                            <span class='ncard'>
                                                <form action="#" method="post" style="margin:0;">
                                                    <input type="hidden" name="removecard" value=<?php echo $row['cardno']?>>
                                                    <input type="submit" name="rcard" value="Remove" style="color: #FE981B;background: white; border:none; margin:0; padding:0">
                                                </form >
                                            </span>
                                        </div>
                                    </div>
                                <?php
                            }
                            ?>
                            <hr>
                            <div style='margin-top: 20px; margin-bottom: 30px;'><span id='newcd' class='ncard' >New Card</span></div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <script>
                        document.getElementById('newcd').onclick = function(){
                            displayNone(`box1`);
                            displayBlock(`box2`);
                        }
                    </script>
                    <div id='box2'>
                    <span class='arrow' onclick='displayNone(`box2`);displayBlock(`box1`);' style='position: relative;
                    cursor: pointer;'>&#8592;</span>
                    <p id='ctext'>Enter the Details</p>
                    <hr>
                    <form action='' method='post' class='center2' style='width: 40%;' id="CreditForm">
                    <label for='Card No'>Card Number</label>
                    <br>
                    <input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)'  required>
                    <br><br>
                    <label for='CVV'>CVV</label>
                    <br>
                    <input type='number' name='cvv' id='cvv' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                    <br><br>
                    <label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>
                    <br>
                    <input type='date' name='exptdate' id='exptdate' required>
                    <br><br>
                    <label for='Card Label'>Card Label</label><br>
                    <input type='text' name='clabel' id='clabel' required>
                    <br>
                    <input type='submit' value='Submit' name='newcard' style='width: 30%; padding: 4px 0;'>
                    </form>
                    </div>
                <?php
                    mysqli_close($db);
                ?>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>

</body>
</html>