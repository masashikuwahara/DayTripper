<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>城ビギナーへおすすめの城</title>
</head>
<body>
  <?php require('header.php'); ?>
  <div class="castle_page">
  <h1 class="title">城ビギナーへおすすめの城</h1>
  
  <div class="about">
    このページでは平城、平山城からお勧めする城をピックアップしてみました。これから行ってみたいという人は
    ぜひお役立てください。<br>
    はじめは平城、平山城から行くことをお勧めします。平城は平地に建つ城のことで、平山城は小高い丘、
    または小さい山(大体200m以下)に建つ城のことを指します。<br>
    平地や丘といったところにあるので比較的簡単に行くことができます。
    また、江戸時代以前に建てられた現存天守、復元された天守のほとんどはこの平城、平山城になるので、
    いかにも城！というのを体験したい人にはもってこいです。<br>
    逆に山城についてはお勧めしません。険しい山道を苦労して行き、しかもやっとのことで着いた場所には何もない、
    ただの城跡しかありません。ビギナーの人で期待して来た人は大抵ガックリ来ます。
    なので最初は平城、平山城から行き、本格的に興味を持ったら山城に行くようにしてみてください。<br>
  </div>
  <hr>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,cas,title,img1 FROM castles WHERE recnumber = 5 ORDER BY cas ASC';
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

  <script type="text/javascript" src="menu.js"></script>
  <?php require('footer.php'); ?>
