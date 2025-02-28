<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>その他文化財追加</title>
</head>
<body>  
<header>
    <h1>城追加</h1>
</header>
  <main>
    <div class="form-container">
        <form method="post" action="culturals_add_check.php" enctype="multipart/form-data">
          文化財の名称を入力してください。<br />
          <input class="tex" type="text" name="title" ><br />
          作成年を入力してください。<br />
          <input class="tex" type="text" name="year" ><br />
          指定文化財を入力してください。<br />
          <input class="tex" type="text" name="specify" ><br />
          説明を入力してください。<br />
          <textarea class="textb" type="text" name="explan" ></textarea><br />
          アクセスを入力してください。<br />
          <textarea class="texta" type="text" name="access" ></textarea><br />
          画像を選んでください。<br />
          <input type="file" name="img1" ><br /><br />
          <input type="file" name="img2" ><br /><br />
          <input type="file" name="img3" ><br /><br />
          <input class="btn" type="button" onclick="history.back()"value="戻る">
          <input class="btn" type="submit" value="次のページへ">
        </form>
    </div>
  </main>
<?php include("../footer.php") ?>
</body>
</html>