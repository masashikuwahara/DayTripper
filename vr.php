<?php
// ユーザー名とパスワードを設定
$valid_username = '';
$valid_password = '';

// Basic認証の実施
if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] !== $valid_username ||
    $_SERVER['PHP_AUTH_PW'] !== $valid_password) {
    // 認証情報が正しくない場合、認証要求のレスポンスを送信
    header('WWW-Authenticate: Basic realm="Protected Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo '認証が必要です';
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>VR</title>
  <style>
    span {
      width: 360px;
    }
  </style>
</head>
<body>
<?php include('header.php'); ?>
<div class="castle_page">
  <h1 class="title">VR</h1>
  
  <div class="about">
  </div>
  <hr>
  <?php
    try
    {
      include('connect.php');
      $dbh->query('SET NAMES utf8');
      $sql='SELECT id, title, description, img FROM vrvideo ';
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
        echo '<span class="img_style">'.'<a href="vrtest.php?id='.$rec['id'].'">'.
            $img_name.'<br />'.$rec['title'].'</a>'.'<br />'.$rec['description'].'</span>';
      }
      }catch (Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
      }
      ?>
</div>
<script type="text/javascript" src="menu.js"></script>
<?php include('footer.php'); ?>