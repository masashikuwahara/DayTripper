<?php
include('../library.php');
session();

$vr_id=$_GET['id'];

include('../../connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT title, description, video, img FROM vrvideo WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$vr_id;
$stmt->execute($data);

$vr =$stmt->fetch(PDO::FETCH_ASSOC);
$vr_title=$vr['title'];
$vr_desc=$vr['description'];
$vr_video=$vr['video'];
$vr_img=$vr['img'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?php echo $vr_title; ?></title>
</head>
<body>
    <header>
        <h1><?php echo $vr_title; ?></h1>
    </header>
        <main>
        <div class="content">
            <h1><?php echo $vr_title; ?></h1>
            <h2>説明</h2>
            <h3><?php echo $vr_desc; ?></h3>
            <h2>動画ファイル名</h2>
            <h3><?php echo $vr_video; ?></h3>
            <h2>サムネイルファイル名</h2>
            <h3><?php echo $vr_img; ?></h3>
        </div>
        <form>
            <input class="btn" type="button" onclick="history.back()" value="戻る">
        </form>
    </main>
    <?php include("../footer.php") ?>
</body>
</html>