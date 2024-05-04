<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>100名城</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">100名城</h1>
  
  <div class="about">
    日本100名城は日本城郭協会が財団法人となって40周年を記念する事業として、
    文部科学省・文化庁の後援を得て企画され発表されました。日本を代表する文化遺産であり
    地域の歴史的シンボルでもある城郭、城跡を、多くの人に知ってもらい、関心を高め、
    ひいては地域文化の振興につながることを念じて設定されました。選定基準として観光地としての知名度や文化財や歴史上の重要性、
    復元の正確性などを基準にして、歴史や建築の専門家などが審査しました。基本1都道府県1つ以上選定されますが、
    地域によっては重要で貴重な城多く、最多は長野県、兵庫県、愛媛県が5城選定されています。</br>
    選定基準は
    <ul>
      <li>・優れた文化財・史跡</li>
      <li>・著名な歴史の舞台</li>
      <li>・時代・地域の代表</li>
      <li>・各都道府県から1城以上5城以内</li>
      <li>・環境保存状況や城郭発達史からの観点</li>
    </ul>
      となっています。
  </div>
  <hr>
  <?php
    try
    {
      require('connect.php');
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
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="menu.js"></script>

  <?php include('footer.php'); ?>