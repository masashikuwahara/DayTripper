<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>削除しました</title>
</head>
<body>
    <?php
    try
    {
        $id=$_POST['id'];

        require('../../connect.php');

        $sql = 'DELETE FROM info WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $id;
        $stmt->execute($data);

        $dbh = null;

    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    削除しました<br />
    <a href="index.php">戻る</a>
</body>
</html>
