<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resultt</title>
</head>
<body>
    <?php
// データベースに接続
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "search_test";

$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// キーワードを取得
$keyword = $_GET['keyword'];

// ページングに関連する変数
$pageSize = 10; // 1ページに表示する件数
$page = isset($_GET['page']) ? $_GET['page'] : 1; // 現在のページ（デフォルトは1）

// キーワードを含むデータの総数を取得
$countSql = "SELECT COUNT(*) AS total FROM members WHERE name LIKE '%$keyword%'";
$countResult = $conn->query($countSql);
$countRow = $countResult->fetch_assoc();
$totalResults = $countRow['total'];

// ページングの計算
$totalPages = ceil($totalResults / $pageSize);
$offset = ($page - 1) * $pageSize;

// キーワードを含むデータをページングして検索
$sql = "SELECT * FROM members WHERE name LIKE '%$keyword%' LIMIT $pageSize OFFSET $offset";
$result = $conn->query($sql);

// 検索結果を表示
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
    }
    // ページネーションリンクの表示
    echo "<br>";
    // 最初のページへのリンク
if ($page > 1) {
    echo "<a href='?keyword=$keyword&page=1'>First</a> ";
}

// 省略記号の表示
if ($page > 2) {
    echo "... ";
}

// ページ番号の表示
for ($i = max(1, $page - 2); $i <= min($page + 2, $totalPages); $i++) {
    echo "<a href='?keyword=$keyword&page=$i'>$i</a> ";
}

// 省略記号の表示
if ($page < $totalPages - 1) {
    echo "... ";
}

// 最後のページへのリンク
if ($page < $totalPages) {
    echo "<a href='?keyword=$keyword&page=$totalPages'>Last</a> ";
}
} else {
    echo "検索結果がありません";
}

// データベース接続を閉じる
$conn->close();
?>

</body>
</html>
