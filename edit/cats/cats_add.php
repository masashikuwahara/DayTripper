<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>その他文化財追加</title>
    <style>
      .form {
        text-align: center;
      }
      .tex{
          width:200px;
      }
      .texta{
          width: 600px;
      }
      .textb{
          width: 600px;
          height: 200px;
      }
      .btn{
          width: 100px;
          height: 50px;
          background-color: #00bfff;
          border-radius: 20px;
          border: none;
          color: #ffffff;
      }
      .btn:hover {
          background-color: #ed6fb5;
      }
    </style>
</head>
<body>  
<div class="form">
  <h1>その他文化財追加</h1>
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
</body>
</html>