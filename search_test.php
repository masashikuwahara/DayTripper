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
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?keyword=$keyword&page=$i'>$i</a> ";
    }
} else {
    echo "検索結果がありません";
}

// データベース接続を閉じる
$conn->close();
?>
