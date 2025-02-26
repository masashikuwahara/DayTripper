<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理ページログイン</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
  <header>
    <h1>管理ページログイン</h1>
  </header>
  <main>
    <form method="post">
      <div id="error-message" style="color: red;"></div> <!-- エラーメッセージ表示エリア -->
      IDを入力<br />
      <input type="text" name="id"><br />
      パスワードを入力<br />
      <input type="password" name="pass"><br />
      <br />
      <input class="btn" type="submit" value="ログイン">
    </form>
  </main>
  <footer>
    <p>&copy; 2025 ログインシステム</p>
  </footer>
  <script src="login.js"></script>
</body>
</html>
