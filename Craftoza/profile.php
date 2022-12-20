<?php
    session_start();
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
    
            // $sql="SELECT * FROM `user` WHERE `email` = '$email'";
            // $res=mysqli_query($db,$sql);
            // $row=mysqli_fetch_assoc($res);
            $sql="UPDATE `user` SET `fname` = '$fname', `mname` = '$mname', `lname` = '$lname', `pnum` = '$mnum' WHERE `user`.`email` = '$email';";
            $res=mysqli_query($db,$sql);
    
            if(!$res)
            {
                echo "Record not updated";
            }
            // $_SESSION['Email']=$row["email"];
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
    <?php
        echo "<script>displayNone('backToLogin');</script>";
    ?>
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
                <form action="" method="POST" onsubmit="return validateProfile(this)">
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
                            echo"";
                            $lname=$row["lname"];
                            $mnum=$row["pnum"];
                        }
                    ?>
                    <label class="center" for="fname">First Name</label><br>
                    <input type="text" class="inpbiline center" name="fname" value="<?php if(isset($fname)) {echo "$fname";}else{echo "";}?>" required><br>
                    <label class="center" for="mname">Middle Name</label><br>
                    <input type="text" class="inpbiline center" name="mname" value="<?php if(isset($mname)) {echo "$mname";}else{echo "";}?>"><br>
                    <label class="center" for="lname">Last Name</label><br>
                    <input type="text" class="inpbiline center" name="lname" value="<?php if(isset($lname)) {echo "$lname";}else{echo "";}?>" required><br>
                    <label class="center" for="mnbr">Mobile Number</label><br>
                    <input type="text" class="inpbiline center" name="mnum" value="<?php if(isset($mnum)) {echo "$mnum";}else{echo "";}?>" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required><br>
                    <label class="center" for="email">Email</label><br>
                    <input type="text" class="inpbiline center" name="email" value="<?php if(isset($_SESSION['Email'])) {echo $_SESSION['Email'];}else{echo "";}?>" required><br>
                    <input type="submit" class="center" value="Submit" name="profile" id="subbtn">
                </form>
            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>
    <script src="JS/account.js"></script>


</body>
</html>