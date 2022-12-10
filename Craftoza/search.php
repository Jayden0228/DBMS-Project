<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['Bamboo']))
        {
            $_SESSION['material']='A';
            unset($_SESSION['type']);
        }
        if(isset($_POST['Coconut']))
        {
            $_SESSION['material']='B';
            unset($_SESSION['type']);
        }
        if(isset($_POST['Clay']))
        {
            $_SESSION['material']='C';
            unset($_SESSION['type']);
        }
        if(isset($_POST['Shells']))
        {
            $_SESSION['material']='D';
            unset($_SESSION['type']);
        }
        if(isset($_POST['Bag']))
        {
            $_SESSION['type']=1;
            unset($_SESSION['material']);
        }
        if(isset($_POST['HomeDeco']))
        {
            $_SESSION['type']=2;
            unset($_SESSION['material']);
        }
        if(isset($_POST['EarthenPots']))
        {
            $_SESSION['type']=3;
            unset($_SESSION['material']);
        }
        if(isset($_POST['Jewellery']))
        {
            $_SESSION['type']=4;
            unset($_SESSION['material']);
        }
        // if(isset($_POST['search']))
        // {
        //     $searchstr=$_POST['search'];

        // }
    }
    // if(isset($_SESSION['material']))
    // {
    //     echo "{$_SESSION['material']}";
    // }
    // if(isset($_SESSION['type']))
    // {
    //     echo "{$_SESSION['type']}";
    // }
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
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/search.css">
    <link rel="stylesheet" href="Css/footer.css">

    <!-- <script>
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
    </script> -->
    
    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

    <?php include 'Php/_nav.php'?>

    <main>
        <!-- <div id="top">
            <p id="Headtext">HELLO <?php //printn();?></p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div> -->
        <div id="backgd">
            <br><br><br>
                <?php
                    include "Php/_connectDatabase.php";
                    if(isset($_SESSION['material']))
                    {
                        $pid=$_SESSION['material'];
                        $sql="SELECT * FROM `product` WHERE `pid` like '%$pid#%'";
                        $res=mysqli_query($db,$sql);
    
                        if(mysqli_num_rows($res)==0)
                        {
                            echo "No such product";
                        }
                        else
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $dprice=$row['price']-$row['price']*$row['discnt']*0.01;
                                echo "<form action='item.php' method='POST'>";
                                echo "<div id='search'>";
                                echo "<div id='image'>";
                                echo "<img src='Images/card3.png' alt='' width='110%' height='auto'>";
                                echo "</div>";
                                echo "<div id='text'>";
                                echo "<div class='text1'>{$row['pname']}</div>";
                                echo "<div class='text2' style='color: #fd5353fe;'>RS. $dprice</div>";
                                echo "<div class='text3'>-{$row['discnt']} %OFF</div>";
                                echo "</div>";
                                echo "<div id='btn'>";
                                echo "<input type='hidden' name='pid' value='{$row['pid']}' >";
                                echo "<input class='btn1' type='submit' value='View Product' style='text-align: center;'>";
                                echo "</div>";
                                echo "</div>";
                                echo "</form>";
                            }
                        }
                    }
                    if(isset($_SESSION['type']))
                    {
                        $pid=$_SESSION['type'];
                        $sql="SELECT * FROM `product` WHERE `pid` like '%#$pid'";
                        
                        $res=mysqli_query($db,$sql);
    
                        if(mysqli_num_rows($res)==0)
                        {
                            echo "No such type";
                        }
                        else
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                echo "<form action='item.php' method='POST'>";
                                echo "<div id='search'>";
                                echo "<div id='image'>";
                                echo "<img src='Images/card3.png' alt='' width='110%' height='auto'>";
                                echo "</div>";
                                echo "<div id='text'>";
                                echo "<div class='text1'>{$row['pname']}</div>";
                                echo "<div class='text2' style='color: #fd5353fe;'>{$row['price']}</div>";
                                echo "<div class='text3'>{$row['discnt']} %OFF</div>";
                                echo "</div>";
                                echo "<div id='btn'>";
                                //echo "<button class='btn1' type='button' value='{$row['pid']}'>View Product</button>";
                                echo "<input type='hidden' name='pid' value='{$row['pid']}' >";
                                echo "<input class='btn1' type='submit' value='View Product' style='text-align: center;'>";
                                echo "</div>";
                                echo "</div>";
                                echo "</form>";
                            }
                        }
                    }  
                ?>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>
                    
    <script src="JS/Login.js"></script>

</body>
</html>