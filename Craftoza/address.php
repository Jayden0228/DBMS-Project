<?php
    session_start();
    include "Php/_connectDatabase.php";
    if(isset($_SESSION['HnoUp']))
    unset($_SESSION['HnoUp']);
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
    <link rel="stylesheet" href="Css/address.css">
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
    <div id="AddFormBox"></div>
    <?php include 'Php/_nav.php'?>

    <main>
        <div id="top">
            <p id="Headtext">MY ADDRESS</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="addbox">

            <?php
                
                if(isset($_POST['newaddr']))
                {
                    $hfno=$_POST["hfno"];
                    $wname=$_POST["wname"];
                    $villcity=$_POST["villcity"];
                    $taluka=$_POST["taluka"];
                    $state=$_POST["state"];
                    $pcode=$_POST["pcode"];

                    $sql="INSERT INTO `address` (`uid`, `hno`, `wname`, `villageCity`, `taluka`, `state`, `pincode`) VALUES ('{$_SESSION['UserID']}', '$hfno', '$wname', '$villcity', '$taluka', '$state', '$pcode');";

                    $res=mysqli_query($db,$sql);
                    // if(!$res)
                    // {
                    //     echo "Record not updated";
                    // } 
                }

                if(isset($_SESSION['UserID']))
                {
                    $userid=$_SESSION['UserID'];
                    $sql="SELECT * FROM `address` WHERE `uid`='$userid'";
                    $res=mysqli_query($db,$sql);

                    if(mysqli_num_rows($res)==0)
                    {
                        ?>
                            <div id='box1'>
                                <p id='atext'>Saved Address</p>
                                <br>
                                <p style='text-align:center'>No Address</p>
                                <br>
                            </div>
                            <hr>
                            <form id="NewAddressForm"><div style='margin: 20px 28px 30px 80%;'><button id="AddressButton" style="width: 100%;padding: 9px">New Address</button></div></form>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div id='box1'>
                            <p id='atext'>Saved Address</p>
                        <?php
                        $i=1;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            ?>
                                <div class='center addarea'>
                                    <h5>Address #<?php echo $i?></h5>
                                    <p><?php echo "{$row['hno']} {$row['wname']} {$row['villageCity']} {$row['taluka']} {$row['state']} {$row['pincode']}"?></p>
                                    <div style="display: flex;">
                                        <form style="margin:0;" id=<?php echo "AddressRemove".$i?>>
                                            <input type="hidden" name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="raddr" id="AddressButton">Remove</button>
                                        </form>
                                        <div style="width:1%"></div>
                                        <form style="margin:0;" id=<?php echo "AddressUpdate".$i?>>
                                            <input type="hidden" id=<?php echo "AddrHno".$i?> name="AddrHno" value=<?php echo $row['hno']?>>
                                            <button type="submit" name="uaddr" id="AddressButton">Update</button>
                                    </form>
                                </div>
                                </div>
                            <?php
                            $i++;
                        }
                        ?>
                        <hr>
                        <form id="NewAddressForm"><div style='margin: 20px 28px 30px 80%;'><button id="AddressButton" style="width: 100%;padding: 9px">New Address</button></div></form>
                        </div>
                        <?php
                    }
                }
                mysqli_close($db);
                ?>
                        </div>
                <br><br><br>
            </div>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/accountjQuery.js"></script>
</body>
</html>