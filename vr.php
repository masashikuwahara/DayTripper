<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>VR動画</title>
  <style>
    span {
      width: 360px;
    }
  </style>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">VR動画</h1>
  
  <div class="about">
  </div>
  <hr>
  <?php
    try{
      include('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id, title, description, time, img FROM vrvideo ';
      $stmt=$dbh->prepare($sql);
      $stmt->execute();
      $dbh = null;

      while(true){
        $rec=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!$rec){
          break;
        }
        
        if($rec['img'] === ''){
          $img_name = '';
        }else{
          $img_name = '<img style="width:360px" src="img/'.$rec['img'].'">';
        }
        echo '<span class="img_style">'.'<a href="vrplay.php?id='.$rec['id'].'">'.
        $img_name.'<br />'.$rec['title'].'</a>'.$rec['time'].'<br />'.$rec['description'].'</span>';
      }
      }catch (Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
      ?>
</div>
<script type="text/javascript" src="menu.js"></script>
<?php include('footer.php'); ?>