<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>更新情報追加</title>
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
  <h1>更新情報追加</h1>
  <form method="post" action="update_add_check.php" enctype="multipart/form-data">
    更新日時を入力してください。yyyy.mm.dd<br />
    <input class="tex" type="text" name="day" ><br />
    更新内容を入力してください。<br />
    <input class="tex" type="text" name="information" ><br />
    idを入力してください。ページの更新の場合は空欄。<br />
    <input class="tex" type="text" name="id" ><br />
    真偽値を入力してください。1:城 0:文化財 空欄：ページ更新<br />
    <select name="kinds" id="" class="tex">
      <option></option>
      <option>1</option>
      <option>0</option>
    </select><br />
    ページ更新の場合はURLを入力してください<br />
    <input class="tex" type="text" name="url" ><br />
    <input class="btn" type="button" onclick="history.back()"value="戻る">
    <input class="btn" type="submit" value="次のページへ">
  </form>
</div>
</body>
</html>