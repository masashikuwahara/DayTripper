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
    $cat_title=$post['title'];
    $cat_kind=$post['kind'];
    $cat_color=$post['color'];
    $cat_feature=$post['feature'];
    $cat_place=$post['place'];
    $cat_comment=$post['comment'];
    $cat_img1=$_FILES['img1'];
    $cat_img2=$_FILES['img2'];
    $cat_img3=$_FILES['img3'];
    $cat_img4=$_FILES['img4'];
    $cat_img5=$_FILES['img5'];

    if($cat_title === '')
    {
        echo'<p style="color:#ff0000">文化財名が入力されていません。</p><br />';
    }
    else
    {
        echo'文化財名:';
        echo$cat_title;
        echo'<br />';
    }

    if($cat_kind === '')
    {
        echo'<p style="color:#ff0000">制作年が入力されていません。</p><br />';
    }
    else
    {
        echo'制作年:';
        echo$cat_kind;
        echo'<br />';
    }

    if($cat_color === '')
    {
        echo'<p style="color:#ff0000">指定文化財が入力されていません。</p><br />';
    }
    else
    {
        echo'指定文化財:';
        echo$cat_color;
        echo'<br />';
    }

    if($cat_feature === '')
    {
        echo'<p style="color:#ff0000">説明が入力されていません。</p><br />';
    }
    else
    {
        echo'説明:';
        echo$cat_feature;
        echo'<br />';
    }    

    
    if($cat_place === '')
    {
        echo'<p style="color:#ff0000">アクセスが入力されていません。</p><br />';
    }
    else
    {
        echo'アクセス:';
        echo$cat_place;
        echo'<br />';
    }    

    if( $cat_img1['size']>0)
    {
        if( $cat_img1['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cat_img1['tmp_name'],'../../cultural_assets/img/'.$cat_img1['name']);
            echo'<img src="../../cultural_assets/img/'.$cat_img1['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cat_img2['size']>0)
    {
        if( $cat_img2['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cat_img2['tmp_name'],'../../cultural_assets/img/'.$cat_img2['name']);
            echo'<img src="../../cultural_assets/img/'.$cat_img2['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cat_img3['size']>0)
    {
        if( $cat_img3['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cat_img3['tmp_name'],'../../cultural_assets/img/'.$cat_img3['name']);
            echo'<img src="../../cultural_assets/img/'.$cat_img3['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cat_img4['size']>0)
    {
        if( $cat_img4['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cat_img4['tmp_name'],'../../cultural_assets/img/'.$cat_img4['name']);
            echo'<img src="../../cultural_assets/img/'.$cat_img4['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $cat_img5['size']>0)
    {
        if( $cat_img5['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($cat_img5['tmp_name'],'../../cultural_assets/img/'.$cat_img5['name']);
            echo'<img src="../../cultural_assets/img/'.$cat_img5['name'].'" width="250" >';
            echo'<br />';
        }
    }
    
    if($cat_title === ''||$cat_kind === ''||$cat_color === ''||
    $cat_feature === ''||$cat_place === ''||
    $cat_img1['size']>1000000)
    {
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="cats_add_done.php">';
        echo'<input type="hidden" name="title" value="'.$cat_title.'">';
        echo'<input type="hidden" name="kind" value="'.$cat_kind.'">';
        echo'<input type="hidden" name="color" value="'.$cat_color.'">';
        echo'<input type="hidden" name="feature" value="'.$cat_feature.'">';
        echo'<input type="hidden" name="place" value="'.$cat_place.'">';
        echo'<input type="hidden" name="comment" value="'.$cat_comment.'">';
        echo'<input type="hidden" name="img1" value="'.$cat_img1['name'].'">';
        echo'<input type="hidden" name="img2" value="'.$cat_img2['name'].'">';
        echo'<input type="hidden" name="img3" value="'.$cat_img3['name'].'">';
        echo'<input type="hidden" name="img4" value="'.$cat_img4['name'].'">';
        echo'<input type="hidden" name="img5" value="'.$cat_img5['name'].'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>