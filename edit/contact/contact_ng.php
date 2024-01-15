<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>選択されていません</title>
</head>
<body>
  選択されていません。 <br />
  <form>
    <input class="btn" type="button" onclick="history.back()" value="戻る">
  </form>
</body>
</html>