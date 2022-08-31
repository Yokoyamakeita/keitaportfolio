<?php
// セッションスタート
session_start();

$error = '';


// contact_mailから帰ってきたのか判定
// そうだったら値を入れておきましょ
if(!empty($_SESSION['error'])){
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}


// ーーーーーーーーーーーーーーーーー

// contact.php
$body = file_get_contents('contact.html');

// 共通部分は使っていく
$header = file_get_contents('common/header2.html');
$footer = file_get_contents('common/footer.html');

// 合体
$html = $header . $body . $footer;

// メッセージを置き換える
// ###error### にOK or NG の判定を入れておく
$html = str_replace('{{error}}',htmlspecialchars($error),$html);


// 表示出力処理
print($html);


// ーーーーーーーーーーーーーーーーー