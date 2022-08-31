<?php
// セッションスタート
session_start();

$name = '';
$email = '';
$message = '';
$error = '';

// 使用変数
$name = $_GET['yourname'];
$email = $_GET['youremail'];
$message = $_GET['yourmessage'];


// メール内容のセッションは削除しておく
unset($_SESSION['yourname']);
unset($_SESSION['youremail']);
unset($_SESSION['yourmessage']);

try{
    // CSVを取得
    // ファイルを読み込む
    require_once('class/csv.php');
    // インスタンス化
    $csvread_obj = new csv("log/log.csv","a+");

    $csvread_obj->add($name,$email,$message);

    $error = '※お問い合わせありがとうございました！';

}catch(Exception $e){
    $error = '※送信に失敗しました。時間を明けて再度ご確認ください！';
}


// リダイレクト対応としてセッションに保持しておく
$_SESSION['error'] = $error;


header('location:contact.php');
exit;
