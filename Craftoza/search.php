<?php
    session_start();
    if(isset($_SESSION['pid'])){
        unset($_SESSION['pid']);
    }
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
    
    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

    <?php include 'Php/_nav.php'?>

    <main>

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
                                $dprice=$row['price']*(1-$row['discnt']*0.01);
                                ?>
                                    <form action='item.php' method='POST'>
                                        <div id='search'>
                                            <div id='image'>
                                                <img src=<?php echo $row['ParentImgLink'].'png'?> width='110%' height='auto'>
                                            </div>
                                            <div id='text'>
                                                <div class='text1'><?php echo $row['pname']?></div>
                                                <div class='text2' style='color: #fd5353fe;'><?php echo "Rs ".$dprice?></div>
                                                <div class='text3'>-<?php echo $row['discnt']?>%OFF</div>
                                                <div class="text3">
                                                    <?php
                                                        $i=1;
                                                        while($i<=$row['rating'])
                                                        {
                                                            ?>
                                                                <img src="Images/star.png" alt="star" style="width: 9%;">
                                                            <?php
                                                            $i++;
                                                        }
                                                    ?>
                                                </div>
                                                <div class="text4">
                                                    <?php
                                                        if($row['qnt']==0){
                                                            ?>
                                                                <div style="color:red">Out of stock</div>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <div style="color:green">In stock</div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                            <div id='btn'>
                                                <input type='hidden' name='pid' value=<?php echo $row['pid']?> >
                                                <input class='btn1' type='submit' value='View Product' style='text-align: center;'>
                                            </div>
                                        </div>
                                    </form>
                                <?php
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
                                $dprice=$row['price']*(1-$row['discnt']*0.01);
                                ?>
                                    <form action='item.php' method='POST'>
                                        <div id='search'>
                                            <div id='image'>
                                                <img src=<?php echo $row['ParentImgLink'].'png'?> width='110%' height='auto'>
                                            </div>
                                            <div id='text'>
                                                <div class='text1'><?php echo $row['pname']?></div>
                                                <div class='text2' style='color: #fd5353fe;'><?php echo "Rs ".$dprice?></div>
                                                <div class='text3'>-<?php echo $row['discnt']?>%OFF</div>
                                                <div class="text3">
                                                    <?php
                                                        $i=1;
                                                        while($i<=$row['rating'])
                                                        {
                                                            ?>
                                                                <img src="Images/star.png" alt="star" style="width: 9%;">
                                                            <?php
                                                            $i++;
                                                        }
                                                    ?>
                                                </div>
                                                <div class="text4">
                                                    <?php
                                                        if($row['qnt']==0){
                                                            ?>
                                                                <div style="color:red">Out of stock</div>
                                                            <?php
                                                        }
                                                        else{
                                                            ?>
                                                                <div style="color:green">In stock</div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                            
                                            <div id='btn'>
                                                <input type='hidden' name='pid' value=<?php echo $row['pid']?> >
                                                <input class='btn1' type='submit' value='View Product' style='text-align: center;'>
                                            </div>
                                        </div>
                                    </form>
                                <?php
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