<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <title>アーカイブ</title>
  <style>
  .archive{
    text-align: center;
    margin-bottom: 20px;
  }
  </style>
</head>
<body>
<?php include('../header.php'); ?>
<div class="castle_page">
  <h1 class="title">アーカイブ</h1>
  
  <div class="archive">
    これまでの期間限定ページのアーカイブです
  </div>
  <hr>
  <?php
    try
    {
      require('../connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,cas,title,img1 FROM castles WHERE cas >= 1 AND cas <= 100 ORDER BY cas ASC';
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

        // echo '<span class="img_style">'.
        //     '<a href="detail.php?id='.$rec['id'].'">'.
        //     $img_name.
        //     '<br />'.
        //     $rec['title'].
        //       '</a>'.
        //     '<br />'.
        //     '</span>';
      }

      }
      catch (Exception $e)
      {
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
      ?>
</div>
<script type="text/javascript" src="../menu.js"></script>
<?php include('../footer.php'); ?>