<?php require __DIR__ . '/__connect_db.php';
$pageName = 'project';  // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
<!-- 自己另外的CSS插件 <link> 請放這邊 (nav.css及google fonts共用的不用放) -->
<title>WATZ - 灰姑娘的水晶襪</title>

<style>
    .container {
        height: 100%;
        width: 100vw;
        background: url('images/crystal/bg-paper3.png');
        background-repeat: no-repeat;
        background-size: cover;
        /* position: fixed; */
        /* z-index: -2; */
    }

    .wrapper {
        width: 100vw;
        min-height: 100vh;
        /* position: relative; */
        /* border: 1px solid firebrick; */

    }

    .block1 {
        background-image: url('images/crystal/bg-web-1vh.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 100vw;
        height: 56.25vw;
        position: relative;
    }

    .thunder {
        width: 382px;
        height: 710px;
        position: absolute;
        left: 121px;

    }

    .thunder-stripe {
        animation: changeColor 2s ease 0s infinite alternate;
    }

    @keyframes changeColor {
        0% {
            fill: #4A535D;
        }

        50% {
            fill: #518BB9;
        }

        100% {
            fill: #F8B6B6;
        }
    }

    .dot-pink {
        width: 300px;
        height: 250px;
        position: absolute;
        bottom: 50px;
        right: 500px;
        animation: pinkDot1 3s linear 0s infinite alternate;
    }

    @keyframes pinkDot1 {
        from {
            bottom: 50px;
            right: 500px;


        }

        to {
            bottom: 100px;
        }
    }

    .dot-pink2 {
        width: 300px;
        height: 250px;
        position: absolute;
        bottom: 70px;
        right: 700px;
        transform: rotate(120deg);
        animation: pinkDot2 3s linear 0s infinite alternate;
    }

    @keyframes pinkDot2 {
        from {
            bottom: 70px;
            right: 700px;

        }

        to {
            bottom: 40px;

        }
    }

    .dot-blue {
        width: 370px;
        height: 150px;
        position: absolute;
        right: 80px;
        top: 150px;
        animation: blueDot 2s ease-in-out 0s infinite alternate;
        /* animation: name duration timing-function delay iteration-count direction fill-mode; */
    }

    @keyframes blueDot {
        from {
            transform: translateY(20px);

        }

        to {
            transform: translateY(40px);
        }
    }

    .photo-mermaid {
        display: none;
    }

    .block2 {
        width: 100vw;
        height: 100%;
        position: relative;
    }

    .bg-block2 {
        background-image: url('images/crystal/bg-web-23vh.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 100vw;
        height: 112.5vw;
        /* margin-top: -6px; */
        /* z-index: -3; */
        /* position: relative; */
    }

    .pc-bg-left {
        width: 200px;
        height: 700px;
        /* flex-direction: column; */
        margin: 30px 0 0 150px;
        position: absolute;
        top: 0;
    }

    .four-pics {
        flex-direction: column;
    }

    .pc {
        margin-bottom: 30px;
        cursor: pointer;

    }

    .pc-last {
        margin-top: 40px;
    }

    .pc-bg-right {
        width: 600px;
        height: 1200px;
        position: absolute;
        right: 8%;
        top: 45%;

    }

    .text {
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
    }

    .pc-bg-right h3 {
        font-family: 'Montserrat', sans-serif;
        font-style: italic;
        color: #ffffff;
        font-weight: 400;
        margin-bottom: 10px;
    }

    .pc-bg-right .text h5 {
        font-family: 'Montserrat', sans-serif;
        color: #F2DE79;
        font-weight: 400;
    }

    .undertext {
        /* width: 500px; */
        height: 400px;
        flex-direction: column;
        /* justify-content: flex-end; */
        align-items: flex-end;
        margin-top: 30px;
    }

    .bg-girls {
        width: 310px;
        height: 310px;
        margin-bottom: 20px;
    }

    .girls {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .three-pics {
        align-items: center;
        justify-content: flex-end;
        margin-bottom: 40px;
        /* width: 650px; */
    }

    .socks-bg {
        margin-right: 30px;

    }

    .picture {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    .btn-coral {
        background: #FFD1A2;
        color: #404040;
    }

    .three-seemore {
        width: 600px;
        flex-direction: row;
        justify-content: space-between;
    }

    .seemore {
        width: 120px;
        height: 40px;
        margin-left: 20px;
        justify-content: center;
        align-items: center;


    }

    .caketext {
        /* margin-top: 100px; */
        position: absolute;
        z-index: 2;
        bottom: 10%;
    }

    .caketext h4 {
        color: #FF9685;
        letter-spacing: 5px;
        font-weight: 500;
        font-weight: 400;

    }

    .caketext h5 {
        color: #FFE9EB;
        letter-spacing: 5px;
        margin-top: 40px;
        font-weight: 400;

    }

    .block3 {
        width: 100vw;
        height: 120vh;
        /* position: absolute; */
    }

    .bg-block3 {
        background-image: url('images/crystal/bg-web-4vh.svg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        width: 100vw;
        height: 56.25vw;
        position: relative;

    }

    .album-left {
        width: 670px;
        height: 420px;
        position: absolute;
        top: 40%;
        left: 8%;
    }

    .position {
        position: absolute;
        top: 60%;
        left: 35%;
    }

    .bg-album {
        align-items: center;
    }

    .album-right {
        width: 255px;
        height: 320px;
        cursor: pointer;
    }

    .bg-album h5 {
        margin-left: 50px;
        color: #707070;
        font-weight: 400;
    }

    .btn-green {
        background: #A0DAA8;
        /* margin-top: 130px; */
    }

    .last {
        height: 255px;
        flex-direction: column;
        align-items: flex-end;
        justify-content: space-around;
    }

    @media screen and (max-width:992px) {
        .thunder {
            width: 28vw;
            height: 37vw;
            left: 2.2vw;
        }

        .dot-pink {
            width: 25vw;
            right: 200px;
            bottom: 5px;
            animation: pinkDotmob1 3s linear 0s infinite alternate;
        }

        @keyframes pinkDotmob1 {
            from {
                right: 200px;
                bottom: 5px;
            }

            to {
                bottom: -5px;
            }
        }

        .dot-pink2 {
            width: 25vw;
            right: 335px;
            bottom: -18px;
            animation: pinkDotmob2 3s linear 0s infinite alternate;
        }

        @keyframes pinkDotmob2 {
            from {
                right: 335px;
                bottom: -18px;
            }

            to {
                bottom: 10px;
            }
        }

        .dot-blue {
            width: 25vw;
            top: 15%;
            right: 5%;

        }

        .block2 {
            z-index: 1;
        }

        .pc-bg-left {
            margin: 0;
            left: 10vw;
            top: 2vw;
        }

        .pc {
            width: 14vw;
        }

        .bg-girls {
            width: 23vw;
            height: 23vw;
            margin-bottom: 30px;

        }

        .p-socks {
            position: absolute;
        }

        .three-pics {
            width: 40vw;
            margin-bottom: 20px;
        }
        .three-seemore{
            width: 42vw;
        }
        .pc-bg-right {
            top: 31%;
            right: 5%;
        }

        .text-bg {
            width: 28vw;
            flex-direction: column;
            justify-content: center;
            align-items: flex-end;
        }

        .socks-bg {
            width: 200px;
            margin-right: 10px;

        }

        .album-left {
            width: 50vw;
            height: 30vw;
            top: 50%;
            left: 5%;
        }

        .position {
            top: 70%;
            left: 19%;
        }

        .album-right {
            width: 20vw;
            height: 25vw;
        }

        .caketext {
            position: absolute;
            right: 0;
            top: 60vw;
        }
        .caketext h4{
            letter-spacing: 3px;
        }
        .caketext h5{
            letter-spacing: 2px;
            margin-top: 23px;
        }
        .bg-album{
            flex-direction: column;
        }
        
    }
</style>

<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper">
        <div class="block1">
            <!-- <img src="images/crystal/thunder.svg" alt=""> -->
            <svg class="thunder" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 382.51 711.44">
                <defs>
                    <style>
                        .thunder-stripe {
                            fill: #4a535d;
                        }
                    </style>
                </defs>
                <g id="圖層_2" data-name="圖層 2">
                    <g id="圖層_1-2" data-name="圖層 1">
                        <g id="閃電">
                            <path id="Path_4559" data-name="Path 4559" class="thunder-stripe" d="M356.08,707.88l18.86,3.52.18,0" />
                            <path id="Path_4560" data-name="Path 4560" class="thunder-stripe" d="M371.3,242.09l-64.09-63.92,64.09-63.93,11.2-11.17L307.21,28l28-28H312.84L296,16.79,284.8,28l75.3,75.1-75.3,75.1,75.3,75.1-75.3,75.1L296,339.54l64.09,63.93L296,467.39,284.8,478.56l75.3,75.1-75.3,75.1,75.3,75.1-3.93,3.93A184.07,184.07,0,0,0,375,711.41l7.56-7.55-11.2-11.17-64.09-63.92,64.09-63.93,11.2-11.18-75.29-75.1,75.29-75.1-75.29-75.1,75.29-75.1Z" />
                            <path id="Path_4561" data-name="Path 4561" class="thunder-stripe" d="M325.54,103.08,250.25,28,278.3,0H255.89L239.05,16.8,227.85,28l75.3,75.1-75.3,75.1,75.3,75.1-75.3,75.1,11.2,11.17,64.09,63.93L239.05,467.4l-11.2,11.17,75.3,75.1-75.3,75.1,67.9,67.73,27.64,5.22-9-9-64.09-63.93,64.09-63.92,11.2-11.18-75.3-75.1,75.3-75.1-75.3-75.1,75.3-75.1-11.2-11.17-64.09-63.92,64.09-63.93Z" />
                            <path id="Path_4555" data-name="Path 4555" class="thunder-stripe" d="M268.58,103.08,193.29,28,221.34,0H198.93L182.08,16.8,170.88,28l75.3,75.1-75.3,75.1,75.3,75.1-75.3,75.1,11.2,11.17,64.1,63.93-64.1,63.92-11.2,11.17,75.3,75.1-75.3,75.1,54.62,54.47,27.63,5.22-59.84-59.69,64.09-63.93,11.2-11.17-75.3-75.1,75.3-75.1-75.3-75.1,75.3-75.1-11.2-11.18-64.09-63.92,64.09-63.93Z" />
                            <path id="Path_4556" data-name="Path 4556" class="thunder-stripe" d="M211.62,103.08,136.32,28,164.37,0H142L125.12,16.8,113.92,28l75.3,75.1-75.3,75.1,75.3,75.1-75.3,75.1,11.2,11.17,64.1,63.92L125.13,467.4l-11.2,11.17,75.3,75.1-75.3,75.1L155.26,670l27.63,5.22-46.56-46.44,64.09-63.93,11.2-11.17-75.3-75.1,75.3-75.1-75.3-75.1,75.3-75.1-11.2-11.18-64.09-63.92,64.09-63.92Z" />
                            <path id="Path_4557" data-name="Path 4557" class="thunder-stripe" d="M154.66,103.08,79.37,28,107.42,0H85L68.16,16.8,57,28l75.3,75.1L57,178.18l75.3,75.1L57,328.38l11.2,11.17,64.09,63.93L68.16,467.4,57,478.57l75.3,75.1L57,628.77l28,28L112.64,662,79.37,628.77l64.09-63.93,11.2-11.17-75.29-75.1,75.29-75.1-75.29-75.1,75.29-75.1-11.2-11.18L79.37,178.18l64.09-63.93Z" />
                            <path id="Path_4558" data-name="Path 4558" class="thunder-stripe" d="M97.7,103.08,22.4,28,50.45,0H28L11.2,16.8,0,28l75.29,75.1L0,178.18l75.29,75.1L0,328.38l11.2,11.17,64.09,63.93L11.2,467.4,0,478.57l75.29,75.1L0,628.77l14.75,14.72,27.64,5.21-20-19.93L86.5,564.85l11.2-11.18-75.3-75.1,75.3-75.1-75.3-75.1,75.3-75.1L86.5,242.1,22.41,178.18,86.5,114.25Z" />
                        </g>
                    </g>
                </g>
            </svg>
            <img class="dot-pink" src="images/crystal/dot-pink.svg" alt="">
            <img class="dot-pink2" src="images/crystal/dot-pink.svg" alt="">
            <img class="dot-blue" src="images/crystal/dot-blue.svg" alt="">
        </div>
        <div class="block2">
            <div class="bg-block2"></div>
            <div class="pc-bg-left">
                <div class="four-pics flex">
                    <img class="pc" src="images/crystal/socks-color-3.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=35'" alt="">
                    <img class="pc" src="images/crystal/socks-color-2.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=36'" alt="">
                    <img class="pc" src="images/crystal/socks-color-1.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=36'" alt="">
                    <img class="pc pc-last" src="images/crystal/circle.svg" alt="">
                </div>
            </div>
            <div class="pc-bg-right">
                <div class="text flex">
                    <div class="text-bg flex">
                        <h3>HAVE A COOL DAY</h3>
                    </div>
                    <div class="text-bg flex">
                        <h5>WITH YOUR CHIC SOCKS</h5>
                    </div>
                </div>
                <div class="undertext flex">
                    <div class="bg-girls">
                        <img class="girls" src="images/crystal/crystal08-5.jpg" alt="">
                    </div>
                    <div class="three-pics flex">
                        <div class="socks-bg">
                            <img class="picture" src="images/crystal/socks-a.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=102'" alt="">
                        </div>
                        <div class="socks-bg">
                            <img class="picture" src="images/crystal/socks-c.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=93'" alt="">
                        </div>
                        <div class="socks-bg">
                            <img class="picture" src="images/crystal/socks-b.png" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=103'" alt="">
                        </div>
                    </div>
                    <div class="three-seemore flex">
                        <button class="seemore btn-coral flex transition"  onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=102'">SEE MORE</button>
                        <button class="seemore btn-coral flex transition"  onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=93'">SEE MORE</button>
                        <button class="seemore btn-coral flex transition"  onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=103'">SEE MORE</button>
                    </div>
                </div>
                <div class="caketext">
                    <h4>編號:奶油蛋糕</h4>
                    <h5>一小塊安靜的鮮奶油蛋糕。<br>
                        <br>它靜靜躺在泥沙質的淺海底。<br>
                        <br>灰白色的貝殼抹上一層又一層突出，堆疊出一塊沾滿鮮奶<br><br>油的蛋糕。<br>
                        <br>穿著他，走起路來也甜。<br>
                    </h5>
                </div>
            </div>
        </div>
        <div class="block3">
            <div class="bg-block3">
                <img class="album-left" src="images/crystal/socks-album-left.png" alt="">
                <div class="position">
                    <div class="bg-album flex">
                        <img class="album-right" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=95'" src="images/crystal/socks-album-right.png" alt="">
                        <div class="last flex">
                            <h5>夏季襪子女式打底中筒襪通透水晶絲材質，絲質韌性高、柔軟穿在腳上完全<br>
                                <br>沒有束縛感，穿在腳上舒適透氣，是夏天避免腳臭的好夥伴！</h5>
                            <button class="seemore btn-green btn-coral flex transition" onclick="javascript:location.href='<?= WEB_ROOT ?>/product-detail.php?sid=95'">SEE MORE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // 這邊放你自己寫的JS
</script>

<?php require __DIR__ . '/__html_foot.php' ?>