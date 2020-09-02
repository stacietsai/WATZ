<?php require __DIR__ . '/__connect_db.php';
$pageName = 'contact';  // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>

<title>WATZ - 常見問題</title>
<style>
    body {
        width: 100vw;
        background: url(images/BG4.svg);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .block-wrapper {
        width: 1200px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .block-wrapper {
        width: 800px;
        margin-top: 160px;
    }

    /* -----FAQ-block----- */


    .b-bt-blue h3 {
        color: #03588C;
    }

    .b-bt-blue {
        display: inline-block;
        padding: 5px;
        border-bottom: 4px solid #FF9685;
    }

    .faq-wrapper {
        width: 90vw;
    }

    .mob-show {
        display: none;
    }

    @media screen and (max-width: 992px) {
        .block {
            width: 70vw;
        }

        .block-wrapper {
            width: 70vw;
            align-items: center;
        }
        .container{
            justify-content: space-between;
        }
        .b-bt-blue {
            border-bottom: 0px;
            padding: 10px 15px;
            border: 2px solid #F2DE79;
            border-radius: 2px;
        }

        .b-bt-blue h3 {
            font-size: 16px;
        }

        .faq-wrapper {
            width: 70vw;
        }
    }

    @media screen and (max-width:576px) {
        .block-wrapper {
            margin-top: 90px;
        }

        .faq-wrapper {
            width: 70vw;
            justify-content: space-evenly;
        }

        .mob-show {
            display: unset;
        }

        .b-bt-blue h3 {
            font-weight: 500;
        }

        .b-bt-blue.active {
            background-color: #F2DE79;
        }

    }

    /* -----FAQ-questions項目----- */
    .qa-title-list {
        justify-content: space-evenly;
    }

    .qa-item {
        background-color: #F2DE79;
        border-radius: 2px;
        color: #404040;
        padding: 10px 35px;
        margin: 25px 0;
        cursor: pointer;

    }

    .qa-item h5 {
        cursor: pointer;
    }

    @media screen and (max-width: 992px) {
        .qa-title-list {
            justify-content: space-evenly;

        }

        .qa-item {
            background-color: unset;
            padding: 5px 5px;
            margin: 10px 5px;
        }

        .qa-item h5 {
            font-size: 16px;
        }

        .qa-item.active {
            border-bottom: 4px solid #FF9685;
        }
    }

    @media screen and (max-width:576px) {
        .qa-title-list {
            width: 80vw;
            justify-content: flex-start;
            overflow: auto;
            white-space: nowrap;
        }

        .qa-item {
            margin-right: 20px;
        }

        .qa-title-list::-webkit-scrollbar-track-piece {
            background-color: transparent;
        }

        .qa-title-list::-webkit-scrollbar {
            background-color: transparent;
        }

        .qa-title-list::-webkit-scrollbar-thumb {
            background-color: transparent;
        }

    }


    /* -----block1:member----- */

    .block {
        width: 800px;
        background: #fff;
        border-radius: 30px;
        flex-direction: column;
        align-items: center;
        margin: 25px 0;
    }

    /* -----title----- */
    .qa-title-wrapper {
        width: 700px;
        margin-top: 50px;
        margin-bottom: 25px;
    }

    .qa-title-wrapper h3 {
        color: #03588C;
    }

    @media screen and (max-width: 992px) {
        .block {
            width: 70vw;
        }

        .qa-title-wrapper {
            width: 60vw;
            margin-top: 25px;
            margin-bottom: 0px;
        }


    }

    @media screen and (max-width: 768px) {
        .block {
            width: 90vw;
        }

        .block-wrapper {
            width: 90vw;
            align-items: center;
        }

        .qa-title-wrapper {
            width: 75vw;

        }
    }

    @media screen and (max-width:576px) {
        .block {
            border-radius: 15px;
        }

        .mob-none {
            display: none;
        }
    }

    /* -----content----- */
    .block ul {
        margin-bottom: 25px;
    }

    .block ul li {
        width: 650px;
        flex-direction: column;
        justify-content: space-around;
        border-bottom: 2px solid #E2E2E2;
        margin-bottom: 25px;
        /* border: 1px solid green; */
    }

    /* -----最後一個QA的底線取消----- */
    .block ul .line-none {
        border-bottom: 0px;
    }

    @media screen and (max-width:992px) {
        .block ul {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .block ul li {
            width: 60vw;
            margin-top: 15px;
            margin-bottom: 15px;
        }
    }

    @media screen and (max-width:768px) {
        .block ul {
            width: 75vw;
            margin-bottom: 0px;
        }

        .block ul li {
            width: 75vw;
        }
    }

    .quest {
        width: 650px;
        justify-content: space-between;
        margin-bottom: 15px;
        /* border: 1px solid red; */
        cursor: pointer;

    }

    .quest h5 {
        color: #0388A6;
        cursor: pointer;

    }

    .quest img {
        width: 40px;
        height: 16px;
        transition: .5s;
        cursor: pointer;

    }

    .close {
        transform: rotate(180deg);
    }

    .ans {
        width: 600px;
        margin-bottom: 15px;
        /* border: 1px solid red; */
    }

    .ans h6 {
        font-weight: 400;
    }

    h6 span {
        background: #F2DE79;
    }

    @media screen and (max-width: 992px) {
        .quest {
            width: 60vw;
        }

        .quest h5 {
            font-size: 14px;
        }

        .ans {
            width: 52vw;
        }

        .ans h6 {
            line-height: 1.5rem;
        }
    }

    @media screen and (max-width:768px) {
        .quest {
            width: 75vw;
        }

        .ans {
            width: 65vw;
        }
    }

    .b-bt-blue {
        align-self: flex-start;
    }

    .block-bottom {
        width: 600px;
        background: #F2DE79;
        border-radius: 30px;
        flex-direction: column;
        align-items: center;
        margin: 25px 100px;
    }

    @media screen and (max-width:992px) {
        .block-bottom {
            width: 70vw;
        }
    }

    @media screen and (max-width:768px) {
        .block-bottom {
            width: 90vw;
        }
    }

    @media screen and (max-width:576px) {
        .block-bottom {
            border-radius: 15px;
        }
    }

    .block-bottom ul {
        margin-top: 50px;
        /* align-items: center; */
    }

    .block-bottom ul li {
        max-width: 500px;
        justify-content: flex-end;
        margin-bottom: 25px;
    }

    .btn-blue {
        width: 200px;
        margin-top: 25px;
        margin-bottom: 25px;
        justify-content: center;
        align-items: center;
    }

    .block-bottom ul li input {
        width: 350px;
        height: 30px;
        margin-left: 20px;
        border-radius: 2px;
        outline: none;
        border: none;
    }

    .block-bottom ul li textarea {
        align-self: flex-start;
        width: 350px;
        height: 150px;
        margin-left: 20px;
        border-radius: 2px;
        outline: none;
        border: none;
        resize: none;
    }

    .block-bottom ul li textarea::-webkit-scrollbar-track-piece {
        background-color: #F8F4EB;
    }

    .block-bottom ul li textarea::-webkit-scrollbar {
        width: 5px;
        height: 5px;
    }

    .block-bottom ul li textarea::-webkit-scrollbar-thumb {
        background-color: #E2E2E2;
        background-clip: padding-box;
        min-height: 28px;
        border-radius: 20px;
    }

    .block-bottom .p-reply {
        align-self: flex-start;
    }

    @media screen and (max-width:992px) {
        .block-bottom ul li {
            flex-direction: column;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .block-bottom ul li input {
            width: 50vw;
            height: 40px;
            margin-left: 0;
            margin-top: 10px;
        }

        .block-bottom ul li textarea {
            width: 50vw;
            height: 90px;
            margin-left: 0;
            margin-top: 10px;
        }
    }

    @media screen and (max-width:768px) {
        .block-bottom ul li input {
            width: 65vw;
            margin-left: 0;
            margin-top: 10px;
        }

        .block-bottom ul li textarea {
            width: 65vw;
            margin-left: 0;
            margin-top: 10px;
        }
    }

    footer {
        z-index: 1;
    }

    .notice {
            position: fixed;
            width: 100vw;
            height: 100vh;
            visibility: hidden;
        }
        
        .notice-block {
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
            margin-bottom: 10px;
        }
        
        .notice-top img {
            height: 40px;
        }
        
        .notice-bottom h3 {
            color: white;
            white-space: nowrap;
        }
        
        .notice.active {
            visibility: visible;
            z-index: 20;
        }
        
        .notice.active .notice-block {
            opacity: 1;
        }
</style>
<!-- jumpout notice -->
<div class="notice">
        <div class="notice-bg"></div>
        <div class="notice-block flex">
            <div class="notice-top">
                <img src="images/icon-success.svg " alt=" ">
            </div>
            <div class="notice-bottom">
                <h3>感謝您的提問</h3>
                <h3>我們將盡快處理</h3>
            </div>
        </div>
    </div>
<div class="container flex">

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    
    <div class="block-wrapper flex">
        <div class="faq-wrapper flex">
            <div class="b-bt-blue mob-faq ">
                <h3>常見問題集</h3>
            </div>
            <div class="b-bt-blue mob-contact mob-show">
                <h3>聯絡我們</h3>
            </div>
        </div>
        <ul class="qa-title-list flex">
            <li class="qa-item qa-item-A">
                <h5>會員須知</h5>
            </li>
            <li class="qa-item qa-item-B">
                <h5>購物 / 配送</h5>
            </li>
            <li class="qa-item qa-item-C">
                <h5>退換貨 / 退款</h5>
            </li>
            <li class="qa-item qa-item-D">
                <h5>其他常見問題</h5>
            </li>
        </ul>
        <!-- block1:member -->
        <div class="block block1 flex">
            <div class="qa-title-wrapper mob-none">
                <h3>會員須知</h3>
            </div>
            <ul>
                <li class="flex">
                    <div id="click" class="quest jq-quest flex">
                        <h5>如何成為會員？</h5><img id="arrow" src="images/arrow-down.svg" alt="">
                    </div>
                    <div id="add" class="ans jq-ans">
                        <h6>首次購買請先以個人Email註冊帳號，確認後即寄出驗證信，驗證無誤後即享有一張9折優惠券！</h6>
                    </div>
                </li>
                <li class="flex">
                    <div class="quest jq-quest flex">
                        <h5>未加入會員可以購物嗎？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>可以！但結帳前請先註冊會員。若商品加入購物車但未完成結帳前，並無保留商品庫存功能。</h6>
                    </div>
                </li>
                <li class="line-none flex">
                    <div class="quest jq-quest flex">
                        <h5>忘記密碼怎麼辦？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>若您忘記密碼，請至 「會員登入」點選「忘記密碼」， 輸入會員帳號及驗證碼，系統即會自動將重製的新密碼寄至您Email信箱提供您登入使用。</h6>
                    </div>
                </li>
            </ul>
        </div>
        <!-- block2:shopping deliver -->
        <div class="block block2 flex">
            <div class="qa-title-wrapper mob-none">
                <h3>購物 / 配送</h3>
            </div>
            <ul>
                <li class="flex">
                    <div class="quest jq-quest flex">
                        <h5>如何確認訂單有沒有成立呢？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>訂單成立後系統會送通知信件至您留下的會員信箱，也可於官網－會員登入－訂單查詢內查看喔！
                        </h6>
                    </div>
                </li>
                <li class="flex">
                    <div class="quest jq-quest flex">
                        <h5>折價卷使用說明</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>每筆訂單限抵用一張折價券，若您同時擁有2張以上折價券，可於結帳時擇一使用。</h6>
                    </div>
                </li>
                <li class="flex">
                    <div class="quest jq-quest flex">
                        <h5>包裹何時會出貨呢？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>每天14:00前的訂單會安排當天出貨，宅配大約1-2天送到(週日不配送)超商大概2-3天？</h6>
                    </div>
                </li>
                <li class="flex">
                    <div class="quest jq-quest flex">
                        <h5>信用卡交易失敗怎麼辦？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>訂單因交易失敗導致訂單未成立成功，交易失敗的訂單無法再恢復訂單狀態重新付款。若您還需要此訂單內商品，請您重新訂購。
                        </h6>
                    </div>
                </li>
                <li class="line-none flex">
                    <div class="quest jq-quest flex">
                        <h5>要怎麼DIY自己的襪子？多久會收到呢？</h5><img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>WATZ提供三種樣版、一種自製襪供您挑選一雙屬於自己獨一無二的襪子。樣板包括：WATZ
                            logo款、條紋、點點，您能夠自由搭配選擇底色及樣式的配色。自製款有十種圖樣，您一樣能自由選擇底色及圖樣的配色。
                        </h6>
                    </div>
                </li>
            </ul>

        </div>
        <!-- block3:return purchase -->
        <div class="block block3 flex">
            <div class="qa-title-wrapper mob-none">
                <h3>退換貨 / 退款</h3>
            </div>
            <ul>
                <li>
                    <div class="quest jq-quest flex">
                        <h5>商品可以換貨嗎？</h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>我們提供收到包裹後七天鑑賞期內一次退貨服務，沒有換貨服務喔！</h6>
                    </div>
                </li>
                <li>
                    <div class="quest jq-quest flex">
                        <h5>如何申請退貨？ </h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>收到包裹後隔天於官網會員登入－訂單查詢－該筆訂單會顯示【我要退貨】選項。可【部分】勾選不合適商品或【整筆】退貨辦理得到超商退貨代碼。退貨時請留意組合優惠商品或是原訂單免運門檻資格。
                        </h6>
                    </div>
                </li>
                <li>
                    <div class="quest jq-quest flex">
                        <h5>退貨需要運費嗎？</h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>七天鑑賞期內WATZ免費提供一次退貨服務。使用退貨申辦提供之退貨代碼辦理無須付費。</h6>
                    </div>
                </li>
                <li>
                    <div class="quest jq-quest flex">
                        <h5>退貨款項何時會歸還呢？</h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>退貨包裹至超商辦理寄出後約7-10個工作天會退回WATZ，待收到後將盡快完成退款作業並以MAIL通知。
                        </h6>
                    </div>
                </li>
                <li class="line-none flex">
                    <div class="quest jq-quest flex">
                        <h5>退貨金額如何退回？</h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>信用卡付款→直接線上申請退刷金額，因信用卡結帳日不同的關係，若當期信用卡帳單未查看到，請您留意下期信用卡帳單喔！
                        </h6>
                    </div>
                </li>
            </ul>
        </div>
        <!-- block4:other FAQ -->
        <div class="block block4 flex">
            <div class="qa-title-wrapper mob-none">
                <h3>其他常見問題</h3>
            </div>

            <ul>
                <li class="line-none flex">
                    <div class="quest jq-quest flex">
                        <h5>若收到異常商品怎麼辦？</h5>
                        <img src="images/arrow-down.svg" alt="">
                    </div>
                    <div class="ans jq-ans">
                        <h6>若商品有異常疑慮，
                            請您至下方聯絡我欄位填寫表單，或是私訊至粉絲團提供商品實際照片，記得附上您的<span>1/手機號碼 2/訂單編號
                                3/會員帳號</span>，待收到後將會盡快請相關部門確認並且回覆。
                        </h6>
                    </div>
                </li>
            </ul>
        </div>
        <div class="b-bt-blue contact">
            <h3>聯絡我們</h3>
        </div>
        <form class="block-bottom flex" action="">
            <ul>
                <li class="flex">
                    <p>姓名</p><input type="text">
                </li>
                <li class="flex">
                    <p>電話</p><input type="text">
                </li>
                <li class="flex">
                    <p>E-mail</p><input type="text">
                </li>
                <li class="flex">
                    <p>主旨</p><input type="text">
                </li>
                <li class="flex">
                    <p class="p-reply">回覆內容</p><textarea placeholder="(文字限長度為255字)"></textarea>
            </ul>
            <div class="btn-blue flex">送出</div>
        </form>
    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>
<script>
    if (jQuery(window).width() > 576) {
        $(document).ready(function() {
            $(".jq-ans").hide();
            $(".jq-quest").click(function() {
                $(this).siblings(".jq-ans").slideToggle()
                $(this).find('img').toggleClass('close');
            })
        });
        $(".qa-item-A").click(function() {
            let target = $(".block1").offset().top;
            $("html").animate({
                scrollTop: target
            })
        });
        $(".qa-item-B").click(function() {
            let target = $(".block2").offset().top;
            $("html").animate({
                scrollTop: target
            })
        });
        $(".qa-item-C").click(function() {
            let target = $(".block3").offset().top;
            $("html").animate({
                scrollTop: target
            })
        });
        $(".qa-item-D").click(function() {
            let target = $(".block4").offset().top;
            $("html").animate({
                scrollTop: target
            })
        });
    } else {
        $(document).ready(function() {
            $(".block1").show()
                .siblings(".block").hide();
            $(".block-bottom").hide();
            $(".contact").hide();
            $(".jq-ans").hide();
            $(".qa-item-A").addClass("active");
            $(".mob-faq").addClass("active");
            $(".jq-quest").click(function() {
                var me = this; // title bar
                $jq_ans = $(this).closest('ul').find(".jq-ans");
                $jq_ans.each(function() {
                    if (me !== $(this).prev()[0])
                        if ($(this).css('display') != 'none') {
                            $(this).slideUp();
                            $(this).prev().find('img').toggleClass('close');
                        }
                });

                $(this).siblings(".jq-ans").slideToggle()
                $(this).find('img').toggleClass('close');
            })

        });

        $(".qa-item-A").click(function() {
            $(".block1").show()
                .siblings(".block").hide()
            $(this).addClass("active").siblings("li").removeClass("active")
        });
        $(".qa-item-B").click(function() {
            $(".block2").show()
                .siblings(".block").hide();
            $(this).addClass("active").siblings("li").removeClass("active");
        });
        $(".qa-item-C").click(function() {
            $(".block3").show()
                .siblings(".block").hide();
            $(this).addClass("active").siblings("li").removeClass("active");
        });
        $(".qa-item-D").click(function() {
            $(".block4").show()
                .siblings(".block").hide();
            $(this).addClass("active").siblings("li").removeClass("active");
        });
        $(".mob-contact").click(function() {
            $(".block").hide()
            $(".contact").hide()
            $(".qa-title-list").hide()
            $(".block-bottom").show()
            $(this).addClass("active").siblings("div").removeClass("active")
        });
        $(".mob-faq").click(function() {
            $(".qa-title-list").show()
            $(".block1").show()
                .siblings(".block").hide();
            $(".contact").hide()
            $(".block-bottom").hide()
            $(this).addClass("active").siblings("div").removeClass("active")
        });
    }

    $('.btn-blue').click(function() {
        $(".notice").addClass("active");
        setTimeout(function() {
            $(".notice").removeClass("active");
        }, 800);
    });
</script>

<?php require __DIR__ . '/__html_foot.php' ?>