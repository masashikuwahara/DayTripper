<!DOCTYPE html>
<html lang="ja">
<head>
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
          <a href="#"><img src="img/osaka.jpg" alt="image"></a>
          <p>大阪城</p>
        </swiper-slide>

        <swiper-slide>
          <a href="#"><img src="img/himeji.jpg" alt="image"></a>
          <p>姫路城</p>
        </swiper-slide>
        
        <swiper-slide>
          <a href="#"><img src="img/okayama.jpg" alt="image"></a>
          <p>岡山城</p>
        </swiper-slide>

        <swiper-slide>
          <a href="#"><img src="img/nagashino.jpg" alt="image"></a>
          <p>長篠城</p>
        </swiper-slide>

        <swiper-slide>
          <a href="#"><img src="img/marugame.jpg" alt="image"></a>
          <p>丸亀城</p>
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
      ここはDayTripperのこれまでの旅の記録をまとめたものです。初めての方ははじめにのページをご覧ください。
    </p> 
  </div>
  
  <p style="text-align: center;">城や文化財を検索する</p>
  <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
    <input class="sea" type="text" name="s" placeholder="例:姫路城、出雲大社">
    <input class="btn" type="submit" value="検索する">
  </form>

  <p class="update">更新情報</p>
  <div class="info">
    <ul class="info2">
      <li class="info3">
        <div class="day">2023.6.5</div>
        <div class="label">更新情報</div>
        <div class="text">ページをオープンしました</div>
      </li>
    </ul>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue-awesome-swiper@3.1.3/dist/vue-awesome-swiper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="swiper.js"></script>
  <script type="text/javascript" src="menu.js"></script>
  <?php require('footer.php'); ?>