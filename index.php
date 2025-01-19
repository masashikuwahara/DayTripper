<!DOCTYPE html>
<html lang="ja">
<head>
  <meta name="description" content="DayTripperの旅の記録を集めたサイトです。城や文化財を中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta name="format-detection" content="email=no,telephone=no,address=no">
  <meta property="og:title" content="DayTripperの記録">
  <meta property="og:description" content="旅の記録を集めたwebサイトです。城や文化財を中心に訪れておりカテゴリー別に分けて紹介しています。">
  <meta property="og:image" content="https://daytripper.site/img/himejicastle.jpg">
  <meta property="og:url" content="https://daytripper.site"> 
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="DayTripperの記録">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="canonical" href="https://daytripper.site/">
  <title>DayTripperの記録</title>
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
    .banner {
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <?php require('header.php'); ?>
  <div class="scroll-down">
      <span class="arrow">&#x2193;</span>
      <p>Scroll Down</p>
  </div>
  <div class="fade-bg">
    <div class="fade-bg__inner" id="js-fade-bg__inner"></div>
  </div>
  <!-- ターゲット -->
  <div id="target-section"></div>
  <div class="banner">
    <a href="vr.php" rel="noopener noreferrer"><img src="img/vrbanner.png" alt="" ></a><br>
    VR動画をテスト公開しています
  </div>
  <h2 class="front">城や文化財を検索</h2>
  <form style="text-align: center;" class="cp_ipradio" method="GET" action="search.php">
    <input type="text" class="sea" name="s" placeholder="例：姫路城、山城">
    <button class="btn" type="submit">検索</button>
  </form>

  <div class="ad">
    <P>
      城名や城郭構造(山城、梯郭式、渦郭式など)で検索が可能です。
    </P>
  </div>
  <h2 class="front">都道府県別で城を検索</h2>
  <div class="banner">
    <a href="prefectures/" target="_blank" rel="noopener noreferrer"><img src="img/prefectures.jpg" alt="都道府県別" ></a>
  </div>
  <h2 class="front" >今のあなたにおすすめな城</h2><br />
        
  <?php
  try{
    require('connect.php');
    $dbh->query('SET NAMES utf8');
    $sql='SELECT id, title, img1 FROM castles ORDER BY RAND() ';
    $stmt=$dbh->prepare($sql);
    $stmt->execute();
  
    $rec=$stmt->fetch(PDO::FETCH_ASSOC);
    $img_name='<img style="width:360px" src="img/'.$rec['img1'].'">';
  
    echo '<div class="rand" style="text-align: center;">'.'<a href="detail.php?id='.$rec['id'].'">'.
    $img_name.'<br />'.$rec['title'].'</a>'.'</div>';
  
  }catch (Exception $e){
    echo 'ただいま障害により大変ご迷惑をお掛けしております。';
    exit();
  }
  ?>
  
    <h2 class="front">城ビギナーへおすすめの城</h2>
      <ul class="front_r">
        <?php
        $sql='SELECT id, title, img1 FROM castles WHERE recnumber= 5 ORDER BY cas ASC limit 3';
        $stmt=$dbh->prepare($sql);
        $stmt->execute();
  
        while(true){
          $rec=$stmt->fetch(PDO::FETCH_ASSOC);
          if(!$rec){
            break;
          }
  
          if($rec['img1'] === ''){
            $img_name = '';
          }else{
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
  
    <div style="text-align: center;">
      <a href="https://px.a8.net/svt/ejp?a8mat=3TF2AW+CSTJ02+14CS+6HMHT" rel="nofollow">
        <img border="0" width="320" height="50" alt="" src="https://www24.a8.net/svt/bgt?aid=230810216774&wid=001&eno=01&mid=s00000005230001090000&mc=1"></a>
        <img border="0" width="1" height="1" src="https://www12.a8.net/0.gif?a8mat=3TF2AW+CSTJ02+14CS+6HMHT" alt="">
    </div>
    <?php
    try{
      $sql='SELECT * FROM info ORDER BY id DESC limit 3 ';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
    ?>

    <p class="update">更新情報</p>
    <div class="info">
      <ul class="info2">
        <?php 
        while(true){
          $rec=$stmt->fetch(PDO::FETCH_ASSOC);
          if(!$rec){
            break;
          }
          if($rec['kinds'] === 1){
            echo '<li class="info3">'.
            '<a href="detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
            '</li>';
          }else{
            echo '<li class="info3">'.
            '<a href="'.$rec['url'].'">'.$rec['day'].'&nbsp;'.$rec['information'].'</a>'.
            '</li>';
          }
        }
      }
      catch (Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
      ?>
      </ul>
    </div>
  
    <div class="mo">
      <a href="info.php">更新履歴を見る</a>
    </div>

<!-- <div class="ad">
  <a href="archive/">archive</a>
</div> -->

<div class="insta">
  <a href="https://www.instagram.com/day_tripper_official/" target="_blank" rel="noopener noreferrer"><img src="img/insta.png" width="30px" alt="インスタ"></a>
</div>

<div class="ad">
<a href="https://px.a8.net/svt/ejp?a8mat=3TF2AW+C210S2+455G+639IP" rel="nofollow">
  <img border="0" width="234" height="60" alt="" src="https://www25.a8.net/svt/bgt?aid=230810216729&wid=001&eno=01&mid=s00000019330001023000&mc=1"></a>
  <img border="0" width="1" height="1" src="https://www17.a8.net/0.gif?a8mat=3TF2AW+C210S2+455G+639IP" alt="">
</div>
<div class="query">
  <a href="contact/">お問い合わせ</a>
</div>
<script>
  document.querySelector('.scroll-down').addEventListener('click', () => {
    const targetElement = document.getElementById('target-section');
    targetElement.scrollIntoView({ behavior: 'smooth' });
  });
</script>
<script type="text/javascript" src="bg.js"></script>
<?php require('footer.php'); ?>
<!-- ver.4.9.0 -->