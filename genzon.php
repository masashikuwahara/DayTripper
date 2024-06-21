<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>現存天守</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">現存天守</h1>
  
  <div class="about">
    現存天守とは江戸時代以前に建造され、現在でも残っている天守のことを言います。
    かつて日本全国には多数の城があり、天守閣も多くありました。しかし戦乱、江戸時代初期の
    一国一城令、明治維新の廃城令、落雷や火事での焼失などの理由により
    ほとんどが失われ、現在では12城が残るのみです。12城のうち、5城は国宝に指定されており、
    他7つは重要文化財に指定されています。現存天守以外の天守閣は復元されたものです。
    自分はこれまで8か所訪れましたのでご紹介します。
  </div>
  <hr>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,cas,title,img1 FROM castles WHERE genzon = 1 ORDER BY cas ASC';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

      $dbh = null;

      while(true)
      {
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$rec)
        {
          break;
        }

        if($rec['img1'] === '')
        {
          $img_name = '';
        }
        else
        {
          $img_name = '<img style="width:360px" src="img/'.$rec['img1'].'">';
        }

        echo '<span class="img_style">'.
            '<a href="detail.php?id='.$rec['id'].'">'.
            $img_name.
            '<br />'.
            $rec['title'].
              '</a>'.
            '<br />'.
            '</span>';
      }

      }
      catch (Exception $e)
      {
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
  ?>
  <script type="text/javascript" src="menu.js"></script>

  <?php include('footer.php'); ?>