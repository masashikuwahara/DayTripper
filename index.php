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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
  <link rel="canonical" href="https://daytripper.site/">
  <style>
    .ad{
      text-align: center;
      margin-bottom: 30px;
    }

    .query {
      text-align: center;
      margin-top: 20px;
      font-size: 15px;
    }
  </style>
  <title>DayTripperの記録</title>
</head>
<body>
  <?php require('header.php'); ?>
  <div class="cover2">
  <div id="background1" class="background"></div>
  <div id="background2" class="background hidden"></div>
  </div>


      <div class="cover">
        <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
          <label><input type="radio" class="option-input" name="select" value="castle" checked>城を検索する</label>
          <label><input type="radio" class="option-input" name="select" value="culture" >文化財を検索する</label><br />
          <input class="sea" type="text" name="s" placeholder="例:姫路城、出雲大社">
          <input class="btn" type="submit" value="検索する">
        </form>
        <p style="text-align: center;">地域ごとに城を検索できるようにしました。こちらもご覧ください</p>
        <p class="map"><a href="map/" id="child">日本地図から城を検索</a></p>
      
        <h2 style="text-align: center;">今のあなたにおすすめな城</h2><br />
        
        <?php
        try{
          require('connect.php');
          $dbh->query('SET NAMES utf8');
          $sql='SELECT * FROM castles ORDER BY RAND() ';
          $stmt=$dbh->prepare($sql);
          $stmt->execute();
        
          $rec=$stmt->fetch(PDO::FETCH_ASSOC);
          $img_name='<img style="width:360px" src="img/'.$rec['img1'].'">';
        
          echo '<div class="rand" style="text-align: center;">'.'<a href="detail.php?id='.$rec['id'].'">'.
          $img_name.'<br />'.$rec['title'].'</a>'.'</div>';
        
        }
        catch (Exception $e)
        {
          echo 'ただいま障害により大変ご迷惑をお掛けしております。';
          exit();
        }
        ?>
        
          <h2 class="front">城ビギナーへおすすめの城</h2>
            <ul class="front">
              <?php
              $sql='SELECT * FROM castles WHERE recnumber= 5 ORDER BY cas ASC limit 3';
              $stmt=$dbh->prepare($sql);
              $stmt->execute();
        
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
              ?>
            </ul>
            <div class="mo">
              <a href="recommend.php">さらに見る</a>
            </div>
      </div>
        
          <div style="text-align: center;">
            <a href="https://px.a8.net/svt/ejp?a8mat=3TF2AW+CSTJ02+14CS+6HMHT" rel="nofollow">
              <img border="0" width="320" height="50" alt="" src="https://www24.a8.net/svt/bgt?aid=230810216774&wid=001&eno=01&mid=s00000005230001090000&mc=1"></a>
              <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=3TF2AW+CSTJ02+14CS+6HMHT" alt="">
          </div>
          <?php
          try
          {
            $sql='SELECT * FROM info ORDER BY id DESC limit 3 ';
            $stmt=$dbh->prepare($sql);
            $stmt->execute();
          ?>

          <p class="update">更新情報</p>
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
        
          <div class="mo">
            <a href="info.php">更新履歴を見る</a>
          </div>
      <div class="ad">
        <a href="milestones/" target="_blank" rel="noopener noreferrer"><img src="milestones/1000posts.png" width="234px" alt="インスタ"></a>
        <p>1000投稿記念ページのアーカイブです</p>
      </div>

      <div class="insta">
        <a href="https://www.instagram.com/day_____tripper_official/" target="_blank" rel="noopener noreferrer"><img src="img/insta.png" width="30px" alt="インスタ"></a>
      </div>

      <div class="ad">
      <a href="https://px.a8.net/svt/ejp?a8mat=3TF2AW+C210S2+455G+639IP" rel="nofollow">
        <img border="0" width="234" height="60" alt="" src="https://www25.a8.net/svt/bgt?aid=230810216729&wid=001&eno=01&mid=s00000019330001023000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3TF2AW+C210S2+455G+639IP" alt="">
      </div>
      <div class="query">
        <a href="contact/">お問い合わせ</a>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/vue-awesome-swiper@3.1.3/dist/vue-awesome-swiper.min.js"></script>
      <script type="text/javascript" src="swiper.js"></script>
      <script type="text/javascript" src="menu.js"></script>
      <script type="text/javascript" src="bg.js"></script>
  <?php require('footer.php'); ?>
