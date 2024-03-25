<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>お問い合わせ</title>
    <style>
    .name {
      width: 250px;
      height: 20px;
    }

    .comm {
      width: 250px;
      height: 100px;
    }

    .wrapper {
      display: block;
      text-align: center;
      margin-top: 100px;
    }

    .name, .comm {
      background-color: #f2f4f5;
      border: none;
      border-radius: 3px;
      padding: 15px 20px;
      font-size: 16px;
      color: #333;
      flex-grow: 1;
    }

    .btn {
      cursor: pointer;
      margin-top: 30px;
      padding: 15px 45px;
      border: none;
      border-radius: 3px;
      color: #fff;
      font-size: 20px;
      padding: 0;
      width: 150px;
      height: 50px;
      text-align: center;
      background-color: #166ab5;
    }
    </style>
  </head>
  <body>
    <script>
    function submitChk () {
      var flag = confirm ( "送信してもよろしいですか？\n\n送信したくない場合は[キャンセル]ボタンを押して下さい");
      return flag;
    }
    </script>
    <?php include('header.php'); ?>
    <div class="wrapper">
      <h1>お問い合わせフォーム</h1>
      <p>下記のフォームにお名前、メールアドレス、<br>
      お問い合わせ内容を記入し<br>
      送信ボタンを押してください。</p>
      <form action="done.php" method="post" onsubmit="return submitChk()">
        お名前
        <div><input class="name" type="text" placeholder="例) 山田 太朗" name="n"></div>
        メールアドレス
        <div><input class="name" type="text" placeholder="例) abc@xyz.com" name="e"></div>
        表題
        <div><input class="name" type="text" placeholder="例) 犬山城の写真について" name="t"></div>
        お問い合わせ内容
        <div><textarea class="comm" placeholder="お問い合わせ内容をこちらにご記入ください" name="m"></textarea></div>
        <input class="btn" type="submit" value="送信">
      </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../menu.js"></script>
    <?php include('../footer.php'); ?>
  </body>
</html>