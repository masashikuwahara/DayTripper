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

  <h1 class="title">100名城</h1>

  <div class="split">
    <?php echo '<a class="region" href="castle/hokkaido.php">北海道</a>' ?>
    <?php echo '<a class="region" href="castle/tohoku.php">東北</a>' ?>
    <?php echo '<a class="region" href="castle/kanto.php">関東</a>' ?>
    <?php echo '<a class="region" href="castle/chubu.php">中部</a>' ?>
    <?php echo '<a class="region" href="castle/kinki.php">近畿</a>' ?>
    <?php echo '<a class="region" href="castle/chugoku.php">中国</a>' ?>
    <?php echo '<a class="region" href="castle/shikoku.php">四国</a>' ?>
    <?php echo '<a class="region" href="castle/kyushu.php">九州</a>' ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script type="text/javascript" src="menu.js"></script>

  <?php include('footer.php'); ?>