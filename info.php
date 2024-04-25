<!DOCTYPE html>
<html lang="ja">
<head>
  <meta name="description" content="DayTripperの旅の記録を集めたサイトです。城や文化財を中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta name="format-detection" content="email=no,telephone=no,address=no">
  <meta property="og:title" content="DayTripperの記録">
  <meta property="og:description" content="DayTripperの旅の記録を集めたサイトです。城や文化財を中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta property="og:image" content="サムネイル画像までのURL">
  <meta property="og:url" content="https://daytripper.site"> 
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="DayTripperの記録">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="canonical" href="https://daytripper.site/">
  <style>
    .ad{
      text-align: center;
      margin-bottom: 30px;
    }
  </style>
  <title>更新履歴</title>
</head>
<body>
  <?php require('header.php'); ?>
  <div id="app">
    <div id="wrapper">

      <?php
        try
        {
          require('connect.php');
          $dbh->query('SET NAMES utf8');
          $sql='SELECT * FROM info ORDER BY id DESC ';
          $stmt=$dbh->prepare($sql);
          $stmt->execute();
          $dbh=null;
        ?>
        
        <p class="update">更新履歴</p>
        <div class="info">
          <ul class="info2">
            <?php 
            while(true)
            {
              $rec=$stmt->fetch(PDO::FETCH_ASSOC);
              if(!$rec)
              {
                break;
              }

              if(!$rec['number'])
              {
                echo '<li class="info3">'.
                '<a href="'.$rec['url'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                '</li>';
              }elseif($rec['kinds'] === 1){
                echo '<li class="info3">'.
                '<a href="detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                '</li>';
              }else{
                echo '<li class="info3">'.
                '<a href="culturals_detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
                '</li>';
              }
            }
          }
          catch (Exception $e)
          {
            echo 'ただいま障害により大変ご迷惑をお掛けしております。';
            exit();
          }
          ?>
          </ul>
        </div>
    </div>
  </div>

  <script type="text/javascript" src="menu.js"></script>
  <?php require('footer.php'); ?>