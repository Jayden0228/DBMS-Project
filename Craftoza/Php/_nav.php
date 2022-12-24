<header>
    <div id="logo"><img src="Images\Logo.png" alt="logo" id="logo" height="auto" width="100%"></div>

    <form action="search.php" method="POST">
        <input id="searchvalue" name="search" type="search" placeholder=" Search Products">
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
            
            <li><a href="AboutUsindex.html"><img src="Micro_Webpage_Elements\icons\help.png" class="Icons"></a></li>
        </ul>

    </div>
    <nav>
        <ul class="NavLinks">
            <li>Explore
                <div class="dropdown">
                <form action="search.php" method="post">
                    <input type="submit" name="Bamboo" value="Bamboo" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="Coconut" value="Coconut" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="Clay" value="Clay" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="Shells" value="Shells" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="Bag" value="Bag" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="HomeDeco" value="Home Deco" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="EarthenPots" value="Earthen Pots" id="dpbutton">
                </form>
                <form action="search.php" method="post">
                    <input type="submit" name="Jewellery" value="Jewellery" id="dpbutton">
                </form>
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