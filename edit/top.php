<?php
require_once('library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理トップ</title>
</head>
<body>
    編集管理トップメニュー<br />
    <br />
    <a href="castles/castles_list.php">城管理</a><br />
    <br />
    <a href="culturalproperty/culturals_list.php">その他文化財</a><br />
    <br />
    <a href="update/update_list.php">城郭更新情報</a><br />
    <br />
    <a href="update_c/update_list.php">文化財更新情報</a><br />
    <br />
    <a href="contact/">お問い合わせ</a><br />
    <br />
    <a href="logout.php">ログアウト</a><br />
</body>
</html>