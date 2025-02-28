<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>修正内容確認</title>
    <style>
        .access {
            display: inline-block;
            width: 800px;
            overflow-wrap: break-word;
        }
    </style>
</head>
<body>
<header>
    <h1>登録内容確認</h1>
</header>
<main>
    <?php
    $post=sanitize($_POST);
    $culturals_id=$post['id'];
    $culturals_title=$post['title'];
    $culturals_year=$post['year'];
    $culturals_specify=$post['specify'];
    $culturals_explan=$post['explan'];
    $culturals_access=$post['access'];
    $img_name1_old=$post['img_name_old1'];
    $img_name2_old=$post['img_name_old2'];
    $img_name3_old=$post['img_name_old3'];
    $culturals_img1=$_FILES['img1'];
    $culturals_img2=$_FILES['img2'];
    $culturals_img3=$_FILES['img3'];

    if($culturals_title === '')
    {
        echo'<p style="color:#ff0000">文化財名が入力されていません。</p><br />';
    }
    else
    {
        echo'文化財名:';
        echo$culturals_title;
        echo'<br />';
    }

    if($culturals_year === '')
    {
        echo'<p style="color:#ff0000">制作年が入力されていません。</p><br />';
    }
    else
    {
        echo'制作年:';
        echo$culturals_year;
        echo'<br />';
    }

    if($culturals_specify === '')
    {
        echo'<p style="color:#ff0000">指定文化財が入力されていません。</p><br />';
    }
    else
    {
        echo'指定文化財:';
        echo$culturals_specify;
        echo'<br />';
    }

    if($culturals_explan === '')
    {
        echo'<p style="color:#ff0000">説明が入力されていません。</p><br />';
    }
    else
    {
        echo'説明:';
        echo$culturals_explan;
        echo'<br />';
    }    

    
    if($culturals_access === '')
    {
        echo'<p style="color:#ff0000">アクセスが入力されていません。</p><br />';
    }
    else
    {
        echo'アクセス:';
        echo '<div class= "access">';
        echo $culturals_access;
        echo'<div />';
        echo'<br />';
    }    

    if( $culturals_img1['size']>0)
    {
        if( $culturals_img1['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($culturals_img1['tmp_name'],'../../img/'.$culturals_img1['name']);
            echo'<img src="../../img/'.$culturals_img1['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $culturals_img2['size']>0)
    {
        if( $culturals_img2['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($culturals_img2['tmp_name'],'../../img/'.$culturals_img2['name']);
            echo'<img src="../../img/'.$culturals_img2['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $culturals_img3['size']>0)
    {
        if( $culturals_img3['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($culturals_img3['tmp_name'],'../../img/'.$culturals_img3['name']);
            echo'<img src="../../img/'.$culturals_img3['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if($culturals_title === ''||$culturals_year === ''||$culturals_specify === ''||
    $culturals_explan === ''||$culturals_access === ''||
    $culturals_img1['size']>1000000)
    {
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="culturals_edit_done.php">';
        echo'<input type="hidden" name="id" value="'.$culturals_id.'">';
        echo'<input type="hidden" name="title" value="'.$culturals_title.'">';
        echo'<input type="hidden" name="year" value="'.$culturals_year.'">';
        echo'<input type="hidden" name="specify" value="'.$culturals_specify.'">';
        echo'<input type="hidden" name="explan" value="'.$culturals_explan.'">';
        echo'<input type="hidden" name="access" value="'.$culturals_access.'">';
        echo'<input type="hidden" name="img_name1_old" value="'.$img_name1_old.'">';
        echo'<input type="hidden" name="img_name2_old" value="'.$img_name2_old.'">';
        echo'<input type="hidden" name="img_name3_old" value="'.$img_name3_old.'">';
        echo'<input type="hidden" name="img1" value="'.$culturals_img1['name'].'">';
        echo'<input type="hidden" name="img2" value="'.$culturals_img2['name'].'">';
        echo'<input type="hidden" name="img3" value="'.$culturals_img3['name'].'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    
    ?>
    </main>
    <?php include("../footer.php") ?>
</body>
</html>