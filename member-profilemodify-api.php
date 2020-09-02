<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];
// if(! isset($_POST['name'])){
//     $output['error']='沒有姓名資料';
//     echo json_encode($output,JSON_UNESCAPED_UNICODE);
//     exit;
// }
// TODO : 檢查欄位

$mobile = $_POST['mobile'];
// $mobile = implode('', explode('-', $mobile));

$sql = "UPDATE `members` SET `name`=?, `mobile`=?, `address`=?, `password`=SHA1(?) WHERE`id`=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $mobile, //因為上面已經定義變數
    $_POST['address'],
    $_POST['newpassword'],
    $_POST['id'],
]);


if($stmt->rowCount()){
    $output['success'] = true;
    unset($_POST['newpassword']);
    $_SESSION['member']['name']= $_POST['name'];
    $_SESSION['member']['mobile']= $_POST['mobile'];
    $_SESSION['member']['address']= $_POST['address'];
}


echo json_encode($output,JSON_UNESCAPED_UNICODE);
