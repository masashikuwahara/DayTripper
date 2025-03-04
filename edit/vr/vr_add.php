<?php
include('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>動画追加</title>
</head>
<body>
<header>
    <h1>動画追加</h1>
</header>
<main>
  <div class="form-container">
    <form method="post" action="vr_add_check.php" enctype="multipart/form-data">
      タイトルを入力してください。<br />
      <input class="tex" type="text" name="title" ><br />
      説明を入力してください。(20文字以内)<br />
      <textarea class="textb" type="text" name="desc" ></textarea><br />
      動画の再生時間を入力してください。(mm:ss)<br />
      <input class="tex" type="text" name="time" ><br />
      動画のファイル名を拡張子まで含めて入力してください。<br />
      <input class="tex" type="text" name="video" ><br />
      サムネイル画像のファイル名を拡張子まで含めて入力してください。<br />
      <input class="tex" type="text" name="img" ><br />
      動画を選んでください。<br />
      <input disabled type="file" name="img" ><br />
      <div class="btn-group">
          <input class="btn" type="button" onclick="history.back()" value="戻る">
          <input class="btn" type="submit" value="次のページへ">
      </div>
    </form>
  </div>
  </main>
<?php include("../footer.php") ?>
</body>
</html>