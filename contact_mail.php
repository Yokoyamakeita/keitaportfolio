<?php
// セッションスタート
session_start();

// 使用変数
$name = $GET['yourname'];
$email = $GET['youremail'];
$message - $GET['yourmessage'];
$error = '';


// 題目として追加しておく
$name .= '様からのお問い合わせ';

// メール判定
// エラったらメッセージを格納しておきましょ
if(mail($email, $name, $message)){
    $error = 'お問い合わせありがとうございました！';
}else{
    $error = '送信に失敗しました。時間を明けて再度ご確認ください！';
}

// リダイレクト対応としてセッションに保持しておく
$_SESSION['error'] = $error;


// メール内容のセッションは削除しておく
unset($name);
unset($email);
unset($message);

header('location:contact.php');
exit;
