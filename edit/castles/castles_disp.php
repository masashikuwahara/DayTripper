<?php
require_once('../library.php');
session();

$castles_id=$_GET['id'];

require('../../connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT cas,title,structure,tenshu,builder,year,lord,
remains,specify1,recommend,explan,access,img1,img2,img3,img4,img5
 FROM 100castles WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$castles_id;
$stmt->execute($data);

$cas =$stmt->fetch(PDO::FETCH_ASSOC);
$castles_title=$cas['title'];
$castles_structure=$cas['structure'];
$castles_tenshu=$cas['tenshu'];
$castles_builder=$cas['builder'];
$castles_year=$cas['year'];
$castles_lord=$cas['lord'];
$castles_remains=$cas['remains'];
$castles_specify1=$cas['specify1'];
$castles_recommend=$cas['recommend'];
$castles_explan=$cas['explan'];
$castles_access=$cas['access'];
$castles_img1=$cas['img1'];
$castles_img2=$cas['img2'];
$castles_img3=$cas['img3'];
$castles_img4=$cas['img4'];
$castles_img5=$cas['img5'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $castles_title; ?></title>
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
    <h1><?php echo $castles_title; ?></h1>
    <br />
    <?php
    try{

        $dbh = null;

        if($castles_img1=='')
        {
            $disp_img1='';
        }
        else
        {
            $disp_img1='<img src="../../img/'.$castles_img1.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($castles_img2=='')
        {
            $disp_img2='';
        }
        else
        {
            $disp_img2='<img src="../../img/'.$castles_img2.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($castles_img3=='')
        {
            $disp_img3='';
        }
        else
        {
            $disp_img3='<img src="../../img/'.$castles_img3.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($castles_img4=='')
        {
            $disp_img4='';
        }
        else
        {
            $disp_img4='<img src="../../img/'.$castles_img4.'">';
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{

        $dbh = null;

        if($castles_img5=='')
        {
            $disp_img5='';
        }
        else
        {
            $disp_img5='<img src="../../img/'.$castles_img5.'">';
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
    <?php echo $disp_img4;?>
    <?php echo $disp_img5;?>
    <h2>城郭構造</h2>
    <?php echo $castles_structure;?>
    <br />
    <h2>天守構造</h2>
    <?php echo $castles_tenshu;?>
    <br />
    <h2>築城主</h2>
    <?php echo $castles_builder;?>
    <br />
    <h2>築城年</h2>
    <?php echo $castles_year;?>
    <br />
    <h2>主な城主</h2>
    <?php echo $castles_lord;?>
    <br />
    <h2>遺構</h2>
    <?php echo $castles_remains;?>
    <br />
    <h2>指定文化財</h2>
    <?php echo $castles_specify1;?>
    <br />
    <h2>おすすめ度</h2>
    <?php echo $castles_recommend;?>
    <br />
    <h2>解説</h2>
    <?php echo $castles_explan;?>
    <br />
    <h2>アクセス</h2>
    <?php echo $castles_access;?>
    <br />
    <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
    </form>
    
</body>
</html>