<?php
include('../library.php');
session();
?>
<!DOCTYPE html>
<html>
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
    try{
        $post = ($_POST);
        $vr_title = $post['title'];
        $vr_desc = $post['desc'];
        $vr_time = $post['time'];
        $vr_video = $post['video'];
        $vr_img = $post['img'];

        include('../../connect.php');

        $sql = 'INSERT INTO vrvideo (title, description, time, video, img) 
        VALUES (?, ?, ?, ?, ?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $vr_title;
        $data[] = $vr_desc;
        $data[] = $vr_time;
        $data[] = $vr_video;
        $data[] = $vr_img;
        $stmt->execute($data);

        $dbh = null;
        
        $vr_title = mb_convert_encoding($vr_title, "UTF-8", "auto");
        echo $vr_title.'を追加しました。<br />';
    }catch (Exception $e){
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <p class="btn-group"><a href="index.php" class="btn">トップメニューへ</a></p>
</main>
<?php include("../footer.php") ?>
</body>
</html>
