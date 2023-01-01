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
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/order.css">
    <link rel="stylesheet" href="Css/footer.css">


    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>
    <div id="CardFormBox">
        <div class='Formbox'>
        <span class='arrow1' onclick='displayNone(`CardFormBox`)'>&#8592;</span>
        <p id='ctext'>Enter the Details</p>
        <hr>
        <form action='' method='post' class='center2' style='width: 80%;' id="CreditForm">
            <div class="FormRow" style="display: block;">
                <div class="FormCol">
                <label for='Card No'>Card Number</label>
                <input type='number' name='cardno' id='cardno' oninput='this.value=this.value.replace(/[^0-9]/g,``)'  required>
                </div>
            </div>

            <div class="FormRow">
                <div class="FormCol">
                <label for='CVV'>CVV</label>
                <input type='password' name='cvv' id='cvv' oninput='this.value=this.value.replace(/[^0-9]/g,``)' required>
                </div>
                <div class="FormCol">
                <label for='Card No'>Exp Date <span style='font-weight: 100;'>(month-year)</span></label>
                <input type='date' name='exptdate' id='exptdate' required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <div class="FormCol">
                <label for='Card Label'>Card Label</label><br>
                <input type='text' name='clabel' id='clabel' required>
                </div>
            </div>

            <div class="FormRow" style="justify-content: center;">
                <input type='submit' name='newcard' value='Submit' style='width: 21%;padding: 10px;border: none;border-radius: 20px;'>
            </div>
            <br>
        </form>
        </div> 
    </div>
    <?php include 'Php/_nav.php'?>
    

    <main>
        <div id="backgd">
            <br><br><br>

            <div id="mainbox3">
                <p id="toptext">Payment</p>
                <hr>
                <p id="atext">Choose The Payment Method</p><br>
                

                <div class="option">
                    <div>
                        <button id="wallet" class="AccOpBtn">
                            <img src="Images/payment/Wallet.png">
                            <br>
                        </button>
                        <p>UPI/Wallet</p>
                    </div>
                    <div>
                        <button id="creditcard" class="AccOpBtn" onclick="displayNone(`mainbox3`);displayBlock(`mainbox4`);">
                            <img src="Images/account/creditcard.png">
                        </button>
                        <p>Credit/Debit Card</p>
                    </div>
                </div>
                <div class="option">
                    <div>
                        <button id="netbank" class="AccOpBtn">
                            <img src="Images/payment/netBanking.png">
                            <br>
                        </button>
                        <p>Net Banking</p>
                    </div>
                    <div>
                        <button id="cod" class="AccOpBtn">
                            <img src="Images/payment/Cod.png">
                        </button>
                        <p>Cash on Delivery</p>
                    </div>
                </div>

                <br><br>
                

            </div>


            <div id="mainbox4">
                <?php
                $userid=$_SESSION['UserID'];
                $sql="SELECT * FROM `creditcard` WHERE `uid`='$userid'";
                $res=mysqli_query($db,$sql);
                if(mysqli_num_rows($res)==0)
                {
                    ?>
                        <script>displayBlock(`CardFormBox`);</script>
                    <?php
                }
                else
                {   
                    $i=1;
                    while($row=mysqli_fetch_assoc($res))
                    {
                        ?>
                            <div class='center cardarea'>
                                <h5>Credit Card #<?php echo $i?></h5>
                                <p><?php echo $row['label']?></p>
                                <form style="margin:0;" id=<?php echo "CardChoice".$i?>>
                                    <input type="hidden" name="cdno" value="<?php echo $row['cardno']?>">
                                    <button type="submit" id="CreditButton">Choose</button>
                                </form>
                            </div>
                        <?php
                        $i++;
                    }
                    ?>
                    <hr>
                    <div style='margin: 20px 28px 30px 80%;'><button class="NewCardButton" id="CreditButton" style="width: 100%;padding: 9px">New Card</button></div>
                    <br><br>
                    <?php
                }
                ?>
            </div>

            <div id="mainbox5">
                <!-- Final Confirmation button -->
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
                <table class="table">
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

                <form action="orderlist.php" method="POST" id="ConfirmForm">
                    <p id="ConfirmMsg"></p>
                    <button id="ConfirmButton" name="ConfirmButton" type="submit">Pay</button>
                </form>
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

</body>
</html>