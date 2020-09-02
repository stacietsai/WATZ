<!-- footer -->
<footer class="flex">
    <div class="footer-icon flex">
        <a class="icon-wrapper" href=""><img src="images/icon-fb.svg" alt=""></a>
        <a class="icon-wrapper" href=""><img src="images/icon-youtube.svg" alt=""></a>
        <a class="icon-wrapper" href=""><img src="images/icon-twitter.svg" alt=""></a>
        <a class="icon-wrapper" href=""><img src="images/icon-ig.svg" alt=""></a>
    </div>
    <h6>Copyright© WATZ Company All rights Reserved.</h6>
    <img class="bg-footer flex" src="images/footer.svg" alt="">
</footer>

<!-- mobile show list -->
<div class="mobile-show fixedlist">
    <div class="fixedlist-icon flex">
        <a class="icon-wrapper" href="<?= WEB_ROOT ?>/contact.php"><img src="images/icon-faq.svg" alt=""></a>
        <a class="icon-wrapper" href="<?= WEB_ROOT ?>/product.php"><img src="images/icon-sock.svg" alt=""></a>
        <?php if (isset($_SESSION['member'])) : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-profile.php"><img class="" src="images/icon-member.svg" alt=""></a>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/logout.php"><img class="svg icon" src="images/icon-logout.svg" alt=""></a>
        <?php else : ?>
            <a class="icon-wrapper none" href="<?= WEB_ROOT ?>/member-login-signup.php"><img class="s" src="images/icon-member.svg" alt=""></a>
        <?php endif ?>
        <a class="icon-wrapper" href="<?= WEB_ROOT ?>/cart-payment1.php"><img src="images/icon-cart.svg" alt="">
        <span class="cart_count"></span>
    
    </a>
    </div>
</div>