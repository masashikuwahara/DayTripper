<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>削除内容確認</title>
</head>
<body>
  <?php
     try{

        $update_id=$_GET['id'];

        require('../../connect.php');
        $dbh->query('SET NAMES utf8');
        $sql = 'SELECT * FROM info_c WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$update_id;
        $stmt->execute($data);
        
        $info =$stmt->fetch(PDO::FETCH_ASSOC);
        $update_id=$info['id'];
        $update_day=$info['day'];
        $update_content=$info['content'];

        $dbh = null;
      }
      catch (Exception $e)
      {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }
   ?>
    <header>
       <h1>削除内容確認</h1>
    </header>
   <main>
    <div class="content">
  <br />
  更新日<br />
  <?php echo $update_day; ?>
  <br />
  更新内容<br />
  <?php echo $update_content; ?>
  <br />
  <br />
  この内容を削除してよろしいですか？<br />
  </div>
    <form method="post" action="update_delete_done.php">
      <input type="hidden" name="id" value="<?php echo $update_id ?>">
        <input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;
        <input class="btn" type="submit" value="削除する">
    </form>
  </main>
  <?php include("../footer.php"); ?>
</body>
</html>