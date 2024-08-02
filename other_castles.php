<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>その他の城</title>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">その他の城</h1>
  <div class="about">
    100名城、続100名城以外のお城です。これらの多くの城も史跡に指定されており、
    歴史的にも重要な城です。だいたいは本城を守る支城であり、守りに特化していることから
    様々な堀や土塁などの遺構を見ることができます。
  </div>
  <hr>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,cas,title,img1 FROM castles WHERE cas >= 201 AND cas <= 300 ORDER BY cas ASC';
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

<?php include('footer.php'); ?>