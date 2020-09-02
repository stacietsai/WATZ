<?php
require __DIR__. '/__connect_db.php';

$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];
$email = strtolower(trim($_POST['email']));

$sql = "SELECT `id` FROM members WHERE email=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([ $email ]);
$row = $stmt->fetch();
if(!empty($row)){
    $output['error'] = '此 Email 已經註冊過了';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
$stmt->closeCursor();


$sql = "INSERT INTO `members`(`email`, `password`, `create_at`) VALUES (?, SHA1(?), NOW())";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $email,
    $_POST['password'],
]);

if($stmt->rowCount()){
    $output['success'] = true;
    $output['id'] = $pdo->lastInsertId(); //自動登入
    $_SESSION['member']['email']= $email;
    $_SESSION['member']['id']= $output['id'];

}


echo json_encode($output, JSON_UNESCAPED_UNICODE);
