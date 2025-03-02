<?php
require_once('library.php');
session();
$userName = $_SESSION['user_name'] ?? 'ゲスト';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>管理トップ</title>
</head>
<body>
    <header>
        <h1>編集管理トップメニュー</h1>
        <p class="welcome-message"><?php echo htmlspecialchars($userName, 
        ENT_QUOTES, 'UTF-8'); ?>さん、ようこそ！</p>
    </header>
    <main>
        <ul class="menu">
            <li><a href="castles/">城管理</a></li>
            <li><a href="culturalproperty/">その他文化財</a></li>
            <li><a href="cats/">猫ページ管理</a></li>
            <li><a href="vr/">VR動画管理</a></li>
            <li><a href="update/">城郭更新情報</a></li>
            <li><a href="update_c/">文化財更新情報</a></li>
            <li><a href="contact/">お問い合わせ</a></li>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
    </main>
    <?php include("../footer.php") ?>
</body>
</html>
