<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>更新情報追加</title>
</head>
<body>
  <header>
      <h1>更新情報追加</h1>
  </header>
  <main>
    <div class="form">
      <form method="post" action="update_add_check.php" enctype="multipart/form-data">
        更新日時を入力してください。yyyy.mm.dd形式で入力。<br />
        <input class="tex" type="text" name="day" ><br />
        更新内容を入力してください。<br />
        <input class="tex" type="text" name="information" ><br />
        idを入力してください。ページの更新の場合は空欄。<br />
        <input class="tex" type="text" name="id" ><br />
        真偽値を入力してください。1:文化財 0:ページ更新(猫ページ更新もこっち)<br />
        <select name="kinds" id="" class="tex">
          <option>1</option>
          <option>0</option>
        </select><br />
        ページ更新の場合はURLを入力してください。(猫ページ更新もこっち)<br />
        <input class="tex" type="text" name="url" ><br />
        <input class="btn" type="button" onclick="history.back()"value="戻る">
        <input class="btn" type="submit" value="次のページへ">
      </form>
    </div>
  </main>
<?php include("../footer.php") ?>
</body>
</html>