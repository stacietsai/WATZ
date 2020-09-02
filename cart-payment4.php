<?php require __DIR__ . '/__connect_db.php';
$pageName = '';  // 這裡放你的pagename

$id = isset($_SESSION['member']['id']) ? intval($_SESSION['member']['id']) : 0;
$sql = "SELECT * FROM `members` WHERE `id`= $id";
$row = $pdo->query($sql)->fetch();

$pageName = 'buy-start';
if( empty($_SESSION['cart'])  or empty($_SESSION['member'])){
    header('Location: product.php');
    exit;
}

// *** 抓到當下的價格資訊 *** begin
$sids = array_column($_SESSION['cart'], 'sid');
$sql = "SELECT * FROM `product` WHERE `sid` IN (". implode(',', $sids). ")";
$productData = [];
$stmt = $pdo->query($sql);
while($r = $stmt->fetch()){
    $productData[$r['sid']] = $r;
}
$totalPrice = 0;
foreach ($_SESSION['cart'] as $k=>$v){
    $_SESSION['cart'][$k]['price'] = $productData[$v['sid']]['price'];

    $totalPrice += $_SESSION['cart'][$k]['price'] * $v['qty'];
}
// *** 抓到當下的價格資訊 *** end

// 寫入 orders
$watzbox_style = isset($_SESSION['receiver']['watzbox_style']) ? $_SESSION['receiver']['watzbox_style'] : Null;
$sql = "INSERT INTO `orders`(`member_sid`, `amount`, `watzbox_style`, `receiver`, `receiver_mobile`, `receiver_address`, `note`, `order_date`) VALUES (?, ?, ?, ? ,? ,? ,? , NOW())";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_SESSION['member']['id'],
    $totalPrice,
    $watzbox_style,
    $_SESSION['receiver']['receiver'],
    $_SESSION['receiver']['receiverMobile'],
    $_SESSION['receiver']['receiverAddress'],
    $_SESSION['receiver']['note'],
]);

$order_sid = $pdo->lastInsertId();  // 訂單流水號
$list_detail = [];
$p_sql = "SELECT * FROM `order_details` WHERE `order_sid`= $order_sid";
$list_detail = $pdo->query($p_sql)->fetchAll();

// 寫入 order_details
$sql2 = "INSERT INTO `order_details`(`order_sid`, `product_sid`, `watzbox`, `price`, `qty`) VALUES (?,?,?,?,?)";
$stmt2 = $pdo->prepare($sql2);

foreach($_SESSION['cart'] as $i){
    $stmt2->execute([$order_sid, $i['sid'], $i['watzbox'], $i['price'] , $i['qty'] ]);
}

// 清除購物車內容
unset($_SESSION['cart']);
unset($_SESSION['watzbox']);
unset($_SESSION['receiver']);
// unset($_SESSION['sender']);


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
        height: 650px;
        overflow: hidden;
        /* border: 1px solid pink; */
        margin-top: 100px;
        flex-direction: column;
        align-items: center;
        justify-content: space-around;
    }

    .pay-finish {
        width: 500px;
        border-radius: 15px;
        justify-content: center;
        /* border: 1px solid rgb(121, 126, 138); */
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .pay-finish-frame {
        width: 500px;
        height: 500px;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        margin: 20px 0;
        /* border: 1px solid royalblue; */

    }

    .pay-finish img {
        width: 280px;
        transform: translateX(48px);
    }

    .pay-finish h3 {
        color: #03588C;
    }

    .pay-finish h4 {
        color: #FF9685;
    }

    .pay-finish h5,
    h6 {
        color: #707070;
    }

    .pay-finish button {
        width: 160px;
        height: 40px;
        border-radius: 2px;
        background-color: #F2DE79;
        margin: 15px;
        color: #707070;
        outline: none;
        text-align: center;
        cursor: pointer;

    }

    .pay-finish button:hover {
        background-color: #03588C;
        color: #ffffff;
    }

    @media screen and (max-width: 576px) {
        .container {
            height: 100vh;
            /* overflow: hidden; */
        }

        .pay-finish {
            height: 100vh;

        }

        .pay-finish-frame {
            height: 50vh;
        }

        .pay-finish h5 {
            width: 300px;
            text-align: center;

        }

        .pay-finish img {
            width: 200px;
            transform: translateX(35px);
        }
    }
</style>

<div class="container flex">
<div class="div"></div>
    <!-- 如果container有其它class要自己加上 -->

    <?php include __DIR__ . '/__navbar.php' ?>
    <?php include __DIR__ . '/__html_btn-top.php' ?>

    <div class="wrapper flex">
        <div class="pay-finish flex">
            <div class="pay-finish-frame flex">
                <img src="images/cart-finished.svg" alt="">
                <h3>訂單已完成</h3>
                <h4>訂單編號：202007<?= $order_sid ?></h4>
                <h5>感謝您的購買</h5>
                <h5>訂單明細已寄到您的信箱：
                <?= $_SESSION['sender']['senderEmail'] ?></h5>
                <h6>有任何問題請洽客服 Mon.-Fir. 9:00-17:00</h6>
                <button class="pay-btn btn-blue prev" onclick="javascript:location.href='<?= WEB_ROOT ?>/member-historydetail.php?sid=<?= $order_sid ?>'">查看訂單</button>
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