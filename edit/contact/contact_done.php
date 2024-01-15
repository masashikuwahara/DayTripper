<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>修正しました</title>
</head>
<body>
    <?php
    try
    {
        $post=($_POST);
        $con_id=$post['id'];
        $con_ck=$post['ck'];

        require('../connect.php');

        $sql = 'UPDATE contact SET confirmed=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $con_ck;
        $data[] = $con_id;
        $stmt->execute($data);

        $dbh = null;
        
        echo '更新しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <a href="index.php">戻る</a>
</body>
</html>
