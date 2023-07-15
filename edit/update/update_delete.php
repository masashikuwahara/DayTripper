<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>削除内容確認</title>
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
    </style>
</head>
<body>
  <?php
     try{

        $update_id=$_GET['id'];

        require('../../connect.php');
        $dbh->query('SET NAMES utf8');
        $sql = 'SELECT * FROM info WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$update_id;
        $stmt->execute($data);
        
        $info =$stmt->fetch(PDO::FETCH_ASSOC);
        $update_id=$info['id'];
        $update_day=$info['day'];
        $update_info=$info['information'];

        $dbh = null;
      }
      catch (Exception $e)
      {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
      }
   ?>

  削除内容確認<br />
  <br />
  更新日<br />
  <?php echo $update_day; ?>
  <br />
  更新内容<br />
  <?php echo $update_info; ?>
  <br />
  <br />
  この内容を削除してよろしいですか？<br />
    <form method="post" action="update_delete_done.php">
      <input type="hidden" name="id" value="<?php echo $update_id ?>">
        <input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;
        <input class="btn" type="submit" value="削除する">
    </form>
</body>
</html>