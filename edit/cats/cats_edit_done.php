<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修正しました</title>
</head>
<body>
    <?php
    try
    {
        $post=($_POST);
        $cat_id=$post['id'];
        $cat_title=$post['title'];
        $cat_kind=$post['kind'];
        $cat_color=$post['color'];
        $cat_feature=$post['feature'];
        $cat_place=$post['place'];
        $cat_comment=$post['comment'];
        $img_name1_old=$post['img_name1_old'];
        $img_name2_old=$post['img_name2_old'];
        $img_name3_old=$post['img_name3_old'];
        $img_name4_old=$post['img_name4_old'];
        $img_name5_old=$post['img_name5_old'];
        $cat_img1=$post['img1'];
        $cat_img2=$post['img2'];
        $cat_img3=$post['img3'];
        $cat_img4=$post['img4'];
        $cat_img5=$post['img5'];

        require('../connect.php');

        $sql = 'UPDATE cats SET title=?, kind=?, color=?, feature=?,
        place=?, comment=?, img1=?, img2=?, img3=?, img4=?, img5=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $cat_title;
        $data[] = $cat_kind;
        $data[] = $cat_color;
        $data[] = $cat_feature;
        $data[] = $cat_place;
        $data[] = $cat_img1;
        $data[] = $cat_img2;
        $data[] = $cat_img3;
        $data[] = $cat_img4;
        $data[] = $cat_img5;
        $data[] = $cat_id;
        $stmt->execute($data);

        $dbh = null;

        if($img_name1_old !=$cat_img1)
        {
            if($img_name1_old !='')
            {
                unlink('../../cultural_assets/img/'.$img_name1_old);
            }
        }

        if($img_name2_old !=$cat_img2)
        {
            if($img_name2_old !='')
            {
                unlink('../../cultural_assets/img/'.$img_name2_old);
            }
        }

        if($img_name3_old !=$cat_img3)
        {
            if($img_name3_old !='')
            {
                unlink('../../cultural_assets/img/'.$img_name3_old);
            }
        }

        if($img_name4_old !=$cat_img4)
        {
            if($img_name3_old !='')
            {
                unlink('../../cultural_assets/img/'.$img_name4_old);
            }
        }

        if($img_name5_old !=$cat_img5)
        {
            if($img_name5_old !='')
            {
                unlink('../../cultural_assets/img/'.$img_name5_old);
            }
        }
        
        $cat_title = mb_convert_encoding($cat_title, "UTF-8", "auto");
        echo $cat_title.'を修正しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <a href="index.php">戻る</a>
</body>
</html>
