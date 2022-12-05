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
    <link rel="stylesheet" href="Css/search.css">
    <link rel="stylesheet" href="Css/login_sign.css">
    <link rel="stylesheet" href="Css/footer.css">


    <script>
        function swap(i,j){
            let a=document.getElementById(i).children[0];
            let b=document.getElementById(j).children[0];
            let c=a.src;
            a.src=b.src
            b.src=c;
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
        function show(id,arw){
            if(document.getElementById(id).style.display=='block')
            {
                document.getElementById(id).style.display='none';
            }
            else{
                document.getElementById('lv3cn1h').style.display='none';
                document.getElementById('lv3cn2h').style.display='none';
                document.getElementById('lv3cn3h').style.display='none';
                document.getElementById(id).style.display='block';
            }
        }
    </script>

    <title>Craftoza</title>
</head>

<body>
    <?php include "C:/xampp/htdocs/DBProject/Craftoza/Php/_register.php";?>
    <?php include 'Php/_nav.php'?>
    <main>
        <div id="backgd">
            <br><br><br>
            <div class="item">


                <div class="simg">
                    <div id="simg1">
                        <img src="Images/item1.jpg" alt="" width="110%" height="100%" onclick="swap('simg1','image')">
                    </div>
                    <br>
                    <div id="simg2">
                        <img src="Images/item2.jpeg" alt="" width="110%" height="100%" onclick="swap('simg2','image')">
                    </div>
                    <br>
                    <div id="simg3">
                        <img src="Images/item3.jpeg" alt="" width="110%" height="100%" onclick="swap('simg3','image')">
                    </div>
                </div>
                <div id="image">
                    <img src="Images/card3.png" alt="" width="110%" height="100%">
                </div>
                <hr id="divider">
            </div>


            <div id="lv1">
                <div id="text">
                    <div class="text1">Proud Bardezkar Bamboo</div>
                    <div class="text1">Basket</div>
                </div>
                <button id="buybtn">BUY NOW</button>
            </div>

            <hr>

            <div id="lv2">
                <div id="lv2cn1">
                    <div class="text1" style="color: #fd5353fe;">-49% <span style="color: black;">Rs 299</span></div>
                    <div class="text1">MRP <s>599</s></div>
                    <div class="text2" style="font-weight: normal;">Inclusive of all taxes</div>
                </div>
                <div id="lv2cn2">
                    <div class="text3">Qnt 
                        <button id="min" onclick="decrement()">-</button><input type="number" id="pqnt" min="1" value="1"><button id="max" onclick="increment()">+</button>
                </div>
                </div>
                <div id="lv2cn3">
                    <button class="btn1">Add To Cart</button>
                    <button class="btn2">Add To Wish List</button>
                </div>
            </div>
            
            <hr>
            

            <div id="lv3" style="display: block;">
                <div id="lv3cn1" onclick="show('lv3cn1h','arw1')">
                    <span>Product Description</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn1h">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est sint, maiores sapiente quo doloribus quia quam magnam minima quas accusantium repellat voluptatem ipsa? Voluptate veritatis molestiae, quod non blanditiis fugit, at necessitatibus numquam esse optio ipsa sint! Deleniti quis quidem nisi incidunt similique corrupti asperiores?
                </div>


                <div id="lv3cn2" onclick="show('lv3cn2h','arw2')">
                    <span>Product Specification</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn2h">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est sint, maiores sapiente quo doloribus quia quam magnam minima quas accusantium repellat voluptatem ipsa? Voluptate veritatis molestiae, quod non blanditiis fugit, at necessitatibus numquam esse optio ipsa sint! Deleniti quis quidem nisi incidunt similique corrupti asperiores?
                </div>

                
                <div id="lv3cn3" onclick="show('lv3cn3h','arw3')">
                    <span>Customer Reviews</span>
                    <div class="plus"><span>&#65291;</span></div>
                </div>
                <div id="lv3cn3h">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Est sint, maiores sapiente quo doloribus quia quam magnam minima quas accusantium repellat voluptatem ipsa? Voluptate veritatis molestiae, quod non blanditiis fugit, at necessitatibus numquam esse optio ipsa sint! Deleniti quis quidem nisi incidunt similique corrupti asperiores?
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor autem iste magni nisi, numquam in, non doloribus accusamus impedit omnis cumque. Aperiam ea recusandae incidunt, aspernatur, numquam reiciendis facilis quidem placeat velit ipsam, natus temporibus illum nihil quod dicta doloribus. Natus eos eligendi maxime, maiores mollitia eaque labore nisi qui! Est reiciendis sit atque inventore mollitia consectetur minima harum ducimus ullam ipsum blanditiis autem voluptas velit eos dolore quae assumenda quos quaerat, modi omnis recusandae eaque officiis! Quibusdam delectus, eum adipisci, corrupti recusandae atque excepturi ex odit deleniti vitae dolore. Perspiciatis fugiat delectus sit ipsam incidunt reprehenderit laborum numquam repudiandae molestiae officia quisquam, esse aperiam ea quod laboriosam maiores facilis sapiente natus itaque rem similique nemo assumenda iste. Facere, quas dolorem. Nesciunt ad eius aliquid eligendi corrupti culpa itaque alias? Architecto, veniam natus, porro a commodi aspernatur eveniet mollitia libero magnam expedita in reprehenderit nobis maxime animi quis aut enim voluptas eligendi minima laudantium? Illo aperiam id veritatis, soluta eos esse a dignissimos est deleniti nihil, sint, dolorum voluptatibus consectetur nesciunt nemo? Ea quo porro, iusto odio neque excepturi aperiam soluta nam? Sapiente alias rem quo deserunt id cum dolor autem modi aliquam, quia adipisci eligendi magnam recusandae dignissimos? Necessitatibus quis obcaecati minus, adipisci autem ab. Itaque hic id tempore mollitia fugit quidem ipsam! Fugit nihil iure culpa ex eveniet saepe aperiam. Aperiam esse cum, neque aliquid eligendi, molestiae sunt in doloremque incidunt unde perferendis ad totam mollitia voluptates quo repudiandae! Accusamus ex dolorum deleniti itaque eius, quos nisi eos blanditiis delectus, neque soluta id dolores maiores dolore aliquam rem molestias maxime praesentium consequatur tempora iste! Commodi molestias, vel voluptates reiciendis culpa illum molestiae animi dolores aliquam, dolorem fugiat cumque numquam tenetur, laborum eaque quisquam! Ab asperiores accusantium veritatis deserunt beatae iure sit laboriosam ratione fugit ipsum, atque aut natus nisi odit veniam iste, labore numquam in eligendi rem ex eius adipisci, earum dolor.
                </div>
            </div>

            <br><br><br>
        </div>
    </main>
    <?php include 'Php/_footer.php'?>
    <script src="JS/Login.js"></script>
</body>
</html>