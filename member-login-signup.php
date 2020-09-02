<?php require __DIR__ . '/__connect_db.php';
$pageName = 'member-login-signup';  // 這裡放你的pagename
?>
<?php include __DIR__ . '/__html_head.php' ?>

<!-- 自己另外的CSS插件 <link> 請放這邊 (nav.css及google fonts共用的不用放) -->
<title>WATZ - 登入與註冊</title>
<style>
    body {
        width: 100vw;
        background-image: url(images/BG2.svg);
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container {
        min-height: 100vh;
        justify-content: space-between;
    }

    .wrapper {
        margin-top: 190px;
        margin-bottom: 50px;
        justify-content: center;
        align-items: center;
        margin-bottom: 80px;
        position: relative;
        align-items: center;
    }

    .member-bblock {
        width: 465px;
        height: 545px;
    }

    .bsignup {
        width: 400px;
        height: 545px;
        position: absolute;
    }

    .member-bblock li {
        width: 400px;
        height: 545px;
        position: absolute;
    }

    .tag {
        position: absolute;
        background: #F2DE79;
        border-radius: 15px;
        width: 70px;
        height: 140px;
        right: -65px;
        top: 50%;
        transform: translate(0, -50%);
        /* z-index: -1; */
        cursor: pointer;
    }

    .tag h5 {
        writing-mode: vertical-lr;
        letter-spacing: 3px;
        font-weight: 400;
        position: absolute;
        right: 15%;
        top: 50%;
        transform: translate(-12%, -50%);
        cursor: pointer;
        white-space: nowrap;

    }

    .tag-signup {
        top: 90%;
        transform: translate(0, -90%);
        background: #0388A6;
        cursor: pointer;

    }

    .tag-signup h5 {
        color: #ffffff;
        cursor: pointer;

    }

    .member-login {
        background: #F2DE79;
        width: 420px;
        height: 545px;
        border-radius: 15px;
        align-items: center;
        flex-direction: column;
        position: relative;

    }

    .member-login.signup {
        background: #0388A6;
        position: absolute;
    }

    @media screen and (max-width: 992px) {
        body {
            background-image: url(images/BG-mobile2.svg);
            background-position: center;
        }

        .wrapper {
            width: 100%;
            margin-top: 160px;
        }

        .member-bblock {
            width: 85vw;
            height: 103vw;
        }

        .bsignup {
            position: absolute;
            width: 80vw;
            height: 103vw;
        }

        .member-bblock li {
            width: 80vw;
            height: 103vw;

        }

        .member-login {
            width: 80vw;
            height: 103vw;
            flex-direction: column;
            justify-content: space-evenly;
            align-items: center;
        }

        .tag {
            width: 20vw;
            height: 25vw;
            border-radius: 10px;
            right: -8vw;
        }

        .tag h5 {
            font-size: 12px;
            transform: translate(20%, -50%)
        }
    }

    /* ---------------------------------form--------------------------------------- */
    .member-login h2 {
        font-family: 'Fredoka One', cursive;
        text-align: center;
        margin-top: 70px;
        margin-bottom: 70px;
        /* padding: 72px; */
        letter-spacing: 4px;
        /* margin-bottom: 2px; */
        color: #404040;
    }

    .member-login.signup h2 {
        color: #ffffff;
    }

    @media screen and (max-width: 992px) {
        .member-login h2 {
            font-size: 32px;
            /* padding: 40px; */
            margin-top: 40px;
            margin-bottom: 40px;
        }
    }

    /* ---------------------------------text---------------------------------------- */
    .bg-inputwrapper {
        flex-direction: column;
        justify-content: space-evenly;
    }

    .input-wrapper {
        background: #ffffff;
        width: 292px;
        height: 45px;
        border-radius: 2px;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 20px;
        position: relative;


    }

    .email-input {
        border: 2px solid transparent;
    }

    .pw-input {
        border: 2px solid transparent;

    }

    .account {
        width: 20px;
        height: 20px;
        margin: 11px 16px;
    }

    .member-input {
        border: transparent;
        outline: none;
        width: 292px;
        height: 38px;
    }

    .eyes {
        position: absolute;
        width: 20px;
        height: 20px;
        margin: 11px 16px;
        cursor: pointer;
        right: 0;
    }

    .error {
        position: absolute;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        right: 5px;
        pointer-events: none;
        display: none;

    }

    .email {
        position: absolute;
        align-items: center;
        justify-content: center;
        flex-direction: row;
        right: 5px;
        display: none;

    }

    .email h6 {
        color: #FF3434;
    }

    .error-icon {
        width: 15px;
        height: 15px;
        cursor: pointer;
        margin-right: 5px;
    }

    .error h6 {
        color: #FF3434;
        /* position: absolute; */
    }

    @media screen and (max-width: 992px) {
        .member-input {
            width: 70vw;
            height: 8vw;
            /* font-size: 16px; */
        }

        .bg-inputwrapper {
            flex-direction: column;
            justify-content: space-evenly;
            height: 32vw;
        }

        .input-wrapper {
            width: 60vw;
            height: 9vw;
            margin-bottom: 15px;
        }

        .input-wrapper img {
            width: 5vw;
            height: 5vw;
            margin: 6px 12px;
            /* margin: 6px 12px 6px 7px; */
        }

    }

    /* ------------------------------------input---------------------------------------- */
    .remember {
        margin: 20px 0 20px 0;
        width: 292px;
        height: 45px;
        justify-content: space-between;
        align-items: center;
    }

    .agree {
        width: 292px;
        height: 45px;
        justify-content: center;
        align-items: center;

    }

    .agree h6 {
        color: #ffffff;
        letter-spacing: 2px;
        align-items: center;
    }

    .member-login.signup a {
        color: #F2DE79;
        font-size: 12px;
        letter-spacing: 2px;
    }

    .member-checkbox {
        margin: 0px 10px 0px 0px;
    }

    .member-remember h6 {
        color: #404040;
        font-weight: 400;
        letter-spacing: 1px;
    }

    .member-forget {
        width: 100px;
        text-align: right;
    }

    .member-forget a {
        color: #0388A6;
        font-size: 12px;
        cursor: pointer;
        letter-spacing: 3px;

    }

    .member-remember {
        justify-content: flex-start;
        align-items: center;
        width: 292px;
        height: 45px;
    }

    @media screen and (max-width: 992px) {
        .remember {
            width: 182px;
            margin: 0;
        }

        .member-forget {
            width: 150px;
        }

        .member-forget a {
            letter-spacing: 1px;
        }

        .agree {
            width: 70vw;
            height: 8vw;
        }
    }

    /* ---------------------------------h6 or a--------------------------------------------------- */
    .btn-blue {
        width: 212px;
        letter-spacing: 4px;
        margin-top: 20px;
    }

    .btn-blue:hover {
        background: #FF9685;
    }

    .member-login h5 {
        font-weight: 400;
        letter-spacing: 1px;
        margin-top: 35px;
    }

    .member-login a {
        color: #0388A6;
    }

    .box-login {
        z-index: 10;
    }



    @media screen and (max-width: 992px) {
        .btn-login {
            width: 150px;
            height: 40px;
            margin-top: 10px;
        }

        .member-login h5 {
            display: none;
        }

        .btn-login a {
            display: none;
        }
    }

    /* jumpout notice */

    .notice {
        transition: .2s;
        position: fixed;
        width: 100vw;
        height: 100vh;
        visibility: hidden;
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
            <h3>登入成功</h3>
        </div>
    </div>
</div>
<div class="container flex">
    <!-- 如果container有其它class要自己加上 -->


    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex">
        <ul class="member-bblock">
            <div class="bsignup" id="tab1">
                <li class="box-signup" id="box-signup">
                    <form class="member-login flex signup" name="form1" method="post" novalidate>
                        <h2>JOIN US</h2>
                        <div class="bg-inputwrapper flex">
                            <div class="input-wrapper email-input flex" id="signupEmailWrapper">
                                <img class="account" src="images/icon-account.svg" alt="">
                                <input class="member-input" type="email" id="signupEmail" name="email" placeholder="Email" required>
                                <div class="email flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex">e-mail格式錯誤</h6>
                                </div>
                            </div>
                            <div class="input-wrapper signupPw pw-input flex">
                                <img class="account" src="images/icon-password.svg" alt="">
                                <input class="member-input password" type="password" placeholder="Password" id="signupPassword" name="password" required>
                                <img class="eyes" src="images/hidden.svg" alt="">
                                <div class="signupPassword error flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </div>
                            <div class="input-wrapper confirmPw pw-input flex">
                                <img class="account" src="images/icon-confirmPassword.svg" alt="">
                                <input class="member-input password" type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required>
                                <img class="eyes" src="images/hidden.svg" alt="">
                                <div class="confirmPassword error flex">
                                    <img class="error-icon flex" src="images/alert.svg">
                                    <h6 class="flex"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="agree flex">
                            <input class="member-checkbox" type="checkbox" name="signupCheckBox" id="signupCheckBox" required>
                            <h6>同意</h6><a href="<?= WEB_ROOT ?>/member-term.php">會員條款</a>
                            <h6>與</h6><a href="<?= WEB_ROOT ?>/member-privacy.php">隱私權政策</a>
                        </div>
                        <button type="submit" class="btn-blue btn-login" onclick="return formCheck()">註冊會員</button>
                    </form>
                </li>
                <div class="tag tag-signup" id="tag-signup">
                    <h5>註冊帳號</h5>
                </div>
            </div>

            <!------------------------signup------------------------------------------>
            <div class="bsignup blogin" id="tab2">
                <li class="box-login" id="box-login">
                    <form class="member-login flex" name="form2" method="post" novalidate>
                        <h2>LOG IN</h2>
                        <div class="input-wrapper email-input flex" id="loginEmailWrapper">
                            <img class="account" src="images/icon-account.svg" alt="">
                            <input class="member-input" type="email" id="loginEmail" name="email" placeholder="Email" required>
                            <div class="loginEmailError email flex">
                                <img class="error-icon flex" src="images/alert.svg">
                                <h6 class="flex">e-mail格式錯誤</h6>
                            </div>
                        </div>
                        <div class="input-wrapper loginPw pw-input flex">
                            <img class="account" src="images/icon-password.svg" alt="">
                            <input class="member-input password" type="password" placeholder="Password" id="loginPassword" name="password" required>
                            <img class="eyes" src="images/hidden.svg" alt="">
                            <div class="loginPassword error flex">
                                <img class="error-icon flex" src="images/alert.svg">
                                <h6 class="flex">密碼輸入錯誤</h6>
                            </div>
                        </div>
                        <div class="remember flex">
                            <div class="member-remember flex">
                                <input class="member-checkbox flex" type="checkbox" name="loginCheckBox" id="loginCheckBox" required>
                                <h6 class="flex">Remember me</h6>
                            </div>
                            <div class="member-forget">
                                <a href="">忘記密碼</a>
                            </div>
                        </div>
                        <button type="submit" class="btn-blue btn-login" onclick="return formCheck2()">登入帳號</button>
                        <h5>還不是會員?點這邊<a href="">加入會員!</a></h5>
                    </form>
                </li>
                <div class="tag tag-login" id="tag-login">
                    <h5>登入會員</h5>
                </div>
            </div>

        </ul>

    </div>

    <?php include __DIR__ . '/__html_footer.php' ?>
</div>
<?php include __DIR__ . '/__scripts.php' ?>

<script>
    // 眼睛開關
    $('.eyes').on('click', function(e) {
        let $pwd = $(this).prev('.password');

        $pwd.text(($pwd.text() === 'Hide' ? 'Show' : 'Hide'));

        if ($pwd.attr('type') === 'password') {
            $(this).attr('src', 'images/eye.svg')
            $pwd.attr('type', 'text');
        } else {
            $(this).attr('src', 'images/hidden.svg')
            $pwd.attr('type', 'password');
        }
        e.preventDefault();
    });


    //login-signup切換

    $('#tag-login').click(function() {
        $('#box-login').css({
            "display": "block",
            "z-index": "2"
        });
        $('#box-signup').css({
            "display": "none",
            "z-index": "-1"
        });
        $('#tag-signup').css("z-index", "1");
        $('#tag-login').css("z-index", "-1")



    })

    $('#tag-signup').click(function() {
        $('#box-signup').css({
            "display": "block",
            "z-index": "2"
        });
        $('#box-login').css({
            "display": "none",
            "z-index": "-1"
        });
        $('#tag-signup').css("z-index", "-1");
        $('#tag-login').css("z-index", "1")

        // $('#box-login').removeAttr('style');
    })

    $(".email-input").on("click keyup change", function() {
        $(this).css('border-color', 'transparent');
        $(this).find('.email').css('display', 'none');
    })

    $(".pw-input").on("click keyup change", function() {
        $(this).css('border-color', 'transparent');
        $(this).find('.error').css('display', 'none');
        $(this).find('.eyes').css('display', 'flex')
    })

    function formCheck() {
        const signupEmail = $('#signupEmail'),
            signupPassword = $('#signupPassword'),
            confirmPassword = $('#confirmPassword'),
            email = $('.email'),
            emailInput = $('#signupEmailWrapper');
        const email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        // // TODO: 檢查欄位
        let isPass = true;


        //驗證e-mail格式
        if (!email_re.test($(signupEmail).val())) {
            isPass = false;
            $('#signupEmailWrapper .email').css('display', 'flex');
            emailInput.css('border-color', 'red');

        }
        //驗證密碼/密碼確認欄位是否一致
        let pw1 = $('#signupPassword').val();
        let pw2 = $('#confirmPassword').val();


        if (pw1 == false && pw2 == false) {
            isPass = false;
            $('.signupPw').css('border-color', 'red');
            $('.signupPw .error h6').text('請輸入密碼');
            $('.signupPassword.error').css('display', 'flex');
            $('.signupPw .eyes').css('display', 'none')
            $('.confirmPw').css('border-color', 'red');
            $('.confirmPw .error h6').text('請輸入密碼');
            $('.confirmPassword.error').css('display', 'flex');
            $('.confirmPw .eyes').css('display', 'none')
        } else if (pw2 == false) {
            isPass = false;
            $('.confirmPw .error h6').text('請再次輸入密碼');
            $('.confirmPw  .error').css('display', 'flex');
            $('.confirmPw').css('border-color', 'red');
            $('.confirmPw .eyes').css('display', 'none');
        } else {

            if (pw1 == pw2) {
                isPass = true;
            } else {
                isPass = false;
                $('.confirmPw .error h6').text('密碼輸入不一致');
                $('.confirmPw  .error').css('display', 'flex');
                $('.confirmPw').css('border-color', 'red');
                $('.confirmPw .eyes').css('display', 'none');
            }
        }


        //判斷註冊成功與否
        if (isPass) {
            $.post('signup-api.php', $(document.form1).serialize(), function(data) {
                if (data.success) {
                    $('.notice h3').text('註冊成功');
                    notice();
                    setTimeout(function() {
                        history.go(-1);
                    }, 1000)
                }
            }, 'json');
        }

        return false;
    }


    // 登入 login


    const loginEmail = $('#loginEmail'),
        loginPassword = $('#loginPassword');


    function formCheck2() {
        const email = $('.email'),
            emailInput = $('#loginEmailWrapper'),
            email_re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        let isPass = true;

        if (!email_re.test($(loginEmail).val())) {
            isPass = false;
            $('.loginEmailError.email').css('display', 'flex');

            emailInput.css('border-color', 'red');

        }

        if ($('#loginPassword').val() == false) {
            isPass = false;
            $('.loginPw').css('border-color', 'red');
            $('.loginPassword.error').css('display', 'flex');
            $('.eyes').css('display', 'none')
            $('.loginPassword h6').text('請輸入密碼');
        }

        // TODO: 檢查欄位


        // let isPass = true;


        if (isPass) {
            $.post('login-api.php', $(document.form2).serialize(), function(data) {
                if (data.success) {
                    $('.notice h3').text('登入成功');
                    notice();
                    setTimeout(function() {
                        history.go(-1);
                    }, 1000)
                } else {
                    $('.loginPassword.error').css('display', 'flex');
                    $('.eyes').css('display', 'none')
                    $('.loginPw').css('border-color', 'red');

                    // info_bar.removeClass('alert-success').addClass('alert-danger').html('帳號或密碼輸入錯誤');
                }



                // info_bar.slideDown();

                // setTimeout(function () {
                //     info_bar.slideUp()
                // }, 2000)
            }, 'json');
        }

        return false;
    }

    function notice() {
        $(".notice").addClass("active");
    }
</script>

<?php require __DIR__ . '/__html_foot.php' ?>