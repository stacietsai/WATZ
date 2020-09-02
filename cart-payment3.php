<?php require __DIR__ . '/__connect_db.php';
$pageName = '';  // 這裡放你的pagename


if (empty($_SESSION['cart'])) {
    header('Location: cart-empty.php');
}

$sids = array_column($_SESSION['cart'], 'sid');
$p_sql = "SELECT * FROM `product` WHERE `sid` IN (" . implode(',', $sids) . ")";
$productData = [];
$p_stmt = $pdo->query($p_sql);
while ($r = $p_stmt->fetch()) {
    $productData[$r['sid']] = $r;
}

$watzbox_style = isset($_SESSION['receiver']['watzbox_style']) ? $_SESSION['receiver']['watzbox_style'] : Null;

$totalPrice = 0;
foreach ($_SESSION['cart'] as $k => $v) {
    $_SESSION['cart'][$k]['price'] = $productData[$v['sid']]['price'];

    $totalPrice += $_SESSION['cart'][$k]['price'] * $v['qty'];
}
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
        position: relative;
        min-height: 100vh;
        justify-content: space-between;
    }

    .wrapper {
        width: 1200px;
        /* height: 60%; */
        overflow: hidden;
        position: relative;
        margin-top: 120px;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }

    .pay-title {
        width: 100%;
        height: 30px;
        /* margin-bottom: 30px; */
    }

    .pay-title h3 {
        margin: 0 30px;
        color: #03588C;
    }


    .pay-frame {
        position: relative;
        width: 1000px;
        height: 500px;
        justify-content: space-evenly;
        margin-bottom: 60px;
    }

    .top-block {
        width: 450px;
        height: 260px;
        display: none;
        flex-direction: column;
        justify-content: flex-start;
        position: relative;
        margin-bottom: 30px;
        overflow: hidden;
    }

    .block-right {
        width: 450px;
        flex-direction: column;
        justify-content: flex-end;
        -webkit-transition: all 0.5s ease-in-out;
        position: absolute;
        bottom: 0;
        transform: translateX(50px);
        z-index: 0;
    }

    .block-left {
        width: 450px;
        position: relative;
        flex-direction: column;
        align-items: center;
        -webkit-transition: all 0.5s ease-in-out;
        z-index: 1;
    }

    .pay-frame.open .block-right {
        transform: translateX(53%);
    }

    .pay-frame.open .block-left {
        transform: translateX(-53%);
    }

    .pay-frame.open .open-btn p {
        font-family: 'Noto Sans TC', sans-serif;
        display: none;
    }

    .pay-frame.open .open-btn img {
        display: block;
    }
    @media screen and (max-width: 1200px) {
        .wrapper {
            width: 90vw;
            height: 100%;

        }

        .pay-title h3 {
            /* margin: 30px 50px; */
            color: #03588C;
        }
    }

    @media screen and (max-width: 922px) {
        .wrapper {
            height: 100%;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .pay-frame {
            height: 100%;
            flex-direction: column-reverse;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;

        }

        .block-right {
            position: relative;
            height: 100%;
            flex-direction: column;
            justify-content: flex-start;
            -webkit-transition: all 0.5s ease-in-out;
            top: 0;
            transform: translateX(0px);
            margin: 30px 0;
        }

        .block-left {
            height: 580px;
        }

        .open-btn {
            display: none;
        }

        .wrapper {
            margin-bottom: 30px;
        }

    }

    @media screen and (max-width: 576px) {

        .block-right {
            width: 80vw;

        }

        .pay-title h3 {
            margin: 0px;

        }
    }


    /* --------------------credit-card--------------------- */
    .credit-card {
        width: 300px;
        height: 200px;
        position: relative;
        flex-direction: column;
        align-items: center;

    }

    .credit-card-bg {
        width: 300px;
        height: 200px;
        position: absolute;
        z-index: 1;
    }

    .credit-card-bg img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .credit-info {
        flex-direction: column;
        margin: 20px 0;
        height: 180px;
        justify-content: space-around;
        z-index: 2;
    }

    .credit-top {
        width: 260px;
        height: 40px;
        align-items: flex-start;
        justify-content: space-between;
    }

    .name-frame h5 {
        width: 140px;
        height: 20px;
        overflow: initial;

    }

    .credit-top-img {
        align-items: flex-start;
    }

    .img-chip {
        height: 30px;
        margin: 0 10px;
    }

    .img-visa {
        height: 20px;
    }

    .credit-mid {
        width: 260px;
        height: 40px;
        flex-direction: column;
        justify-content: space-between;
    }

    .info-number {
        width: 50px;
        height: 20px;
        border-bottom: 2px solid #707070;
        margin-right: 20px;
        text-align: center;
    }

    .info-number.showpink {
        border-bottom: 2px solid #FF9685;
    }

    .credit-bottom {
        width: 260px;
        height: 40px;
        align-items: flex-start;
        justify-content: start;
    }

    .credit-bottom img {
        width: 10px;
        margin-right: 10px;
    }

    .credit-month {
        flex-direction: column;
        align-items: flex-start;
        margin-right: 40px;
    }

    .credit-month .info-number {
        margin-right: 10px;
        text-align: center;
    }

    @media screen and (max-width: 576px) {
        .credit-card-bg{
            width: 280px;
            height: 190px;
        }
    }

    /* -----------------input form-------------- */
    .credit-input-form {
        width: 450px;
        height: 420px;
        background-color: #F2DE79;
        border-radius: 15px;
        position: absolute;
        bottom: 0;
        z-index: 0;
        flex-direction: column;
        align-items: center;
    }

    .credit-info-frame {
        width: 90%;
        height: 250px;
        align-items: center;
        justify-content: space-around;
        position: absolute;
        bottom: 5%;
    }


    .info-title {
        height: 250px;
        width: 25%;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .info-input {
        width: 70%;
        height: 250px;
        flex-direction: column;
        justify-content: space-evenly;
    }

    .credit-number-input {
        justify-content: space-between;
    }

    .info-input input {
        width: 60px;
        height: 30px;
        border: none;
        border-radius: 6px;
        outline: none;
        text-align: center;
    }

    .name-input input {
        width: 200px;
        height: 30px;

    }
    .month-input{
        align-items: center;
    }
    
    .month-input input {
        align-items: center;
        margin-right: 10px;

    }

    .year-input {
        margin-left: 10px;

    }

    .month-input p {
        margin: 0 10px;
    }

    /* --------show-in-922-input-form------ */
    .credit-info-frame.showin922 {
        display: flex;
        width: 90%;
        height: 80%;
        align-items: center;
        justify-content: space-around;
        position: absolute;
        bottom: 5%;
        display: none;
        margin-bottom: 10px;

    }

    .credit-info-frame.showin922 ul {
        width: 90%;
        height: 100%;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-between;
    }

    .credit-info-frame.showin922 ul li {
        width: 100%;
    }

    .credit-info-frame.showin922 ul li input {
        width: 100%;
        height: 35px;
        border: none;
        border-radius: 2px;
        outline: none;
        margin-top: 5px;
        text-align: center;
    }

    .card-num-922 {
        align-items: center;
        background-color: #ffffff;
    }

    .credit-info-frame.showin922 .month-input {
        width: 100%;
        justify-content: space-between;
    }

    .credit-info-frame.showin922 .month-input input {
        width: 45%;
    }

    @media screen and (max-width: 922px) {
        .credit-info-frame {
            display: none;
        }

        .credit-info-frame.showin922 {
            display: flex;
        }

        .top-block .total-price {
            width: 100%;
            height: 200px;
            background-color: #ffffff;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: absolute;
            transform: translateY(30%);

        }
    }

    @media screen and (max-width: 576px) {
        .credit-input-form {
            width: 80vw;
        }
        .credit-info-frame {
            display: none;
        }
        .credit-info-frame.showin922 {
            display: flex;
        }
    }

    /* ------------------total price------------ */
    .ordered-list {
        height: 500px;
        align-items: flex-end;
        position: relative;

    }

    .total-price {
        width: 400px;
        background-color: #ffffff;
        border-radius: 0 0 15px 15px;
        flex-direction: column;
        align-items: center;
        justify-content: flex-end;
        z-index: 2;
    }

    .total-price-title {
        width: 320px;
        align-items: flex-end;
        justify-content: space-between;
        margin-top: 20px;
    }

    .open-btn {
        width: 40px;
        height: 130px;
        background-color: #03588C;
        border-radius: 0 8px 8px 0;
        margin: 20px 0;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        transition: all 1s ease-in-out;
    }

    .open-btn p {
        writing-mode: vertical-lr;
        color: #ffffff;
        cursor: pointer;
    }

    .open-btn img {
        width: 20px;
        display: none;
    }

    .total-price h3 {
        color: #03588C;
        align-self: flex-start;

    }

    .seemore {
        color: #FF9685;
        text-decoration: underline;
        cursor: pointer;

    }

    .seemore:active {
        color: #03588C;

    }

    .total-price ul {
        width: 80%;
        margin: 10px;
        justify-content: space-between;
    }

    .total-price ul li {
        height: 35px;
        justify-content: space-between;
    }

    .line {
        height: 1px;
        border-top: 2px solid #E2E2E2;
        margin-bottom: 10px;
    }

    @media screen and (max-width: 922px) {

        .ordered-list {
            height: 100%;
            flex-direction: column;
            align-items: center;
            transform: none;
        }

        .total-price {
            z-index: 0;
        }
        .total-price ul{
            width:90%;
        }

    }

    @media screen and (max-width: 576px) {
        .total-price-title {
            width: 90%;
        }

        .total-price {
            width: 100%;
        }
    }



    /* ---------------hide scroll---------- */
    .hide {
        width: 400px;
        height: 230px;
        background-color: #ffffff;
        border-radius: 15px 15px 15px 0;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        z-index: 1;
        position: absolute;
        top: 260px;
        left: 0;
        transition: 1s ease-in-out;
    }

    .list-scroll {
        width: 80%;
        height: 25vh;
        overflow-x: hidden;
        overflow-y: scroll;
        margin-top: 20px;
    }

    .list-scroll h4 {
        color: #707070;
    }

    .list-scroll::-webkit-scrollbar-track-piece {
        background-color: #F8F4EB;
    }

    .list-scroll::-webkit-scrollbar {
        width: 5px;
        height: 5px;

    }

    .list-scroll::-webkit-scrollbar-thumb {
        background-color: #F2DE79;
        background-clip: padding-box;
        min-height: 28px;
        border-radius: 20px;
    }

    .box-info {
        align-items: center;

    }

    .box-info .box-img {
        width: 80px;
    }

    .box-detail {
        width: 95%;
        height: 60px;
        flex-direction: column;
        justify-content: space-between;
    }

    .box-product-orderlist {
        width: 100%;
        flex-direction: column;
        justify-content: flex-start;
        margin-bottom: 30px;
    }

    .product-orderlist {
        width: 100%;
        flex-direction: column;
        justify-content: flex-start;
    }

    .box-socks {
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .socks-title {
        flex-grow: 1;
    }

    .socks-price {
        margin-left: 20px;
    }

    .single-socks {
        width: 100%;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #E2E2E2;
    }

    .socks-nameNprice {
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .hide.open {
        top: 0;
        z-index: 1;
        height: 350px;
    }

    @media screen and (max-width: 992px) {
        .hide {
            border-radius: 15px 15px 0px 0px;
            height: 50px;
            position: unset;
            z-index: 0;
        }

        .hide.open {
            height: 250px;
        }
    }

    @media screen and (max-width: 576px) {
        .hide {
            width: 100%;
        }
    }

    /* ------------------btn------------------- */
    .prev-next-btn {
        justify-content: space-between;
    }

    .pay-btn {
        width: 140px;
        height: 40px;
        border: none;
        background-color: #FF9685;
        color: #ffffff;
        outline: none;
        cursor: pointer;
        margin: 0 20px;
    }

    .pay-btn.gopay:hover {
        background-color: #0388A6;

    }

    .pay-btn.prev {
        background-color: #0388A6;

    }

    .pay-btn.prev:hover {
        background-color: #FF9685;
    }


    /* --------------top-show-in-922-------------------- */
    .top-block.order-list {
        background-color: #ffffff;
        border-radius: 15px;
        flex-direction: column;
        align-items: center;
    }


    .order-list h3 {
        color: #03588C;
    }

    .top-block .order-list-frame {
        width: 90%;
        flex-direction: column;
        align-items: center;
        margin: 30px 0px;
    }

    .order-list-title {
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .top-block .list-scroll {
        width: 95%;
    }

    @media screen and (max-width: 922px) {
        .top-block.order-list {
            margin-top: 30px;
        }
    }

    @media screen and (max-width: 922px) {
        .list-scroll {
            width: 90%;
        }
    }

    /* --------------total-price------------- */
    .top-block .total-price {
        width: 100%;
        height: 200px;
        background-color: #ffffff;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        /* margin-bottom: 30px; */
        /* z-index: 5; */
        position: absolute;
        transform: translateY(30%);

    }


    .top-block .total-price ul {
        width: 85%;
        flex-direction: column;
        margin-bottom: 30px;
        justify-content: space-between;
    }

    .top-block .total-price h3 {
        color: #707070;

    }

    .top-block .total-price.open h3 {
        color: #03588C;
    }
</style>

<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex">
        <div class="div"></div>
        <div class="pay-title">
            <h3>填寫信用卡資訊</h3>
        </div>
        <div class="pay-frame flex">
            <div class="block-left  flex">
                <div class="credit-card flex">
                    <div class="credit-card-bg">
                        <img src="images/credit-card.svg" alt="">
                    </div>
                    <div class="credit-info flex">
                        <div class="credit-top flex">
                            <div class="name-frame">
                                <h6 class="card-name">Name</h6>
                                <h5 class="nameInputShow"></h5>
                            </div>
                            <div class="credit-top-img flex">
                                <img class="img-chip" src="images/chip.svg" alt="">
                                <img class="img-visa" src="images/visa.svg" alt="">
                            </div>
                        </div>
                        <div class="credit-mid flex">
                            <h6>Card Number</h6>
                            <div class="topcard-mid-info flex" id="">
                                <div class="info-number">
                                    <h5 class="cardNumberShow cardNumberShow1" maxlength="4"></h5>
                                </div>
                                <div class="info-number">
                                    <h5 class="cardNumberShow cardNumberShow2" maxlength="4"></h5>
                                </div>
                                <div class="info-number">
                                    <h5 class="cardNumberShow cardNumberShow3" maxlength="4"></h5>
                                </div>
                                <div class="info-number">
                                    <h5 class="cardNumberShow cardNumberShow4" maxlength="4"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="credit-bottom flex">

                            <div class="credit-month card">
                                <h6>Expiration</h6>
                                <div class="topcard-mon-info flex" id="">
                                    <div class="info-number">
                                        <h5 class="cardMonthsShow"></h5>
                                    </div>
                                    <img src="images/credit-down.svg" alt="">
                                    <div class="info-number">
                                        <h5 class="cardYearsShow"></h5>
                                    </div>
                                    <img src="images/credit-down.svg" alt="">
                                </div>
                            </div>
                            <div class="credit-ccv topcard-ccv-info" id="">
                                <h6>CCV</h6>
                                <div class="info-number">
                                    <h5 class="cardCcvShow"></h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <form class="credit-input-form showin922 flex">
                    <div class="credit-info-frame showin922 flex">
                        <ul class="flex">
                            <li>
                                <h5>信用卡姓名</h5>
                                <h5>Name</h5>
                                <input class="cardNameInput" type="text">
                            </li>
                            <li>
                                <h5>信用卡卡號</h5>
                                <h6>Card Number</h6>
                                <div class="card-num-922 flex">
                                    <input class="cardNumberInput" type="text" maxlength="4" data-val="1">-
                                    <input class="cardNumberInput" type="text" maxlength="4" data-val="2">-
                                    <input class="cardNumberInput" type="text" maxlength="4" data-val="3">-
                                    <input class="cardNumberInput" type="text" maxlength="4" data-val="4">
                                </div>
                            </li>
                            <li class="">
                                <h5>有效期限</h5>
                                <h5>Expiration</h5>
                                <div class="month-input flex">
                                    <input class="expirInput cardMonthsInput" type="text" maxlength="2">
                                    <!-- <p>/</p> -->
                                    <input class="expirInput cardYearsInput" type="text" maxlength="2">
                                </div>
                            </li>
                            <li>
                                <h5>安全碼</h5>
                                <h5>CCV</h5>
                                <input class="cardCcvInput" type="text" maxlength="3">
                            </li>
                        </ul>
                    </div>

                    <!-- ----- -->
                    <div class="credit-info-frame flex">
                        <ul class="info-title flex">
                            <li>
                                <h5>信用卡姓名</h5>
                                <h5>Name</h5>
                            </li>
                            <li>
                                <h5>信用卡卡號</h5>
                                <h6>Card Number</h6>
                            </li>
                            <li>
                                <h5>有效期限</h5>
                                <h5>Expiration</h5>
                            </li>
                            <li>
                                <h5>安全碼</h5>
                                <h5>CCV</h5>
                            </li>
                        </ul>
                        <ul class="info-input flex">
                            <div class="name-input">
                                <input class="cardNameInput" type="text">
                            </div>
                            <li class="credit-number-input creditNumberInput flex">
                                <input class="cardNumberInput" type="text" maxlength="4" data-val="1" oninput="value=value.replace(/[^\d]/g,'')">
                                <input class="cardNumberInput" type="text" maxlength="4" data-val="2" oninput="value=value.replace(/[^\d]/g,'')">
                                <input class="cardNumberInput" type="text" maxlength="4" data-val="3" oninput="value=value.replace(/[^\d]/g,'')">
                                <input class="cardNumberInput" type="text" maxlength="4" data-val="4" oninput="value=value.replace(/[^\d]/g,'')">
                            </li>
                            <li class="month-input monthYearInput flex">
                                <input class="expirInput cardmonthsInput cardMonthsInput" type="text" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                                <p>/</p>
                                <input class="year-input expirInput cardYearsInput" type="text" maxlength="2" oninput="value=value.replace(/[^\d]/g,'')">
                            </li>
                            <li class="ccv-input">
                                <input class="cardCcvInput" type="text" maxlength="3" oninput="value=value.replace(/[^\d]/g,'')"></li>

                        </ul>
                    </div>
                </form>
            </div>
            <div class="block-right flex">
                <div class="ordered-list flex">
                    <div class="hide flex">
                        <div class="total-price-title flex">
                            <h3>結帳金額</h3>
                            <h4 class="seemore seeMore">查看訂單內容</h4>
                        </div>
                        <div class="list-scroll listScroll">
                            <div class="box-detail">
                                <div class="box-product-orderlist flex">
                                    <h4>禮盒內容</h4>
                                    <p class="margin">
                                        <?php if ($watzbox_style == 'watzbox1') {
                                            echo '夏日芒果';
                                        } else if ($watzbox_style == 'watzbox2') {
                                            echo '群魔亂舞';
                                        } else if ($watzbox_style == 'watzbox3') {
                                            echo '灰姑娘的水晶襪';
                                        } else {
                                            echo '無';
                                        } ?></p>
                                    <?php foreach ($_SESSION['cart'] as $i) :
                                        if ($i['watzbox'] == 1) : ?>
                                            <div class="box-socks p_item flex">
                                                <div class="socks-nameNprice flex" id="pbox<?= $i['sid'] ?>" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                                    <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                                    <h5>×<?= $i['qty'] ?></h5>
                                                    <h5 class="socks-price">NT $<?= $i['price'] ?></h5>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div class="product-orderlist p_item flex" id="pbox<?= $i['sid'] ?>" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                    <h4>單購襪子</h4>
                                    <?php foreach ($_SESSION['cart'] as $i) :
                                        if ($i['watzbox'] == 0) : ?>
                                            <div class="single-socks p_item flex">
                                                <div class="socks-nameNprice flex">
                                                    <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                                    <h5>×<?= $i['qty'] ?></h5>
                                                    <h5 class="socks-price">NT $<?= $i['price'] ?></h5>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total-price flex">
                                <ul>
                                    <li class="flex">
                                        <p>商品總計</p>
                                        <p id="productPrice">NT $<?= $totalPrice ?></p>
                                    </li>
                                    <li class="flex">
                                        <p>運費</p>
                                        <p class="shipFee">0</p>
                                    </li>
                                    <li class="flex">
                                        <p>折扣</p>
                                        <p class="discount">-60</p>
                                    </li>
                                    <div class="line"></div>
                                    <li class="flex">
                                        <h4>結帳金額</h4>
                                        <h4 id="totalPrice">NT $<?= $totalPrice + 0 - 60 ?></h4>
                                    </li>
                                </ul>
                    </div>
                    <div class="open-btn openBtn flex" id="">
                        <img src="images/pay-close.svg" alt="">
                        <p>訂單資訊</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="prev-next-btn flex">
            <button class="pay-btn btn-blue prev" onclick="javascript:location.href='<?= WEB_ROOT ?>/cart-payment2.php'">回上一頁</button>
            <button class="pay-btn btn-coral gopay" onclick="javascript:location.href='<?= WEB_ROOT ?>/cart-payment4.php'">前往付款</button>

        </div>
    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(".open-btn").click(function() {
        $(".pay-frame").toggleClass("open");
        $(".hide").removeClass("open");
    });

    $('.seeMore').click(function() {
        $(".hide").toggleClass("open");

    });

    $(window).resize(function() {
        if ($(window).width() < 922) {
            // alert('Less than 960');
            $(".pay-frame").removeClass("open");
            $(".hide").removeClass("open");

        }
    });


    //輸入欄底線變色//
    $(".cardNameInput").on("click keyup", function() {
        $(".card-name").css("color", "#FF9685");
        $(".topcard-mid-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-mon-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-ccv-info").children('.info-number').css("border-bottom", "2px solid #707070");

    });

    $(".cardNumberInput").on("click keyup", function() {
        $(".card-name").css("color", "#707070");
        $(".topcard-mid-info").children('.info-number').css("border-bottom", "2px solid #FF9685");
        $(".topcard-mon-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-ccv-info").children('.info-number').css("border-bottom", "2px solid #707070");

    });

    $(".expirInput").on("click keyup", function() {
        $(".card-name").css("color", "#707070");
        $(".topcard-mid-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-mon-info").children('.info-number').css("border-bottom", "2px solid #FF9685");
        $(".topcard-ccv-info").children('.info-number').css("border-bottom", "2px solid #707070");
    });
    $(".cardCcvInput").on("click keyup", function() {
        $(".card-name").css("color", "#707070");
        $(".topcard-mid-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-mon-info").children('.info-number').css("border-bottom", "2px solid #707070");
        $(".topcard-ccv-info").children('.info-number').css("border-bottom", "2px solid #FF9685");
    });

    //信用卡輸入同步///
    $(".cardNameInput").keyup(function() {
        let val = $(this).val();
        $(".nameInputShow").html(val);
    });

    $(".cardNumberInput").keyup(function() {

        let val = $(this).val();
        let dataVal = $(this).attr('data-val');
        $(".cardNumberShow" + dataVal).html(val);
    });

    $(".cardMonthsInput").keyup(function() {
        let val = $(this).val();
        $(".cardMonthsShow").html(val);
    });
    $(".cardYearsInput").keyup(function() {
        let val = $(this).val();
        $(".cardYearsShow").html(val);
    });
    $(".cardCcvInput").keyup(function() {
        let val = $(this).val();
        $(".cardCcvShow").html(val);
    });

    $(".cardNumberInput").keyup(function() {
        let maxLength = $(this).attr("maxlength")
        let currentLength = $(this).val().length
        if (maxLength == currentLength) {
            // $(this).parent().next().find(":input").focus()
            $(this).next(":input").focus();
        }
    });

    $(".expirInput").keyup(function() {
        let maxLengthMon = $(this).attr("maxlength")
        let currentLengthMon = $(this).val().length
        if (maxLengthMon == currentLengthMon) {
            // $(this).parent().next().find(":input").focus()
            $(this).parent().find(":input").focus();
        }
    });

    // php
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    function prepareCartTable() {
        $p_items = $('.p_item');
        if ($p_items.length == 0) {
            location.href = 'cart-empty.php'
        }

        let total = 0;

        // if (!$p_items.length && $('#totalPrice').length) {
        //     location.href = 'product.php';
        //     return;
        // }
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');
            const shipFee = $('.shipFee').text();
            const discount = $('.discount').text();


            $(this).find('.price').text('NT $' + dallorCommas(price));
            $(this).find('.qty').val(quantity);
            total += quantity * price;
            const totalPrice = total + parseInt(shipFee) + parseInt(discount);


            $('#productPrice').text('NT $' + dallorCommas(total));
            $('#totalPrice').text('NT $' + dallorCommas(totalPrice));

        })
    }

    prepareCartTable();
</script>

<?php require __DIR__ . '/__html_foot.php' ?>