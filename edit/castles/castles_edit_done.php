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
        $castles_id=$post['id'];
        $castles_cas=$post['cas'];
        $castles_title=$post['title'];
        $castles_structure=$post['structure'];
        $castles_builder=$post['builder'];
        $castles_year=$post['year'];
        $castles_lord=$post['lord'];
        $castles_specify1=$post['specify1'];
        $castles_specify2=$post['specify2'];
        $castles_recommend=$post['recommend'];
        $castles_explan=$post['explan'];
        $castles_access=$post['access'];
        $img_name1_old=$post['img_name1_old'];
        $img_name2_old=$post['img_name2_old'];
        $img_name3_old=$post['img_name3_old'];
        $img_name4_old=$post['img_name4_old'];
        $img_name5_old=$post['img_name5_old'];
        $castles_img1=$post['img1'];
        $castles_img2=$post['img2'];
        $castles_img3=$post['img3'];
        $castles_img4=$post['img4'];
        $castles_img5=$post['img5'];

        require('../../connect.php');

        $sql = 'UPDATE 100castles SET cas=?,title=?,structure=?,builder=?,year=?,
        lord=?,specify1=?,specify2=?,recommend=?,explan=?,access=?,
        img1=?,img2=?,img3=?,img4=?,img5=? WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $castles_cas;
        $data[] = $castles_title;
        $data[] = $castles_structure;
        $data[] = $castles_builder;
        $data[] = $castles_year;
        $data[] = $castles_lord;
        $data[] = $castles_specify1;
        $data[] = $castles_specify2;
        $data[] = $castles_recommend;
        $data[] = $castles_explan;
        $data[] = $castles_access;
        $data[] = $castles_img1;
        $data[] = $castles_img2;
        $data[] = $castles_img3;
        $data[] = $castles_img4;
        $data[] = $castles_img5;
        $data[] = $castles_id;
        $stmt->execute($data);

        $dbh = null;

        if($img_name1_old !=$castles_img1)
        {
            if($img_name1_old !='')
            {
                unlink('../../img/'.$img_name1_old);
            }
        }

        if($img_name2_old !=$castles_img2)
        {
            if($img_name2_old !='')
            {
                unlink('../../img/'.$img_name2_old);
            }
        }

        if($img_name3_old !=$castles_img3)
        {
            if($img_name3_old !='')
            {
                unlink('../../img/'.$img_name3_old);
            }
        }

        if($img_name4_old !=$castles_img4)
        {
            if($img_name4_old !='')
            {
                unlink('../../img/'.$img_name4_old);
            }
        }

        if($img_name5_old !=$castles_img5)
        {
            if($img_name5_old !='')
            {
                unlink('../../img/'.$img_name5_old);
            }
        }
        
        $castles_title = mb_convert_encoding($castles_title, "UTF-8", "auto");
        echo $castles_title.'を修正しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <a href="castles_list.php">戻る</a>
</body>
</html>
