<?php require __DIR__ . '/__connect_db.php';
$pageName = ''; // 這裡放你的pagename
if (empty($_SESSION['cart'])) {
    header('Location: cart-empty.php');
}

$id = isset($_SESSION['member']['id']) ? intval($_SESSION['member']['id']) : 0;
$sql = "SELECT * FROM `members` WHERE `id`= $id";
$row = $pdo->query($sql)->fetch();

$sender = isset($_SESSION['sender']) ? $_SESSION['sender']['sender'] : $row['name'];
$senderEmail = isset($_SESSION['sender']) ? $_SESSION['sender']['senderEmail'] : $row['email'];
$senderMobile = isset($_SESSION['sender']) ? $_SESSION['sender']['senderMobile'] : $row['mobile'];
$senderAddress = isset($_SESSION['sender']) ? $_SESSION['sender']['senderAddress'] : $row['address'];

$receiver = isset($_SESSION['receiver']['receiver']) ? $_SESSION['receiver']['receiver'] : null;
$receiverMobile = isset($_SESSION['receiver']['receiverMobile']) ? $_SESSION['receiver']['receiverMobile'] : null;
$receiverAddress = isset($_SESSION['receiver']['receiverAddress']) ? $_SESSION['receiver']['receiverAddress'] : null;

$watzbox_style = isset($_SESSION['receiver']['watzbox_style']) ? $_SESSION['receiver']['watzbox_style'] : Null;


$sids = array_column($_SESSION['cart'], 'sid');
$p_sql = "SELECT * FROM `product` WHERE `sid` IN (" . implode(',', $sids) . ")";
$productData = [];
$p_stmt = $pdo->query($p_sql);
while ($r = $p_stmt->fetch()) {
    $productData[$r['sid']] = $r;
}

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
    body {
        background-size: cover;
        background-image: url(images/BG3.svg);
        background-repeat: repeat-y;
    }

    .container {
        overflow: none;
    }

    .nav {
        position: fixed;
    }

    .wrapper {
        width: 1200px;
        justify-content: space-between;
        margin-top: 120px;
        /* border: 1px solid gold; */
    }

    .block-left {
        width: 67%;
        /* border: 1px solid rgb(100, 248, 63); */
        position: relative;
    }

    .block-right {
        width: 30%;
        /* border: 1px solid rgb(34, 220, 245); */

    }

    .block-fixed {
        width: 100%;
        right: calc(50vw - 600px);
        flex-direction: column;
        position: sticky;
        top: 120px;
    }

    @media screen and (max-width: 1200px) {
        .wrapper {
            width: 90vw;

        }
    }

    @media screen and (max-width: 992px) {
        .wrapper {
            flex-direction: column;
            justify-content: flex-start;

        }

        .container {
            overflow: hidden;
        }

        .block-left {
            width: 100%;
            order: 1;
        }

        .block-right {
            width: 100%;
            margin-top: 30px;
            order: 2;
        }
    }

    @media screen and (max-width: 576px) {
        .wrapper {
            margin-top: 80px;
        }
    }

    /* ------------------process------------------ */

    .buy-process {
        width: 100%;
        background-color: #ffffff;
        border-radius: 15px;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
    }

    .buy-process-frame {
        width: 90%;
        justify-content: space-between;
        /* border: 1px solid palevioletred; */
    }

    .each-process {
        width: 130px;
        /* height: 55px; */
        background-color: #F8F4EB;
        border-radius: 2px;
        margin: 20px 0;
        align-items: center;
        justify-content: center;
    }

    .each-process h3 {
        margin: 10px 0;
    }

    .each-process h6 {
        margin-left: 10px;
    }

    .each-process.here {
        background-color: #F2DE79;
    }
    .each-process .showin576{
        display: none;
    }

    @media screen and (max-width: 1200px) {
        .each-process {
            width: 120px;
        }
    }

    @media screen and (max-width: 992px) {
        .each-process {
            width: 22%;
        }

        .each-process h3 {
            margin: 10px;
        }

        .each-process h6 {
            margin: 0 5px;
        }
    }

    @media screen and (max-width: 576px) {
        .each-process {
            width: 22%;
            height: 70px;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .each-process h3 {
            margin: 0px;
        }

        .each-process.first h6 {
            margin-right: 0;
        }

        .each-process h6 {
            /* margin-right: 0px; */
            text-align: center;
        }
        .each-process .showin576{
            display: flex;
        }
        .each-process .hidein576{
            display: none;
        }
    }

    /* -----------shipping-form------------- */

    .shipping-form {
        background-color: #ffffff;
        border-radius: 15px;
        margin-top: 30px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* order: 0; */

    }

    .shipping-form h3 {
        color: #03588C;
    }

    .shipping-form-frame {
        width: 90%;
        margin: 30px 0 0 0;
        /* border: 1px solid plum; */
    }
    .sender-title{
        width:95%;
        /* border:1px solid pink; */
        align-items: center;
        justify-content: space-between;

    }

    .shipping-form-frame ul {
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .shipping-form-frame ul input {
        width: 70%;
        height: 50px;
        border: 1px solid #F2DE79;
        border-radius: 2px;
        outline: none;
        padding: 0 10px;
    }

    .shipping-form-frame ul li {
        width: 80%;
        align-items: center;
        justify-content: space-between;
        margin: 15px 0;
        padding-inline-start: 2;

    }

    .pickup-ppl-title {
        width: 95%;
        align-items: center;
        justify-content: space-between;
        margin-top: 20px;
    }

    .pickup-ppl-title input {
        width: 15px;
        height: 15px;
        cursor: pointer;
    }

    .same-bookppl {
        align-items: center;
    }

    .button {
        width: 100px;
        height: 40px;
        border: 1px solid #F2DE79;
        font-size: 14px;
        border-radius: 2px;
        background-color: #ffffff;
        margin: 15px;
        color: #707070;
        outline: none;
        text-align: center;
        cursor: pointer;
        padding: 8px;
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 500;
    }

    .button.active {
        border-radius: 2px;
        background-color: #F2DE79;
    }

    .button:hover {
        background-color: #f2de79a6;
    }

    .pay-choose {
        margin-top: 30px;
    }

    .receipt-choose {
        margin-top: 10px;
    }

    .peper-receipt {
        margin: 10px;
        flex-direction: column;
        display: none;
    }

    .peper-receipt.show {
        display: block;
    }

    .radio-frame {
        margin: 10px;
    }

    .radio-btn {
        width: 20px;
        height: 20px;
        appearance: none;
        position: relative;
        margin: 0px 15px;
        outline: none;
        cursor: pointer;
        font-family: 'Noto Sans TC', sans-serif;

    }

    .radio-btn:before {
        content: '';
        width: 20px;
        height: 20px;
        border: 1px solid #F2DE79;
        display: inline-block;
        border-radius: 50%;
        vertical-align: middle;

    }

    .radio-btn:checked:before {
        content: '';
        width: 20px;
        height: 20px;
        border: 1px solid #F2DE79;
        display: inline-block;
        border-radius: 50%;
        vertical-align: middle;
    }

    .radio-btn:checked:after {
        content: '';
        width: 12px;
        height: 12px;
        text-align: center;
        background: #F2DE79;
        border-radius: 50%;
        display: block;
        position: absolute;
        top: 5px;
        left: 5px;
        /* transition: opacity: ;; */
    }

    .info .info-input {
        width: 65%;
        height: 35px;
        border: 1px solid #F2DE79;
        border-radius: 2px;
        margin-left: 20px;
        outline: none;
        padding: 0 10px;

    }

    .peper-receipt .info {
        width: 60%;
        align-items: center;
        justify-content: space-between;
        margin: 20px 30px;
    }

    .cloud-receipt {
        display: none;
    }

    .cloud-receipt.show {
        display: block;
    }

    .cloud-receipt .info {
        align-items: center;
        justify-content: start;
        margin: 20px 30px;
    }

    .donate-receipt {
        display: none;
    }

    .donate-receipt.show {
        display: block;
    }

    .order-remark {
        margin-top: 30px;
    }

    .remark-textarea {
        margin: 30px;
        width: 90%;
        height: 130px;
        border: 1px solid #F2DE79;
        outline: none;
    }
    ::-webkit-input-placeholder{
        font-family: 'Noto Sans TC', sans-serif;

    }
    .pay-btn {
        width: 140px;
        height: 40px;
        margin: 30px 20px;
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 500;
    }

    .pay-showin922 {
        display: none;
        justify-content: center;
        /* border: 1px solid indianred; */
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

    @media screen and (max-width: 992px) {
        .shipping-form-frame {
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .shipping-form-frame ul {
            justify-content: center;
        }

        .shipping-form-frame ul input {
            width: 100%;
            height: 45px;
        }

        .shipping-form-frame ul li {
            width: 90%;
            flex-direction: column;
            align-items: flex-start;
            margin: 5px 0;

        }

        .shipping-form-frame ul li p {
            margin-bottom: 10px;
        }

        .shipping-form .pay-btn {
            display: none;
        }

        .pay-showin922 {
            display: flex;
        }

    }

    @media screen and (max-width: 576px) {
        .receipt-choose-frame {
            flex-direction: column;
        }

        .peper-receipt {
            margin: 10px 0;
        }

        .radio-frame {
            margin: 10px 0;
        }

        .peper-receipt .info {
            width: 90%;
            margin: 10px 15px;
        }
        .cloud-receipt p{
            width: 50%;    
        }
        .cloud-receipt .info{
            margin: 0 15px;
        }
        .remark-textarea{
            margin: 30px 15px;
        }
    }

    /* ---------------return------------ */
    .return-detail {
        /* width: 800px; */
        background-color: #ffffff;
        border-radius: 15px;
        margin-top: 30px;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        /* order: 1; */

    }

    .return-detail-frame {
        width: 90%;
        margin: 30px;
    }

    .return-detail-frame h6 {
        font-weight: 400;
    }

    @media screen and (max-width: 1200px) {}

    @media screen and (max-width: 992px) {}

    @media screen and (max-width: 576px) {}


    /* --------------right fix part------------- */
    /* --------------order-list------------- */

    .order-list {
        background-color: #ffffff;
        border-radius: 15px;
        /* border: 1px solid rgb(212, 52, 132); */
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        position: sticky;
        top: 120px;
    }

    .order-list.showin922 {
        background-color: #ffffff;
        border-radius: 15px 15px 0 0;
        /* border: 1px solid rgb(212, 52, 132); */
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        position: sticky;
        margin: 0;
        transition: 1s;
        display: none;
        margin-top: 30px;

    }

    .order-list h3 {
        color: #03588C;
    }

    .order-list-frame {
        width: 85%;
        /* border: 1px solid rgb(212, 52, 132); */
        flex-direction: column;
        margin: 30px 0px;
    }

    .order-list-frame h3{
        margin-bottom: 10px;
    }

    .order-list-title {
        width: 100%;
        align-items: flex-end;
        justify-content: space-between;
    }

    .order-list-title h3 {
        margin-bottom: 5px;
    }

    .seemore {
        color: #FF9685;
        text-decoration: underline;
        cursor: pointer;
    }

    .list-scroll {
        width: 100%;
        height: 35vh;
        overflow-x: hidden;
        overflow-y: scroll;
    }

    .list-scroll.showin922 {
        width: 100%;
        height: 25vh;
        overflow-x: hidden;
        overflow-y: scroll;
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

    .list-scroll::-webkit-scrollbar-thumb:hover {
        background-color: #F2DE79;
        border-radius: 20px;
    }

    .box-choose {
        align-items: center;
    }

    .box-choose .box-img {
        width: 150px;
    }

    .box-type-detail {
        /* width: 300px; */
        height: 120px;
        flex-direction: column;
        justify-content: space-between;
    }

    .socks-detail {
        flex-direction: column;
        /* border: 1px solid teal; */

    }

    .eachsock-list {
        width: 100%;
        align-items: center;
        justify-content: space-between;
        margin-top: 10px;
    }

    .img-product {
        width: 70px;
        margin-left: 7px;
    }

    .img-product img {
        width: 100%;
        height: 100%;
        object-fit: fill;
    }

    .socks-nameNprice {
        width: 65%;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
    }

    .qty-n-price {
        width: 80%;
        justify-content: space-between;
        margin-top: 10px;
    }

    @media screen and (max-width: 1200px) {}

    @media screen and (max-width: 992px) {
        .order-list {
            display: none;
        }

        .order-list.showin922 {
            display: flex;
        }

        .eachsock-list {
            justify-content: flex-start;
        }

    }

    @media screen and (max-width: 576px) {}

    /* --------------total-price------------- */
    .total-price {
        width: 85%;
        flex-direction: column;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 30px;
        /* order: ; */

    }

    .total-price.showin922 {
        width: 100%;
        background-color: #ffffff;
        border-radius: 0 0 15px 15px;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        /* border: 1px solid yellowgreen; */
        transition: .5s;
        display: none;
        margin: 0;
    }

    .total-price.showin922 ul {
        width: 85%;
        height: 100%;
        margin-top: 0;
    }

    .total-price h3 {
        color: #03588C;
        margin-bottom: 10px;
    }

    /* .total-price.showin922 h3 {
            margin: 20px 0;
        } */

    .total-price ul {
        width: 100%;
        justify-content: space-between;
        margin-top: 20px;

    }

    .total-price ul li {
        height: 35px;
        justify-content: space-between;
    }

    .line {
        width: 100%;
        height: 1px;
        border-top: 2px solid #E2E2E2;
        margin: 10px auto;
    }

    footer {
        margin-top: 50px;
    }

    @media screen and (max-width: 1200px) {}

    @media screen and (max-width: 992px) {
        .total-price {
            display: none;
        }

        .total-price.showin922 {
            display: flex;
        }
    }

    /* ---------------error notice--------- */
    .senderInfo .input-frame {
        position: relative;
    }

    .receiverInfo .input-frame {
        position: relative;
    }

    .peper-receipt .input-frame {
        position: relative;

    }

    .error-frame {
        position: absolute;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        right: 0;
    }

    .error-icon {
        width: 15px;
        height: 15px;
        margin-right: 5px;
        display: none;
    }

    .error-frame h6 {
        color: red;
    }
</style>

<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex" action="">
        <div class="block-left">
            <div class="buy-process flex">
                <ul class="buy-process-frame flex">
                    <li class="each-process first flex">
                        <h3></h3>01</h3>
                        <h6 class="hidein576">確認訂單<br>及運送方式</h6>
                        <h6 class="showin576">確認訂單</h6>
                    </li>
                    <li class="each-process here flex">
                        <h3>02</h3>
                        <h6 class="hidein576">填寫<br>訂購資料</h6>
                        <h6 class="showin576">填寫資料</h6>
                    </li>
                    <li class="each-process flex">
                        <h3>03</h3>
                        <h6>付款</h6>
                    </li>
                    <li class="each-process flex">
                        <h3>04</h3>
                        <h6>訂單完成</h6>
                    </li>
                </ul>
            </div>
            <div class="order-list showin922 flex">
                <div class="order-list-frame showin922 flex">
                    <div class="order-list-title flex">
                        <h3>訂單資訊</h3>
                        <h4 class="seemore">查看訂單內容</h4>
                    </div>
                    <div class="list-scroll showin922" id="hide">
                        <?php if ($watzbox_style) :
                        ?>
                            <div class="box-choose-ordered">
                                <h4>您選購的禮盒</h4>
                                <div class="box-choose flex">
                                    <img class="box-img" src="images/<?= $watzbox_style ?>-2.png" alt="">
                                </div>

                                <div class="socks-detail flex">
                                    <h4>禮盒內容</h4>
                                    <?php foreach ($_SESSION['cart'] as $i) :
                                        if ($i['watzbox'] == 1) : ?>
                                            <div class="eachsock-list flex " data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                                <div class="img-product">
                                                    <img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt="">
                                                </div>
                                                <div class="socks-nameNprice flex">
                                                    <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                                    <div class="qty-n-price flex">
                                                        <h5>X<?= $i['qty'] ?></h5>
                                                        <h5 class="socks-price">NT$<?= $i['price'] ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="line"></div>
                        <?php else : ?>
                        <?php endif; ?>
                        <div class="socks-detail flex">
                            <h4>單購襪子</h4>
                            <?php foreach ($_SESSION['cart'] as $i) :
                                if ($i['watzbox'] == 0) : ?>

                                    <div class="eachsock-list flex" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                        <div class="img-product">
                                            <img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt="">
                                        </div>
                                        <div class="socks-nameNprice flex">
                                            <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                            <div class="qty-n-price flex">
                                                <h5>×<?= $i['qty'] ?></h5>
                                                <h5 class="socks-price">NT$<?= $i['price'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="total-price showin922 flex">
                <ul class="">
                    <h3>訂購金額</h3>
                    <li class="flex">
                        <p>商品總計</p>
                        <p class="productPrice">NT $<?= $totalPrice ?></p>
                    </li>
                    <li class="flex">
                        <p>運費</p>
                        <p>0</p>
                    </li>
                    <li class="flex">
                        <p>折扣</p>
                        <p>-60</p>
                    </li>
                    <div class="line"></div>
                    <li class="flex">
                        <h4>結帳金額</h4>
                        <h4 class="totalPrice">NT $<?= $totalPrice + 0 - 60 ?></h4>
                    </li>
                </ul>
            </div>
            <div class="shipping-form flex">
                <div class="shipping-form-frame">
                    <!-- <div class="sender-title flex"> -->
                       <h3>訂購資料填寫</h3>
                       <!-- <div class="flex">
                                <input type="checkbox" class="">
                                <h5>更新會員資訊</h5>
                            </div>
                    </div> -->
                    
                    <form class="" name="form1" method="post" novalidate>
                        <ul class="senderInfo  flex">
                            <li class="input-frame flex">
                                <p>訂購人姓名</p>
                                <input class="senderName" placeholder="王小美" type="text" data-val="1" id="sender" name="sender" required value="<?= htmlentities($sender) ?>">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                            <li class="input-frame flex">
                                <p>電話</p>
                                <input class="senderMobile" placeholder="0900-000-000" type="tel" data-val="2" maxlength="10" name="senderMobile" pattern="09\d{2}-?\d{3}-?\d{3}" value="<?= htmlentities($senderMobile) ?>" id="senderMobile" oninput="value=value.replace(/[^\d]/g,'')">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                            <li class="input-frame flex">
                                <p>E-mail</p>
                                <input class="senderEmail senderEmail" placeholder="watz@watzmail.com" type="text" data-val="3" value="<?= htmlentities($senderEmail) ?>" name="senderEmail" id="sendersenderEmail">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                            <li class="input-frame flex">
                                <p>地址</p>
                                <input class="senderAddress" placeholder="請輸入訂購人地址" type="text" data-val="5" id="senderAddress" name="senderAddress" value="<?= htmlentities($senderAddress) ?>">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                        </ul>
                        <div class="line"></div>
                        <div class="pickup-ppl-title flex">
                            <h3>收件人資料填寫</h3>
                            <div class="same-bookppl flex">
                                <input type="checkbox" class="samePplBtn">
                                <h5>收件人同訂購人</h5>
                            </div>
                        </div>
                        <ul class="receiverInfo flex">

                            <li class="input-frame flex">
                                <p>收件人姓名</p>
                                <input class="receiverName receiverInput" placeholder="王小美" id="receiverName" type="text" data-val="1" name="receiver" value="<?= htmlentities($receiver) ?>">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                            <li class="input-frame flex">
                                <p>電話</p>
                                <input class="receiverMobile receiverInput" placeholder="0900-000-000" maxlength="10" id="receiverMobile" type="tel" data-val="2" name="receiverMobile" value="<?= htmlentities($receiverMobile) ?>" oninput="value=value.replace(/[^\d]/g,'')">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                            <li class="input-frame flex">
                                <p>地址</p>
                                <input class="receiverAddress receiverInput" id="receiverAddress" placeholder="請輸入收件人地址" type="text" data-val="5" name="receiverAddress" value="<?= htmlentities($receiverAddress) ?>">
                                <div class="error-frame flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </li>
                        </ul>
                        <div class="line"></div>
                        <div class="pay-choose">
                            <h3>付款方式選擇</h3>
                            <div class="flex">
                                <div class="button payBtn active">信用卡</div>
                                <div class="button payBtn">到貨付款</div>
                            </div>
                        </div>
                        <div class="receipt-choose">
                            <h3>發票選擇</h3>
                            <div class="receipt-choose-frame flex">
                                <div class="flex">
                                    <div class="button receiptBtn active" id="paper" data-val="1">紙本發票</div>
                                    <div class="button receiptBtn" id="elec" data-val="1">電子發票</div>
                                </div>
                                <div class="flex">
                                    <div class="button receiptBtn" id="icloud" data-val="1">雲端載具</div>
                                    <div class="button receiptBtn" id="donate" data-val="1">發票捐贈</div>
                                </div>
                            </div>
                            <div class="peper-receipt flex show">
                                <div class="radio-frame flex">
                                    <input class="radio-btn " name="receipt-radio-btn" type="radio" checked></input>
                                    <p>二聯式發票</p>
                                </div>
                                <div class="radio-frame flex">
                                    <input class="radio-btn" name="receipt-radio-btn" type="radio"></input>
                                    <p>三聯式發票</p>
                                </div>
                                <div class="info flex">
                                    <p>統一編號</p>
                                    <input class="info-input coNumber" type="text">
                                    <div class="error-frame flex">
                                        <img class="error-icon flex" src="images/alert.svg">
                                        <h6 class="flex"></h6>
                                    </div>
                                </div>
                                <div class="info flex">
                                    <p>公司抬頭</p>
                                    <input class="info-input" type="text">
                                </div>
                            </div>
                            <div class="cloud-receipt">
                                <div class="info flex">
                                    <p>載具手機條碼</p>
                                    <input class="info-input" type="text">
                                </div>
                            </div>
                            <div class="donate-receipt flex">
                                <div class="radio-frame flex">
                                    <input class="radio-btn " name="receipt-radio-btn" type="radio"></input>
                                    <p class="">捐贈至心路基金會</p>
                                </div>
                            </div>
                        </div>

                        <div class="line"></div>
                        <div class="order-remark">
                            <h3>訂單備註</h3>
                            <textarea class="remark-textarea" name="note" id="note" cols="30" rows="10" placeholder="禮盒訂單細節或收件時間須備註的都可以跟我們說哦！（限200字以內）"></textarea>
                        </div>
                    </form>
                </div>

                <div class="flex">
                    <button class="pay-btn btn-blue prev" onclick="javascript:location.href='<?= WEB_ROOT ?>/cart-payment1.php'">回上一頁</button>
                    <button class="pay-btn btn-coral gopay goPay" onclick="return formCheck()">前往結帳</button>
                </div>
            </div>
            <div class="return-detail flex">
                <ul class="return-detail-frame">
                    <h3>退/換貨與退款資訊</h3>
                    <h6>・襪子屬個人貼身用品，如拆封襪子吊牌，將不適用七天鑑賞期。
                        <br>
                        ・如需退/換貨或退款，請務必保留完整包裝，並在收到商品後七天內mail至
                        &nbsp;&nbsp;watz@watzservice.com。
                        <br>
                        ・可退/換貨之狀況：商品內容或數量有誤、商品瑕疵（需提供清晰照片）。
                        <br>
                        ・不可退/換貨之狀況：尺寸不合、商品與想像不符等。 </h6>
                </ul>
            </div>
            <div class="pay-showin922 flex">
                <button class="pay-btn btn-blue prev" onclick="javascript:location.href='<?= WEB_ROOT ?>/cart-payment1.php'">回上一頁</button>
                <button class="pay-btn btn-coral gopay" onclick="return formCheck()">前往結帳</button>

            </div>
        </div>
        <div class="block-right ">
            <div class="order-list flex">
                <div class="order-list-frame flex">
                    <h3>訂單資訊</h3>
                    <div class="list-scroll">
                        <?php if ($watzbox_style) :
                        ?>
                            <div class="box-choose-ordered">
                                <h4>您選購的禮盒</h4>
                                <div class="box-choose flex">
                                    <img class="box-img" src="images/<?= $watzbox_style ?>-2.png" alt="">
                                </div>

                                <div class="socks-detail flex">
                                    <h4>禮盒內容</h4>
                                    <?php foreach ($_SESSION['cart'] as $i) :
                                        if ($i['watzbox'] == 1) : ?>
                                            <div class="eachsock-list flex " data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                                <div class="img-product">
                                                    <img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt="">
                                                </div>
                                                <div class="socks-nameNprice flex">
                                                    <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                                    <div class="qty-n-price flex">
                                                        <h5>X<?= $i['qty'] ?></h5>
                                                        <h5 class="socks-price">NT$<?= $i['price'] ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="line"></div>
                        <?php else : ?>
                        <?php endif; ?>
                        <div class="socks-detail flex">
                            <h4>單購襪子</h4>
                            <?php foreach ($_SESSION['cart'] as $i) :
                                if ($i['watzbox'] == 0) : ?>

                                    <div class="eachsock-list flex" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">
                                        <div class="img-product">
                                            <img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt="">
                                        </div>
                                        <div class="socks-nameNprice flex">
                                            <h5 class="socks-title"><?= $i['product_name'] ?></h5>
                                            <div class="qty-n-price flex">
                                                <h5>×<?= $i['qty'] ?></h5>
                                                <h5 class="socks-price">NT$<?= $i['price'] ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="total-price flex">
                    <h3>訂購金額</h3>
                    <ul>
                        <li class="flex">
                            <p>商品總計</p>
                            <p class="productPrice">NT $<?= $totalPrice ?></p>
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
                            <h4 class="totalPrice">NT $<?= $totalPrice + 0 - 60 ?></h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php include __DIR__ . '/__html_footer.php' ?>

    <?php include __DIR__ . '/__scripts.php' ?>

    <script>
        ///選擇shipping按鈕////
        $(".payBtn").click(function() {
            $(this).addClass('active')
                .siblings().removeClass('active');
        });

        ///收據按鈕選擇顯示不同選單////
        $("#paper").click(function() {
            $(".peper-receipt").addClass('show')
                .siblings().removeClass('show');
        });
        $("#elec").click(function() {
            $(".peper-receipt").addClass('show')
                .siblings().removeClass('show');
        });
        $("#icloud").click(function() {
            $(".cloud-receipt").addClass('show')
                .siblings().removeClass('show');
        });
        $("#donate").click(function() {
            $(".donate-receipt").addClass('show')
                .siblings().removeClass('show');
        });


        ///922顯示訂單資訊裡的查看訂單內容顯示＆隱藏///
        $(document).ready(function() {
            $("#hide").hide();
            $(".seemore").click(function() {
                $("#hide").slideToggle()
            });
        });

        //收據四選一btn//
        const receiptBtn = $('.receiptBtn');

        receiptBtn.click(function() {
            const me = this;
            receiptBtn.each(function() {
                if (this !== me) {
                    $(this).removeClass('active');
                }
            });
            $(this).toggleClass('active');
        });

        //寄件人同收件人//
        $('.samePplBtn').click(function() {
            $('.receiverInput').css('border-color', '#F2DE79');
            $('.receiverInput').next(".error-frame").children('img').css("display", "none");
            $('.receiverInput').next('.error-frame').children('h6').html('');

            if ($(this).is(":checked")) {
                let NameVal = $('.senderName').val();
                let phoneVal = $('.senderMobile').val();
                let emailVal = $('.senderEmail').val();
                let addressVal = $('.senderAddress').val();
                $(".receiverName").val(NameVal);
                $(".receiverMobile").val(phoneVal);
                $(".receiverAddress").val(addressVal);;
            } else if ($(this).is(":not(:checked)")) {
                $(".receiverName").val('');
                $(".receiverMobile").val('');
                $(".receiverAddress").val('');
            }
        });


        // ------------------php---------------------//
        // php
        const dallorCommas = function(n) {
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        };

        function prepareCartTable() {
            $p_items = $('.p_item');

            let total = 0;

            $p_items.each(function() {
                const sid = $(this).attr('data-sid');
                const price = $(this).attr('data-price');
                const quantity = $(this).attr('data-quantity');
                const shipFee = $('.shipFee').text();
                const discount = $('.discount').text();

                total += quantity * price;
                const totalPrice = total + parseInt(shipFee) + parseInt(discount);


                $('.productPrice').text('NT $' + dallorCommas(total));
                $('.totalPrice').text('NT $' + dallorCommas(totalPrice));

            })
        }

        prepareCartTable();




        //error notice//
        const receiver = $('#receiverName'),
            receiverMobile = $('#receiverMobile'),
            receiverAddress = $('#receiverAddress'),
            sender = $('.senderName'),
            senderEmail = $('.senderEmail'),
            senderMobile = $('.senderMobile'),
            senderAddress = $('.senderAddress'),
            coNumber = $('.coNumber');


        $(".input-frame input").on("click keyup change", function() {
            $(this).css('border-color', '#F2DE79');
            $(this).next(".error-frame").children('img').css("display", "none");
            $(this).next('.error-frame').children('h6').html('');
        })

        function formCheck() {
            let isPass = true;


            const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

            if (sender.val().length < 1) {
                isPass = false;
                sender.css('border-color', 'red');
                sender.next('.error-frame').children('img').css("display", "block");
                sender.next('.error-frame').children('h6').html('收件人姓名不能空白');
            }

            if (!email_re.test(senderEmail.val())) {
                isPass = false;
                senderEmail.css('border-color', 'red');
                senderEmail.next('.error-frame').children('img').css("display", "block");
                senderEmail.next('.error-frame').children('h6').html('e-mail格式錯誤');

            }

            if (senderMobile.val().length < 10) {
                isPass = false;
                senderMobile.css('border-color', 'red');
                senderMobile.next('.error-frame').children('img').css("display", "block");
                senderMobile.next('.error-frame').children('h6').html('手機號碼格式錯誤');
            }

            if (senderAddress.val().length < 1) {
                isPass = false;
                senderAddress.css('border-color', 'red');
                senderAddress.next('.error-frame').children('img').css("display", "block");
                senderAddress.next('.error-frame').children('h6').html('寄件人姓名不能空白');
            }

            if (receiver.val().length < 1) {
                isPass = false;
                receiver.css('border-color', 'red');
                receiver.next('.error-frame').children('img').css("display", "block");
                receiver.next('.error-frame').children('h6').html('寄件人姓名不能空白');
            }
            if (receiverMobile.val().length < 10) {
                isPass = false;
                receiverMobile.css('border-color', 'red');
                receiverMobile.next('.error-frame').children('img').css("display", "block");
                receiverMobile.next('.error-frame').children('h6').html('手機號碼格式錯誤');
            }
            if (receiverAddress.val().length < 1) {
                isPass = false;
                receiverAddress.css('border-color', 'red');
                receiverAddress.next('.error-frame').children('img').css("display", "block");
                receiverAddress.next('.error-frame').children('h6').html('寄件人姓名不能空白');

            }

            if (isPass) {

                $.post('cart-sendlist.php', $(document.form1).serialize(), function(data) {

                    if (data.success) {
                        location.href = 'cart-payment3.php';

                    }
                }, 'json');
            }
            return false;
        }
    </script>

    <?php require __DIR__ . '/__html_foot.php' ?>