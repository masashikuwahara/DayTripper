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
    $vr_explan=$post['explan'];
    $vr_movie=$post['movie'];
    $vr_thumb=$post['thumb'];

    require('../../connect.php');
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

    if($vr_explan  === ''){
        echo'<p style="color:#ff0000">説明が入力されていません。</p><br />';
    }else{
        echo'説明:';
        echo$vr_explan;
        echo'<br />';
    }

    if($vr_movie === ''){
        echo'<p style="color:#ff0000">動画ファイルが入力されていません。</p><br />';
    }else{
        echo'動画ファイル:';
        echo$vr_movie;
        echo'<br />';
    }

    if($vr_thumb === ''){
        echo'<p style="color:#ff0000">サムネイルが入力されていません。</p><br />';
    }else{
        echo'サムネイル:';
        echo$vr_thumb;
        echo'<br />';
    }
    
    if($vr_title === ''||$vr_explan === ''||$vr_movie === ''||$vr_thumb === ''){
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }else{
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="vr_add_done.php">';
        echo'<input type="hidden" name="title" value="'.$vr_title.'">';
        echo'<input type="hidden" name="explan" value="'.$vr_explan.'">';
        echo'<input type="hidden" name="explan" value="'.$vr_movie.'">';
        echo'<input type="hidden" name="explan" value="'.$vr_thumb.'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>