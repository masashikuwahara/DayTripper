<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>猫追加</title>
</head>
<body>
<header>
    <h1>猫追加</h1>
</header>
  <main>
    <div class="form-container">
      <form method="post" action="cats_add_check.php" enctype="multipart/form-data">
          タイトル<br />
          <input class="tex" type="text" name="title" ><br />
          猫の種類<br />
          <select class="tex" name="kind" >
            <option>地域猫</option>
            <option>野良猫</option>
            <option>飼い猫</option>
            <option>不明</option>
          </select><br />
          毛色・色柄<br />
          <input class="tex" type="text" name="color" ><br />
          特徴<br />
          <input class="tex" type="text" name="feature" ><br />
          目撃場所<br />
          <input class="tex" type="text" name="place" ><br />
          一言<br />
          <textarea class="textb" type="text" name="comment" ></textarea><br />
          画像を一枚以上選んでください。<br />
          <input type="file" name="img1" ><br />
          <input type="file" name="img2" ><br />
          <input type="file" name="img3" ><br />
          <input type="file" name="img4" ><br />
          <input type="file" name="img5" ><br />
          <input class="btn" type="button" onclick="history.back()"value="戻る">
          <input class="btn" type="submit" value="次のページへ">
        </form>
  </main>
<?php include("../footer.php") ?>
</div>
</body>
</html>