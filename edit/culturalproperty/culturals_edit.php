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
    <title>記事修正</title>
</head>
<body>
    <?php
    try{

        $culturals_id=$_GET['id'];

        require('../connect.php');
        $dbh->query('SET NAMES utf8');
        $sql = 'SELECT title,year,specify,explan,access,
        img1,img2,img3 FROM cultures WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$culturals_id;
        $stmt->execute($data);
        
        $cul =$stmt->fetch(PDO::FETCH_ASSOC);
        $culturals_title=$cul['title'];
        $culturals_year=$cul['year'];
        $culturals_specify=$cul['specify'];
        $culturals_explan=$cul['explan'];
        $culturals_access=$cul['access'];
        $culturals_img1_old=$cul['img1'];
        $culturals_img2_old=$cul['img2'];
        $culturals_img3_old=$cul['img3'];

        $dbh = null;

        if($culturals_img1_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$culturals_img1_old.'">';
        }

        if($culturals_img2_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$culturals_img2_old.'">';
        }

        if($culturals_img3_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$culturals_img3_old.'">';
        }

    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    ?>
    <header>
        <h1><?php echo $culturals_title; ?></h1>
    </header>
    <main>
    <form method="post" action="culturals_edit_check.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $culturals_id; ?>">
      <input name="img_name_old1" type="hidden" value="<?php echo $culturals_img1_old;?>">
      <input name="img_name_old2" type="hidden" value="<?php echo $culturals_img2_old;?>">
      <input name="img_name_old3" type="hidden" value="<?php echo $culturals_img3_old;?>">
        文化財の名称を入力してください。<br />
        <input class="tex" type="text" name="title" value="<?php echo $culturals_title; ?>"><br />
        作成年を入力してください。<br />
        <input class="tex" type="text" name="year" value="<?php echo $culturals_year; ?>"><br />
        指定文化財を入力してください。<br />
        <input class="tex" type="text" name="specify" value="<?php echo $culturals_specify; ?>"><br />
        説明を入力してください。<br />
        <textarea class="textb" type="text" name="explan" ><?php echo $culturals_explan; ?></textarea><br />
        アクセスを入力してください。<br />
        <textarea class="textb" type="text" name="access" ><?php echo $culturals_access; ?></textarea><br />
        画像を選んでください。<br />
        <input type="file" name="img1" ><br /><br />
        <input type="file" name="img2" ><br /><br />
        <input type="file" name="img3" ><br /><br />
      <input class="btn" type="button" onclick="history.back()"value="戻る">
      <input class="btn" type="submit" value="次のページへ">
    </form>
    </main>
<?php include("../footer.php") ?>
</body>
</html>