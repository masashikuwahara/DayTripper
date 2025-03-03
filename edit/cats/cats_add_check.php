<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>登録内容確認</title>
</head>
<body>
<header>
    <h1>登録内容確認</h1>
</header>
<main>
<div class="content">
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
        echo'<p style="color:#ff0000">タイトルが入力されていません。</p><br />';
    }
    else
    {
        echo'タイトル:';
        echo$cat_title;
        echo'<br />';
    }

        echo'猫の種類:';
        echo$cat_kind;
        echo'<br />';

    if($cat_color === '')
    {
        echo'<p style="color:#ff0000">毛色・色柄が入力されていません。</p><br />';
    }
    else
    {
        echo'毛色・色柄:';
        echo$cat_color;
        echo'<br />';
    }

    if($cat_feature === '')
    {
        echo'<p style="color:#ff0000">特徴が入力されていません。</p><br />';
    }
    else
    {
        echo'特徴:';
        echo$cat_feature;
        echo'<br />';
    }    

    if($cat_place === '')
    {
        echo'<p style="color:#ff0000">目撃場所が入力されていません。</p><br />';
    }
    else
    {
        echo'目撃場所:';
        echo$cat_place;
        echo'<br />';
    }

    if($cat_comment === '')
    {
        echo'<p style="color:#ff0000">コメントが入力されていません。</p><br />';
    }
    else
    {
        echo'コメント:';
        echo$cat_comment;
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
    </div>
</main>
<?php include("../footer.php") ?>
</body>
</html>