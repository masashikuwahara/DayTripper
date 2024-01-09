<?php
require_once('library.php');
session();

$contact_id=$_GET['id'];

require('connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT * FROM contact WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$contact_id;
$stmt->execute($data);

$con =$stmt->fetch(PDO::FETCH_ASSOC);
$contact_id=$con['id'];
$contact_name=$con['name'];
$contact_email=$con['email'];
$contact_message=$con['message'];
$contact_cre=$con['created_at'];

$dbh = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ詳細</title>
    <style>
        .btn{
            width: 100px;
            height: 50px;
            background-color: #00bfff;
            border-radius: 20px;
            border: none;
            color: #ffffff;
        }

        .btn:hover {
            background-color: #ed6fb5;
        }

        .wrapper {
          text-align: center;
          margin-left: 500px;
          margin-right: 500px;
        }
    </style>
</head>
<body>
  <div class="wrapper">
    <h2>お名前</h2>
      <?php echo $contact_name;?>
      <br />
      <h2>メールアドレス</h2>
      <?php echo $contact_email;?>
      <br />
      <h2>お問い合わせ内容</h2>
      <?php echo $contact_message;?>
      <br />
      <h2>お問い合わせ日</h2>
      <?php echo $contact_cre;?>
      <br />
      <br />
      <form>
        <input class="btn" type="button" onclick="history.back()" value="戻る">
      </form>
  </div>
</body>
</html>