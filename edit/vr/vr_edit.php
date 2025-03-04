<?php
include('../library.php');
session();

?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>動画修正</title>
</head>
<body>
<?php
    $vr_id=$_GET['id'];

    include('../../connect.php');
    $dbh->query('SET NAMES utf8');
    $sql = 'SELECT title, description, time, video, img FROM vrvideo WHERE id=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$vr_id;
    $stmt->execute($data);
    
    $vr =$stmt->fetch(PDO::FETCH_ASSOC);
    $vr_title=$vr['title'];
    $vr_desc=$vr['description'];
    $vr_time=$vr['time'];
    $vr_video=$vr['video'];
    $vr_img=$vr['img'];
    
    $dbh = null;
?>
<header>
    <h1>動画修正</h1>
</header>
<main>
    <div class="form-container">
        <form method="post" action="vr_edit_check.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $vr_id; ?>">
        タイトルを入力してください。<br />
        <input class="tex" type="text" name="title" value="<?php echo $vr_title; ?>"><br />
        説明を入力してください。(20文字以内)<br />
        <textarea class="textb" type="text" name="desc" ><?php echo $vr_desc; ?></textarea><br />
        動画の再生時間を入力してください。(mm:ss)<br />
        <input class="tex" type="text" name="time" value="<?php echo $vr_time; ?>"><br />
        動画のファイル名を拡張子まで含めて入力してください。<br />
        <input class="tex" type="text" name="video" value="<?php echo $vr_video; ?>"><br />
        サムネイル画像のファイル名を拡張子まで含めて入力してください。<br />
        <input class="tex" type="text" name="img" value="<?php echo $vr_img; ?>"><br />
        動画を選んでください。<br />
        <input disabled type="file" name="img" ><br />
            <div class="btn-group">
                <input class="btn" type="button" onclick="history.back()" value="戻る">
                <input class="btn" type="submit" value="次のページへ">
            </div>
        </form>
    </div>
</main>
<?php include("../footer.php") ?>
</body>
</html>