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
        $culturals_id=$post['id'];
        $culturals_cul=$post['cul'];
        $culturals_title=$post['title'];
        $culturals_year=$post['year'];
        $culturals_specify=$post['specify'];
        $culturals_explan=$post['explan'];
        $culturals_access=$post['access'];
        $img_name1_old=$post['img_name1_old'];
        $img_name2_old=$post['img_name2_old'];
        $img_name3_old=$post['img_name3_old'];
        $culturals_img1=$post['img1'];
        $culturals_img2=$post['img2'];
        $culturals_img3=$post['img3'];

        require('../connect.php');

        $sql = 'UPDATE cultures SET cul=?,title=?,year=?,specify=?,explan=?,
        access=?,img1=?,img2=?,img3=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $culturals_cul;
        $data[] = $culturals_title;
        $data[] = $culturals_year;
        $data[] = $culturals_specify;
        $data[] = $culturals_explan;
        $data[] = $culturals_access;
        $data[] = $culturals_img1;
        $data[] = $culturals_img2;
        $data[] = $culturals_img3;
        $data[] = $culturals_id;
        $stmt->execute($data);

        $dbh = null;

        if($img_name1_old !=$culturals_img1)
        {
            if($img_name1_old !='')
            {
                unlink('../../img/'.$img_name1_old);
            }
        }

        if($img_name2_old !=$culturals_img2)
        {
            if($img_name2_old !='')
            {
                unlink('../../img/'.$img_name2_old);
            }
        }

        if($img_name3_old !=$culturals_img3)
        {
            if($img_name3_old !='')
            {
                unlink('../../img/'.$img_name3_old);
            }
        }
        
        $culturals_title = mb_convert_encoding($culturals_title, "UTF-8", "auto");
        echo $culturals_title.'を修正しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <a href="culturals_list.php">戻る</a>
</body>
</html>
