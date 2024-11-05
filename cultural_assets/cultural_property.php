<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Philosopher" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
  <link rel="stylesheet" href="style.css">
  <title>文化財一覧</title>
</head>
<body>
<?php include('menu.php'); ?>
<div class="castle_page">
  <h1 class="cas_title">文化財一覧</h1>
  <hr>
  <?php
    try
    {
      require('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id,title,img1 FROM cultures ';
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
          $img_name='<img src="img/'.$rec['img1'].'">';
        }

        echo '<div class="img_style">'.
            '<a href="culturals_detail.php?id='.$rec['id'].'">'.
            $img_name.
            $rec['title'].
              '</a>'.
            '<br />'.
            '</div>';
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
</body>
</html>