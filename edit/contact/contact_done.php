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
    <title>更新しました</title>
</head>
<body>
<header>
    <h1>更新しました</h1>
</header>
  <main>
      <div class="content">
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
        <p class="btn-group"><a href="index.php" class="btn">トップメニューへ</a></p>
      </div>
  </main>
<?php include("../footer.php") ?>
</body>
</html>
