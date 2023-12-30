<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'test';

  $conn = new mysqli($servername, $username, $password, $dbname);

  // 接続の確認
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // 画像URLをデータベースに保存する例
  foreach ($background_image_url as $url) {
      // SQL文の作成
      $sql = "INSERT INTO images_table (image_url) VALUES ('$url')";
      // クエリの実行
      if ($conn->query($sql) === TRUE) {
          echo "Record inserted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  // リンクURLをデータベースに保存する例
  foreach ($linkURLs as $url) {
      // SQL文の作成
      $sql = "INSERT INTO links_table (link_url) VALUES ('$url')";
      // クエリの実行
      if ($conn->query($sql) === TRUE) {
          echo "Record inserted successfully";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
  }

  // データベース接続のクローズ
  $conn->close();
  ?>
</body>
</html>