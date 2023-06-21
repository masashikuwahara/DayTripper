<?php
require_once('../library.php');
session();

$culturals_id=$_GET['id'];

require('../connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT cul,title,year,specify,explan,access,
img1,img2,img3 FROM cultures WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$culturals_id;
$stmt->execute($data);

$cul =$stmt->fetch(PDO::FETCH_ASSOC);
$culturals_title=$cul['title'];
$culturals_year=$cul['year'];
$culturals_specify=$cul['specify'];
$culturals_explan=$cul['explan'];
$culturals_access=$cul['access'];
$culturals_img1=$cul['img1'];
$culturals_img2=$cul['img2'];
$culturals_img3=$cul['img3'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $culturals_title; ?></title>
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
    <h1><?php echo $culturals_title; ?></h1>
    <br />
    <?php
    try{

        $dbh = null;

        if($culturals_img1=='')
        {
            $disp_img1='';
        }
        else
        {
            $disp_img1='<img src="../../img/'.$culturals_img1.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($culturals_img2=='')
        {
            $disp_img2='';
        }
        else
        {
            $disp_img2='<img src="../../img/'.$culturals_img2.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($culturals_img3=='')
        {
            $disp_img3='';
        }
        else
        {
            $disp_img3='<img src="../../img/'.$culturals_img3.'">';
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
    <h2>作成年</h2>
    <?php echo $culturals_year;?>
    <br />
    <h2>指定文化財</h2>
    <?php echo $culturals_specify;?>
    <br />
    <h2>解説</h2>
    <?php echo $culturals_explan;?>
    <br />
    <h2>アクセス</h2>
    <?php echo $culturals_access;?>
    <br />
    <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
    </form>
    
</body>
</html>