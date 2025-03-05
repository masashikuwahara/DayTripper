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
    <title>修正内容確認</title>
</head>
<body>
  <header>
      <h1>修正内容確認</h1>
  </header>
    <main>
      <?php
      $post=($_POST);
      $con_id=$post['id'];
      $con_ck=$post['ck'];
      echo '<div class="content">';
      
      if($con_ck == 0){
        echo '<td><span class="status pending">';
        echo '回答前';
        echo '</span></td>';
      }else{
        echo '<td><span class="status done">';
        echo '回答済み';
        echo '</span></td>';
      };
        echo'更新します';
        echo'<br />';
        echo'<form method="post" action="contact_done.php">';
        echo'<input type="hidden" name="id" value="'.$con_id.'">';
        echo'<input type="hidden" name="ck" value="'.$con_ck.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
        echo '</div>';
      ?>
    </main>
<?php include("../footer.php") ?>
</body>
</html>