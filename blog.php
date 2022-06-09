<?php

// index.php
$body = file_get_contents('blog.html');

// 共通部分は使っていく
$header = file_get_contents('common/header.html');
$footer = file_get_contents('common/footer.html');

// 合体
$html = $header . $body . $footer;

print($html);