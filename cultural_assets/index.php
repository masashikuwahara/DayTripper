<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="全国の文化財を廻る" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Philosopher" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
    <link href="style.css" rel="stylesheet" />
    <title>DayTripper文化財偏</title>
  </head>
  <body>
    <div id="splash">
      <div id="splash_text"></div>
    </div>
    <div class="wrapper">
      <div id="slider">
        <?php include('menu.php'); ?>
          <div class="home-content wrapper">
            <h1 class="page-title">遺されたものたち</h1>
            <p>-古の文化財と歴史スポット-</p>
              <p>
                こちらは番外編みたいなもので文化財を中心としたページです。<br>
                城以外の寺社仏閣、古墳などを紹介しています。
              </p>
          </div>
          <div class="icon">
            <a href="https://twitter.com/sakamichiiwlu4e" target="blank"><i class="fab fa-twitter fa-3x"></i></a>
            <a href="https://www.instagram.com/day_tripper_official/" target="blank"><i class="fab fa-instagram fa-3x"></i></a>
          </div>
   <?php
    try{
      require('connect.php');
      $sql='SELECT * FROM info_c ORDER BY id DESC limit 3 ';
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
            '<a href="culturals_detail.php?id='.$rec['number'].'">'.$rec['day'].'&nbsp;'.$rec['content'].'</a>'.
            '</li>';
          }else{
            echo '<li class="info3">'.
            '<a href="'.$rec['url'].'">'.$rec['day'].'&nbsp;'.$rec['content'].'</a>'.
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
      </div>
    </div>
    <?php include('footer.php'); ?>
    <script src="script.js"></script>
    </body>
</html>
<!-- version1.0.0 -->