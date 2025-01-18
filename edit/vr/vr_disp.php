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
    <title><?php echo $vr_title; ?></title>
    <style>
        .btn{
            width: 100px;
            height: 50px;
            background-color: #00bfff;
            border-radius: 20px;
            border: none;
            color: #ffffff;
        }
        .btn:hover {
            background-color: #ed6fb5;
        }
    </style>
</head>
<body>
    <h1><?php echo $vr_title; ?></h1><br />
    <h2>説明</h2>
    <h3><?php echo $vr_desc; ?></h3><br />
    <h2>動画ファイル名</h2>
    <h3><?php echo $vr_video; ?></h3><br />
    <h2>サムネイルファイル名</h2>
    <h3><?php echo $vr_img; ?></h3><br />
    <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
    </form>
    
</body>
</html>