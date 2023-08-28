<?php
$castles_id=$_GET['id'];

require('connect.php');
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
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/swiper@5.3.6/css/swiper.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/swiper@5.3.6/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-awesome-swiper@4.1.1/dist/vue-awesome-swiper.js"></script>
  <title><?php echo $castles_title;?></title>
</head>
<body>
  <?php require('header.php'); ?>
  <div class="overall">
  <h1 class="cas_title"><?php echo $castles_title; ?></h1>
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
            $disp_img1="img/$castles_img1";
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
            $disp_img2="img/$castles_img2";
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
            $disp_img3="img/$castles_img3";
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
            $disp_img4="img/$castles_img4";
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
            $disp_img5="img/$castles_img5";
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    ?>

    <div id="app">
    <swiper :options="swiperOptions" ref="swiperOptions" class="swiperOptions">
        <swiper-slide>
            <span><img src="<?php echo $disp_img1; ?>" alt=""></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img2; ?>" alt=""></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img3; ?>" alt=""></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img4; ?>" alt=""></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img5; ?>" alt=""></span>
        </swiper-slide>
    <div class="swiper-pagination" slot="pagination"></div>
    </swiper>

    <swiper :options="swiperThumbs" ref="swiperThumbs" class="swiperThumbs">
        <swiper-slide>
            <span><img src="<?php echo $disp_img1; ?>" alt="" /></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img2; ?>" alt="" /></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img3; ?>" alt="" /></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img4; ?>" alt="" /></span>
        </swiper-slide>
        <swiper-slide>
            <span><img src="<?php echo $disp_img5; ?>" alt="" /></span>
        </swiper-slide>
    </swiper>
    </div>

    

    <table class="table">
        <tbody>
            <tr>
                <th>城郭構造</th>
                <td><?php echo $castles_structure;?></td>
            </tr>
            <tr>
                <th>天守構造</th>
                <td><?php echo $castles_tenshu;?></td>
            </tr>
            <tr>
                <th>築城主</th>
                <td><?php echo $castles_builder;?></td>
            </tr>
            <tr>
                <th>築城年</th>
                <td><?php echo $castles_year;?></td>
            </tr>
            <tr>
                <th>主な城主</th>
                <td><?php echo $castles_lord;?></td>
            </tr>
            <tr>
                <th>指定文化財</th>
                <td><?php echo $castles_specify1;?></td>
            </tr>
            <tr>
                <th>遺構</th>
                <td><?php echo $castles_遺構;?></td>
            </tr>
            <tr>
                <th>おすすめ度</th>
                <td><?php echo $castles_recommend;?></td>
            </tr>
            <tr>
                <th>解説</th>
                <td>
                    <div class='comment'>
                        <?php echo $castles_explan;?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    注：おすすめ度はお城初心者に最適な度合いを表しています。
    <div class="access">アクセス</div>
    <div class="map">
        <?php echo $castles_access;?>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="menu.js"></script>
  <script type="text/javascript" src="gallery.js"></script>
  <?php require('footer.php'); ?>