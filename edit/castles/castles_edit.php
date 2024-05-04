<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>記事修正</title>
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

        $castles_id=$_GET['id'];

        require('../../connect.php');
        $dbh->query('SET NAMES utf8');
        $sql = 'SELECT cas,title,structure,tenshu,builder,year,lord,
        remains,specify1,recommend,explan,access,img1,img2,img3,img4,img5
        FROM castles WHERE id=?';
        $stmt = $dbh->prepare($sql);
        $data[]=$castles_id;
        $stmt->execute($data);
        
        $cas =$stmt->fetch(PDO::FETCH_ASSOC);
        $castles_cas=$cas['cas'];
        $castles_title=$cas['title'];
        $castles_structure=$cas['structure'];
        $castles_builder=$cas['builder'];
        $castles_year=$cas['year'];
        $castles_lord=$cas['lord'];
        $castles_specify1=$cas['specify1'];
        $castles_recommend=$cas['recommend'];
        $castles_explan=$cas['explan'];
        $castles_access=$cas['access'];
        $castles_img1_old=$cas['img1'];
        $castles_img2_old=$cas['img2'];
        $castles_img3_old=$cas['img3'];
        $castles_img4_old=$cas['img4'];
        $castles_img5_old=$cas['img5'];

        $dbh = null;

        if($castles_img1_old=='')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../img/'.$castles_img1_old.'">';
        }

        if($castles_img2_old=='')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../img/'.$castles_img2_old.'">';
        }

        if($castles_img3_old=='')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../img/'.$castles_img3_old.'">';
        }

        if($castles_img4_old=='')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../img/'.$castles_img4_old.'">';
        }

        if($castles_img5_old=='')
        {
            $disp_img='';
        }
        else
        {
            $disp_img='<img src="../../img/'.$castles_img5_old.'">';
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
    城名<br />
    <?php echo $castles_title;?>
    <br />
    <br />

    <form method="post" action="castles_edit_check.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $castles_id; ?>">
      <input name="img_name_old1" type="hidden" value="<?php echo $castles_img1_old;?>">
      <input name="img_name_old2" type="hidden" value="<?php echo $castles_img2_old;?>">
      <input name="img_name_old3" type="hidden" value="<?php echo $castles_img3_old;?>">
      <input name="img_name_old4" type="hidden" value="<?php echo $castles_img4_old;?>">
      <input name="img_name_old5" type="hidden" value="<?php echo $castles_img5_old;?>">
      城番号を入力してください。100名城1～、続100名城101～<br />
      <input class="tex" type="text" name="cas" value="<?php echo $castles_cas; ?>"><br />
      城名を入力してください。<br />
      <input class="tex" type="text" name="title" value="<?php echo $castles_title; ?>"><br />
      城郭構造を入力してください。<br />
      <input class="tex" type="text" name="structure" value="<?php echo $castles_structure; ?>"><br />
      築城主を入力してください。<br />
      <input class="tex" type="text" name="builder" value="<?php echo $castles_builder; ?>"><br />
      築城年を入力してください。<br />
      <input class="tex" type="text" name="year" value="<?php echo $castles_year; ?>"><br />
      主な城主を入力してください。<br />
      <input class="tex" type="text" name="lord" value="<?php echo $castles_lord; ?>"><br />
      指定文化財を入力してください。(2つまで)<br />
      <input class="tex" type="text" name="specify1" value="<?php echo $castles_specify1; ?>"><br /><br />
      おすすめ度を★5つで入力してください。★☆<br />
      <select class="tex" name="recommend" id="" value="<?php echo $castles_recommend; ?>" >
        <option>★☆☆☆☆</option>
        <option>★★☆☆☆</option>
        <option>★★★☆☆</option>
        <option>★★★★☆</option>
        <option>★★★★★</option>
      </select><br />
      説明を入力してください。<br />
      <textarea class="textb" type="text" name="explan" ><?php echo $castles_explan; ?></textarea><br />
      アクセスを入力してください。<br />
      <textarea class="texta" type="text" name="access" ></textarea><br />
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