<?php
    $my_sea=htmlspecialchars($_GET["s"], ENT_QUOTES);
    $s = mb_convert_encoding($my_sea, "UTF-8", "auto");
    try{
        require('connect.php');
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
    <link rel="stylesheet" href="style.css">
    <title><?php echo $s ?>の検索結果</title>
</head>
<body>
  <?php require('header.php'); ?>
  <br />
  <div class="search">
    <?php
    if($s != ''){
      echo "<div class='s'> 「{$s}」の検索結果</div>";
    }

    if($_GET["s"] != ''){
      if($_GET['select'] === 'castle'){
        $stmt=$dbh->prepare("SELECT * FROM castles WHERE title like '%$my_sea%'");
        $stmt->execute();
        $t = $stmt->rowCount();
        if($t > 0){
          echo "<div class='success'>{$t}件見つかりました</div></br>";
          while ($r = $stmt->fetch()){
            echo '<div class="f">';
            $img_name='<img style="width:120px" src="img/'.$r['img1'].'">';
            $a = '<a href="detail.php?id='.$r['id'].'">'.
            $img_name."{$r['title']}"."</a>";
            $a = mb_convert_encoding($a, "UTF-8", "auto");
            echo $a;
            echo '<div class="detail">';
            echo "指定文化財："."{$r['specify1']}"."<br />".
            "おすすめ度："."{$r['recommend']}"."<br />"."{$r['explan']}"."<hr>";
            echo '</div>';
            echo '</div>';
          } 
        }else{
          echo '<div class="result">そのキーワードでは見つかりませんでした</div>';
        }
      }else{
        $stmt=$dbh->prepare("SELECT * FROM cultures WHERE title like '%$my_sea%'");
        $stmt->execute();
        $t = $stmt->rowCount();
        if($t > 0){
          echo "<div class='success'>{$t}件見つかりました</div></br>";
          while ($r = $stmt->fetch()){
            echo '<div class="f">';
            $img_name='<img style="width:120px" src="img/'.$r['img1'].'">';
            $a = '<a href="culturals_detail.php?id='.$r['id'].'">'.
            $img_name."{$r['title']}"."</a>";
            $a = mb_convert_encoding($a, "UTF-8", "auto");
            echo $a;
            echo '<div class="detail">';
            echo "{$r['specify']}"."<br />".
            "<br />"."{$r['explan']}"."<hr>";
            echo '</div>';
            echo '</div>';
          } 
        }else{
          echo '<div class="result">そのキーワード見つかりませんでした</div>';
        }
      }
    }else{
      echo '<div class="result">キーワードを入力してください</div>';
    }
    ?>
    <p style="text-align: center;">もう一度検索する</p>
    <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
      <label><input type="radio" class="option-input" name="select" value="castle" checked>城を検索する</label>
      <label><input type="radio" class="option-input" name="select" value="culture" >文化財を検索する</label><br />
      <input class="sea" type="text" name="s" placeholder="例:姫路城、出雲大社">
      <input class="btn" type="submit" value="検索する">
    </form>
  </div>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script>
  ScrollReveal().reveal('.f',{
    duration: 800,
    viewFactor: 0.2,
  });
  </script>
  <?php require('footer.php'); ?>