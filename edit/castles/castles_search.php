<?php
  require_once('../library.php');
  session();
  $my_sea=htmlspecialchars($_GET["s"], ENT_QUOTES);
  $s = mb_convert_encoding($my_sea, "UTF-8", "auto");
  try{
      require('../../connect.php');
  } catch(PDOException $e){
      echo "失敗:" . $e->getMessage() . "\n";
      exit();
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?php echo $s ?>の検索結果</title>
</head>
<style>
  .result {
    color: red;
  }
</style>
<body>
<header>
  <h1>検索結果</h1>
</header>
  <main>
    <?php
    echo '<form method="post" action="castles_branch.php">';
    if($s != ''){
      echo "<div class='s'> 「{$s}」の検索結果</div>";
    }

    if($_GET["s"] != ''){
        $stmt=$dbh->prepare("SELECT * FROM castles WHERE title like '%$my_sea%'");
        $stmt->execute();
        $t = $stmt->rowCount();
        if($t > 0){
          echo "<div class='success'>{$t}件見つかりました</div></br>";
          while ($r = $stmt->fetch()){
            echo '<input type="radio" name="id" value="'.$r['id'].'">';
            echo $r['title']. '<br>';
          } 
          echo '<br/>';
          echo '<input class="btn" type="submit" name="disp" value="参照">';
          echo '<input class="btn" type="submit" name="edit" value="修正">';
          echo '<input disabled class="btn" type="submit" name="delete" value="削除">';
        }else{
          echo '<div class="result">そのキーワードでは見つかりませんでした</div>';
        }
    }else{
      echo '<div class="result">キーワードを入力してください</div>';
    }
    echo '</form>';
    ?>
    <H2>もう一度検索する</H2>
    <form action="castles_search.php" method="get">
      <input class="sea" type="text" name="s" placeholder="例:姫路城">
      <input class="btn" type="submit" value="検索">
    </form>
    <p class="btn-group"><a href="index.php" class="btn">トップメニューへ</a></p>
  </main>
  <footer>
    <p>&copy; 2025 城検索システム</p>
  </footer>
  </body>
</html>