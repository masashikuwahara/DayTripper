<?php
require('../connect.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信結果</title>
    <style>
      .done {
        text-align: center;
        margin: 50px;
      }

      .btn2 {
        cursor: pointer;
        margin-top: 30px;
        padding: 15px 45px;
        border: none;
        border-radius: 3px;
        color: #fff;
        font-size: 20px;
        padding: 0;
        width: 150px;
        height: 50px;
        background-color: #166ab5;
      }

      a {
        cursor: pointer;
        margin-top: 30px;
        padding: 15px 45px;
        border: none;
        border-radius: 3px;
        color: #fff;
        font-size: 20px;
        padding: 0;
        width: 150px;
        height: 50px;
        background-color: #166ab5;
      }

      .btn2:hover {
        background-color: #d2691e;
      }

      .btn3 {
        text-align: center;
      }
    </style>
</head>
<body>
  <?php
  $name = htmlspecialchars($_POST["n"],ENT_QUOTES);
  $email = htmlspecialchars($_POST["e"],ENT_QUOTES);
  $title = htmlspecialchars($_POST["t"],ENT_QUOTES);
  $message = htmlspecialchars($_POST["m"],ENT_QUOTES);
  
  if( !empty($name) && ($email) && ($title) && ($message)){
    $dbh->query("INSERT INTO contact (id, name, email, title, message, created_at)
    VALUES (NULL,'$name','$email','$title','$message',NOW())");
    echo '<div class="done">送信しました</div><br>';
    echo '<div class="btn3">';
    echo '<a href="../index.php"><input class="btn2" type="button" value="トップへ戻る"></a>';
    echo '<div/>';

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");
    
    $subject = "新しいメッセージを受信しました";
    $text = "内容を確認してください";
    $headers = "From: 新着";
    mb_send_mail('xxxxx@email.com', $subject, $text, $headers);
  }else{
    echo '<div class="done">すべて入力してください</div><br>';
    echo '<div class="btn3">';
    echo '<input class="btn2" type="button" onclick="history.back()" value="戻る">';
    echo '<div/>';
  }
  ?>
</body>
</html>
