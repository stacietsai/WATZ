<?php require __DIR__ . '/__connect_db.php';
if (!isset($_SESSION['receiver'])) {
    $_SESSION['receiver'] = [];
}

if (!isset($_SESSION['sender'])) {
    $_SESSION['sender'] = [];
}
$output = [
    'success' => false,
    'code' => 0,
    'error' => '',
    'postData' => $_POST
];

$receiver = isset($_POST['receiver']) ? $_POST['receiver'] : Null;
$receiverMobile = isset($_POST['receiverMobile']) ? $_POST['receiverMobile'] : Null;
$receiverAddress = isset($_POST['receiverAddress']) ? $_POST['receiverAddress'] : Null;
$note = isset($_POST['note']) ? $_POST['note'] : Null;

$sender = isset($_POST['sender']) ? $_POST['sender'] : Null;
$senderMobile = isset($_POST['senderMobile']) ? $_POST['senderMobile'] : Null;
$senderAddress = isset($_POST['senderAddress']) ? $_POST['senderAddress'] : Null;
$senderEmail = isset($_POST['senderEmail']) ? $_POST['senderEmail'] : Null;

$output = [
    $_SESSION['receiver']['receiver'] = $receiver,
    $_SESSION['receiver']['receiverMobile'] = $receiverMobile,
    $_SESSION['receiver']['receiverAddress'] = $receiverAddress,
    $_SESSION['receiver']['note'] = $note,
    $_SESSION['sender']['sender'] = $sender,
    $_SESSION['sender']['senderMobile'] = $senderMobile,
    $_SESSION['sender']['senderAddress'] = $senderAddress,
    $_SESSION['sender']['senderEmail'] = $senderEmail,
    'code' => 0,
    'success' => true
];



echo json_encode($output, JSON_UNESCAPED_UNICODE);

?>