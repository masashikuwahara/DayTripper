<?php
include('../library.php');
session();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規動画投稿</title>
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
          width: 400px;
          height: 35px;
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
  <h1>動画投稿</h1>
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
    <input disabled type="file" name="img" ><br /><br />
    <input class="btn" type="button" onclick="history.back()"value="戻る">
    <input class="btn" type="submit" value="次のページへ">
  </form>
</div>
</body>
</html>