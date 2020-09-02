<?php require __DIR__ . '/__connect_db.php';
$pageName = 'project';  // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>

<!-- font-family: 'Josefin Sans', sans-serif; -->
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

<title>WATZ - 芒果派對</title>
<style>
    .container {
        width: 100vw;
        min-height: 100vh;
        user-select: none;
        overflow-x: hidden;
    }

    .bg-left,
    .bg-right {
        width: calc(100vw / 2);
        height: 100vh;
        position: relative;
        z-index: -1;
    }

    .absolute {
        position: absolute;
    }

    .bg-blue,
    .bg-red {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-dot1 {
        width: 180px;
        top: 0;
        left: 80px;
        mix-blend-mode: multiply;
    }

    .img-text {
        width: 60px;
        top: 160px;
        left: 0;
        position: fixed;
        z-index: 1;
    }

    .img-pineapple {
        width: 460px;
        bottom: 0;
        left: -50px;
        mix-blend-mode: multiply;
    }

    .img-pineapple2,
    .img-orangeline2,
    .img-pinkpaint2 {
        display: none;
    }

    .img-whiteline {
        width: 420px;
        top: 0;
        right: 0;
        z-index: 1;
    }

    .img-orangeline {
        width: 260px;
        top: -60px;
        right: -60px;
        mix-blend-mode: multiply;
    }

    .img-pinkpaint {
        width: 600px;
        top: 620px;
        right: -250px;
    }

    .wrapper {
        width: 1200px;
        min-height: 100vh;
        justify-content: space-between;
        padding: 120px 0;
        /* border: 1px solid red; */
        margin: 0 auto;
    }

    .pointer {
        cursor: pointer;
    }

    .btn-top {
        z-index: 20;
    }

    .block1 {
        width: 100%;
        justify-content: space-between;
    }

    .block1-left {
        position: relative;
        flex-direction: column;
    }

    .border-line,
    .block1-1 {
        width: 800px;
        height: 530px;
    }

    .border-line {
        border: 1px solid white;
        top: -8px;
        left: -8px;
    }

    .summer-tag {
        background: #FF9C42;
        width: 180px;
        height: 45px;
        justify-content: center;
        align-items: center;
        top: 10px;
        left: -20px;
    }

    .summer-tag h4 {
        color: white;
        font-family: 'Josefin Sans', sans-serif;
        letter-spacing: 3px;
    }

    .img-block1-1 {
        width: 800px;
        height: 530px;
    }

    .img-block1-1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .block1-left ul {
        width: 600px;
        justify-content: space-evenly;
        align-items: flex-start;
    }

    .block1-left ul h5 {
        font-weight: 500;
    }

    .block1-left ul li {
        flex-direction: column;
        align-items: center;
    }

    .box-li {
        width: 180px;
        height: 180px;
    }

    .box-li h5 {
        color: white;
    }

    .box-li img {
        width: 100%;
        /* height: 100%; */
        object-fit: cover;
    }

    .small-li {
        width: 115px;
        height: 115px;
        margin-top: 15px;
    }

    .small-li img {
        width: 100%;
        /* height: 100%; */
        object-fit: cover;
    }

    .img-block1-2 {
        width: 350px;
        height: 700px;
        margin-top: -100px;
    }

    .img-block1-2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .block1-right {
        flex-direction: column;
    }

    .block1-right h1 {
        color: white;
        letter-spacing: 4px;
        font-family: 'Josefin Sans', sans-serif;
        margin-top: 10px;
    }

    .block1-right h6 {
        color: white;
        text-align: right;
    }

    .block2 {
        width: 100vw;
        height: 100vh;
        position: relative;
        justify-content: center;
        align-items: center;
    }

    .block2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        top: 0;
        left: 0;
        z-index: -1;
    }

    .block2 div {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }

    .img-block2-1 {
        width: 170px;
        height: 240px;
    }

    .img-block2-1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
        margin-bottom: 20px;
    }

    .block2 h1 {
        color: white;
        font-size: 3rem;
        margin-bottom: 20px;
        font-family: 'Josefin Sans', sans-serif;
    }

    .block2 button {
        width: 250px;
        background: #59C3C3;
    }

    .block2 button:hover {
        width: 250px;
        background: #FF9685;
    }

    .modal {
        width: 100vw;
        height: 100vh;
        background: black;
        opacity: .5;
        top: 100vh;
    }

    .block3 {
        position: relative;
        justify-content: space-between;
    }

    .block3-left,
    .block3-right {
        width: calc(100vw / 2);
        height: 100vh;
    }

    .block3-left {
        position: relative;
    }

    .img-block3-1 {
        width: calc(100vw / 2);
        height: 100vh;
    }

    .img-block3-1 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-summer-dot2 {
        width: 280px;
        z-index: 1;
        mix-blend-mode: multiply;
        left: 43%;
    }

    .img-summer-dot2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-summer-yellowfruit {
        width: 400px;
        z-index: 1;
        mix-blend-mode: multiply;
        bottom: -140px;
        right: -60px;
    }

    .img-summer-whiteline2 {
        width: 250px;
        z-index: 1;
        right: 0;
        bottom: 50px;
    }

    .block3-left ul {
        width: calc(100vw / 2);
        left: 15px;
        bottom: 15px;
    }

    .block3-left li {
        width: 22%;
        height: 22%;
        margin: 0 5px;
    }

    .block3-left li img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .block3-right {
        justify-content: center;
        align-items: center;
        background: white;
        overflow: hidden;
    }

    .block3-right div {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-right: 80px;
    }

    .block3-right div h3,
    .block3-right div p,
    .info-left h3,
    .info-left p {
        color: #38726C;
        margin-bottom: 20px;
    }

    .info-left h3,
    .info-left p {
        color: white;
    }

    .block3-right div h3,
    .info-left h3 {
        margin-bottom: 30px;
    }

    .btn-seemore {
        width: 170px;
        background: #FF9C42;
        margin-top: 30px;
    }

    .btn-seemore:hover {
        width: 170px;
        background: #FF538A;
    }

    .block3-right p,
    .info-left p {
        width: 500px;
        text-align: center;
    }

    .info-left {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-left: 160px;
    }

    .cheetah-bg {
        top: 300vh;
        z-index: -1;
    }

    .modal2 {
        top: 300vh;
        z-index: -1;
        opacity: .3;
    }

    .block4 {
        width: 100vw;
        height: 100vh;
        justify-content: space-between;
        align-items: center;
    }

    .img-block4-2 {
        width: 260px;
        height: 260px;
    }

    .img-block4-2 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .info-right {
        margin: 0 140px 50px 0;
        align-self: flex-end;
    }

    .info-right li {
        width: 170px;
        height: 250px;
        margin: 0 5px;
        border: 1px solid white;
    }

    .info-right img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-summer-pinkline {
        width: 370px;
        z-index: 1;
        mix-blend-mode: multiply;
        left: 38%;
    }

    .img-summer-pinkline img,
    .img-summer-pinkfruit img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-summer-pinkfruit {
        width: 370px;
        bottom: 5%;
        left: -5%;
        mix-blend-mode: multiply;
    }

    .block5-left div {
        margin: 0 0 0 80px;
    }

    .block6 {
        width: 100vw;
        height: 100vh;
        position: relative;
    }

    .bglast {
        width: 100vw;
        height: 100vh;
        z-index: -1;
        top: 500vh;
    }

    .bglast img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .img-summer-dot3 {
        width: 270px;
        z-index: -1;
        mix-blend-mode: multiply;
        left: 0;
        bottom: 10%;
    }

    .img-summer-leaf {
        width: 360px;
        z-index: -1;
        mix-blend-mode: multiply;
        right: -50px;
        top: 50px;
    }

    .wrapper-block6 {
        padding: 0;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
    }

    .wrapper-block6 ul {
        width: 100%;
        justify-content: space-between;
    }

    .wrapper-block6 li {
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .wrapper-block6 div {
        width: 280px;
        height: 430px;
    }

    .wrapper-block6 img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .wrapper-block6 h3 {
        color: white;
        margin: 50px 0;
        font-family: 'Josefin Sans', sans-serif;
    }

    footer {
        position: absolute;
        bottom: 0;
    }


    @media screen and (max-width: 1280px) {
        .wrapper {
            width: 950px;
            padding: 120px 20px;
            /* border: 1px red solid; */
        }

        .block1 {
            left: 0;
        }

        .border-line {
            border: 1px solid white;
            top: -8px;
            left: -8px;
        }


        .img-block1-1,
        .border-line,
        .block1-1 {
            width: 630px;
            height: 420px;
        }

        .img-block1-2 {
            width: 270px;
            height: 540px;
            margin-top: -100px;
        }

        .block1-right {
            width: 270px;
        }

        .block1-left ul {
            width: 500px;
            justify-content: space-evenly;
            align-items: flex-start;
        }

        .block1-left ul h5 {
            font-weight: 500;
            font-size: .75rem;
        }

        .box-li {
            width: 150px;
            height: 150px;
        }

        .small-li {
            width: 90px;
            height: 90px;
            margin-top: 15px;
        }

        .block1-right h1 {
            font-size: 1.8rem;
        }

        .block1-right h6 {
            font-size: .75rem;
        }

        .block2 h1 {
            font-size: 2.2rem;

        }

        .block2 button {
            width: 200px;
            background: #59C3C3;
        }

        .block2 button:hover {
            width: 200px;
        }

        .block3-left ul {
            width: calc(100vw / 2);
            left: 10px;
            bottom: 15px;
        }

        .block3-right p {
            width: 400px;
        }

        .img-block4-2 {
            width: 180px;
            height: 180px;
        }

        .block4 {
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .info-left,
        .info-right {
            margin: 0;
            align-self: center;
        }

        .info-right li {
            width: 140px;
            height: 205px;
            margin-top: 50px;
        }

        .wrapper-block6 div {
            width: 220px;
            height: 340px;
        }

        .wrapper-block6 {
            padding: 60px 0 0 0;
        }

    }

    @media screen and (max-width: 992px) {
        .wrapper {
            width: 570px;
            padding: 0;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .block1 {
            height: 100vh;
        }

        .bg1 {
            flex-direction: column;
        }

        .bg-left,
        .bg-right {
            width: 100vw;
            height: calc(100vh / 2);
        }

        .img-pineapple,
        .img-orangeline,
        .img-pinkpaint {
            display: none;
        }

        .img-pineapple2 {
            display: block;
            bottom: 0;
            z-index: 1;
            width: 350px;
        }

        .img-dot1 {
            width: 150px;
        }

        .img-orangeline2 {
            display: block;
            width: 200px;
            right: -20px;
        }

        .img-pinkpaint2 {
            display: block;
            width: 400px;
            top: 320px;
            right: -50px;
        }

        .img-whiteline {
            width: 240px;
        }

        .block1 {
            flex-direction: column-reverse;
            justify-content: center;
            align-items: center;
        }

        .img-block1-1,
        .border-line,
        .block1-1 {
            width: 100%;
            height: 300px;
        }

        .img-block1-1 {
            position: absolute;
            top: 10px;
            z-index: -1;
        }

        .img-block1-2 {
            width: 270px;
            height: 490px;
            margin-top: -100px;
        }

        .summer-tag {
            width: 150px;
            height: 35px;
        }

        .block1-right h6 {
            text-align: center;
        }

        .block1-left,
        .block1-right {
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .block1-left ul {
            width: 400px;
            justify-content: space-evenly;
            margin-top: 280px;
        }

        .box-li {
            width: 112px;
            height: 112px;
            white-space: nowrap;
        }

        .small-li {
            width: 75px;
            height: 75px;
            margin-top: 10px;
            white-space: nowrap;
        }

        .border-line {
            top: 5px;
            left: -5px;
        }

        .summer-tag {
            top: 30px;
        }

        .block3 {
            flex-direction: column;
            overflow: hidden;
        }

        .block3-left,
        .block3-right,
        .img-block3-1 {
            width: 100vw;
            height: calc(100vh / 2);
        }

        .block3-right div {
            margin: 0;
        }

        .block3-left ul {
            width: 600px;
        }

        .block3-left li {
            width: 100px;
            height: 100px;
        }

        .img-summer-dot2 {
            width: 180px;
            top: 50%;
            left: -30px;
        }

        .img-summer-yellowfruit {
            width: 250px;
            right: -40px;
            bottom: -120px;
            mix-blend-mode: multiply;
        }

        .img-summer-whiteline2 {
            width: 200px;
            bottom: 20px;
        }

        .img-summer-pinkline {
            width: 250px;
            left: 70%;
        }

        .img-summer-pinkfruit {
            width: 200px;
            bottom: 51%;
        }

        .wrapper-block6 ul {
            width: 500px;
            flex-wrap: wrap;
        }

        .wrapper-block6 li div {
            width: 200px;
            height: 310px;
        }

        .wrapper-block6 button {
            margin-bottom: 40px;
        }

        .bglast {
            height: calc(100vh + 160px);
        }

        footer {
            position: relative;
        }

    }

    @media screen and (max-width: 576px) {
        .wrapper {
            width: 285px;
            /* padding: 80px 0 0 0; */
        }

        .img-pineapple2 {
            bottom: 0;
            width: 210px;
        }

        .img-dot1 {
            width: 80px;
        }

        .img-orangeline2 {
            width: 100px;
            right: 0px;
            top: 15px;
        }

        .img-text {
            width: 30px;
            top: 100px;
        }

        .img-whiteline {
            width: 150px;
        }

        .img-block1-2 {
            width: 210px;
            height: 370px;
            margin-top: 50px;
        }

        .block1-right h1 {
            font-size: 1.7rem;
        }

        .img-block1-1,
        .border-line,
        .block1-1 {
            width: 100%;
            height: 200px;
        }

        .summer-tag {
            width: 100px;
            height: 25px;
            top: 15px;
        }

        .summer-tag h4 {
            font-size: .75rem;
            white-space: nowrap;
            letter-spacing: 1px;
        }

        .block1-left ul {
            width: 100%;
            justify-content: space-evenly;
            margin-top: 180px;
        }

        .box-li {
            width: 80px;
            height: 80px;
        }

        .box-li h5 {
            margin: -10px 0 0 250px;
        }

        .small-li {
            width: 50px;
            height: 50px;
            margin-top: 10px;
            white-space: nowrap;
        }

        .img-block2-1 {
            width: 110px;
            height: 160px;
        }

        .block2 h1 {
            font-size: 1.2rem;
        }

        .block3-left li {
            width: 70px;
            height: 70px;
        }

        .img-summer-dot2 {
            width: 90px;
        }

        .img-summer-yellowfruit {
            width: 130px;
            right: -40px;
            bottom: -60px;
            mix-blend-mode: multiply;
        }

        .img-summer-whiteline2 {
            width: 80px;
            bottom: 20px;
        }

        .block3-right p,
        .info-left p {
            width: 300px;
        }

        .block3-right button,
        .block4 button {
            margin-top: 0;
        }

        .info-right {
            margin-top: 50px;
        }

        .info-right li {
            width: 80px;
            height: 120px;
        }

        .info-left p {
            text-justify: inter-ideograph;
            letter-spacing: 1px;
        }

        .img-summer-pinkline {
            width: 100px;
            left: 70%;
        }

        .img-summer-pinkfruit {
            width: 100px;
            bottom: 51%;
        }

        .img-summer-dot3 {
            width: 85px;
            bottom: 3%;
        }

        .img-summer-leaf {
            width: 100px;
            right: -20px;
            top: 80px;
        }

        .wrapper-block6 ul {
            width: 110%;
            flex-wrap: wrap;
        }

        .wrapper-block6 li div {
            width: 140px;
            height: 210px;
        }

        .wrapper-block6 button {
            width: 130px;
            height: 45px;
        }

        .wrapper-block6 button:hover {
            width: 130px;
        }

    }
</style>


<div class="container flex">
    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="flex bg1">
        <div class="bg-left">
            <img class="bg-blue" src="images/summer-bgblue.svg" alt="">
            <img class="img-dot1 absolute" src="images/summer-dot1.svg" alt="">
            <img class="img-pineapple absolute" src="images/summer-pineapple.svg" alt="">
            <img class="img-orangeline img-orangeline2 absolute" src="images/summer-orangeline.svg" alt="">
        </div>
        <div class="bg-right">
            <img class="bg-red" src="images/summer-bgred.svg" alt="">
            <img class="img-pinkpaint absolute" src="images/summer-pinkpaint.svg" alt="">
            <img class="img-orangeline absolute" src="images/summer-orangeline.svg" alt="">
            <img class="img-pineapple img-pineapple2 absolute" src="images/summer-pineapple.svg" alt="">
        </div>
    </div>
    <img class="img-pinkpaint img-pinkpaint2 absolute" src="images/summer-pinkpaint.svg" alt="">
    <img class="img-text fixed" src="images/summer-text.svg" alt="">
    <img class="img-whiteline absolute" src="images/summer-whiteline.svg" alt="">

    <div class="wrapper flex transition absolute">
        <div class="block1 flex absolute">
            <div class="block1-left flex">
                <div class="border-line absolute"></div>
                <div class="summer-tag absolute flex">
                    <h4>Summer Sale</h4>
                </div>
                <div class="img-block1-1">
                    <img src="images/summer/block1-1.jpg" alt="">
                </div>
                <ul class="flex">
                    <li class="box-li flex pointer">
                            <img id="watzbox" src="images/summer/watzbox1-1.png" alt="" onclick=redirect()>
                        <h5>芒果派對禮盒</h5>
                    </li>
                    <li class="small-li flex pointer">
                        <img src="images/summer/block1-3.jpg" alt="" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=24'">
                        <h5 class="mobile-none">夏日煙火</h5>
                    </li>
                    <li class="small-li flex pointer">
                        <img src="images/summer/block1-4.jpg" alt="" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=26'">
                        <h5 class="mobile-none">一起來跳森巴</h5>
                    </li>
                    <li class="small-li flex pointer">
                        <img src="images/summer/block1-5.jpg" alt="" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=21'">
                        <h5 class="mobile-none">綠野仙蹤</h5>
                    </li>
                </ul>
            </div>
            <div class="block1-right flex">
                <div class="img-block1-2">
                    <img src="images/summer/block1-2.jpg" alt="">
                </div>
                <h1>MANGO PARTY</h1>
                <h6>2020 WATZ SUMMER COLLECTION</h6>
            </div>
        </div>
    </div>
    <div class="block2 flex">
        <img class="absolute" src="images/summer/block2-2.png" alt="">
        <div class="flex">
            <div class="img-block2-1">
                <img src="images/summer/block2-1.png" alt="">
            </div>
            <h1>COOL OFF & CHILL OUT.</h1>
            <button class="btn-coral transition" onclick=redirect()>CHECK ME OUT</button>
        </div>
    </div>
    <div class="modal absolute"></div>
    <div class="block3 flex">
        <div class="absolute img-summer-dot2">
            <img src="images/summer-dot2.svg" alt="">
        </div>
        <div class="absolute img-summer-yellowfruit">
            <img src="images/summer-yellowfruit.svg" alt="">
        </div>
        <div class="absolute img-summer-whiteline2">
            <img src="images/summer-whiteline2.svg" alt="">
        </div>
        <div class="block3-left">
            <div class="img-block3-1 img-change">
                <img src="images/summer/block3-1.jpg" alt="">
            </div>
            <ul class="flex absolute">
                <li><img class="pointer watermelon" src="images/summer/block3-2.jpg" alt=""></li>
                <li><img class="pointer watermelon" src="images/summer/block3-3.jpg" alt=""></li>
                <li><img class="pointer watermelon" src="images/summer/block3-4.jpg" alt=""></li>
                <li><img class="pointer watermelon" src="images/summer/block3-5.jpg" alt=""></li>
            </ul>
        </div>
        <div class="block3-right flex">
            <div class="flex">
                <h3>駕鶴西瓜</h3>
                <p>襪口部採用具止滑效果的織線，不易滑脫。襪口無鬆緊帶設計，穿著柔軟舒適。使用對環境溫和的有機棉所製成。</p>
                <p>短襪<br>22-24cm<br>材質:100%純棉</p>
                <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=91'">SEE MORE</button>
            </div>
        </div>
    </div>
    <div class="cheetah-bg absolute">
        <img src="images/summer/block4-1.jpg" alt="">
    </div>
    <div class="modal modal2 absolute"></div>
    <div class="block4 flex">
        <div class="info-left flex transition">
            <div class="img-block4-2">
                <img src="images/summer/block4-2.png" alt="">
            </div>
            <h3>豹打老虎</h3>
            <p>Jungle Friends, our summer collection that expresses animal friends living in the jungle with a detailed and witty cuteness unique to WATZ.<br>
            </p>
            <p>長襪<br>22-24cm<br>材質:100%純棉</p>
            <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=23'">SEE MORE</button>
        </div>
        <ul class="info-right flex transition">
            <li><img class="pointer" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=23'" src="images/summer/block4-3.jpg" alt=""></li>
            <li><img class="pointer" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=23'" src="images/summer/block4-4.jpg" alt=""></li>
            <li><img class="pointer" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=23'" src="images/summer/block4-5.jpg" alt=""></li>
        </ul>
    </div>
    <div class="block3 block5 flex">
        <div class="absolute img-summer-pinkline">
            <img src="images/summer-pinkline.svg" alt="">
        </div>
        <div class="absolute img-summer-pinkfruit">
            <img src="images/summer-pinkfruit.svg" alt="">
        </div>
        <div class="block3-right block5-left flex">
            <div class="flex">
                <h3>夏日煙火</h3>
                <p>襪口部採用具止滑效果的織線，不易滑脫。襪口無鬆緊帶設計，穿著柔軟舒適。使用對環境溫和的有機棉所製成。</p>
                <p>長襪<br>22-24cm<br>材質:100%純棉</p>
                <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=24'">SEE MORE</button>
            </div>
        </div>
        <div class="block3-left block5-right">
            <div class="img-block3-1 img-block5-1">
                <img src="images/summer/block5-1.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="bglast absolute">
        <img src="images/summer-bglast.svg" alt="">
    </div>
    <div class="block6">
        <div class="absolute img-summer-dot3">
            <img src="images/summer-dot3.svg" alt="">
        </div>
        <div class="absolute img-summer-leaf">
            <img src="images/summer-leaf.svg" alt="">
        </div>
        <div class="wrapper wrapper-block6 flex">
            <h3>MORE GOODIES...</h3>
            <ul class="flex">
                <li class="flex">
                    <div class="block6-1"><img src="images/summer/block6-1.jpg" alt=""></div>
                    <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=30'">SEE MORE</button>
                </li>
                <li class="flex">
                    <div class="block6-2"><img src="images/summer/block6-2.jpg" alt=""></div>
                    <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=31'">SEE MORE</button>
                </li>
                <li class="flex">
                    <div class="block6-3"><img src="images/summer/block6-3.jpg" alt=""></div>
                    <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=21'">SEE MORE</button>
                </li>
                <li class="flex">
                    <div class="block6-4"><img src="images/summer/block6-4.jpg" alt=""></div>
                    <button class="btn-coral btn-seemore" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=27'">SEE MORE</button>
                </li>
            </ul>
        </div>
    </div>



    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    $("#watzbox").hover(function() {
        $(this).attr("src", "images/watzbox1-2.png");
    }, function() {
        $(this).attr("src", "images/watzbox1-1.png");
    })

    // block-left 點擊改變照片功能
    $(".watermelon").click(function() {
        let imgSrc = $(this).attr("src");
        $(".img-change img").attr("src", imgSrc);
    })

    $(".block3-left").mouseleave(function() {
        $(".img-change img").attr("src", "images/summer/block3-1.jpg");
    })

    // 麵包屑
    const redirect = () => {
        location.href='<?= WEB_ROOT ?>/product.php?#{"series":["1"],"orderBy":"new"}';
    };
  
</script>

<?php require __DIR__ . '/__html_foot.php' ?>