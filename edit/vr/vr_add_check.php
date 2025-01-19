<?php
include('../library.php');
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
    $vr_title=$post['title'];
    $vr_desc=$post['desc'];
    $vr_time=$post['time'];
    $vr_video=$post['video'];
    $vr_img=$post['img'];

    include('../../connect.php');
    $stmt = $dbh->prepare('SELECT COUNT(*) FROM vrvideo ');
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if($vr_title === ''){
        echo'<p style="color:#ff0000">タイトルが入力されていません。</p><br />';
    }else{
        echo'タイトル:';
        echo$vr_title;
        echo'<br />';
    }

    if($vr_desc  === ''){
        echo'<p style="color:#ff0000">説明が入力されていません。</p><br />';
    }else{
        echo'説明:';
        echo$vr_desc;
        echo'<br />';
    }

    if($vr_time  === ''){
        echo'<p style="color:#ff0000">再生時間が入力されていません。</p><br />';
    }else{
        echo'再生時間:';
        echo$vr_time;
        echo'<br />';
    }

    if($vr_video === ''){
        echo'<p style="color:#ff0000">動画ファイルが入力されていません。</p><br />';
    }else{
        echo'動画ファイル:';
        echo$vr_video;
        echo'<br />';
    }

    if($vr_img === ''){
        echo'<p style="color:#ff0000">サムネイルが入力されていません。</p><br />';
    }else{
        echo'サムネイル:';
        echo$vr_img;
        echo'<br />';
    }
    
    if($vr_title === ''||$vr_desc === ''||$vr_video === ''||$vr_img === ''){
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }else{
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="vr_add_done.php">';
        echo'<input type="hidden" name="title" value="'.$vr_title.'">';
        echo'<input type="hidden" name="desc" value="'.$vr_desc.'">';
        echo'<input type="hidden" name="time" value="'.$vr_time.'">';
        echo'<input type="hidden" name="video" value="'.$vr_video.'">';
        echo'<input type="hidden" name="img" value="'.$vr_img.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>