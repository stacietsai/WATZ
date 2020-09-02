<?php require __DIR__ . '/__connect_db.php';
$pageName = '';  // 這裡放你的pagename

if (empty($_SESSION['cart'])) {
    header('Location: cart-empty.php');
}


$watzbox_style = isset($_SESSION['receiver']['watzbox_style']) ? $_SESSION['receiver']['watzbox_style'] : Null;



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
        }

        .block-right {
            width: 100%;
            margin-top: 30px;
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

    .each-process .showin576 {
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

        .each-process .showin576 {
            display: flex;
        }

        .each-process .hidein576 {
            display: none;
        }
    }

    /* -----------choose box------------- */

    .box-watzbox {
        /* width: 800px; */
        background-color: #ffffff;
        border-radius: 15px;
        margin-top: 30px;
        flex-direction: column;
        align-items: center;
        position: relative;
    }

    .box-watzbox-frame {
        width: 90%;
        margin: 40px 0;
        /* border: 1px solid pink; */
    }

    .box-watzbox-title h3 {
        color: #03588C;
        margin: 0 5px;
    }

    .box-watzbox-title img {
        width: 40px;
        transform: rotate(180deg);
        margin-right: 20px;
        transition: .5s;
        cursor: pointer;
    }

    .box-watzbox-title img.close {
        transform: rotate(0deg);
    }

    .box-watzbox h4 {
        color: #707070;

    }

    .step1 {
        margin-top: 20px;
    }

    .watzbox-choose {
        align-items: center;
        justify-content: space-evenly;
    }

    .img-watzbox img {
        width: 200px;
        opacity: .3;
        cursor: pointer;
    }

    .img-watzbox.active img {
        opacity: 1;
    }

    .img-watzbox:hover img {
        opacity: 1;
    }

    .button {
        width: 70px;
        height: 40px;
        border: 1px solid #F2DE79;
        border-radius: 2px;
        background-color: #ffffff;
        margin: 15px;
        color: #707070;
        outline: none;
        text-align: center;
        cursor: pointer;
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

    .step2 {
        width: 600px;
        opacity: 1;
        align-items: center;
        position: absolute;
        bottom: -90px;
        display: none;
    }

    .step2 img {
        width: 50px;
    }

    .step2 h4 {
        color: #FF9685;
    }

    .step2 h5 {
        color: #FF9685;
        display: none;
    }

    .step2.show {
        display: flex;
    }

    @media screen and (max-width: 1200px) {
        .img-watzbox img {
            width: 180px;
        }
    }

    @media screen and (max-width: 992px) {
        .img-watzbox img {
            width: 160px;
        }
    }

    @media screen and (max-width: 576px) {
        .img-watzbox img {
            width: 100px;
        }

        .button {
            margin: 10px;
        }

        .step2 img {
            width: 40px;
        }

        .step2 h4 {
            display: none;
        }

        .step2 h5 {
            display: block;
        }
    }

    /* -------------order list-------------- */

    .box-product {
        /* width: 800px; */
        background-color: #ffffff;
        border-radius: 15px;
        margin-top: 30px;
        flex-direction: column;
        align-items: center;
    }

    .box-product-frame {
        width: 90%;
        margin: 30px 0;
        /* border: 2px solid #be5656; */
        flex-direction: column;
        align-items: center;
        justify-content: start;
    }
    .box-product h3{
        width: 70%;
        margin: 30px 0 0 0;
        color:#03588C;
    }

    .eachsock-list {
        width: 100%;
        align-items: center;
        justify-content: space-between;
        border-bottom: 2px solid #E2E2E2;
        /* border: 1px solid orange; */
        margin: 20px 0;
    }

    .boxChooseDetail {
        flex-direction: column;
        align-items: center;
    }

    .add-box-frame {
        width: 25px;
        height: 25px;
    }

    .add-box {
        width: 25px;
        height: 25px;
        border: 2px solid #F2DE79;
        cursor: pointer;
        /* flex-direction: column; */
        align-items: center;
        justify-content: center;
        display: none;
    }

    .add-box.show {
        display: flex;
    }

    .add-box p {
        font-weight: 900;
        font-size: 1.2rem;
        line-height: 21px;
        letter-spacing: 0;
        color: #F2DE79;
        cursor: pointer;
    }

    .removeInBox {
        display: none;
    }

    .box-product .line {
        width: 90%;
        border-top: 2px solid #E2E2E2;
    }

    .img-socks {
        width: 110px;
        margin-bottom: 5px;
    }

    .img-socks img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-detail {
        width: 70%;
        height: 100px;
        justify-content: space-between;
    }

    .sock-name {
        width: 45%;
        height: 100%;
        flex-grow: 1;
        flex-direction: column;
        justify-content: space-between;
    }

    .socks-amount-choose {
        width: 65%;
        align-items: flex-end;
        justify-content: space-evenly;
    }

    .quantity-choose {
        width: 100px;
        height: 30px;
        border: 1px solid black;
        align-items: center;
        justify-content: space-between;
    }

    .minus,
    .plus {
        width: 30px;
        height: 25px;
        border-radius: 4px;
        text-align: center;
        cursor: pointer;
    }

    .quantity-input {
        height: 25px;
        width: 45px;
        text-align: center;
        font-size: 14px;
        border: 1px solid transparent;
        border-radius: 2px;
        outline: none;
    }

    .remove {
        width: 20px;
        height: 20px;
        background: url(images/remove.svg);
        cursor: pointer;
    }

    @media screen and (max-width: 1200px) {
        .img-socks {
            width: 90px;
        }

        .quantity-choose {
            width: 80px;
        }
    }

    @media screen and (max-width: 992px) {
        .product-detail {
            height: 90px;
        }
    }

    @media screen and (max-width: 576px) {
        .img-socks {
            width: 70px;
        }

        .sock-name {
            width: 100%;
        }

        .product-detail {
            width: 60%;
            height: 70px;
            flex-direction: column;
        }

        .product-detail h6 {
            display: none;
        }

        .socks-amount-choose {
            width: 95%;
            margin: 10px 0;
            align-items: center;
            justify-content: space-between;
        }

        .quantity-choose {
            width: 70px;
        }
    
    }

    /* --------------right fix part------------- */
    /* --------------box-shipping------------- */
    .shipping-shoose {
        /* width: 350px; */
        background-color: #ffffff;
        border-radius: 15px;
        flex-direction: column;
        align-items: center;
        margin-bottom: 30px;
    }

    .shipping-shoose-frame {
        width: 80%;
        margin: 20px 0px;
        flex-direction: column;
        align-items: flex-start;
    }

    .ship-title {
        width: 100%;
        align-items: center;
        justify-content: space-between;
    }

    .shipping-shoose h3 {
        color: #03588C;
    }

    .shipping-shoose p {
        color: #FF9685;
        text-decoration: underline;
    }

    .shipping-btn {
        width: 100%;
    }

    .conv-store {
        width: 100px;
    }

    @media screen and (max-width: 1200px) {
        .shipping-shoose-frame {
            width: 90%;
        }
    }

    @media screen and (max-width: 992px) {
        .shipping-shoose {
            margin: 0;
            border-radius: 15px 15px 0 0;
            margin-bottom: 0px;
        }
    }
    @media screen and (max-width: 576px){
        .shipping-shoose p{
            margin-left: 10px;
        }
    }

    /* --------------total-price------------- */
    .total-price {
        background-color: #ffffff;
        border-radius: 15px;
        flex-direction: column;
        align-items: center;
    }

    .total-price-frame {
        width: 90%;
        flex-direction: column;
        align-items: center;
    }

    .total-price h3 {
        color: #03588C;
        margin: 30px;
        align-self: flex-start;
    }

    .coupon {
        width: 90%;
        align-items: center;
        justify-content: center;
    }

    .coupon input {
        width: 75%;
        height: 40px;
        border: 1px solid #F2DE79;
        border-radius: 2px 0 0 2px;
        outline: none;
        padding: 0 10px;
    }
    ::-webkit-input-placeholder{
        font-family: 'Noto Sans TC', sans-serif;

    }

    .coupon .button {
        height: 40px;
        margin: 0;
        background-color: #F2DE79;
        border-radius: 0 2px 2px 0;
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 500;
    }

    .coupon button:hover {
        background-color: #03588C;
        border: 1px solid #03588C;
        color: #ffffff;
    }

    .total-price-detail {
        width: 90%;
        margin: 30px 0;
        /* border: 1px solid blue; */
        flex-direction: column;
    }

    .total-price ul li {
        width: 100%;
        height: 35px;
        justify-content: space-between;
        /* border: 1px solid yellowgreen; */
    }

    .line {
        height: 1px;
        border-top: 2px solid #E2E2E2;
        margin-bottom: 10px;
    }

    .btn-pay {
        width: 180px;
        height: 40px;
        border: none;
        background-color: #FF9685;
        border-radius: 2px;
        color: #ffffff;
        margin-bottom: 30px;
        outline: none;
        cursor: pointer;
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 500;
    }

    .btn-pay:hover {
        background-color: #0388A6;
    }

    footer {
        margin-top: 50px;
    }

    @media screen and (max-width: 1200px) {
        .coupon input {
            width: 100%;
        }
    }

    @media screen and (max-width: 992px) {
        .total-price {
            border-radius: 0 0 15px 15px;
        }

        .total-price h3 {
            margin: 10px 0px 20px 40px;
        }
    }
    @media screen and (max-width: 576px){
        .total-price h3 {
            margin: 10px 0px 20px 20px;
        }
    }

    /* -------------prodout remove----------- */
    /* jumpout notice */

    .notice {
        transition: .2s;
        position: fixed;
        width: 100vw;
        height: 100vh;
        visibility: hidden;
        z-index: 30;
    }

    .notice-block {
        transition: .2s;
        padding: 30px;
        background: #FF9685;
        border-radius: 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        flex-direction: column;
        align-items: center;
        z-index: 21;
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
        margin-bottom: 20px;
        justify-content: center;
        align-items: center;
    }

    .notice-top img {
        height: 40px;
    }

    .notice-top h3 {
        margin-left: 8px;
        white-space: nowrap;
        color: white;
    }

    .notice-btn {
        width: 80px;
        height: 40px;
        background: #F2DE79;
        border: 0;
        border-radius: 2px;
        color: #404040;
        outline: none;
        cursor: pointer;
        margin: 0 5px;
        font-family: 'Noto Sans TC', sans-serif;
    }

    .notice-bottom h3 {
        color: white;
        white-space: nowrap;
    }

    .notice.active {
        visibility: visible;
    }

    .notice.active .notice-block {
        opacity: 1;
    }

    /* ---------------error notice--------- */

    .error-frame {
        align-items: center;
        justify-content: center;
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
<!-- jumpout notice -->
<div class="notice ">
    <div class="notice-bg "></div>
    <div class="notice-block flex ">
        <div class="notice-top flex">
            <img src="images/icon-sadtrashcan.svg " alt=" ">
            <h3>確定要把我丟掉?</h3>
        </div>
        <div class="notice-bottom">
            <button class="notice-btn remove-item">丟</button>
            <button class="notice-btn" onclick="keepitem()">不丟</button>
        </div>
    </div>
</div>
<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex" action="">
        <div class="block-left">
            <div class="buy-process flex">
                <ul class="buy-process-frame flex">
                    <li class="each-process first here flex">
                        <h3></h3>01</h3>
                        <h6 class="hidein576">確認訂單<br>及運送方式</h6>
                        <h6 class="showin576">確認訂單</h6>
                    </li>
                    <li class="each-process flex">
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
            <div class="box-watzbox flex">
                <div class="box-watzbox-frame">
                    <div class="box-watzbox-title flex">
                        <img id="open-btn" src="images/arrow-top.svg" alt="">
                        <h3>客製你的WATZ box</h3>
                    </div>
                    <div class="hide-choose-box">
                        <h4 class="step1">Step1 想要什麼包裝呢?</h4>
                        <ul class="watzbox-choose flex" id="">

                            <li class="img-watzbox imgWatzBox <?= $watzbox_style == 'watzbox1' ? 'active' : '' ?>" id="watzbox1">
                                <img class="transition" src="images/watzbox1-1.png" alt="">
                            </li>
                            <li class="img-watzbox imgWatzBox <?= $watzbox_style == 'watzbox2' ? 'active' : '' ?>" id="watzbox2">
                                <img class="transition" src="images/watzbox2-1.png" alt="">
                            </li>
                            <li class="img-watzbox imgWatzBox <?= $watzbox_style == 'watzbox3' ? 'active' : '' ?>" id="watzbox3">
                                <img class="transition" src="images/watzbox3-1.png" alt="">
                            </li>
                        </ul>
                        <!-- <h4>Step2 請加選雙襪子到您的包裝盒裡</h4> -->

                        <div class="boxChooseDetail flex" id="sockInBox">
                            <?php foreach ($_SESSION['cart'] as $i) :
                                if ($i['watzbox'] == 1) : ?>
                                    <li class="eachsock-list eachSocksList flex p_item" id="pbox<?= $i['sid'] ?>" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">

                                        <div class="add-box-frame">
                                            <div class="add-box flex moveToBox-btn">
                                                <p class="addBox">+</p>
                                                <p class="removeInBox">-</p>
                                            </div>
                                        </div>
                                        <a href="product-detail.php?sid=<?= $i['sid'] ?>" class="img-socks"><img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt=""></a>
                                        <div class="product-detail flex">
                                            <a href="product-detail.php?sid=<?= $i['sid'] ?>" class="sock-name flex">
                                                <h4><?= htmlentities($i['product_name']) ?></h4>
                                                <div>
                                                    <h6><?= $i['detail'] ?></h6>
                                                </div>
                                            </a>
                                            <div class="socks-amount-choose flex">
                                                <div class="quantity-choose flex">
                                                    <span class="minus">-</span>
                                                    <input class="quantity-input qty" type="text" value="1" />
                                                    <span class="plus">+</span>
                                                </div>
                                                <h4 class="sub-total"></h4>
                                                <span class="remove"></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="step2 flex" id="step2">
                            <img src="images/dotted-line.svg" alt="">
                            <h4>Step2 請加選雙襪子到您的包裝盒裡</h4>
                            <h5>Step2 請加選襪子到<br>您的包裝盒裡</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-product flex">
            <!-- <h3>單購WATZ的襪子</h3> -->
                <ul class="box-product-frame flex" id="sockOutBox">
                    <?php foreach ($_SESSION['cart'] as $i) :
                        if ($i['watzbox'] == 0) : ?>
                            <li class="eachsock-list eachSocksList flex p_item" id="pbox<?= $i['sid'] ?>" data-sid="<?= $i['sid'] ?>" data-price="<?= $i['price'] ?>" data-quantity="<?= $i['qty'] ?>">

                                <div class="add-box-frame">
                                    <div class="add-box flex moveToBox-btn">
                                        <p class="addBox">+</p>
                                        <p class="removeInBox">-</p>
                                    </div>
                                </div>
                                <a href="product-detail.php?sid=<?= $i['sid'] ?>" class="img-socks"><img src="images/product/<?= $i['img_ID'] ?>-1.jpg" alt=""></a>
                                <div class="product-detail flex">
                                    <a href="product-detail.php?sid=<?= $i['sid'] ?>" class="sock-name flex">
                                        <h4><?= htmlentities($i['product_name']) ?></h4>
                                        <div>
                                            <h6><?= $i['detail'] ?></h6>
                                        </div>
                                    </a>
                                    <div class="socks-amount-choose flex">
                                        <div class="quantity-choose flex">
                                            <span class="minus">-</span>
                                            <input class="quantity-input qty" type="text" value="1" />
                                            <span class="plus">+</span>
                                        </div>
                                        <h4 class="sub-total"></h4>
                                        <span class="remove"></span>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="block-right ">
            <div class="block-fixed flex">
                <div class="shipping-shoose flex">
                    <div class="shipping-shoose-frame flex">
                        <div class="ship-title flex">
                            <h3>寄送方式</h3>
                            <div class="error-frame flex">
                                <img class="error-icon flex" src="images/alert.svg">
                                <h6 class="flex"></h6>
                            </div>
                        </div>
                        <div class="shipping-btn flex">
                            <button class="button HomeShipBtn">宅配</button>
                            <button class="button conv-store" href="#">超商取貨</button>
                        </div>

                        <p class="noShipFee">只差60元即享1000元免運！</p>
                    </div>
                </div>
                <div class="total-price flex">
                    <h3>結帳金額</h3>
                    <div class="total-price-frame flex">

                        <div class="coupon flex">
                            <input class="couponInput" type="text" placeholder="輸入折扣代碼">
                            <button class="button couponBtn">兌換</button>
                        </div>
                        <div class="total-price-detail flex">
                            <ul>
                                <li class="flex">
                                    <p>商品總計</p>
                                    <p id="productPrice"></p>
                                </li>
                                <li class="flex">
                                    <p>運費</p>
                                    <p class="shipFee">0</p>
                                </li>
                                <li class="flex">
                                    <p>折扣</p>
                                    <p class="discount">0</p>
                                </li>
                                <div class="line"></div>
                                <li class="flex">
                                    <h4>結帳金額</h4>
                                    <h4 id="totalPrice">元</h4>
                                </li>
                            </ul>
                        </div>
                        <?php if (isset($_SESSION['member'])) : ?>
                            <button class="btn-pay" onclick="formCheck()">前往結帳</button>
                        <?php else : ?>
                            <button class="btn-pay" onclick="javascript:location.href='<?= WEB_ROOT ?>/member-login-signup.php'">請先登入會員</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/__html_footer.php' ?>

<?php include __DIR__ . '/__scripts.php' ?>

<script>
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


    $(".shipping-btn button").click(function() {
        $(this).toggleClass('active')
            .siblings().removeClass('active');

        if ($(".HomeShipBtn").hasClass('active')) {
            $('.shipFee').text('120');

        } else {
            $('.shipFee').text('0');

        }
        if ($(".conv-store").hasClass('active')) {
            $('.shipFee').text('60');

        } else {
            $('.shipFee').text('0');

        }

        prepareCartTable();
    })



    $(document).ready(function() {
        $(".box-watzbox-title").click(function() {
            $(".hide-choose-box").slideToggle()
            $('#open-btn').toggleClass('close');
            $('.step2').removeClass('show');
            $('.add-box').removeClass('show');
        });
    });


    //襪子選擇而退出選項//
    const imgWatzBox = $('.imgWatzBox');

    imgWatzBox.click(function() {
        const me = this;

        imgWatzBox.each(function() {
            if (this !== me) {
                $(this).removeClass('active');
            }
        });
        $(this).toggleClass('active');


        if ($(this).hasClass('active')) {
            $('.step2').addClass('show');
            $('.add-box').addClass('show');
            const watzbox_style = $(this).attr('id');

            const sendObj = {
                action: 'getWatzboxStyle',
                watzbox_style
            }
            $.get('cart-handle.php', sendObj, function(data) {
            }, 'json');

        } else {
            $('.step2').removeClass('show');
            $('.add-box').removeClass('show');
            const box_item = $('#sockInBox').find('.p_item');
            $('#sockOutBox').append(box_item);
            $(box_item).find(".removeInBox").css("display", "none");
            $(box_item).find(".addBox").css("display", "flex");

            for (i = 1; i <= box_item.length; i++) {
                const p_item = box_item.eq(i);
                const sid = p_item.attr('data-sid');

                const sendObj = {
                    action: 'moveOutOfBox',
                    sid: sid
                }
                $.get('cart-handle.php', sendObj, function(data) {
                }, 'json');
            }

            const sendObj2 = {
                action: 'removeWatzboxStyle'
            }

            $.get('cart-handle.php', sendObj2, function(data) {
            }, 'json');

        }

    });



    $('.moveToBox-btn').click(function() {
        const p_item = $(this).closest('.p_item');
        const sid = p_item.attr('data-sid');
        const qty = p_item.find('.qty').val();
        const ifInBox = $(this).closest('#sockInBox').length;
        if (ifInBox) {
            $('#sockOutBox').append(p_item);
            $(this).children(".removeInBox").css("display", "none");
            $(this).children(".addBox").css("display", "flex");

            const sendObj = {
                action: 'moveOutOfBox',
                sid: sid,
                qty: qty
            }
            $.get('cart-handle.php', sendObj, function(data) {
            }, 'json');

        } else {
            $('#sockInBox').append(p_item);
            $(this).children(".addBox").css("display", "none");
            $(this).children(".removeInBox").css("display", "flex");

            const sendObj = {
                action: 'moveIntoBox',
                sid: sid,
                qty: qty
            }
            $.get('cart-handle.php', sendObj, function(data) {
            }, 'json');
        }
    });


    // <!-- remove jumpout notice -->

    $('.remove').click(function() {
        let p_item = $(this).closest('.p_item');
        p_item.addClass("noticed");
        $(".notice").addClass("active");
    })

    function keepitem() {
        $('.p_item.noticed').removeClass('noticed');
        $(".notice").removeClass("active");
    }

    //coupon

    $('.couponBtn').click(function() {
        if ($('.couponInput').val() == 'watz60') {
            $('.discount').html('-60');
        } else if ($('.couponInput').val() == 'watz40') {
            $('.discount').html('-40');
        } else {
            $('.discount').html('0');
        }
        prepareCartTable();
    });

    // php
    const dallorCommas = function(n) {
        return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    function prepareCartTable() {
        $p_items = $('.p_item');
        let total = 0;

        let shipFee = $('.shipFee').text();
        let discount = $('.discount').text();
        let totalPrice = total + parseInt(shipFee) + parseInt(discount);
        $p_items.each(function() {
            const sid = $(this).attr('data-sid');
            const price = $(this).attr('data-price');
            const quantity = $(this).attr('data-quantity');


            $(this).find('.price').text('NT $' + dallorCommas(price));
            $(this).find('.qty').val(quantity);
            $(this).find('.sub-total').text('$ ' + dallorCommas(quantity * price));
            total += quantity * price;
            $('#productPrice').text('NT $' + dallorCommas(total));
        })


        if (total < 1000) {
            $('.noShipFee').text(`只差${ 1000 - total}元即享1000元免運！`);
            if ($(".conv-store").hasClass('active')) {
                $('.shipFee').text('60');
            } else if ($(".HomeShipBtn").hasClass('active')) {
                $('.shipFee').text('120');
            } else {
                $('.shipFee').text('0');
            }
            shipFee = $('.shipFee').text();
        } else if (total >= 1000) {
            $('.noShipFee').text(`消費金額已免運！`);
            $('.shipFee').text('0');
            shipFee = $('.shipFee').text();
        }
        shipFee = $('.shipFee').text();
        discount = $('.discount').text();
        totalPrice = total + parseInt(shipFee) + parseInt(discount);
        $('#totalPrice').text('NT $' + dallorCommas(totalPrice));

    }

    prepareCartTable();

    const qty_sel = $('.qty');
    qty_sel.on('change', function() {
        const p_item = $(this).closest('.p_item');
        const sid = p_item.attr('data-sid');
        const sendObj = {
            action: 'add',
            sid: sid,
            qty: $(this).val()
        }
        $.get('cart-handle.php', sendObj, function(data) {
            setCartCount(data); // navbar
            p_item.attr('data-quantity', sendObj.qty);
            prepareCartTable();
        }, 'json');

    });

    $('.remove-item').on('click', function() {
        const p_item = $('.p_item.noticed');
        const sid = p_item.attr('data-sid');
        const sendObj = {
            action: 'remove',
            sid: sid
        }
        $.get('cart-handle.php', sendObj, function(data) {
            setCartCount(data); // navbar
            p_item.remove();
            prepareCartTable();
        }, 'json');
        $(".notice").removeClass("active");
    });

    function formCheck() {
        let isPass = true;
        const shipError = $('.ship-title').children('.error-frame');
        const shippingBtn = $('.shipping-btn');

        $(shippingBtn).on("click", function() {
            shipError.children('img').css("display", "none");
            shipError.children('h6').html('');
        })


        if (!(shippingBtn).children('.button').hasClass('active')) {
            isPass = false;
            shipError.children('img').css("display", "block");
            shipError.children('h6').html('尚未選擇運送方式');
        }
        if (isPass) {
            location.href = 'cart-payment2.php';
        }
        return false;

    };

</script>

<?php require __DIR__ . '/__html_foot.php' ?>