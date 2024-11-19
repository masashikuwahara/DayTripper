<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>猫を追加する</title>
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

      .form-select-wrap {
        display: flex;
        max-width: 300px;
        align-items: center;
        margin: auto;
      }
  
      .form-select-wrap > select {
        padding: 8px 16px;
        margin-left: 10px;
        margin-right: 10px;
        border: 1px solid gray;
        border-radius: 4px;
        font-size: 14px;
      }
    </style>
</head>
<body>  
<div class="form">
  <h1>猫を追加する</h1>
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