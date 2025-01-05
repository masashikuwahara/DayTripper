<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>都道府県別城紹介ページ</title>
  <style>
    body {
      background-image: linear-gradient(
        rgb(184, 226, 214) 55%, rgb(187, 194, 235));
        background-attachment: fixed;
    }
  </style>
</head>
<body>
  <h1>都道府県別城紹介ページ</h1>
  <?php
  include('../connect.php');
  $dbh->query('SET NAMES utf8');

  $sql = 'SELECT id, title, prefectures FROM castles ORDER BY cas ASC;';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $castles = [];
  while ($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $castles[$rec['prefectures']][] = [
      'id' => htmlspecialchars($rec['id'], ENT_QUOTES, 'UTF-8'),
      'title' => htmlspecialchars($rec['title'], ENT_QUOTES, 'UTF-8')
    ];
  }

  foreach ($castles as $prefecture => $castleList) {
    echo '<div class="accordion">' . htmlspecialchars($prefecture, ENT_QUOTES, 'UTF-8') . '</div>';
    echo '<div class="panel">';
    foreach ($castleList as $castle) {
      echo '<a href="../detail.php?id=' . $castle['id'] . '">' . $castle['title'] . '</a><br>';
    }
    echo '</div>';
  }
  ?>
  <script src="script.js"></script>
</body>
</html>
