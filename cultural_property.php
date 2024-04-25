<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>その他文化財</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">その他文化財</h1>
  
  <div class="about">
    城周辺、もしくはその道中には様々な文化財や昔の暮らしの名残みたいなのが残っています。
    その中で気になったものをまとめてみました。
    また100名城、続100名城以外の城もこちらにまとめてあります。
  </div>
  <hr>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,title,img1 FROM cultures ';
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
          $img_name='<img style="width:360px" src="img/'.$rec['img1'].'">';
        }

        echo '<span class="img_style">'.
            '<a href="culturals_detail.php?id='.$rec['id'].'">'.
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
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="menu.js"></script>

  <?php include('footer.php'); ?>