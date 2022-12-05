<?php
    include "Php/_connectDatabase.php";
    if(isset($_POST['profile']))
    {
        session_start();
        $fname=$_POST["fname"];
        $mname=$_POST["mname"];
        $lname=$_POST["lname"];
        $mnum=$_POST["mnum"];
        $email=$_POST["email"];

        // $sql="SELECT * FROM `user` WHERE `email` = '$email'";
        // $res=mysqli_query($db,$sql);
        // $row=mysqli_fetch_assoc($res);
        $sql="UPDATE `user` SET `fname` = '$fname', `mname` = '$mname', `lname` = '$lname', `pnum` = '$num' WHERE `user`.`email` = '$email';";
        $res=mysqli_query($db,$sql);

        if(!$res)
        {
            echo "Record not updated";
        }
        // $_SESSION['Email']=$row["email"];
        $_SESSION['Name']=$fname;
        header("Location: index.php");
    }
    mysqli_close($db);
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
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

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
                <form action="" method="POST">
                    <label class="center" for="fname">First Name</label><br>
                    <input type="text" class="inpbiline center" id="fname" name="fname"><br>
                    <label class="center" for="mname">Middle Name</label><br>
                    <input type="text" class="inpbiline center" id="mname" name="mname"><br>
                    <label class="center" for="lname">Last Name</label><br>
                    <input type="text" class="inpbiline center" id="lname" name="lname"><br>
                    <label class="center" for="mnbr">Mobile Number</label><br>
                    <input type="text" class="inpbiline center" id="mnum" name="mnum"><br>
                    <label class="center" for="email">Email</label><br>
                    <input type="text" class="inpbiline center" id="email" name="email" value=""><br> <?php //echo "{$_SESSION['Email']}"?>
                    <input type="submit" class="center" value="Submit" name="profile">
                </form>
            </div>
            <br><br><br>
            <button class="obtn">Set Password</button>
            <br><br>
            <!-- <a href="Php/_logout.php"><button class="obtn">Deactivate Account</button></a> -->
            <!-- <button class="obtn" onclick="<?php //header("Location: Php/_logout.php");?>">Deactivate Account</button> -->
            <button class="obtn" onclick="displayBlock('logout')">Deactivate Account</button>
            <br><br><br>
            <div id="logout" style="display: none;">
                <?php include 'Php/_logout.php'?>
            </div>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>