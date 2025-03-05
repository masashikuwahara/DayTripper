<?php
require_once('../library.php');
session();

$contact_id=$_GET['id'];

require('../connect.php');
$dbh->query('SET NAMES utf8');
$sql = 'SELECT * FROM contact WHERE id=?';
$stmt = $dbh->prepare($sql);
$data[]=$contact_id;
$stmt->execute($data);

$con =$stmt->fetch(PDO::FETCH_ASSOC);
$contact_id=$con['id'];
$contact_name=$con['name'];
$contact_email=$con['email'];
$contact_title=$con['title'];
$contact_message=$con['message'];
$contact_confirmed=$con['confirmed'];
$contact_cre=$con['created_at'];

$dbh = null;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>お問い合わせ詳細</title>
</head>
<body>
    <header>
      <h1><?php echo $contact_title; ?></h1>
    </header>
      <main>
        <div class="content">
          <?php
          echo '<td><span class="status '.($contact_confirmed === 0 ? 'pending' : 'done').'">'
            .($contact_confirmed === 0 ? '対応前' : '対応済み').'</span></td>';
          ?>
          <h2>お名前</h2>
            <?php echo $contact_name;?>
            <br />
            <h2>メールアドレス</h2>
            <?php echo $contact_email;?>
            <br />
            <h2>表題</h2>
            <?php echo $contact_title;?>
            <br />
            <h2>お問い合わせ内容</h2>
            <?php echo $contact_message;?>
            <br />
            <h2>お問い合わせ日</h2>
            <?php echo $contact_cre;?>
            <br />
            <br />
            <form method="post" action="contact_check.php" ">
              <input type="hidden" name="id" value="<?php echo $contact_id; ?>">
              <input type="radio" name="ck" value="0" checked>回答前
              <input type="radio" name="ck" value="1">回答済み
              <input class="btn" type="submit" value="次のページへ">
            </form>
            <form>
              <input class="btn" type="button" onclick="history.back()" value="戻る">
            </form>
        </div>
      </main>
<?php include("../footer.php") ?>
</body>
</html>