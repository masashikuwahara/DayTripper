<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>登録しました</title>
</head>
<body>
    <?php
    try
    {
        $post=($_POST);
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
        $castles_img1=$post['img1'];
        $castles_img2=$post['img2'];
        $castles_img3=$post['img3'];
        $castles_img4=$post['img4'];
        $castles_img5=$post['img5'];

        require('../connect.php');

        $sql = 'INSERT INTO 100castles (cas,title,structure,builder,year,lord,
        specify1,specify2,recommend,explan,access,img1,img2,img3,img4,img5) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
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
        $stmt->execute($data);

        $dbh = null;
        
        $castles_title = mb_convert_encoding($castles_title, "UTF-8", "auto");
        echo $castles_title.'を追加しました。<br />';
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
