<?php require __DIR__ . '/__connect_db.php';
$pageName = 'product';  // 這裡放你的pagename

$sid = isset($_GET['sid']) ? intval($_GET['sid']) : 0;
$t_sql = "SELECT * FROM `product` WHERE `sid`= $sid";
$row = $pdo->query($t_sql)->fetch();

$series_sid = $row['series'];
$s_sql = "SELECT `series_name` FROM `product_series` WHERE `series_sid`=$series_sid ";
$series_name = $pdo->query($s_sql)->fetch()['series_name'];

$c_sql = "SELECT `sid`,`img_ID` FROM `product` WHERE `series`=$series_sid AND `sid`!=$sid ORDER BY RAND() LIMIT 3";
$suggest = [];
$suggest = $pdo->query($c_sql)->fetchAll();

$pattern = $row['pattern'];
$patternArray = [];
if ($pattern > 0) {
    $p_sql = "SELECT `sid`,`img_ID` FROM `product` WHERE `pattern`=$pattern AND `sid`!=$sid ORDER BY RAND() LIMIT 3";
    $patternArray = $pdo->query($p_sql)->fetchAll();
};

$file = __DIR__ . '/images/product/' . $row['img_ID'];

?>

<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<title>WATZ - 商品頁面</title>
<style>
    .container {
        width: 100vw;
        min-height: 100vh;
        position: relative;
        background-size: cover;
        background-image: url(images/BG3.svg);
        background-repeat: repeat-y;
        user-select: none;
    }

    .wrapper {
        width: 1200px;
        justify-content: space-between;
        padding: 120px 0;
    }

    .btn-top {
        z-index: 1;
    }

    .block-left-top,
    .block-left-bottom,
    .block-fixed {
        background: white;
        border-radius: 15px;

    }

    .block-left-top,
    .block-left-bottom {
        width: 800px;
        padding: 20px;
    }

    .mobile-visible {
        display: none;
    }

    .block-right {
        width: 350px;
        letter-spacing: 2px;
        position: relative;
    }

    .block-fixed {
        width: 350px;
        height: 80vh;
        padding: 5vh;
        right: calc(50vw - 600px);
        flex-direction: column;
        justify-content: space-between;
        top: 120px;
    }

    .position-sticky {
        position: sticky;
    }


    .block-fixed h3 {
        margin-bottom: 3vh;
        font-weight: 400;
    }

    .block-fixed .price {
        text-align: right;
        color: #03588C;
        margin: 15% 0 20px 0;
        font-weight: 600;
    }

    .block-fixed p {
        margin-bottom: 3vh;
    }

    .quantity-choose {
        width: 100%;
        height: 45px;
        border: 1px solid black;
        align-items: center;
        justify-content: space-between;
        border-radius: 2px;
        margin-bottom: 10px;
    }

    .minus,
    .plus {
        width: 30px;
        height: 30px;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }

    .quantity-input {
        height: 25px;
        width: 40px;
        text-align: center;
        font-size: 14px;
        border: 1px solid transparent;
        border-radius: 2px;
        outline: none;
    }

    .block-fixed button {
        width: 100%;
        height: 45px;
        background: #FF9685;
        border: 0;
        border-radius: 2px;
        color: white;
        font-family: 'Noto Sans TC', sans-serif;
        letter-spacing: 2px;
        outline: none;
        cursor: pointer;
    }

    .block-fixed button:hover {
        background: #0388A6;
    }

    .block-fixed ul {
        width: 100%;
        justify-content: flex-end;
        cursor: pointer;
        position: relative;
    }

    .block-fixed ul li {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 20px;
    }

    .img-pattern {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: lightcoral;
    }

    .img-pattern img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .img-select-circle {
        width: 50px;
        margin-top: -6px;
        margin-left: -5px;
        position: absolute;
        opacity: 0;
    }

    .img-select-circle:hover {
        opacity: 1;
    }

    .active {
        opacity: 1;
    }

    .block-left-top {
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
    }

    .bread-crumb {
        margin: 20px 0 10px 70px;
        align-self: start;
        letter-spacing: 2px;
    }

    .box-photo {
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 40px;
    }

    .slider-box {
        display: none;
    }

    .box-photo-left {
        flex-direction: column;
        justify-content: space-evenly;
        margin-right: 10px;
    }

    .box-photo-left div {
        width: 120px;
        height: 120px;
        margin-bottom: 10px;
        cursor: pointer;
    }

    .box-photo-left img:hover {
        opacity: 1;
    }

    .box-photo-left img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: .7;
    }

    .box-photo-right div {
        width: 500px;
        height: 600px;
        background: white;
        margin-left: 10px;
        cursor: pointer;
    }

    .box-photo-right div img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .box-text {
        margin-bottom: 80px;
        letter-spacing: 2px;
        line-height: 2.5rem;
    }

    .box-promise {
        flex-direction: column;
        width: 100%;
        justify-content: space-evenly;
        align-items: center;
        position: relative;
        margin-bottom: 90px;
    }

    .title-promise {
        width: 250px;
        margin-bottom: 50px;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .title-promise>h5 {
        position: absolute;
        color: white;
        margin-top: 10px;
        letter-spacing: 2px;

    }

    .box-promise>ul>li {
        margin: 0 15px;
    }

    .box-promise>ul>li>h5 {
        font-weight: 300;
    }

    .box-bigphoto div {
        width: 600px;
        height: 400px;
        /* background: gray; */
        margin-bottom: 20px;
    }

    .box-bigphoto img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .block-left-bottom {
        margin: 20px 0 0 0;
    }

    .box-suggest {
        margin-bottom: 50px;
    }

    .box-suggest>h5 {
        margin: 20px 0 10px 70px;
        align-self: start;
        letter-spacing: 2px;
        font-weight: 300;
    }

    .box-suggest>ul {
        justify-content: center;
        align-items: center;
    }

    .box-suggest ul li {
        width: 190px;
        height: 240px;
        background: gray;
        margin-right: 10px;
    }

    .box-suggest ul img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }


    footer {
        z-index: 0;
    }

    @media screen and (max-width: 1280px) {
        .wrapper {
            width: 950px;
            padding: 120px 20px;
        }

        .block-left,
        .block-left-top,
        .block-left-bottom {
            width: 600px;
        }

        .block-right,
        .block-fixed {
            width: 280px;
        }

        .block-fixed {
            right: calc(50vw - 475px);
        }

        .quantity-choose {
            width: 200px;
            margin-bottom: 5px;
        }

        .block-fixed h3 {
            font-size: 1.1rem;
        }

        .block-fixed p {
            font-size: .9rem;
        }

        .block-fixed ul li {
            margin-right: 15px;
        }

        .img-select-circle {
            width: 35px;
            margin-top: -4px;
            margin-left: -3px;
        }

        .img-pattern {
            width: 28px;
            height: 28px;
        }

        .img-pattern img {
            width: 100%;
            height: 100%;
        }

        .bread-crumb {
            margin: 20px 0 10px 23px;
        }

        .box-photo-left div {
            width: 100px;
            height: 100px;
        }

        .box-photo-right div {
            width: 400px;
            height: 480px;
        }

        .box-photo-left img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .box-photo-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .box-bigphoto>div {
            width: 480px;
            height: 320px;
        }

        .box-bigphoto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .box-suggest>ul>li {
            width: 130px;
            height: 160px;
        }

        .block-fixed .price {
            margin: 0;
            margin: 8vh 0 2vh 0;
        }

        .quantity-choose {
            width: 100%;
        }
    }

    @media screen and (max-width: 992px) {
        .wrapper {
            width: 570px;
            padding: 120px 0;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .block-right {
            display: none;
        }

        .block-left {
            width: 90vw;
            margin: 0;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .block-left-top {
            width: 90vw;
            margin: 0;
        }

        .block-left .bread-crumb {
            margin: 0 0 10px;
            width: calc(15vw + 60vw + 10px);
            align-self: auto;
        }

        .wrapper .block-left-top {
            width: 100%;
            margin: 0;
        }

        .box-photo-left div {
            width: 15vw;
            height: 15vw;
        }

        .box-photo-right {
            width: 60vw;
            height: 72vw;
        }

        .mobile-visible {
            display: block;
            width: 100%;
            height: auto;
            padding: 0 40px;
            flex-direction: column;
        }

        .mobile-visible ul {
            display: none;
        }

        .mobile-visible .price {
            margin-top: -59px;
            margin-bottom: 40px;
            font-size: 1.2rem;
        }

        .buy {
            width: 100%;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        .mobile-visible .quantity-choose {
            width: 60%;
            margin-bottom: 10px;
            margin-top: 30px;
        }

        .buy button {
            width: 60%;
            margin-bottom: 60px;
        }

        .buy button:hover {
            background: #0388A6;
        }

        .box-text {
            width: 100%;
            padding: 0 40px;
            margin-bottom: 100px;
        }

        .box-promise {
            width: 100%;
        }

        .box-bigphoto div {
            width: 72vw;
            height: 48vw;
        }

        .box-bigphoto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .block-left-bottom {
            width: 90vw;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box-suggest h5 {
            margin-left: 0;
        }

    }

    @media screen and (max-width: 576px) {
        .wrapper {
            width: 100vw;
            padding: 80px 0 0 0;
        }

        .slider-box {
            display: block;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        .slider-box .box-photo-right {
            width: 70vw;
            height: 84vw;
            margin: 0;
        }

        .block-left .bread-crumb {
            width: 70vw;
            margin: 0;
        }

        .mobile-visible {
            width: 70vw;
            padding: 0;
        }

        .box-photo-right {
            width: 70vw;
            height: 84vw;
            background: rgb(212, 212, 212);
            overflow: hidden;
            position: relative;
        }

        .box-photo-right ul {
            position: absolute;
            left: 0;
            transition: 1s;
        }

        .box-photo-right li {
            width: 70vw;
            height: 84vw;
            margin: 0;
            position: unset;
        }

        .box-photo-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .box-photo {
            position: relative;
        }

        .arrow-left,
        .arrow-right {
            width: 10vw;
            height: 84vw;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            cursor: pointer;
        }

        .arrow-right {
            right: 0;
        }

        .arrow-left img,
        .arrow-right img {
            width: 3vw;
        }

        .mobile-visible>h3 {
            margin-bottom: 15px;
        }

        .mobile-visible p {
            margin-bottom: 15px;
        }

        .mobile-visible .price {
            margin-bottom: 30px;
            margin-top: -42px;
        }

        .mobile-visible .quantity-choose,
        .mobile-visible button {
            width: 70vw;
        }

        .mobile-visible .quantity-choose {
            margin-top: 4px;
        }

        .box-text {
            width: 70vw;
            padding: 0;
        }

        .title-promise img {
            width: 55vw;
        }

        .box-promise ul {
            flex-wrap: wrap;
            justify-content: center;
            padding: 0;
        }

        .box-promise ul li {
            margin: 0 15px 25px 15px;
        }

        .box-suggest ul li {
            width: 25vw;
            height: 30vw;
            margin: 0 5px;
        }
    }

    /* jumpout notice */

    .notice {
        /* transition: .2s; */
        position: fixed;
        width: 100vw;
        height: 100vh;
        visibility: hidden;
        user-select: none;
    }

    .notice-block {
        /* transition: .4s; */
        padding: 30px;
        background: #FF9685;
        border-radius: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        flex-direction: column;
        align-items: center;
        z-index: 5;
        opacity: 0;
    }

    .notice-bg {
        position: absolute;
        width: 100vw;
        height: 100vh;
        background: #404040;
        opacity: .8;
    }

    .notice-top {
        margin-bottom: 10px;
    }

    .notice-top img {
        height: 40px;
    }

    .notice-bottom h3 {
        color: white;
        white-space: nowrap;
    }

    .notice.success {
        visibility: visible;
        z-index: 20;
    }

    .notice.success .notice-block {
        opacity: 1;
    }
</style>

<!-- jumpout notice -->
<div class="notice">
    <!-- <div class="notice-bg"></div> -->
    <div class="notice-block  flex">
        <div class="notice-top">
            <img src="images/icon-success.svg " alt=" ">
        </div>
        <div class="notice-bottom">
            <h3>加入購物車</h3>
        </div>
    </div>
</div>

<div class="container flex">
    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex transition">
        <div class="block-left transition">
            <div class="block-left-top flex transition">
                <div class="bread-crumb transition">
                    <a href="<?= WEB_ROOT ?>/product.php">商品</a>
                    <span> > </span>
                    <a href='<?= WEB_ROOT ?>/product.php?#{"series":[ <?= $series_sid ?>],"orderBy":"new"} '><?= $series_name ?></a>
                </div>
                <div class="box-photo flex transition mobile-none">
                    <div class="box-photo-left flex transition">
                        <div>
                            <?php for ($i = 1; $i <= 4; $i++) :
                                if (file_exists($file . '-' . $i . '.jpg')) {

                            ?>
                                    <div>
                                        <img class="imgID-<?= $i ?>" src="images/product/<?= $row['img_ID'] ?>-<?= $i ?>.jpg" alt="">
                                    </div>
                            <?php
                                } else {
                                    break;
                                }
                            endfor; ?>
                        </div>
                    </div>
                    <div class="box-photo-right transition">
                        <img class="photo-change" src="images/product/<?= $row['img_ID'] ?>-1.jpg" alt="">
                    </div>
                </div>
                <div class="box-photo flex transition slider-box flex">
                    <div class="box-photo-left flex transition mobile-none">
                        <div>
                            <?php for ($i = 1; $i <= 4; $i++) :
                                if (file_exists($file . '-' . $i . '.jpg')) {

                            ?>
                                    <div>
                                        <img class="imgID-<?= $i ?>" src="images/product/<?= $row['img_ID'] ?>-<?= $i ?>.jpg" alt="">
                                    </div>
                            <?php
                                } else {
                                    break;
                                }
                            endfor; ?>
                        </div>
                    </div>
                    <div class="box-photo-right flex" id="blockPhoto">
                        <ul class="flex">
                            <?php for ($i = 1; $i <= 4; $i++) :
                                if (file_exists($file . '-' . $i . '.jpg')) {

                            ?>
                                    <li>
                                        <img class="imgID-<?= $i ?>" src="images/product/<?= $row['img_ID'] ?>-<?= $i ?>.jpg" alt="">
                                    </li>
                            <?php
                                } else {
                                    break;
                                }
                            endfor; ?>
                        </ul>
                    </div>
                    <div class="arrow-left flex" id="goPrev">
                        <img src="images/arrow-left-thiner.svg" alt="">
                    </div>
                    <div class="arrow-right flex" id="goNext">
                        <img src="images/arrow-right-thiner.svg" alt="">
                    </div>
                </div>
                <div class="block-fixed flex mobile-visible">
                    <h3 class="p_item" data-sid="<?= $sid ?>"><?= $row['product_name'] ?></h3>
                    <p><?= $row['introduction'] ?></p>
                    <p><?= $row['detail'] ?></p>
                    <ul class="flex">
                        <li></li>
                    </ul>
                    <h3 class="price">售價 <?= $row['price'] ?>元</h3>
                    <div class="buy flex">
                        <div class="quantity-choose flex">
                            <span class="minus">-</span>
                            <input class="quantity-input qty mobile-qty" type="text" value="1" />
                            <span class="plus">+</span>
                        </div>
                        <button class="transition btn-coral buy_btn">加入購物車</button>
                    </div>
                </div>
                <div class="box-text">
                    <ul>
                        <li>
                            <p>・手洗／最高水溫不超過30℃</p>
                        </li>
                        <li>
                            <p>・不可以用機器烘乾</p>
                        </li>
                        <li>
                            <p>・棉襪穿起來長度有±2cm彈性，可用腳底長度及穿著舒適感來做選擇</p>
                        </li>
                        <li>
                            <p>＊由於雙針筒織法，可能會有1至2公分的線頭，為正常現象</p>
                        </li>
                    </ul>
                </div>
                <div class="box-promise flex">
                    <div class="title-promise flex">
                        <h5>WATZ與你的五個約定</h5>
                        <img src="images/title-bgc.svg" alt="">
                    </div>
                    <ul class="flex">
                        <li>
                            <img src="images/promise1.svg" alt="">
                            <h5>台灣製造</h5>
                        </li>
                        <li>
                            <img src="images/promise2.svg" alt="">
                            <h5>舒適透氣</h5>
                        </li>
                        <li>
                            <img src="images/promise3.svg" alt="">
                            <h5>蓬鬆柔軟</h5>
                        </li>
                        <li>
                            <img src="images/promise4.svg" alt="">
                            <h5>耐洗耐穿</h5>
                        </li>
                        <li>
                            <img src="images/promise5.svg" alt="">
                            <h5>無害環境</h5>
                        </li>
                    </ul>
                </div>
                <div class="box-bigphoto">
                    <?php for ($i = 5; $i <= 7; $i++) :
                        //echo (__DIR__ . '\\images\\product\\' . $row['img_ID'] . '-' . $i). ".jpg<br>";
                        if (file_exists($file . '-' . $i . '.jpg')) {

                    ?>
                            <div>
                                <img class="imgID-<?= $i ?>" src="images/product/<?= $row['img_ID'] ?>-<?= $i ?>.jpg" alt="">
                            </div>
                    <?php
                        } else {
                            break;
                        }
                    endfor; ?>
                </div>
            </div>
            <div class="block-left-bottom">
                <div class="box-suggest">
                    <h5>你可能會喜歡:</h5>
                    <ul class="flex">
                        <?php foreach ($suggest as $r) : ?>
                            <li>
                                <a href="product-detail.php?sid=<?= $r['sid'] ?>">
                                    <img src="images/product/<?= $r['img_ID'] ?>-1.jpg" alt="">
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="block-right">
            <div class="block-fixed flex position-sticky">
                <h3 class="p_item" data-sid="<?= $sid ?>"><?= $row['product_name'] ?></h3>
                <p><?= $row['introduction'] ?></p>
                <p><?= $row['detail'] ?></p>
                <ul class="flex">
                    <?php if (file_exists($file . '-1-' . $pattern . '.jpg')) { ?>
                        <li>
                            <div class="socks-pattern flex">
                                <img class="img-select-circle transition active  first-pattern" src="images/select circle.svg" alt="">
                            </div>
                            <div class="img-pattern">
                                <img src="images/product/<?= $row['img_ID'] ?>-1-<?= $row['pattern'] ?>.jpg" alt="">
                            </div>
                        </li>
                    <?php } ?>
                    <?php foreach ($patternArray as $p) :
                        //  print_r ($p);
                        if (file_exists($file . '-1-' . $row['pattern'] . '.jpg')) {

                    ?>
                            <li>
                                <a href="product-detail.php?sid=<?= $p['sid'] ?>">
                                    <div class="socks-pattern flex">
                                        <img class="img-select-circle transition" src="images/select circle.svg" alt="">
                                    </div>
                                    <div class="img-pattern">
                                        <img src="images/product/<?= $p['img_ID'] ?>-1-<?= $row['pattern'] ?>.jpg" alt="">
                                    </div>
                                </a>
                            </li>
                    <?php
                        } else {
                            break;
                        }
                    endforeach; ?>
                </ul>
                <h3 class="price">售價 <?= $row['price'] ?>元</h3>
                <div class="quantity-choose flex">
                    <span class="minus">-</span>
                    <input class="quantity-input qty web-qty" type="text" value="1" />
                    <span class="plus">+</span>
                </div>
                <button class="transition buy_btn">加入購物車</button>
            </div>
        </div>
    </div>
    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // 同款樣式hover
    $(".img-select-circle").hover(
        function() {
            $(".img-select-circle").removeClass("active");
        },
        function() {
            $(".first-pattern").addClass("active")
        }
    );

    // 數量加減功能
    $(document).ready(function() {
        $('.minus').click(function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function() {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });

    // block-left 點擊改變照片功能
    $(".imgID-1").click(function() {
        let imgSrc = $(this).attr("src");
        $(".photo-change").attr("src", imgSrc);
    })
    $(".imgID-2").click(function() {
        let imgSrc = $(this).attr("src");
        $(".photo-change").attr("src", imgSrc);
    })
    $(".imgID-3").click(function() {
        let imgSrc = $(this).attr("src");
        $(".photo-change").attr("src", imgSrc);
    })
    $(".imgID-4").click(function() {
        let imgSrc = $(this).attr("src");
        $(".photo-change").attr("src", imgSrc);
    })

    // mobile slider
    let slideIndex = 0;
    let slideCount = $("#blockPhoto ul").find("li").length;
    let slideWidth = $("#blockPhoto ul li").width();

    if ($(window).width() < 567) {
        slider()
    }

    $(window).resize(function() {
        slideCount = $("#blockPhoto ul").find("li").length;
        slideWidth = $("#blockPhoto ul li").width();
        $("#blockPhoto ul").css("left", 0)

        if ($(window).width() < 567) {
            slider()
        }
    })

    function slider() {
        $("#goNext").click(function() {
            slideIndex = slideIndex + 1;
            goSlide()
        })
        $("#goPrev").click(function() {
            slideIndex = slideIndex - 1;
            goSlide()
        })
    }

    function goSlide() {
        if (slideIndex < 0) {
            slideIndex = slideCount - 1
        }
        if (slideIndex >= slideCount) {
            slideIndex = 0
        }
        $("#blockPhoto ul").css("left", 0 - slideIndex * slideWidth)
    }

    // php 加入購物車

    const buy_btn = $('.buy_btn');

    buy_btn.click(function() {
        const p_item = $('.p_item');
        const sid = p_item.attr('data-sid');
        const qty = $('.qty').val();
        const sendObj = {
            action: 'add',
            sid,
            qty: qty
        }
        $.get('cart-handle.php', sendObj, function(data) {
            setCartCount(data);
        }, 'json');

        // 彈跳視窗
        $(".notice").addClass("animate__animated animate__flipInX animate__faster");
        $(".notice").addClass("success");
        setTimeout(function() {
            $(".notice").removeClass("success");
            $(".notice").removeClass("animate__animated animate__flipInX animate__faster");
        }, 800);
    });


    // 購買數量輸入同步
    $(".quantity-input").keyup(function() {
        let val = $(this).val();
        $(".mobile-qty").val(val);
    });


    // 數量雙向同步
    $('.web-qty').on('change', function(e) {
        let value = $(this).val();
        $('.mobile-qty').val(value);
    });

    $('.mobile-qty').on('change', function(e) {
        let value = $(this).val();
        $('.web-qty').val(value);
    });
</script>

<?php require __DIR__ . '/__html_foot.php' ?>