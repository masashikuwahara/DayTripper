<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>続100名城</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">続100名城</h1>
  
  <div class="about">日本城郭協会が財団法人50周年の記念事業の一環として続日本100名城を
    公募し、2017年4月6日に発表されました。数の関係から100名城で落選した城も候補に挙がり、
    多数選定されています。</br>
    選定基準は100名城と同じく
    <ul>
      <li>・優れた文化財・史跡</li>
      <li>・著名な歴史の舞台</li>
      <li>・時代・地域の代表</li>
    </ul>
      となっています。
  </div>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,cas,title,img1 FROM 100castles WHERE cas >= 101 AND cas <= 200 ORDER BY cas ASC';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();

      $dbh=null;

      while(true)
      {
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if($rec==false)
        {
          break;
        }

        if($rec['img1']=='')
        {
          $img_name='';
        }
        else
        {
          $img_name='<img style="width:360px" src="img/'.$rec['img1'].'">';
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