<?php
    $login=0;
    $signup=1;
?>
<?php
    include "Php/_connectDatabase.php";
    if($login==1)
    {

        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $email=$_POST["Email"];
            $password=$_POST["Password"];
        }
        $login=0;
    }

    if($signup==1)
    {
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $email=$_POST["Email"];
            $password=$_POST["Password"];
            // $cpassword=$_POST["CPassword"];

            $sql="INSERT INTO `user` (`pwd`, `email`, `fname`, `mname`, `lname`, `pnum`, `credit`) VALUES ('$password', '$email', NULL, NULL, NULL, NULL, NULL)";

            $res=mysqli_query($db,$sql);

            if(!$res)
            {
                echo "Record not updated";
            }
        }
        $signup=0;
    }

    mysqli_close($db)
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
    <link rel="stylesheet" href="Css/gridstyle.css">
    <link rel="stylesheet" href="Css/nav.css">
    <link rel="stylesheet" href="Css/Fstyle.css">
    <link rel="stylesheet" href="Css/Door.css">
    <link rel="stylesheet" href="Css/Ad.css">
    <link rel="stylesheet" href="Css/login_sign.css">


    <link rel="stylesheet" href="Css/productGallery.css">
    <link rel="stylesheet" href="Css/card.css">
    <link rel="stylesheet" href="Css/ProductDetails.css"><!-- not found -->

    <link rel="stylesheet" href="Css/GoaMapPg.css">

    <link rel="stylesheet" href="Css/ImageLetterMain.css">
    <link rel="stylesheet" href="Css/BubbleMain.css">
    <link rel="stylesheet" href="Css/footer.css">
    <link rel="stylesheet" href="Css/DeliveryAgentAdMain.css">

    <title>Craftoza</title>
    
</head>

<body>
    <div id="login">    
        <?php 
            include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_login.php";
            $login=1;
        ?>
    </div>
    <div id="signup">
        <?php 
            $login=0;
            include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_signup.php";
            $signup=1;
        ?>
    </div>
    <div id="fpwd">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_forgotpassword.php";?>
    </div>
    <div id="gotp">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_getOTP.php";?>
    </div>
    <div id="npwd">
        <?php include "C:/xampp/htdocs/DBProject/Craftoza/Code/Php/_newpassword.php";?>
    </div>

    <?php include 'Php/_nav.php'?>
    <br>
    <main>
        <div id="design">
            <div class="col1">
                <div id="HelpBar">
                    <div id="HelpBar1"></div><br>
                    <div id="HelpBar2"></div><br>
                    <div id="HelpBar3"></div>
                </div>
                <div class="Advertise">
                    <div class="danceBOX">
                        <div id="dance1" class="DanceLight"></div>
                        <div id="dance2" class="DanceLight"></div>
                        <div id="dance3" class="DanceLight"></div>
                        <div id="dance4" class="DanceLight"></div>
                        <div id="dance5" class="DanceLight"></div>
                        <div id="dance6" class="DanceLight"></div>
                        <div id="dance7" class="DanceLight"></div>
                        <div id="dance8" class="DanceLight"></div>
                    </div>
                    <div class="Line" id="LINE1"></div>
                    <div class="Line" id="LINE2"></div>
                    <div class="Line" id="LINE3"></div>
                    <div id="LINE4"></div>
                </div>
            </div>
            
            <div id="PromoAd">
                <h1 id="PromoAd1">#क्राफ्टोझा50%</h1>
                <h1 id="PromoAd2">#CraftozaFAM1</h1>
                <h1 id="PromoAd3">#CraftozaFAM2</h1>
                <h1 id="PromoAd4">#CraftozaFAM3</h1>
                <h1 id="PromoAd5">#CraftozaFAM4</h1>
            </div>
            
            <div class="RightImage">
                <!-- <img src="Micro_Webpage_Elements\FrontPageElemts\Img1.png" height="100%" width="100%"> -->
                <img src="Micro_Webpage_Elements\FrontPageElemts\Img1.png" height="auto" width="100%">
            </div>
    
            <div class="BOARD">
                <div class="CRAFT">
                    <h1>क्राफ्टोझा Craftoza</h1>
                </div>
                <div class="FOCALPOINT">
                    <h1>Focal Point</h1>
                </div>
    
                <div class="OF">
                    <h1>of</h1>
                </div>
    
                <div class="GOAN">
                    <ul>
                        <li class="BLUE">G</li>
                        <li class="RED">O</li>
                        <li class="YELLOW">A</li>
                        <li class="RED">N</li>
                    </ul>
                </div>
    
                <div class="CREATIVITY">
                    <h1>CREATIVITY</h1>
                </div>
    
    
    
                <div class="STAND">
                    <div class="VFL1">VOCAL FOR LOCAL</div>
                    <div class="VFL2">VOCAL FOR LOCAL</div>
                </div>
            </div>
    
            <!-- DOOR -->
            <div class="doorSAFE_AREA">
                <img src="Images\decoration.png" id="DecoSize">
    
                <div id="DoorSemiCircle">
                    <div id="INDoorSemiCircle"></div>
                </div>
    
                <div class="MainDoor">
    
                    <div class="IMAGEBOX">
                        <div> <img src="Images\craftie.png" height="100%" width="100%"></div>
    
                        <div class="Door" id="LeftDoor">
                            <div id="YellowL"></div>
                            <div class="LeftIntieror"></div>
                            <div class="DoorNOB" id="LeftNOB"></div>
                        </div>
    
    
                        <div class="Door" id="RightDoor">
                            <div id="YellowR"></div>
                            <div class="RightIntieror"></div>
                            <div class="DoorNOB" id="RightNOB"></div>
                        </div>
    
                    </div>
    
                    <div class="DoorTEXT">
                        <div id="knock">Knock! Knock!</div>
                        <div id="meet">to meet</div>
                        <div id="DoorTxt">CRAFTIE .....</div>
                    </div>
    
                </div>
    
            </div>
            <!-- DOOR END -->
        </div>

        <div class="MapArea">

            <div id="LeftBox"> 
                <div class="TriColourContainer" id="leftTriColor">
                    <div id="BlueMapBox"></div>
                    <div id="RedMapBox"></div>
                    <div id="YellowMapBox"></div>
                </div>
                <div class="MapSideBOX"></div>
            </div>


            <div id="leftQuote" >"Craftoza believes in supporting local ambitions andf thus contribute in generating self relient employment"</div>
            
            
            <!-- style="position: relative; top: -18%" -->
            <div id="map">
                <div class="GoaMAP">
                    <div class="BubbleContainer">
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>
                        <div class="Bubble"></div>  
                    </div>
                    <img src="Images/goaMap.png" width="170%" height="auto">
                    <div id="MidQuote" class="center"> <span>"Craftoza loves Goa and its People !!"</span></div>

                </div>
                <div class="textAreaMap">
                    <div id="MapText1">Over 70+</div>
                    <div id="MapText2">artistic</div>
                    <div id="MapText3">conections</div>
                    <div id="MapText4">across</div>
                    <span id="MapText5">G</span>
                    <span id="MapText6">O</span>
                    <span id="MapText7">A</span>
                </div>
            </div>
            
            
            <div id="RightQuote" >"We at Craftoza brings to you the finest artistic work directly from the finest artists around Goa"</div>


            <div id="RightBox"> 
                <div class="TriColourContainer" id="rightTriColor">
                    <div id="BlueMapBox"></div>
                    <div id="RedMapBox"></div>
                    <div id="YellowMapBox"></div>
                </div>
                <div class="MapSideBOX"></div>
            </div>

            

        </div>
        <br><br><br><br><br><br>
        <div class="ProductSliderArea">
            <div class="AreaHeader">
                <p style="Width:40%;  text-shadow: 2px 2px 4px #000000;">Trending Products</p>
            </div>
            <div class="ProductSlider">
                <div class="leftArrow" id="leftButton" onclick="slideLeft(0)">
                    <img src="Images/leftArrow.png" height="100%" width="100%">
                </div>
                <div class="PRODUCTGALLERY ">
                    <div class="PRODUCT" >
                        <div class="card">
                            <div class="shade1"> </div>
                            <div class="shade2"></div>
                            
                            <div class="Top3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="bottom3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="ProImage"><img src="Images/products/BAG.png" alt="avatar" height="100%" width="100%"></div>
                
                           <div class="HeaderBOX"><h1>Handcrafted Bamboo Bags</h1></div>
                
                           <div class="Price"><h1>Rs 1499</h1></div>
                        </div>  
                    </div>
            
                    <div class="PRODUCT" >
                        <div class="card">
                            <div class="shade1"> </div>
                            <div class="shade2"></div>
                            
                            <div class="Top3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="bottom3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="ProImage"><img src="Images/products/Ganesh.png" alt="avatar" height="100%" width="100%"></div>
                
                           <div class="HeaderBOX"><h1>Coconut Shell Ganesha Idol</h1></div>
                
                           <div class="Price"><h1>Rs 299</h1></div>
                        </div>
                    </div>
            
            
                    <div class="PRODUCT" >
                        <div class="card">
                            <div class="shade1"> </div>
                            <div class="shade2"></div>
                            
                            <div class="Top3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="bottom3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="ProImage"><img src="Images/products/WaterPot.png" alt="avatar" height="100%" width="100%"></div>
                
                           <div class="HeaderBOX"><h1>Goan Rooster Shaped Waterpot</h1></div>
                
                           <div class="Price"><h1>Rs 699</h1></div>
                        </div>
                    </div>
    
                    <div class="PRODUCT" >
                        <div class="card">
                            <div class="shade1"> </div>
                            <div class="shade2"></div>
                            
                            <div class="Top3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="bottom3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="ProImage"><img src="Images/products/Shellbracl.png" alt="avatar" height="100%" width="100%"></div>
                
                           <div class="HeaderBOX"><h1>Handcrafted Sea Shells Bracelet</h1></div>
                
                           <div class="Price"><h1>Rs 999</h1></div>
                        </div>
                    </div>
                    
                    <div class="PRODUCT" >
                        <div class="card">
                            <div class="shade1"> </div>
                            <div class="shade2"></div>
                            
                            <div class="Top3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="bottom3Colours">
                                <div id="red"></div>
                                <div id="yellow"></div>
                                <div id="blue"></div>
                            </div>
                
                            <div class="ProImage"><img src="Images/products/Shellbracl.png" alt="avatar" height="100%" width="100%"></div>
                
                            <div class="HeaderBOX"><h1>Handcrafted Sea Shells Bracelet</h1></div>
                
                            <div class="Price"><h1>Rs 999</h1></div>
                        </div>
                    </div>
                        
                </div>
                <div class="rightArrow" id="rightButton" onclick="slideRight(0)">
                    <img src="Images/rightArrows.png" height="100%" width="100%">
                </div>
            </div>
            <script>
                function slideRight(i){
                    document.getElementsByClassName('PRODUCTGALLERY')[i].scrollBy(300,0)
                }
                function slideLeft(i){
                    document.getElementsByClassName('PRODUCTGALLERY')[i].scrollBy(-300,0)
                }
            </script>
        </div>

        <br><br><br><br><br><br>

        <div class="ImageLetterSafeArea center">

            <div class="ImageLetter1">
                <div class="TriColourContainer" id="leftTriColorImageLetterTOP">
                    <div id="BlueMapBox"></div>
                    <div id="RedMapBox"></div>
                    <div id="YellowMapBox"></div>
                </div>

                <img src="20221022_142453.jpg" height="100%" width="100%">
            
                <div id="ExtraIdeaText"> Extraordinary</div>
                <div id="IdeaText"> Idea</div>
                <div id="OtherText2">Craftoza has  striked exclusive deals with people who express their identity through creativity</div>
            
            </div>
    
            <div class="ImageLetter2">
                <div class="TriColourContainer"id="rightTriColorImageLetterTOP">
                    <div id="BlueMapBox"></div>
                    <div id="RedMapBox"></div>
                    <div id="YellowMapBox"></div>
                </div>

                <img src="Images/20221022_153957.jpg" height="100%" width="100%">
            
                <div id="ConservedText"> Traditions </div>
                <div id="TraditonText">Conserved  </div>
         
                <div id="OtherText1">Craftoza has exclusive deals with indeginous potters across the coastal state</div>
            </div> 
    
        </div>

        <br><br><br><br><br><br>

        <div id="MainPageBottomAd">
            <div class="AdContainer"><img src="Images/Ad2.png" height="100%" width="100%"></div>
        </div>

        <br><br><br><br><br><br>

        <div class="DeliverAgentSafeArea center">
            <h1 class="DeliveryAdFont" id="DeliveryAdFont1">BE A</h1>
            <h1 class="DeliveryAdFont" id="DeliveryAdFont2"></h1>
            <h1 class="DeliveryAdFont" id="DeliveryAdFont3">AGENT</h1>
        
            <div id="YellowLine"></div>
        
            <div id="ICONBACK"><img src="Images/BackgroundLogin.png" height="100%" width="100%"></div>
            <div id="ICONFRONT"><img src="Images/deliveryBoyIcon.png" height="100%" width="100%"></div>
            <h4  class="DeliveryAdFont" id="PlaceEmailID">enquiry@craftoza.in</h4>
        </div>

    </main>

    <?php include 'Php/_footer.php'?>
    

    <script src="JS/ADScript.js"></script>
    <script src="JS/Login.js"></script>
    <script src="JS/ProdGallery.js"></script>
    <script src="JS/Ads1.js"></script>
</body>
</html>