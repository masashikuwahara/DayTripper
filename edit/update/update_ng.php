<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>選択されていません</title>
</head>
<body>
<header>
    <h1>選択されていません</h1>
</header>
<main>
    <div class="btn-group">
        <input class="btn" type="button" onclick="history.back()" value="戻る">
    </div>
</main>
<?php include("../footer.php") ?>
</body>
</html>