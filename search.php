<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>検索結果</title>
</head>
<body>
  <?php require('header.php'); ?>
  <br />
  <div class="search">
  <?php
try {
    require('connect.php');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$items_per_page = 10;

// 現在のページ番号（デフォルトは1）
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 検索クエリの取得
$search_query = isset($_GET['s']) ? trim($_GET['s']) : '';
if($_GET['s'] != ''){
  echo "<div class='s'> 「{$_GET['s']}」の検索結果</div>";
}else{
  echo "<div class='s'></div>";
}

// エラーメッセージの初期化
$error_message = '';

// 検索クエリが空でない場合のみ検索処理を実行
if ($search_query === '') {
    $error_message = 'キーワードを入力してください';
} else {
    // ページネーションの設定と検索処理
    $offset = ($current_page - 1) * $items_per_page;

    // 検索とページネーションのSQLクエリ
    $sql = "SELECT id,title,specify1,recommend,explan,img1 FROM castles WHERE title LIKE :search_query OR structure 
    LIKE :search_query LIMIT :offset, :items_per_page";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindValue(':items_per_page', $items_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 総データ件数を取得
    $total_items_sql = "SELECT COUNT(*) FROM castles WHERE title LIKE :search_query OR structure LIKE :search_query";
    $total_stmt = $dbh->prepare($total_items_sql);
    $total_stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
    $total_stmt->execute();
    $total_items = $total_stmt->fetchColumn();

    $total_pages = ceil($total_items / $items_per_page);
}
?>

<!-- エラーメッセージの表示 -->
<?php if ($error_message): ?>
    <div class="result"><?php echo htmlspecialchars($error_message); ?></div>
<?php else: ?>
    <!-- 検索結果の表示 -->
    <?php if (!empty($items)): ?>
      <?php echo "<div class='success'>{$total_items}件見つかりました</div></br>" ?>
        <?php foreach ($items as $item): ?>
            <?php echo '<div class="f">' ?>
            <?php $img_name='<img style="width:120px" src="img/'.$item['img1'].'">' ?>
            <?php $a = '<a href="detail.php?id='.$item['id'].'">'.$img_name."{$item['title']}"."</a>"?>
            <?php $a = mb_convert_encoding($a, "UTF-8", "auto")?>
            <?php echo $a?>
            <?php echo '<div class="detail">'?>
            <?php echo "指定文化財："."{$item['specify1']}"."<br />"."おすすめ度："."{$item['recommend']}"."<br />"."{$item['explan']}"."<hr>"?>
            <?php echo '</div>'?>
            <?php echo '</div>'?>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="result">そのキーワードでは見つかりませんでした</div>
<?php endif; ?>

<!-- ページネーションリンク -->
<div class="pagination">
    <?php if ($current_page > 1): ?>
        <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $current_page - 1; ?>">前のページ</a>
    <?php endif; ?>

    <?php
    // 最初のページと最後のページを常に表示
    $range = 2; // 現在のページからの表示範囲
    for ($i = 1; $i <= $total_pages; $i++): 
        if ($i == 1 || $i == $total_pages || ($i >= $current_page - $range && $i <= $current_page + $range)):
    ?>
        <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $i; ?>" <?php if ($i === $current_page) echo 'class="active"'; ?>>
            <?php echo $i; ?>
        </a>
    <?php 
        elseif ($i == $current_page - $range - 1 || $i == $current_page + $range + 1): 
            // 省略部分に「...」を挿入
    ?>
        <span>...</span>
    <?php 
        endif;
    endfor; 
    ?>

    <?php if ($current_page < $total_pages): ?>
        <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $current_page + 1; ?>">次のページ</a>
    <?php endif; ?>
</div>
<?php endif; ?>
    <p style="text-align: center;">もう一度検索する</p>
    <form style="text-align: center;" class="cp_ipradio" method="GET" action="search.php">
      <input type="text" class="sea" name="s" placeholder="例：姫路城、山城">
      <button class="btn" type="submit">検索</button>
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