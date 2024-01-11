<?php
require_once('library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修正内容確認</title>
    <style>
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
    <?php

    $post=($_POST);
    $con_id=$post['id'];
    $con_ck=$post['ck'];
    
    if($con_ck === '')
    {
        echo'<p style="color:#ff0000">チェックが入力されていません。</p><br />';
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
      if($con_ck === "0"){
        echo '回答前';
      }else{
        echo '回答済み';
      };
        echo'更新します';
        echo'<br />';
        echo'<form method="post" action="castles_edit_done.php">';
        echo'<input type="hidden" name="id" value="'.$con_id.'">';
        echo'<input type="hidden" name="cas" value="'.$con_ck.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>