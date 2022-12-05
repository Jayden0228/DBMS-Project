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
    <link rel="stylesheet" href="Css/address.css">
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
            <p id="Headtext">MY ADDRESS</p>
            <div id="craftie">
                <img src="Images/craftie-rbg.png" alt="" onload="setTimeout(move, 1880)">            
            </div>
            <hr>
        </div>
        <div id="backgd">
            <br><br><br>
            <div id="addbox">
                
                <div id="box1">
                    <p id="atext">Saved Address</p>

                    <div id="addr">
                        <div class="center addarea">
                            <span class="fulladd">
                                <span>Name:</span><br>
                                <span>Address:</span><br>
                                <span>Mobile No:</span><br>
                            </span>
                            <span class="link">Remove</span>
                        </div>
                    </div>
                    <hr>
                    <div style="margin-top: 20px; margin-bottom: 30px;"><span class="link">New Address</span></div>
                </div>

                <div id="box2">
                    <p id="atext">Enter the Details</p>
                    <hr>
                    <form action="" method="post" class="center2" style="width: 40%;">
                        
                        <label for="Hno/fno">H.No/Flat NO</label>
                        <br>
                        <input type="number" name="hfno" id="hfno">
                        <br><br>
                        <label for="Wname">Ward Name</label>
                        <br>
                        <input type="number" name="wname" id="wname">
                        <br><br>
                        <label for="vill/city">Village/City</label>
                        <br>
                        <input type="number" name="vill/city" id="vill/city">
                        <br><br>
                        <label for="Taluka">Taluka</label>
                        <br>
                        <input type="number" name="taluka" id="taluka">
                        <br><br>
                        <label for="state">State</label>
                        <br>
                        <input type="number" name="State" id="State">
                        <br><br>



                        <label for="pcode">Pincode</label>
                        <br>
                        <input type="number" name="pcode" id="pcode" oninput="this.value=this.value.replace(/[^0-9]/g,'')" maxlength="6">
                        <br><br>
                        <input type="submit" value="Submit" style="width: 30%; padding: 4px 0;">
                    </form>
                </div>

            </div>
            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>

    <script src="JS/Login.js"></script>

</body>
</html>