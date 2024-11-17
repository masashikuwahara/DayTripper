<?php
$cat_id=$_GET['id'];

require('connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT title, kind, color, feature, place, comment, img1, img2, img3, img4 ,img5
FROM cats WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$cat_id;
$stmt->execute($data);

$cat =$stmt->fetch(PDO::FETCH_ASSOC);
$cat_title=$cat['title'];
$cat_kind=$cat['kind'];
$cat_color=$cat['color'];
$cat_feature=$cat['feature'];
$cat_place=$cat['place'];
$cat_comment=$cat['comment'];
$cat_img1=$cat['img1'];
$cat_img2=$cat['img2'];
$cat_img3=$cat['img3'];
$cat_img4=$cat['img4'];
$cat_img5=$cat['img5'];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Philosopher" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/swiper@5.3.6/css/swiper.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/swiper@5.3.6/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-awesome-swiper@4.1.1/dist/vue-awesome-swiper.js"></script>
  <title><?php echo $cat_title;?></title>
  <style>
        .cat_page {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px;
        }

        #largeImage {
            width: 80%;
            max-width: 600px;
            height: auto;
            margin-bottom: 20px;
            border: 3px solid #ccc;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .thumbnail-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .thumbnail {
            width: 100px;
            height: 70px;
            cursor: pointer;
            object-fit: cover;
            border: 2px solid transparent;
            border-radius: 4px;
            transition: transform 0.2s, border-color 0.2s;
        }

        .thumbnail:hover {
            transform: scale(1.1);
            border-color: #333;
        }

        .table {
            width: auto;
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0;
            border-top: solid 1px #778ca3;
        }
        .table tr:nth-child(2n+1) {
        background: #f3f3f2;
        }
        .table th,.table td {
        padding: 10px;
        border-bottom: solid 1px #778ca3;
        }
  </style>
</head>
<body>
  <?php require('menu.php'); ?>
  <h1 class="cas_title"><?php echo $cat_title; ?></h1>
    <br />
    <?php
    try{
        if($cat_img1 === '')
        {
            $disp_img1 = '';
        }
        else
        {
            $disp_img1="img/$cat_img1";
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{
        if($cat_img2 === '')
        {
            $disp_img2 = '';
        }
        else
        {
            $disp_img2="img/$cat_img2";
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{
        if($cat_img3 === '')
        {
            $disp_img3 = '';
        }
        else
        {
            $disp_img3="img/$cat_img3";
        }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{
      if($cat_img4 === '')
      {
          $disp_img4 = '';
      }
      else
      {
          $disp_img4="img/$cat_img4";
      }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    try{
      if($cat_img5 === '')
      {
          $disp_img5 = '';
      }
      else
      {
          $disp_img5="img/$cat_img5";
      }
    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }
    ?>
    <div class="cat_page">
        <img id="largeImage" src="<?php echo $disp_img1 ?>" alt="Large Display">
        <div class="thumbnail-container">
            <img src="<?php echo $disp_img1 ?>" class="thumbnail" onclick="showImage(this)">
            <?php if ($disp_img2): ?>
                <img src="<?php echo $disp_img2 ?>" class="thumbnail" onclick="showImage(this)">
            <?php endif; ?>
            <?php if ($disp_img3): ?>
                <img src="<?php echo $disp_img3 ?>" class="thumbnail" onclick="showImage(this)">
            <?php endif; ?>
            <?php if ($disp_img4): ?>
                <img src="<?php echo $disp_img4 ?>" class="thumbnail" onclick="showImage(this)">
            <?php endif; ?>
            <?php if ($disp_img5): ?>
                <img src="<?php echo $disp_img5 ?>" class="thumbnail" onclick="showImage(this)">
            <?php endif; ?>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>種類</th>
                    <td><?php echo $cat_kind;?></td>
                </tr>
                <tr>
                    <th>色</th>
                    <td><?php echo $cat_color;?></td>
                </tr>
                <tr>
                    <th>特徴</th>
                    <td><?php echo $cat_feature;?></td>
                </tr>
                <tr>
                    <th>発見場所</th>
                    <td><?php echo $cat_place;?></td>
                </tr>
                <tr>
                    <th>コメント</th>
                    <td><?php echo $cat_comment;?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        // 画像をクリックしたときに大きな画像を更新する関数
        function showImage(thumbnail) {
            const largeImage = document.getElementById('largeImage');
            largeImage.src = thumbnail.src;
            largeImage.alt = thumbnail.alt;
        }

	        // ページロード時に最初のサムネイルを大きな画像として表示
        window.onload = function() {
            const firstThumbnail = document.querySelector('.thumbnail');
            showImage(firstThumbnail);
        };
    </script>
  
  <?php require('footer.php'); ?>