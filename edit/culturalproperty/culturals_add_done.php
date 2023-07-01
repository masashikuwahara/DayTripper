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
        $culturals_title=$post['title'];
        $culturals_year=$post['year'];
        $culturals_specify=$post['specify'];
        $culturals_explan=$post['explan'];
        $culturals_access=$post['access'];
        $culturals_img1=$post['img1'];
        $culturals_img2=$post['img2'];
        $culturals_img3=$post['img3'];

        require('../connect.php');

        $sql = 'INSERT INTO cultures (title,year,specify,explan,access,
        img1,img2,img3) 
        VALUES (?,?,?,?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $culturals_title;
        $data[] = $culturals_year;
        $data[] = $culturals_specify;
        $data[] = $culturals_explan;
        $data[] = $culturals_access;
        $data[] = $culturals_img1;
        $data[] = $culturals_img2;
        $data[] = $culturals_img3;
        $stmt->execute($data);

        $dbh = null;
        
        $culturals_title = mb_convert_encoding($culturals_title, "UTF-8", "auto");
        echo $culturals_title.'を追加しました。<br />';
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
