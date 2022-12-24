<?php
    session_start();
    include "Php/_connectDatabase.php";
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
    <!-- <link rel="stylesheet" href="Css/style.css"> -->
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/order.css">
    <link rel="stylesheet" href="Css/footer.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->

    <style>
        *, ::after, ::before {
            box-sizing: content-box;
        }
        img, svg {
            vertical-align:auto;
        }
        td,th{
            text-align: center;
        }
        .container{
            max-width: 1170px;
            margin: auto;
        }
        .row{
            display: flex;
            flex-wrap:wrap;
            row-gap: 20px;
        }
    </style>

    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>

    <?php include 'Php/_nav.php'?>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            if(isset($_POST['newcard'])){
                $cardno=$_POST["cardno"];
                $cvv=$_POST["cvv"];
                $exptdate=$_POST["exptdate"];
                $clabel=$_POST["clabel"];
                $sql="INSERT INTO `creditcard` (`uid`, `cardno`, `cvv`, `expdate`, `label`) VALUES ('{$_SESSION['UserID']}', '$cardno', '$cvv', '$exptdate', '$clabel');";

                mysqli_query($db,$sql);
            }
        }
    ?>

    <main>
        <div id="backgd">
            <!-- 
            price details
            craft credit
            -->
            <br><br><br>

            
        <div id="mainbox3">
            <br><br>

            <?php
                $sql1="SELECT * FROM `product` NATURAL JOIN `seller` WHERE `pid`='{$_SESSION['pid']}'";
                $res1=mysqli_query($db,$sql1);
                if(mysqli_num_rows($res1)==0)
                    echo "Product not found in the database";
                else
                    $row1=mysqli_fetch_assoc($res1);

                $nprice=$row1['price']*$_SESSION['cnt'];
                $ndiscnt=$row1['price']*$row1['discnt']*0.01*$_SESSION['cnt'];
                $ntax=$row1['price']*0.08*$_SESSION['cnt'];
            ?>

            <p id="toptext">Price Details</p>
            <table class="table" style="width: 50%;margin: 5px auto;">
            <tbody>
                <tr>
                    <td>Price (<?php echo $_SESSION['cnt']?> item)</td>
                    <td><?php echo "Rs ".$nprice?></td>
                </tr>
                <tr>
                    <td>Discount <?php echo $row1['discnt']?>%OFF</td>
                    <td><?php echo "Rs ".$ndiscnt?></td>
                </tr>
                <tr>
                    <td>Tax 8%</td>
                    <td><?php echo "Rs ".$ntax?></td>
                </tr>
                <tr>
                    <td>Delivery Charge</td>
                    <td>Free Delivery</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><?php echo "Rs ".($nprice-$ndiscnt+$ntax) ?></td>
                </tr>
            </tbody>
            </table>
            <br><br>
      
                <p id="toptext">Payment</p>
                <hr>
                <label for="">Choose The Payment Method</label><br>
                <form action="orderlist.php" method="post">
                    <button class="btn btn-outline-primary paymentopt" name="paymed" onclick=" window.location ='orderlist.php'">UPI</button>
                </form>
                <br>
                <button class="btn btn-outline-primary paymentopt" id="crd">Credit/Wallet</button><br>
                <button class="btn btn-outline-primary paymentopt" onclick=" window.location ='orderlist.php'">Net Banking</button><br>
                <button class="btn btn-outline-primary paymentopt" onclick=" window.location ='orderlist.php'">Cash on Delivery</button><br>
            </div>

            <script>
                document.getElementById('crd').onclick=function(){
                    displayNone(`mainbox3`);
                    displayBlock(`mainbox4`);
                }
            </script>

            <div id="mainbox4">
                <?php
                $userid=$_SESSION['UserID'];
                $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                $res=mysqli_query($db,$sql);
                if(mysqli_num_rows($res)==0)
                {
                    ?><script>
                            displayNone(`box3`);
                            displayBlock(`box4`);
                    </script>
                    <?php
                }
                else
                {   
                    ?><script>
                            displayNone(`box4`);
                            displayBlock(`box3`);
                    </script>
                    <div id='box3'>
                    <?php
                    $i=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id='cardForm'.$i;
                        $id2='choosecard'.$i;
                        ?>
                        <div id='card'>
                            <div class='center cardarea'>
                                <span class='cardname'><?php echo "{$row['label']}"?></span>
                                <span class='ncard'>
                                    <form autocomplete="off" style="margin:0;" id=<?php echo $id?>>
                                        <input type="hidden" id=<?php echo $id2?> name="choosecard" value=<?php echo $row['cardno']?>>
                                        <input type="submit" name="ccard" id="ccard" value="choose" style="color: #FE981B;background: white; border:none; margin:0; padding:0">
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
                ?>
                <div id='box4'>
                <form action='' method='post' class='center2' style='width: 40%;' id='CreditForm'>
                <label for='Card No'>Card Number</label>
                <br>
                <input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)' maxlength='16' required>
                <br><br>
                <label for='CVV'>CVV</label>
                <br>
                <input type='number' name='cvv' id='cvv' maxlength='3' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
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
            </div>

            <br><br><br>
        </div>
    </main>
    <?php
        mysqli_close($db);
    ?>
    <?php include 'Php/_footer.php'?>

    <script src="JS/validationjQuery.js"></script>
    <script src="JS/orderjQuery.js"></script>

    <script>
        document.getElementById('newcd').onclick = function(){
            displayNone(`box3`);
            displayBlock(`box4`);
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
</body>
</html>