<!-- nav -->
<nav class="nav flex transition">
    <div class="nav-logo flex">
        <a class="img-logo-img" href="<?= WEB_ROOT ?>/aaaindex.php"><img src="images/logo-img.svg" alt=""></a>
        <a class="img-logo-text" href="<?= WEB_ROOT ?>/aaaindex.php"><img src="images/logo-text.svg" alt=""></a>
    </div>
    <ul class="nav-list flex">
        <li class="dropdown">
            <a class="<?= $pageName=='project'? 'active':'' ?>" >PROJECT</a>
            <div class="dropdown-menu flex transition">
                <div class="dropdown-bg flex transition">
                    <a class="" href="<?= WEB_ROOT ?>/project-summer.php">芒果派對</a>
                    <a class="" href="<?= WEB_ROOT ?>/project-irregular.php">群魔亂舞</a>
                    <a class="" href="<?= WEB_ROOT ?>/project-crystal.php">灰姑娘的<br>水晶襪</a>
                </div>
            </div>
        </li>
        <li>
            <a class="navShop <?= $pageName=='product'? 'active':'' ?>" href="<?= WEB_ROOT ?>/product.php">SHOP</a>
        </li>
        <li>
            <a class="navDIY <?= $pageName=='DIY'? 'active':'' ?>" href="<?= WEB_ROOT ?>/diy.php">DIY</a>
        </li>
        <li>
            <a class="navAboutWATZ <?= $pageName=='aboutWATZ'? 'active':'' ?>" href="<?= WEB_ROOT ?>/aboutWATZ.php">WATZ</a>
        </li>
        <li>
            <a class="navContact <?= $pageName=='contact'? 'active':'' ?>" href="<?= WEB_ROOT ?>/contact.php">CONTACT</a>
        </li>
    </ul>
    <div class="nav-icon flex transition">
        <?php if (isset($_SESSION['member'])) : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-profile.php"><img class="svg icon" src="images/icon-member.svg" alt=""></a>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/logout.php"><img class="svg icon" src="images/icon-logout.svg" alt=""></a>
        <?php else : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-login-signup.php"><img class="svg icon" src="images/icon-member.svg" alt=""></a>
        <?php endif ?>

        <a class="icon-wrapper none a-cart">
            <img class="svg icon" src="images/icon-cart.svg" alt="">
            <span class="cart_count"></span>
        </a>
        <div class="nav-bg"></div>
        <div class="box-cart-short transition">
            <div class="cart-short-list nav-list-scroll">
            </div>
            <a class="go-cart" href="<?= WEB_ROOT ?>/cart-payment1.php">前往購物車</a>
        </div>
        <div class="menu flex">
            <div class="click-area flex transition" id="menuClickArea">
                <div class="box-bar transition">
                    <div class="bar bar1 transition"></div>
                    <div class="bar bar2 transition"></div>
                    <div class="bar bar3 transition"></div>
                </div>
            </div>
            <div class="menu-bg transition">
                <div class="menu-content transition flex">
                    <a class="img-logo-img" href="<?= WEB_ROOT ?>/aaaindex.php"><img src="images/logo-img.svg" alt=""></a>
                    <ul class="menu-list">
                        <li class="dropdown">
                            <a>PROJECT</a>
                            <div class="dropdown-menu flex transition">
                                <div class="dropdown-bg flex transition">
                                    <a class="" href="<?= WEB_ROOT ?>/project-summer.php">芒果派對</a>
                                    <a class="" href="<?= WEB_ROOT ?>/project-irregular.php">群魔亂舞</a>
                                    <a class="" href="<?= WEB_ROOT ?>/project-crystal.php">灰姑娘的水晶襪</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="<?= WEB_ROOT ?>/product.php">SHOP</a></li>
                        <li><a href="<?= WEB_ROOT ?>/diy.php">DIY</a></li>
                        <li><a href="<?= WEB_ROOT ?>/aboutWATZ.php">WATZ</a></li>
                        <li><a href="<?= WEB_ROOT ?>/contact.php">CONTACT</a></li>
                    </ul>
                    <div class="flex">
                        <a class="icon-wrapper" href=""><img src="images/icon-fb.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-youtube.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-twitter.svg" alt=""></a>
                        <a class="icon-wrapper" href=""><img src="images/icon-ig.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>