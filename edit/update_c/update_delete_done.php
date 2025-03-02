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
    <title>削除しました</title>
</head>
<body>
    <?php
    try
    {
        $id=$_POST['id'];

        require('../../connect.php');

        $sql = 'DELETE FROM info_c WHERE id=?';
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
    <header>
      <h1>削除完了</h1>
    </header>
    <main>
        <div class="content">
            削除しました
        </div>
    <p class="btn-group"><a href="index.php" class="btn">トップメニューへ</a></p>
    </main>
    <?php include("../footer.php") ?>
</body>
</html>
