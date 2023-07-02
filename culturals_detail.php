<?php
$culturals_id=$_GET['id'];

require('connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT title,year,specify,explan,access,img1,img2,img3
 FROM cultures WHERE id=?';
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
  <title><?php echo $culturals_title;?></title>
</head>
<body>
  <?php require('header.php'); ?>
  <div class="overall">
  <h1 class="cas_title"><?php echo $culturals_title; ?></h1>
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
            $disp_img1="img/$culturals_img1";
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
            $disp_img2="img/$culturals_img2";
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
            $disp_img3="img/$culturals_img3";
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
    </swiper>
    </div>

    

    <table class="table">
        <tbody>
            <tr>
                <th>作成年</th>
                <td><?php echo $culturals_year;?></td>
            </tr>
            <tr>
                <th>指定文化財</th>
                <td><?php echo $culturals_specify;?></td>
            </tr>
            <tr>
                <th>解説</th>
                <td>
                    <div class='comment'>
                        <?php echo $culturals_explan;?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="access">アクセス</div>
    <div class="map">
        <?php echo $culturals_access;?>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="menu.js"></script>
  <script type="text/javascript" src="gallery.js"></script>
  <?php require('footer.php'); ?>