<?php
    session_start();
    include "Php/_connectDatabase.php";

    if(isset($_POST["Login"]))
    {
        $email=$_POST["Email"];
        $password=$_POST["Password"];
        $sql="SELECT * FROM `user` WHERE `email` = '$email'";
        $res=mysqli_query($db,$sql);
        if(mysqli_num_rows($res)==0)
        {
            echo "no";
        }
        else
        {
            $row=mysqli_fetch_assoc($res);
            $hashed_password=$row['pwd'];
            if(password_verify($password, $hashed_password)){
                $_SESSION['UserID']=$row["uid"];
                $_SESSION['Email']=$row["email"];
                $_SESSION['Name']=$row["fname"];
            }
            else{
                echo "no";
            }
        }
    }

    if(isset($_POST['Signup']))
    {
        $email=$_POST["Email"];
        $password=$_POST["Password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql="INSERT INTO `user` (`pwd`, `email`, `fname`, `mname`, `lname`, `pnum`, `credit`) VALUES ('$hashed_password', '$email', NULL, NULL, NULL, NULL, NULL)";

        $res=mysqli_query($db,$sql);

        if(!$res){
            echo "no";
        }
        $_SESSION['Email']=$row["email"];
    }

    if(isset($_POST['forgotpwd']))
    {
        $email = $_POST['Email'];
        $sql="SELECT * FROM `user` WHERE `email` = '$email'";

        $res=mysqli_query($db,$sql);

        if(mysqli_num_rows($res)==0)
        {
            echo "no";
        }else{
            $num=0;
            $i=0;
            while($i<6)
            {
                $num*=10;
                $num+=rand(0,9);
                $i+=1;
            }
            $_SESSION['otp']=$num;
            include "Php/mail.php";
            echo "yes";
        }
    }

    if(isset($_POST['OTP']))
    {
        $otp=$_POST['Otp'];
        if($_SESSION['otp']!=$otp)
        {
            echo "no";
        }
        else{
            echo "yes";
        }
    }


    if(isset($_POST['Newpass']))
    {
        $userid=$_SESSION['UserID'];
        $password=$_POST["Password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql="UPDATE `user` SET `pwd` = '$hashed_password' WHERE `user`.`uid` = $userid;";

        $res=mysqli_query($db,$sql);

        if(!$res)
        {
            echo "no";
        }
    }
?>