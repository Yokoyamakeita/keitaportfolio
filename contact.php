<?php
// セッションスタート
session_start();

$errrormessage = '';


// contact_mailから帰ってきたのか判定
// そうだったら値を入れておきましょ
if(!empty($_SESSION['errormessage'])){
    $errrormessage = $_SESSION['errormessage'];
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
$html = str_replace('###error###',htmlspecialchars($errrormessage),$html);


// 表示出力処理
print($html);


// ーーーーーーーーーーーーーーーーー