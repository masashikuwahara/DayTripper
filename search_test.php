<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>検索結果</title>
</head>
<body>
<?php
// データベース接続情報
try {
    require('connect.php');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// 1ページあたりの表示件数
$items_per_page = 3;

// 現在のページ番号（デフォルトは1）
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// 検索クエリの取得
$search_query = isset($_GET['s']) ? trim($_GET['s']) : '';

// エラーメッセージの初期化
$error_message = '';

// 検索クエリが空でない場合のみ検索処理を実行
if ($search_query === '') {
    $error_message = 'キーワードを入力してください';
} else {
    // ページネーションの設定と検索処理
    $offset = ($current_page - 1) * $items_per_page;

    // 検索とページネーションのSQLクエリ
    $sql = "SELECT * FROM castles WHERE title LIKE :search_query OR structure LIKE :search_query LIMIT :offset, :items_per_page";
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
    <p><?php echo htmlspecialchars($error_message); ?></p>
<?php else: ?>
    <!-- 検索結果の表示 -->
    <?php if (!empty($items)): ?>
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
        <p>検索結果が見つかりませんでした。</p>
    <?php endif; ?>

    <!-- ページネーションリンク -->
    <div class="pagination">
        <?php if ($current_page > 1): ?>
            <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $current_page - 1; ?>">前のページ</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>>
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages): ?>
            <a href="?s=<?php echo urlencode($search_query); ?>&page=<?php echo $current_page + 1; ?>">次のページ</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

</body>
</html>