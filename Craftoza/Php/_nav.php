<header>
    <div id="logo"><img src="Images\Logo.png" alt="logo" id="logo" height="auto" width="100%"></div>

    <form action="">
        <input id="searchvalue" type="search" placeholder=" Search Products">
    </form>

    <div class="icons">
        <ul>
            <?php
                if(isset($_SESSION['UserID']))
                {
                    echo "<li><a href='account.php'><img src='Micro_Webpage_Elements\icons\admin.png' class='Icons'><a></li>";
                    echo "<li><a href='cart.php'><img src='Micro_Webpage_Elements\icons\cart.png' class='Icons'></a></li>";

                }
                else{
                    echo "<li><img src='Micro_Webpage_Elements\icons\admin.png' class='Icons' onclick='displayBlock(`login`)'></li>";
                    echo "<li><img src='Micro_Webpage_Elements\icons\cart.png' class='Icons' onclick='displayBlock(`login`)'></li>";

                }
            ?>
            
            <li><img src="Micro_Webpage_Elements\icons\help.png" class="Icons"></li>
        </ul>

    </div>
    <nav>
        <ul class="NavLinks">
            <li>Explore
                <div class="dropdown">
                    <a href="search.php" onclick="<?php $_SESSION['material']='A'?>">Bamboo</a>
                    <a href="search.php" onclick="<?php $_SESSION['material']='B'?>">Coconut</a>
                    <a href="search.php" onclick="<?php $_SESSION['material']='C'?>">Clay</a>
                    <a href="search.php" onclick="<?php $_SESSION['material']='D'?>">Shells</a>
                    <a href="search.php" onclick="<?php $_SESSION['type']=1?>">Bag</a>
                    <a href="search.php" onclick="<?php $_SESSION['type']=2?>">Home Deco</a>
                    <a href="search.php" onclick="<?php $_SESSION['type']=3?>">Earthen Pots</a>
                    <a href="search.php" onclick="<?php $_SESSION['type']=4?>">Jewellery</a>
                </div>
            </li>
            <li>Community
                <div class="dropdown">
                    <a href="">Craftie</a>
                    <a href="">Craftoza Warriors</a>
                </div>
            </li>
            <li>About us
                <div class="dropdown">
                    <a href="">Contact</a>
                    <a href="">Social Media</a>
                </div>
            </li>
            <li>Be An Agent</li>
        </ul>
    </nav>
</header>