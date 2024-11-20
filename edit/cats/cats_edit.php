<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>猫ページ修正</title>
    <style>
        .text{
            width: 600px;
            height: 200px;
        }
        .tex{
            width:200px;
        }
        .texta{
          width: 600px;
        }
        .textb{
          width: 600px;
          height: 200px;
        }
        .btn{
            width: 100px;
            height: 50px;
            background-color: #00bfff;
            border-radius: 20px;
            border: none;
            color: #ffffff;
        }
        .btn:hover {
            background-color: #ed6fb5;
        }
    </style>
</head>
<body>
    <?php
    try{

        $cat_id=$_GET['id'];

        require('../connect.php');
        $dbh->query('SET NAMES utf8');
        $sql = 'SELECT title, kind, color, feature, place, comment, 
        img1, img2, img3, img4 ,img5 FROM cats WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$cat_id;
        $stmt->execute($data);
        
        $post =$stmt->fetch(PDO::FETCH_ASSOC);
        $cat_title=$post['title'];
        $cat_kind=$post['kind'];
        $cat_color=$post['color'];
        $cat_feature=$post['feature'];
        $cat_place=$post['place'];
        $cat_comment=$post['comment'];
        $cat_img1_old=$post['img1'];
        $cat_img2_old=$post['img2'];
        $cat_img3_old=$post['img3'];
        $cat_img4_old=$post['img4'];
        $cat_img5_old=$post['img5'];

        $dbh = null;

        if($cat_img1_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$cat_img1_old.'">';
        }

        if($cat_img2_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$cat_img2_old.'">';
        }

        if($cat_img3_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$cat_img3_old.'">';
        }

        if($cat_img4_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$cat_img4_old.'">';
        }

        if($cat_img5_old === '')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../cultural_assets/img/'.$cat_img5_old.'">';
        }

    }
    catch (Exception $e)
    {
        echo'ただいま障害により大変ご迷惑をおかけしております。';
        exit();
    }

    ?>

    記事修正<br />
    <br />
    文化財名<br />
    <?php echo $cat_title;?>
    <br />
    <br />

    <form method="post" action="cat_edit_check.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $cat_id; ?>">
      <input name="img_name_old1" type="hidden" value="<?php echo $cat_img1_old;?>">
      <input name="img_name_old2" type="hidden" value="<?php echo $cat_img2_old;?>">
      <input name="img_name_old3" type="hidden" value="<?php echo $cat_img3_old;?>">
      <input name="img_name_old3" type="hidden" value="<?php echo $cat_img4_old;?>">
      <input name="img_name_old3" type="hidden" value="<?php echo $cat_img5_old;?>">
        毛色・色柄<br />
        <input class="tex" type="text" name="color" value="<?php echo $cat_title; ?>"><br />
        特徴<br />
        <input class="tex" type="text" name="feature" value="<?php echo $cat_feature; ?>"><br />
        目撃場所<br />
        <input class="tex" type="text" name="place" value="<?php echo $cat_place; ?>"><br />
        一言<br />
        <textarea class="textb" type="text" name="explan" ><?php echo $cat_comment; ?></textarea><br />
        画像を選んでください。<br />
        <input type="file" name="img1" ><br /><br />
        <input type="file" name="img2" ><br /><br />
        <input type="file" name="img3" ><br /><br />
        <input type="file" name="img4" ><br /><br />
        <input type="file" name="img5" ><br /><br />
      <input class="btn" type="button" onclick="history.back()"value="戻る">
      <input class="btn" type="submit" value="次のページへ">
    </form>
</body>
</html>