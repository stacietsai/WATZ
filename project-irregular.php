<?php require __DIR__ . '/__connect_db.php';
$pageName = 'project'; // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己另外的CSS插件 <link> 請放這邊 (nav.css及google fonts共用的不用放) -->
<title>WATZ - 群魔亂舞</title>
<style>


    .container {
        width: 100vw;
        min-height: 100vh;
        user-select: none;
        overflow: hidden;
    }

    .block1 {
        position: relative;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .bg-1 {
        width: 100vw;
        height: 100vh;

    }

    .bg-1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .bg-1 .mobile {
        display: none;
    }

    .logo {
        width: 450px;
        position: absolute;
    }

    .logo img {
        width: 100%;
        height: 100%;
        filter: drop-shadow(8px 8px 6px rgba(105, 105, 105, 0.7));
        cursor: pointer;
    }
    .logo img:hover{
        filter: drop-shadow(15px 15px 6px rgba(51, 51, 51, 0.7));
    }

    .scroll-down {
        position: absolute;
        align-items: center;
        flex-direction: column;
        right: 50px;
        bottom: 30px;
        animation: mouse-scroll 1s infinite alternate;
        cursor: pointer;
    }

    @-webkit-keyframes mouse-scroll {
        to {
            transform: translate(0, -30px);
        }

    }

    .scroll-down h3 {
        writing-mode: vertical-lr;
        margin-bottom: 20px;
        cursor: pointer;
    }

    .scroll-down img {
        width: 30px;
    }

    @media screen and (max-width: 992px) {
        .block1{
            width: 100vw;
            height: 50vh;
        }
        .logo {
            width: 250px;
        }

        .bg-1 {
            width: 100vw;
            height: 50vh;
        }

    }

    @media screen and (max-width: 576px) {
        .logo {
            width: 200px;
        }

        .bg-1 .mobile {
            display: block;
        }

        .bg-1 .web {
            display: none;
        }

        .scroll-down {
            right: 30px;
            bottom: 10px;
        }

        .scroll-down h3 {
            margin-bottom: 15px;
        }

        .scroll-down img {
            width: 20px;
        }
    }

    /* --------------------block2------------------------ */
    .block2 {
        width: 100vw;
        height: fit-content;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .bg-line {
        align-items: center;
    }

    .bg-line li {
        width: calc(100vw / 4);
        height: calc(100vw / 4);
    }

    .bg-line li img {
        height: 100%;
        object-fit: cover;
    }

    .sock-png {
        align-items: center;
        justify-content: center;
    }
    .sock-png img{
        cursor: pointer;
    }
    .sock-png img:hover{
        transform: scale(1.1);
    }


    .square1-2 {
        background-color: #C3E0EC;
    }

    .square1-3 {
        background-color: #EEE9A9;
    }

    .square2-2 {
        background-color: #56C2F0;
    }

    .square2-3 {
        background-color: #FFF128;
    }

    .square3-2 {
        background-color: #EF875C;
    }

    .square3-3 {
        background-color: #E6356C;
    }

    .square4-2 {
        background-color: #EED4C9;
    }

    .square4-3 {
        background-color: #F3B2C7;
    }

    .center-frame {
        position: absolute;
        flex-direction: column;
        justify-content: space-between;

    }

    .watzbox {
        width: 450px;
        margin-bottom: 40px;
        cursor: pointer;
    }

    .watzbox img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .seemore {
        width: 200px;
        height: 45px;
        background-color: #0388A6;
        position: absolute;
        right: -20px;
        bottom: -10px;
        outline: none;
        box-shadow: none;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .seemore h3 {
        color: #ffffff;
        cursor: pointer;
    }

    .seemore:hover {
        background-color: #FF9685;
    }

    @media screen and (max-width: 1200px) {
        .watzbox {
            width: 300px;
        }

        .seemore {
            width: 160px;
            height: 40px;
        }

        .seemore h3 {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 992px) {
        .watzbox {
            width: 250px;
        }

    }

    @media screen and (max-width: 576px) {
        .watzbox {
            width: 150px;
        }

        .seemore {
            width: 100px;
            height: 30px;
        }

        .seemore h3 {
            font-size: 12px;
        }
    }

    /* --------------------block3------------------------ */

    .block3 {
        /* width: 100vw;
            height: 100vh; */
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .bg-3 {
        width: 100vw;
        height: 100vh;
        justify-content: flex-start;
    }

    .bg-3 .bg3-left {
        width: 100%;
        height: 100%;
        background-color: #B4D0E7;
    }
    .bg-3 .bg3-right {
        width: 100%;
        height: 100%;
        background-color: #1663A2;
    }

    .block3 .pic {
        width: 550px;
        position: absolute;
        z-index: 1;
        cursor: pointer;
    }

    .path-up {
        position: absolute;
        left: 30px;
        top: 0;
        width: 700px;
    }

    .path-down {
        position: absolute;
        right: 0px;
        bottom: 0;
        width: 700px;
    }

    .block3 .seemore {
        position: absolute;
        right: 15%;
        bottom: 30%;
        background-color: #B95376;
    }

    .block3 .seemore:hover {
        background-color: #0388A6;
    }

    @media screen and (max-width: 1200px) {
        .block3 .pic {
            width: 450px;
        }

        .path-up {
            width: 450px;
            right: 0;
        }

        .block3 .seemore {
            right: 10%;
            bottom: 20%;
        }

    }

    @media screen and (max-width: 992px) {
        .bg-3 {
            flex-direction: column;
        }

        .block3 .pic {
            width: 350px;
        }

        .block3 .seemore {
            width: 140px;
            height: 40px;
            right: 10%;
            bottom: 15%;
        }

        .block3 .seemore h3 {
            font-size: 16px;
        }

        .path-up {
            width: 500px;
        }

        .path-down {
            width: 500px;
        }

    }

    @media screen and (max-width: 576px) {
        .block3 .pic {
            width: 350px;
        }

        .block3 .seemore {
            width: 140px;
            height: 40px;
            right: 15%;
            bottom: 20%;
        }

        .block3 .seemore h3 {
            font-size: 12px;
        }

        .path-up {
            width: 400px;
        }

        .path-down {
            width: 550px;
        }
    }

    /* --------------------block4------------------------ */

    .block4 {
        height: 100vh;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .bg4 {
        width: 55vw;
        height: 100vh;
        position: absolute;
        right: 0;
    }

    .bg4 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info {
        height: 100vh;
        width: 50vw;
        z-index: 1;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* border: 1px solid greenyellow; */
    }

    .info img {
        width: 450px;
    }

    .info .title {
        align-items: center;
        justify-content: center;
        margin: 40px 0;
    }

    .info .title h1 {
        position: absolute;
        color: #E7EC99;
    }

    .info .title img {
        width: 650px;
        height: 100px;
    }

    .info .style1 {
        margin-right: 50%;
        cursor: pointer;
    }
    .info .style1:hover{
        transform: scale(1.1);
    }
    .info .style2{
        cursor: pointer;
        
    }
    .info .style2:hover{
        transform: scale(1.1);
    }
    .block5 {
        width: 100vw;
        height: 100vh;
    }

    .block5 img {
        width: 100%;
        height: 100%;
        object-fit: cover;

    }

    footer {
        position: absolute;
        bottom: 0;
    }

    @media screen and (max-width: 1200px) {
        .bg4 {
            height: 600px;
        }

        .info img {
            width: 400px;
        }

        .block5 {
            width: 100vw;
            height: 70vh;
        }
    }

    @media screen and (max-width: 992px) {
        .info img {
            width: 350px;
        }

        .info .style1 {
            transform: translate(-35%, -20%);
        }

        .info .title img {
            width: 500px;
            height: 100px;
        }
    }

    @media screen and (max-width: 576px) {
        .bg4 {
            height: 400px;
        }

        .info img {
            width: 300px;
        }

        .info .title {
            margin-bottom: 50px;
        }

        .info .title h1 {
            font-size: 22px;
        }

        .info .title img {
            width: 350px;
            height: 50px;
        }

        .info .style1 {
            transform: translate(-40%, -30%);
        }

        .block5 {
            width: 600px;
            height: 300px;
        }

        footer {
            position: relative;
            margin-top: 30px;
        }
    }
</style>

<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="block1 flex">
        <div class="bg-1">
            <img class="web" src="images/irregular/kv-web.jpg" alt="">
            <img class="mobile" src="images/irregular/kv-mobile.jpg" alt="">
        </div>
        <div class="logo transition">
            <img src="images/irregular/WATZ_irregular_LOGO.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product.php?#{series:[2],orderBy:new}'">
        </div>
        <div class="scroll-down flex transition">
            <h3>SCROLL</h3>
            <img src="images/irregular/scroll-down.svg" alt="#block2">
        </div>
    </div>
    <div class="block2 flex" id="block2">
        <ul class="bg-line flex">
            <li>
                <img src="images/irregular/square1-1.jpg">
            </li>
            <li class="square1-2 sock-png flex">
                <img class="transition" src="images/irregular/square1-2.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=13'">
            </li>
            <li class="square1-3 sock-png flex">
                <img class="transition" src="images/irregular/square1-3.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=10'">
            </li>
            <li class="">
                <img src="images/irregular/square1-4.jpg" alt="">
            </li>
        </ul>
        <ul class="bg-line line2 flex">
            <li class="">
                <img src="images/irregular/square2-1.jpg" alt="">
            </li>
            <li class="square2-2 fadeout transition">
            </li>
            <li class="square2-3 fadeout transition">
            </li>
            <li class="">
                <img src="images/irregular/square2-4.jpg" alt="">
            </li>
        </ul>
        <ul class="bg-line flex">
            <li class="">
                <img src="images/irregular/square3-1.jpg" alt="">
            </li>
            <li class="square3-2 fadeout transition">
            </li>
            <li class="square3-3 fadeout transition">
            </li>
            <li>
                <img src="images/irregular/square3-4.jpg" alt="">
            </li>
        </ul>
        <ul class="bg-line flex">
            <li>
                <img src="images/irregular/square4-1.jpg" alt="">
            </li>
            <li class="square4-2 sock-png flex">
                <img class="transition" src="images/irregular/square4-2.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=3'">
            </li>
            <li class="square4-3 sock-png flex">
                <img class="transition" src="images/irregular/square4-3.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=20'">
            </li>
            <li>
                <img src="images/irregular/square4-4.jpg" alt="">
            </li>
        </ul>
        <div class="center-frame flex">
            <div class="watzbox transition">
                <img id="watzbox" src="images/watzbox2-1.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product.php?#{series:[2],orderBy:new}'">
            </div>
            <button class="seemore btn-coral flex transition" id="box-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product.php?#{series:[2],orderBy:new}'">
                <h3>See More</h3>
            </button>
        </div>
    </div>
    <div class="block3 flex">
        <div class="bg-3 flex">
            <div class="bg3-left"></div>
            <div class="bg3-right"></div>
        </div>
        <img class="path-up" src="images/irregular/Path-down.svg" alt="">
        <img class="pic" src="images/irregular/WATZ_irregular.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=16'">
        <img class="path-down" src="images/irregular/Path-up.svg" alt="">
        <button class="seemore btn-coral flex" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=16'">
            <h3>See More</h3>
        </button>
    </div>
    <div class="block4 flex">
        <div class="bg4 flex">
            <img src="images/irregular/popcorn.jpg" alt="">
        </div>
        <div class="info flex transition">
            <img class="style1 transition" src="images/irregular/style1.jpg" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=11'">
            <div class="title flex">
                <h1>styling yourself</h1>
                <img src="images/irregular/brush.svg" alt="">
            </div>
            <img class="style2 transition" src="images/irregular/style2.jpg" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=10'">
        </div>
    </div>
    <div class="block5">
        <img src="images/irregular/bg5.jpeg" alt="">

    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    $("#watzbox").hover(function() {
        $(this).attr("src", "images/watzbox2-2.png");
        $('.fadeout').css("opacity", "0.8");
    }, function() {
        $(this).attr("src", "images/watzbox2-1.png");
        $('.fadeout').css("opacity", "1");      

    })


    // anchor point
    $(".scroll-down").click(function() {
        let nextPosition = $(".line2").offset().top;
        // console.log(nextPosition)
        $("html").animate({
            scrollTop: nextPosition
        })
        openTutorial();
    })

    $('.fadeout, #box-seemore').hover(function(){
        $('.fadeout').css("opacity", "0.8");
    }, function(){
        $('.fadeout').css("opacity", "1");      
    })
   
    
</script>

<?php require __DIR__ . '/__html_foot.php' ?>