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
                }
                else{
                    echo "<li><img src='Micro_Webpage_Elements\icons\admin.png' class='Icons' onclick='displayBlock(`login`)'></li>";
                }
            ?>
            <li><a href="wish_list.php"><img src="Micro_Webpage_Elements\icons\cart.png" class="Icons"></a></li>
            <li><img src="Micro_Webpage_Elements\icons\help.png" class="Icons"></li>
        </ul>

    </div>
    <nav>
        <ul class="NavLinks">
            <li>Explore
                <div class="dropdown">
                    <a href="">Pottery</a>
                    <a href="">Shells</a>
                    <a href="">Jewellery</a>
                    <a href="">Bag</a>
                    <a href="">Coconut Item</a>
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