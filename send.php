<?php

$fullname = $_POST['fullname'];
$business = $_POST['business'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$ip = $_SERVER['REMOTE_ADDR'];

$apiToken = "6442577743:AAFedTsHl5AzB6GKVz5Ufok_n-ILiZbSkDs";
$chatId = "-4037156801";
$sendMessageUrl = "https://api.telegram.org/bot$apiToken/sendMessage";

$data = [
    'chat_id' => $chatId,
    'text' => "Ad Soyad: $fullname\nŞirkət: $business\nE-poçt: $email\nTelefon: $phone\nMesaj: $message\nIP: $ip"
];


$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($sendMessageUrl, false, $context);

header("Location: /");

?>