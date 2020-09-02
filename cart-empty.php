<?php require __DIR__ . '/__connect_db.php';
$pageName = 'empty';  // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己另外的CSS插件 <link> 請放這邊 (nav.css及google fonts共用的不用放) -->

<title>WATZ - 購物車</title>
<style>
    /* -----------------empty-cart---------------        */
    body {
        background-size: cover;
        background-image: url(images/BG2.svg);
        background-repeat: repeat-y;
    }

    .container {
        width: 100vw;
        overflow: hidden;
        min-height: 100vh;
        flex-direction: column;
        justify-content: space-between;
    }

    .wrapper {
        width: 1200px;
        overflow: hidden;
        margin-top: 100px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .icon-empty-cart {
        width: 550px;
        height: 450px;
        border-radius: 15px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .icon-empty-cart img {
        width: 280px;
        transform: translateX(30px);
        margin-bottom: 30px;
    }

    .btn-coral {
        width: 200px;
        height: 40px;
        margin-top: 50px;
        cursor: pointer;
    }

    .btn-coral:hover {
        background: #0388A6;
    }
    @media screen and (max-width: 1200px){
        .wrapper{
            width: 100vw;
        }
    }

    @media screen and (max-width: 576px) {
        .container {
            height: 100vh;
            overflow: hidden;
        }

        .icon-empty-cart {
            width: 100vw;
        }

        .icon-empty-cart img {
            width: 150px;
            transform: translateX(15px);
        }

        .goshopping {
            width: 200px;
            height: 40px;
            margin-top: 40px;
        }
    }
</style>

<div class="container flex">
    <div class="div"></div>
    <!-- 如果container有其它class要自己加上 -->
    <?php include __DIR__ . '/__navbar.php' ?>
    <div class="wrapper flex">
        <div class="icon-empty-cart flex">
            <img src="images/cart-empty.svg" alt="">
            <h3 class="empty-cart">購物車空空的。</h3>
            <button class="goshopping btn-coral" 
            onclick="javascript:location.href='<?= WEB_ROOT ?>/product.php'">
                逛街去</button>
        </div>
    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // 這邊放你自己寫的JS
</script>

<?php require __DIR__ . '/__html_foot.php' ?>