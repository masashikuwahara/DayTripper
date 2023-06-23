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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/css/swiper.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="template.js"></script>
    <title><?php echo $s ?>の検索結果</title>
</head>
<body>
    <script type="text/javascript">header();</script>
    <br />
    <?php
    echo "<p style='font-size:20pt'> 「{$s}」の検索結果</p>";

    if($_GET["s"] != ''){
      $stmt=$dbh->prepare("SELECT * FROM  100castles WHERE title like '%$my_sea%'");
      $stmt->execute();
      $t = $stmt->rowCount();
      if($t != 0){
        while ($r = $stmt->fetch()){
          echo '<div class="display">';
          $img_name='<img style="width:100px" src="img/'.$r['img1'].'">';
          $a = '<a href="detail.php?id='.$r['id'].'">'.
          $img_name."{$r['title']}"."</a>"."<br />"."{$r['specify1']}"."<br />"."{$r['specify2']}"."<hr>";
          $a = mb_convert_encoding($a, "UTF-8", "auto");
          echo $a;
          echo '</div>';
        }
        
      }else{

        echo '見つかりませんでした';

      }

    }else{
      
      echo 'キーワードを入力してください';
    }

    ?>
    <p style="text-align: center;">もう一度検索する</p>
    <form  style="text-align: center;" class="cp_ipradio" action="search.php" method="get">
      <input class="sea" type="text" name="s" placeholder="キーワードを入力">
      <input class="btn" type="submit" value="検索する">
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="nav_fixed.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        ScrollReveal().reveal('.display',{
            duration: 800,
            viewFactor: 0.2,
        });
    </script>
</body>
</html>