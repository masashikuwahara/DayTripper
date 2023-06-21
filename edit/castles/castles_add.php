<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>城追加</title>
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
  <h1>城追加</h1>
  <form method="post" action="castles_add_check.php" enctype="multipart/form-data">
    城番号を入力してください。100名城ca001～、続100名城se001～<br />
    <input class="tex" type="text" name="cas" ><br />
    城名を入力してください。<br />
    <input class="tex" type="text" name="title" ><br />
    城郭構造を入力してください。<br />
    <input class="tex" type="text" name="structure" ><br />
    築城主を入力してください。<br />
    <input class="tex" type="text" name="builder" ><br />
    築城年を入力してください。<br />
    <input class="tex" type="text" name="year" ><br />
    主な城主を入力してください。<br />
    <input class="tex" type="text" name="lord" ><br />
    指定文化財を入力してください。(2つまで)<br />
    <input class="tex" type="text" name="specify1" ><br /><br />
    <input class="tex" type="text" name="specify2" ><br />
    おすすめ度を★5つで入力してください。★☆<br />
    <input class="tex" type="text" name="recommend" ><br />
    説明を入力してください。<br />
    <textarea class="textb" type="text" name="explan" ></textarea><br />
    アクセスを入力してください。<br />
    <input class="texta" type="text" name="access" ><br />
    画像を選んでください。<br />
    <input type="file" name="img1" ><br /><br />
    <input type="file" name="img2" ><br /><br />
    <input type="file" name="img3" ><br /><br />
    <input type="file" name="img4" ><br /><br />
    <input type="file" name="img5" ><br /><br />
    <input class="btn" type="button" onclick="history.back()"value="戻る">
    <input class="btn" type="submit" value="次のページへ">
  </form>
</div>
</body>
</html>