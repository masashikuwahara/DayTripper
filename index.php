<!DOCTYPE html>
<html lang="ja">
<head>
  <meta name="description" content="DayTripperの記録を集めたサイトです。城や文化財をを中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta name="format-detection" content="email=no,telephone=no,address=no">
  <meta property="og:title" content="DayTripperの記録">
  <meta property="og:description" content="DayTripperの記録を集めたサイトです。城や文化財をを中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta property="og:image" content="サムネイル画像までのURL">
  <meta property="og:url" content="https://daytripper.site"> 
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="DayTripperの記録">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <title>DayTripperの記録</title>
</head>
<body>
  <?php require('header.php'); ?>
  
  <div id="app">
    <div id="wrapper">
  
      <swiper :options="swiperOption">
  
        <swiper-slide>
          <a href="genzon.php"><img src="img/genzon.jpg" alt="image"></a>
          <p>現存天守</p>
        </swiper-slide>

        <swiper-slide>
          <a href="100_castles.php"><img src="img/100meijou.jpg" alt="image"></a>
          <p>日本100名城</p>
        </swiper-slide>
        
        <swiper-slide>
          <a href="sequel_100_castles.php"><img src="img/zokunihon.jpg" alt="image"></a>
          <p>続日本100名城</p>
        </swiper-slide>

        <div class="swiper-pagination"  slot="pagination"></div>

        <div class="swiper-button-prev swiper-button-white" slot="button-prev"></div>
        <div class="swiper-button-next swiper-button-white" slot="button-next"></div>
      </swiper>
    </div>
  </div>

  <h1 id="title">DayTripperの記録</h1>

  <div id="title">
    <p>
      ここはわたくし、DayTripperのこれまでの旅の記録をまとめたものです。日本100名城、続日本100名城、文化財を中心に
      日本各地いろいろな場所へ行ってきまして、簡単にではありますがカテゴリー別に分けて紹介しています。
      初めての方ははじめにのページをご覧ください。
    </p> 
  </div>
  
  <p style="text-align: center;">城や文化財を検索する</p>
  <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
    <label><input type="radio" class="option-input" name="select" value="castle" checked>城を検索する</label>
    <label><input type="radio" class="option-input" name="select" value="culture" >文化財を検索する</label><br />
    <input class="sea" type="text" name="s" placeholder="例:姫路城、出雲大社">
    <input class="btn" type="submit" value="検索する">
  </form>

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

  <p class="update">更新情報</p>
  <div class="info">
    <ul class="info2">
        <?php 
              while(true)
              {
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                if($rec==false)
                {
                  break;
                }
        
                echo '<li class="info3">'.
                $rec['day'].
                '&nbsp;'.
                $rec['information'].
                '</li>';
              }
        
              }
              catch (Exception $e)
              {
                echo 'ただいま障害により大変ご迷惑をお掛けしております。';
                exit();
              }
        
        ?>
      </li>
    </ul>
  </div>

  <div class="insta">
    <a href="https://www.instagram.com/day_____tripper_official/" target="_blank" rel="noopener noreferrer"><img src="img/insta.png" width="30px" alt="インスタ"></a>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-awesome-swiper@3.1.3/dist/vue-awesome-swiper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="swiper.js"></script>
  <script type="text/javascript" src="menu.js"></script>
  <?php require('footer.php'); ?>