<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登録内容確認</title>
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

    $post=sanitize($_POST);
    $update_day=$post['day'];
    $update_information=$post['information'];

    if($update_day=='')
    {
        echo'<p style="color:#ff0000">更新日時が入力されていません。</p><br />';
    }
    else
    {
        echo'更新日時:';
        echo$update_day;
        echo'<br />';
    }

    if($update_information=='')
    {
        echo'<p style="color:#ff0000">更新情報が入力されていません。</p><br />';
    }
    else
    {
        echo'城名:';
        echo$update_information;
        echo'<br />';
    }
    
    if($update_day==''||$update_information=='')
    {
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="update_add_done.php">';
        echo'<input type="hidden" name="day" value="'.$update_day.'">';
        echo'<input type="hidden" name="information" value="'.$update_information.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>