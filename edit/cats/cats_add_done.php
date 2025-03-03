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
    <title>登録しました</title>
</head>
<body>
<header>
    <h1>登録しました</h1>
</header>
<main>
    <?php
    try
    {
        $post=($_POST);
        $cat_title=$post['title'];
        $cat_kind=$post['kind'];
        $cat_color=$post['color'];
        $cat_feature=$post['feature'];
        $cat_place=$post['place'];
        $cat_comment=$post['comment'];
        $cat_img1=$post['img1'];
        $cat_img2=$post['img2'];
        $cat_img3=$post['img3'];
        $cat_img4=$post['img4'];
        $cat_img5=$post['img5'];

        require('../connect.php');

        $sql = 'INSERT INTO cats (title, kind, color, feature, place,
        comment, img1, img2, img3, img4, img5) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $cat_title;
        $data[] = $cat_kind;
        $data[] = $cat_color;
        $data[] = $cat_feature;
        $data[] = $cat_place;
        $data[] = $cat_comment;
        $data[] = $cat_img1;
        $data[] = $cat_img2;
        $data[] = $cat_img3;
        $data[] = $cat_img4;
        $data[] = $cat_img5;
        $stmt->execute($data);

        $dbh = null;
        
        $cat_title = mb_convert_encoding($cat_title, "UTF-8", "auto");
        echo $cat_title.'を追加しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <p class="btn-group"><a href="index.php" class="btn">トップメニューへ</a></p>
</main>
<?php include("../footer.php") ?>
</body>
</html>
