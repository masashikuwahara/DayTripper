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
    <a href="castles/">城管理</a><br />
    <br />
    <a href="culturalproperty/">その他文化財</a><br />
    <br />
    <a href="cats/">猫ページ管理</a><br />
    <br />
    <a href="vr/">VRページ</a><br />
    <br />
    <a href="update/">城郭更新情報</a><br />
    <br />
    <a href="update_c/">文化財更新情報</a><br />
    <br />
    <a href="contact/">お問い合わせ</a><br />
    <br />
    <a href="logout.php">ログアウト</a><br />
</body>
</html>