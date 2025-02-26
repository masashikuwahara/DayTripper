<?php
header("Content-Type: application/json; charset=UTF-8"); // JSONとして返す

try {
    require_once('library.php');
    
    $post = sanitize($_POST);
    $user_id = trim($post['id']);
    $user_pass = trim($post['pass']);

    // 入力チェック（空欄ならエラーを返す）
    if ($user_id === "" || $user_pass === "") {
        echo json_encode(["status" => "error", "message" => "IDまたはパスワードを入力してください。"]);
        exit();
    }

    require('connect.php');

    $sql = 'SELECT name FROM users WHERE id=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$user_id, $user_pass]);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$rec) {
        echo json_encode(["status" => "error", "message" => "IDまたはパスワードが間違っています。"]);
    } else {
        // **セッションがまだ開始されていなければ session_start() を実行**
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['login'] = 1;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_name'] = $rec['name'];

        echo json_encode(["status" => "success", "redirect" => "index.php"]);
    }

    $dbh = null;
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => "サーバーエラーが発生しました。"]);
    exit();
}
?>
