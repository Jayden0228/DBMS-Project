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
        $cpassword=$_POST["CPassword"];
        if($password!=$cpassword){
            echo "perr";
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql="INSERT INTO `user` (`pwd`, `email`, `fname`, `mname`, `lname`, `pnum`, `credit`) VALUES ('$hashed_password', '$email', NULL, NULL, NULL, NULL, NULL)";
            $res=mysqli_query($db,$sql);
            if(!$res){
                echo "no";
            }
            else{
                $_SESSION['Email']=$email;
                echo "yes";
            }
        }
    }

    if(isset($_POST['forgotpwd']))
    {
        $email = $_POST['Email'];
        if(empty($email))
        {
            echo 'empty';
        }
        else{
            $sql="SELECT * FROM `user` WHERE `email` = '$email'";
    
            $res=mysqli_query($db,$sql);
    
            if(mysqli_num_rows($res)==0)
            {
                echo "no";
            }else{
                $num=0;
                while(strlen((string)$num)!=6)
                {
                    $num*=10;
                    $num+=rand(0,9);
                }
                $_SESSION['otp']=$num;
                $_SESSION['FEmail']=$email;
                include "Php/mail.php";
                $_SESSION['time']=time();
                echo "yes";
            }
        }
    }

    if(isset($_POST['OTP']))
    {
        $otp=$_POST['Otp'];
        if(strlen((string)$otp)!=6){
            echo "less";
        }
        else{
            if($_SESSION['otp']!=$otp){
                echo "no";
            }
            else{
                if(time()-$_SESSION['time']<=180)
                    echo "yes";
                else
                    echo "exp";
            }
        }
    }

    if(isset($_POST['ResendOtp']))
    {
        $num=0;
        while(strlen((string)$num)!=6)
        {
            $num*=10;
            $num+=rand(0,9);
        }
        $_SESSION['otp']=$num;
        include "Php/mail.php";
        $_SESSION['time']=time();
    }


    if(isset($_POST['Newpass']))
    {
        $password=$_POST["Password"];
        $cpassword=$_POST["CPassword"];
        if($password!=$cpassword){
            echo "perr";
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql="UPDATE `user` SET `pwd` = '$hashed_password' WHERE `user`.`email` = '{$_SESSION['FEmail']}';";

            $res=mysqli_query($db,$sql);

            if(!$res){
                echo "no";
            }else{
                echo "yes";
                unset($_SESSION['FEmail']);
            }
        }
    }
?>