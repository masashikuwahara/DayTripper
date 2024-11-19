<?php
require_once('../library.php');
session();

$cat_id=$_GET['id'];

require('../connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT title, kind, color, feature, place, comment,
img1,img2,img3 FROM cats WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$cat_id;
$stmt->execute($data);

$cul =$stmt->fetch(PDO::FETCH_ASSOC);
$cat_title=$cul['title'];
$cat_kind=$cul['kind'];
$cat_color=$cul['color'];
$cat_feature=$cul['feature'];
$cat_place=$cul['place'];
$cat_comment=$cul['comment'];
$cat_img1=$cul['img1'];
$cat_img2=$cul['img2'];
$cat_img3=$cul['img3'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $cat_title; ?></title>
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
    <h1><?php echo $cat_title; ?></h1>
    <br />
    <?php
    try{

        $dbh = null;

        if($cat_img1 === '')
        {
            $disp_img1='';
        }
        else
        {
            $disp_img1='<img src="../../cultural_assets/img/'.$cat_img1.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($cat_img2 === '')
        {
            $disp_img2='';
        }
        else
        {
            $disp_img2='<img src="../../cultural_assets/img/'.$cat_img2.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($cat_img3 === '')
        {
            $disp_img3='';
        }
        else
        {
            $disp_img3='<img src="../../cultural_assets/img/'.$cat_img3.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    ?>
    <?php echo $disp_img1;?>
    <?php echo $disp_img2;?>
    <?php echo $disp_img3;?>
    <br />
    <h2>種類</h2>
    <?php echo $cat_kind;?>
    <br />
    <h2>毛色・柄</h2>
    <?php echo $cat_color;?>
    <br />
    <h2>特徴</h2>
    <?php echo $cat_feature;?>
    <br />
    <h2>目撃場所</h2>
    <?php echo $cat_place;?>
    <br />
    <h2>コメント</h2>
    <?php echo $cat_comment;?>
    <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
    </form>
    
</body>
</html>