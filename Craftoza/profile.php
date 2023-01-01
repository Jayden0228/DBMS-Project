<?php
    session_start();
    unset($_SESSION['HnoUp']);
    unset($_SESSION['cdno']);
    include "Php/_connectDatabase.php";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['profile']))
        {
            $fname=$_POST["fname"];
            $mname=$_POST["mname"];
            $lname=$_POST["lname"];
            $mnum=$_POST["mnum"];
            $email=$_POST["email"];
    
            $sql="UPDATE `user` SET `fname` = '$fname', `mname` = '$mname', `lname` = '$lname', `pnum` = '$mnum' WHERE `user`.`email` = '$email';";
            $res=mysqli_query($db,$sql);
    
            if(!$res)
            {
                echo "Record not updated";
            }
            $_SESSION['Name']=$fname;
            header("Location: index.php");
        }
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
    <link rel="stylesheet" href="Css/footer.css">
    <link rel="stylesheet" href="Css/login_sign.css">

    <script>
        function move(){
            document.getElementById('craftie').style.left="85%";
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
        <br><br>
        <div id="backgd">
            <br><br><br>
            <div id="Box">
                <div class="Top3Colours">
                    <div id="red"></div>
                    <div id="yellow"></div>
                    <div id="blue"></div>
                </div>
                <form action="" method="POST" id="ProfileForm" class="center">
                    <?php
                        include "Php/_connectDatabase.php";
                        $sql="SELECT * FROM `user` WHERE `email` = '{$_SESSION['Email']}'";
                        $res=mysqli_query($db,$sql);
            
                        if(mysqli_num_rows($res)==0)
                        {
                            echo "Invalid Email";
                        }
                        else
                        {
                            $row=mysqli_fetch_assoc($res);
                            $fname=$row["fname"];
                            $mname=$row["mname"];
                            $lname=$row["lname"];
                            $mnum=$row["pnum"];
                        }
                        mysqli_close($db);
                    ?>
                    <label class="center" for="fname">First Name</label>
                    <input type="text" class="center" name="fname" onkeydown="return /[a-z]/i.test(event.key)" value="<?php if(isset($fname)) {echo "$fname";}else{echo "";}?>" required><br>
                    <label class="center" for="mname">Middle Name</label>
                    <input type="text" class="center" name="mname" onkeydown="return /[a-z]/i.test(event.key)" value="<?php if(isset($mname)) {echo "$mname";}else{echo "";}?>"><br>
                    <label class="center" for="lname">Last Name</label>
                    <input type="text" class="center" name="lname" onkeydown="return /[a-z]/i.test(event.key)" value="<?php if(isset($lname)) {echo "$lname";}else{echo "";}?>" required><br>
                    <label class="center" for="mnbr">Mobile Number</label>
                    <input type="text" class="center" name="mnum" value="<?php if(isset($mnum)) {echo "$mnum";}else{echo "";}?>" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required><br>
                    <label class="center" for="email">Email</label>
                    <input type="text" class="center" name="email" value="<?php if(isset($_SESSION['Email'])) {echo $_SESSION['Email'];}else{echo "";}?>" required><br>
                    <input type="submit" value="Submit" name="profile" id="subbtn" style="color: white;">
                </form>
                <div class="bottom3Colours">
                    <div id="red"></div>
                    <div id="yellow"></div>
                    <div id="blue"></div>
                </div>
            </div>
            <br><br><br>
        </div>        
    </main>
    <?php include 'Php/_footer.php'?>
    <?php
        echo "<script>displayNone('backToLogin');</script>";
    ?>
    <script src="JS/validationjQuery.js"></script>

</body>
</html>