<?php require __DIR__ . '/__connect_db.php';
$pageName = 'aboutWATZ';
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<title>WATZ - 關於WATZ</title>
<style>

    .container {
        background: url(images/about-rain.svg) repeat-y;
        background-size: 300px;
        align-items: center;
    }

    .block1 {
        height: 600vh;
        width: 100vw;
        position: relative;
    }

    .block1-fixed {
        justify-content: center;
        width: 100%;
    }

    .position-sticky {
        position: sticky;
        top: 140px;
    }

    @media screen and (max-width: 992px) {
        .container {
            background-image: unset;
        }

        .block1 {
            margin-top: 0;
            padding-bottom: 70px;
        }

        .block1-fixed {
            flex-direction: column-reverse;
        }

        .position-sticky {
            top: 70px;
        }
    }

    .block-left {
        height: 90%;
        width: 55vw;
        align-items: flex-end;
        flex-direction: column;
    }

    .block-left li {
        position: relative;
        width: 45vw;
        height: 20%;
        margin: 5px 0;
    }

    .block-left .box-process {
        align-items: center;
    }

    .block-left .process2 {
        margin-left: 20%;
    }

    .block-left .process3 {
        margin-left: 8%;
    }

    .block-left .process4 {
        margin-left: 30%;
    }

    .block-left .process5 {
        margin-left: 4%;
    }

    .block-left li .box-process-photo {
        width: 14vh;
        height: 14vh;
        position: relative;
        align-items: center;
        justify-content: center;
    }

    .process-article {
        padding-left: 10px;
        max-width: 350px;
    }

    .process-article h3 {
        color: #E1DDDD;
        margin-bottom: 2px;
    }

    .process-article h4 {
        font-weight: 400;
        color: #E1DDDD;
    }

    .box-process-photo .img-about-select {
        width: calc(12vh + 20px);
        position: absolute;
        opacity: 0;
    }

    .box-process.active .img-about-select {
        opacity: 1;
        transform: rotate(60deg);
    }

    .box-process.active .img-process {
        opacity: 1;
    }

    .box-process.active h3 {
        color: #404040;
    }

    .box-process.active h4 {
        color: #404040;
    }

    .img-process {
        width: 12vh;
        height: 12vh;
        border-radius: 50%;
        overflow: hidden;
        opacity: .2;
    }

    .img-process img {
        width: 100%;
        object-fit: cover;
    }

    @media screen and (max-width: 992px) {
        .block-left {
            flex-direction: row;
            flex-wrap: wrap;
            width: 100vw;
            justify-content: space-between;
            padding: 0 5vw;
        }

        .block-left .box-process {
            margin-left: 0;
        }

        .block-left .process-article {
            width: 40vw;
        }

        .block-left li h4 {
            font-size: 1rem;
            width: 100%;
        }
    }

    @media screen and (max-width: 576px) {
        .block1 {
            align-items: center;
            justify-content: center;
        }

        .block-left {
            width: 90vw;
            min-height: 80vh;
            align-self: center;
        }

        .block-left li {
            width: 100%;
        }

        .block-left li h4 {
            font-size: .9rem;
        }

        .block-left .process-article {
            width: 70vw;
        }

        .box-process.active .img-about-select {
            display: none;
        }

        .img-process {
            border-radius: 2px;
        }

        .process-article {
            flex-direction: column;
        }
    }

    /* block-right */

    .block-right {
        width: 45vw;
        align-items: flex-start;
        flex-direction: column;
    }

    .block-right .box-logo {
        height: 110px;
        margin-bottom: 30px;
        align-self: center;
    }

    .box-logo img {
        height: 100%;
        margin: 0 10px;
    }

    .box-logo .img-logo-a {
        --animate-delay: .5s;
    }

    .box-logo .img-logo-t {
        --animate-delay: 1s;
    }

    .box-logo .img-logo-z {
        --animate-delay: 1.5s;
    }

    .block-right ul {
        flex-direction: column;
    }

    .block-right li {
        width: 45vw;
        align-items: center;
        height: 12vh;
    }

    .block-right .line,
    .block2 .line {
        background: #E1DDDD;
        height: .5px;
        transform: rotate(-60deg);
    }

    .line.line1 {
        width: 80px;
    }

    .line.line2 {
        width: 60px;
        margin-left: 40%;
    }

    .line.line3 {
        width: 40px;
        margin-left: 10%;
    }

    .line.line4 {
        width: 100px;
        margin-left: 50%;
    }

    .line.line5 {
        width: 50px;
        margin-left: 20%;
    }

    .block-right h3 {
        color: #E1DDDD;
    }

    .block-right li.active .line {
        background: #404040;
        width: 120px;
    }

    .block-right li.active h3 {
        color: #404040;
    }

    @media screen and (max-width: 1200px) {
        .box-logo img {
            height: 80%;
        }
    }

    @media screen and (max-width: 996px) {
        .block-right {
            width: 100vw;
            padding: 0 5vw;
        }

        .block-right .box-logo {
            align-self: flex-end;
            margin: 0;
        }

        .block-right ul {
            width: 100vw;
            flex-direction: row;
            margin: 0;
        }

        .block-right li {
            width: 18vw;
        }

        .block-right li .line {
            width: 40px;
            margin-left: 0;
        }

        .block-right li.active .line {
            background: #404040;
            width: 60px;
        }
    }

    .picture {
        background: url(images/cheetahfriends-03.png) right no-repeat;
        height: 200px;
        width: 60vw;
        background-attachment: fixed;
        background-size: contain;
        align-self: flex-end;
        margin: 5vh 5vw 5vh 0;
    }

    @media screen and (max-width: 992px) {
        .picture {
            height: 150px;
            width: 80vw;
            align-self: center;
            margin: 5vh 0;
            background-size: contain;
        }
    }

    /* block2 */

    .block2 {
        width: 50vw;
        min-height: calc(100vh - 160px);
        flex-direction: column;
        justify-content: center;
        margin: 10vh 0;
        opacity: 0;
    }

    .block2 .line-aboutWATZ {
        background: #404040;
        width: 200px;
    }

    .article {
        margin-left: 10vw;
    }

    .block2 h3 {
        color: #0388A6;
        margin: 30px 0;
        line-height: 50px;
    }

    .block2 h4 {
        font-weight: 500;
        line-height: 35px;
    }

    @media screen and (max-width: 992px) {
        .block2 {
            width: 70vw;
            /* align-items: center; */
        }

        .block2 .line-aboutWATZ {
            width: 100px;
        }

        .article {
            margin-left: 5vw;
        }
    }

    @media screen and (max-width: 576px) {
        .block2 {
            width: 90vw;
            margin: 40px 0 0 0;
            min-height: calc(100vh - 200px);
        }

        .article {
            margin: 0 5vw;
        }

        .block2 h3 {
            line-height: 25px;
        }

        .block2 h4 {
            line-height: 20px;
        }
    }
</style>
<div class="container flex">
    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>
    <div class="block1">
        <div class="block1-fixed flex position-sticky">
            <ul class="block-left flex animate__animated animate__slideInLeft animate__delay-2s">
                <li class="">
                    <div class="process1 box-process flex active" id="process1">
                        <div class="box-process-photo flex">
                            <img class="img-about-select transition" src="images/about-select.svg" alt="">
                            <div class="img-process transition">
                                <img src="images/process1.jpg" alt="">
                            </div>
                        </div>
                        <div class="process-article flex">
                            <h3 class="mobile-show transition">台灣製造</h3>
                            <h4 class="transition">『社頭』一直以來是台灣最強揚名世界的棉襪產地，WATZ生產於在地經營60年老字號工廠。</h4>
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="process2 box-process flex" id="process2">
                        <div class="box-process-photo flex">
                            <img class="img-about-select transition" src="images/about-select.svg" alt="">
                            <div class="img-process transition">
                                <img src="images/process2.jpg" alt="">
                            </div>
                        </div>
                        <div class="process-article flex">
                            <h3 class="web-none transition">織法</h3>
                            <h4 class="transition">精細裁縫，不會產生足部的壓迫感，均勻的彈力編織，防滑且不易鬆脫。</h4>
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="process3 box-process flex" id="process3">
                        <div class="box-process-photo flex">
                            <img class="img-about-select transition" src="images/about-select.svg" alt="">
                            <div class="img-process transition">
                                <img src="images/process3.jpg" alt="">
                            </div>
                        </div>
                        <div class="process-article flex">
                            <h3 class="web-none transition">無毒</h3>
                            <h4 class="transition">經過檢驗的紗線，不含偶氮染料，水洗不退色，歐盟OEKO-TEX無毒認證。</h4>
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="process4 box-process flex" id="process4">
                        <div class="box-process-photo flex">
                            <img class="img-about-select transition" src="images/about-select.svg" alt="">
                            <div class="img-process transition">
                                <img src="images/process4.jpg" alt="">
                            </div>
                        </div>
                        <div class="process-article flex">
                            <h3 class="web-none transition">質感</h3>
                            <h4 class="transition">堅持使用有口碑的台灣機台製作，製作襪子的過程中，提升襪子品質。</h4>
                        </div>
                    </div>
                </li>
                <li class="">
                    <div class="process5 box-process flex" id="process5">
                        <div class="box-process-photo flex">
                            <img class="img-about-select transition" src="images/about-select.svg" alt="">
                            <div class="img-process transition">
                                <img src="images/process5.jpg" alt="">
                            </div>
                        </div>
                        <div class="process-article flex">
                            <h3 class="web-none transition">環保</h3>
                            <h4 class="transition">所有產品皆使用天然及可回收材質，不過度包裝。</h4>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="block-right flex mobile-none">
                <div class="box-logo flex">
                    <img class="animate__animated animate__bounceIn img-logo-w" src="images/logo-w.svg" alt="">
                    <img class="animate__animated animate__bounceIn animate__delay-1s img-logo-a" src="images/logo-a.svg" alt="">
                    <img class="animate__animated animate__bounceIn animate__delay-1s img-logo-t" src="images/logo-t.svg" alt="">
                    <img class="animate__animated animate__bounceIn animate__delay-1s img-logo-z" src="images/logo-z.svg" alt="">
                </div>
                <ul class="animate__animated animate__slideInRight animate__delay-2s flex">
                    <li class="flex active" id="processText1">
                        <div class="line line1 transition"></div>
                        <h3 class="transition">台灣製造</h3>
                    </li>
                    <li class="flex" id="processText2">
                        <div class="line line2 transition"></div>
                        <h3 class="transition">織法</h3>
                    </li>
                    <li class="flex" id="processText3">
                        <div class="line line3 transition"></div>
                        <h3 class="transition">無毒</h3>
                    </li>
                    <li class="flex" id="processText4">
                        <div class="line line4 transition"></div>
                        <h3 class="transition">質感</h3>
                    </li>
                    <li class="flex" id="processText5">
                        <div class="line line5 transition"></div>
                        <h3 class="transition">環保</h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="picture mobile-none" id="picture"></div>
    <div class="block2 flex" id="block2">
        <div class="title flex">
            <div class="line line-aboutWATZ"></div>
            <h2>關於WATZ</h2>
        </div>
        <article class="article">
            <h3>不管你擁有的是什麼樣的宇宙觀，<br> 對生活上的小細節用心，
                <br> 就能把以自己為中心的世界活得更寬闊。
                <br>
            </h3>
            <h4>WATZ創立於2019年，<br> 一群逛襪子會逛到少女心噴發的女子們。
                <br><br> 走在街道上，什麼樣的單品最容易讓人眼睛為之一亮？

                <br> 「我想．．．是襪子吧？」我說。
                <br><br> 身處在快時尚的年代，形形色色的人們幾乎都穿上了襪子，然而，它卻往往都被單調地打發。襪子是穿搭中最為人所忽略的單品。所以我想著，穿上一雙精心搭配的襪子吧！於此同時，所有的穿搭才能真正被賦予生命。

                <br><br> 在這五花八門的人群中，WATZ邀請你穿出自己的細膩之處，活出專屬於你的小宇宙。
            </h4>
        </article>
    </div>
    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>
<script>
    if ($(window).width() < 576) {
        $("ul.block-left").removeClass("animate__animated");
    }
    $(window).scroll(function() {
        let scrollTop = $(this).scrollTop();
        let picture = $("#picture").offset().top;
        if (scrollTop < vh) {
            $("#process1").addClass("active");
            $("#processText1").addClass("active");
        } else {
            $("#process1").removeClass("active");
            $("#processText1").removeClass("active");
        }

        if (scrollTop > vh && scrollTop < 2 * vh) {
            $("#process2").addClass("active");
            $("#processText2").addClass("active");
        } else {
            $("#process2").removeClass("active");
            $("#processText2").removeClass("active");
        }

        if (scrollTop > 2 * vh && scrollTop < 3 * vh) {
            $("#process3").addClass("active");
            $("#processText3").addClass("active");
        } else {
            $("#process3").removeClass("active");
            $("#processText3").removeClass("active");
        }

        if (scrollTop > 3 * vh && scrollTop < 4 * vh) {
            $("#process4").addClass("active");
            $("#processText4").addClass("active");
        } else {
            $("#process4").removeClass("active");
            $("#processText4").removeClass("active");
        }

        if (scrollTop > 4 * vh && scrollTop < 5 * vh) {
            $("#process5").addClass("active");
            $("#processText5").addClass("active");
        } else {
            $("#process5").removeClass("active");
            $("#processText5").removeClass("active");
        }
        if (scrollTop > picture - 200) {
            $("#block2").css("opacity", "1").addClass("animate__animated animate__fadeIn");
        }
    })
</script>
<?php require __DIR__ . '/__html_foot.php' ?>