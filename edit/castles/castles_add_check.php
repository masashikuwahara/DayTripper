<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録内容確認</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <h1>登録内容確認</h1>
</header>
    <?php
    $post=sanitize($_POST);
    $castles_cas=$post['cas'];
    $castles_title=$post['title'];
    $castles_structure=$post['structure'];
    $castles_tenshu=$post['tenshu'];
    $castles_builder=$post['builder'];
    $castles_year=$post['year'];
    $castles_lord=$post['lord'];
    $castles_remains=$post['remains'];
    $castles_specify1=$post['specify1'];
    $castles_recommend=$post['recommend'];
    $castles_prefectures=$post['prefectures'];
    $castles_explan=$post['explan'];
    $castles_access=$post['access'];
    $castles_img1=$_FILES['img1'];
    $castles_img2=$_FILES['img2'];
    $castles_img3=$_FILES['img3'];
    $castles_img4=$_FILES['img4'];
    $castles_img5=$_FILES['img5'];

    require('../../connect.php');
    $stmt = $dbh->prepare('SELECT COUNT(*) FROM castles WHERE cas = ?');
    $stmt->execute([$castles_cas]);
    $count = $stmt->fetchColumn();

    if($castles_cas === '')
    {
        echo'<p style="color:#ff0000">城番号が入力されていません。</p><br />';
    }
    else
    {
        echo'城番号:';
        echo$castles_cas;
        echo'<br />';
    }

    if ($count !== 0) {
        echo '<p style="color:#ff0000">この城番号は既に登録されています。</p><br />';
    }

    if($castles_title === '')
    {
        echo'<p style="color:#ff0000">城名が入力されていません。</p><br />';
    }
    else
    {
        echo'城名:';
        echo$castles_title;
        echo'<br />';
    }

    if($castles_structure  === '')
    {
        echo'<p style="color:#ff0000">城郭構造が入力されていません。</p><br />';
    }
    else
    {
        echo'城郭構造:';
        echo$castles_structure;
        echo'<br />';
    }

    if($castles_tenshu === '')
    {
        echo'<p style="color:#ff0000">天守構造が入力されていません。</p><br />';
    }
    else
    {
        echo'天守構造:';
        echo$castles_tenshu;
        echo'<br />';
    }

    if($castles_builder === '')
    {
        echo'<p style="color:#ff0000">築城主が入力されていません。</p><br />';
    }
    else
    {
        echo'築城主:';
        echo$castles_builder;
        echo'<br />';
    }

    if($castles_year === '')
    {
        echo'<p style="color:#ff0000">築城年が入力されていません。</p><br />';
    }
    else
    {
        echo'築城年:';
        echo$castles_year;
        echo'<br />';
    }

    if($castles_lord === '')
    {
        echo'<p style="color:#ff0000">主な城主が入力されていません。</p><br />';
    }
    else
    {
        echo'主な城主:';
        echo$castles_lord;
        echo'<br />';
    }

    if($castles_remains === '')
    {
        echo'<p style="color:#ff0000">遺構が入力されていません。</p><br />';
    }
    else
    {
        echo'遺構:';
        echo$castles_remains;
        echo'<br />';
    }

    if($castles_specify1 === '')
    {
        echo'<p style="color:#ff0000">指定文化財が入力されていません。</p><br />';
    }
    else
    {
        echo'指定文化財:';
        echo$castles_specify1;
        echo'<br />';
    }

    if($castles_recommend === '')
    {
        echo'<p style="color:#ff0000">おすすめ度が入力されていません。</p><br />';
    }
    else
    {
        echo'おすすめ度:';
        echo$castles_recommend;
        echo'<br />';
    }    

    if($castles_prefectures === '')
    {
        echo'<p style="color:#ff0000">所在地が入力されていません。</p><br />';
    }
    else
    {
        echo'所在地:';
        echo$castles_prefectures;
        echo'<br />';
    }    

    
    if($castles_explan === '')
    {
        echo'<p style="color:#ff0000">説明が入力されていません。</p><br />';
    }
    else
    {
        echo'説明:';
        echo$castles_explan;
        echo'<br />';
    }    

    
    if($castles_access === '')
    {
        echo'<p style="color:#ff0000">アクセスが入力されていません。</p><br />';
    }
    else
    {
        echo'アクセス:';
        echo$castles_access;
        echo'<br />';
    }    

    if( $castles_img1['size']>0)
    {
        if( $castles_img1['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($castles_img1['tmp_name'],'../../img/'.$castles_img1['name']);
            echo'<img src="../../img/'.$castles_img1['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $castles_img2['size']>0)
    {
        if( $castles_img2['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($castles_img2['tmp_name'],'../../img/'.$castles_img2['name']);
            echo'<img src="../../img/'.$castles_img2['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $castles_img3['size']>0)
    {
        if( $castles_img3['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($castles_img3['tmp_name'],'../../img/'.$castles_img3['name']);
            echo'<img src="../../img/'.$castles_img3['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $castles_img4['size']>0)
    {
        if( $castles_img4['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($castles_img4['tmp_name'],'../../img/'.$castles_img4['name']);
            echo'<img src="../../img/'.$castles_img4['name'].'" width="250" >';
            echo'<br />';
        }
    }

    if( $castles_img5['size']>0)
    {
        if( $castles_img5['size']>1000000)
        {
            echo'<p style="color:#ff0000">画像が大きすぎます。</p><br />';
        }
        else
        {
            move_uploaded_file($castles_img5['tmp_name'],'../../img/'.$castles_img5['name']);
            echo'<img src="../../img/'.$castles_img5['name'].'" width="250" >';
            echo'<br />';
        }
    }
    
    if($castles_title === ''||$count !== 0||$castles_structure === ''||$castles_builder === ''||
    $castles_year === ''||$castles_lord === ''||$castles_specify1 === ''||$castles_recommend === ''||
    $castles_prefectures === ''||$castles_explan === ''||$castles_access === ''||
    $castles_img1['size']>1000000)
    {
        echo'<form>';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
        echo'</form>';
    }
    else
    {
        echo'上記の内容を追加します。<br />';
        echo'<form method="post" action="castles_add_done.php">';
        echo'<input type="hidden" name="cas" value="'.$castles_cas.'">';
        echo'<input type="hidden" name="title" value="'.$castles_title.'">';
        echo'<input type="hidden" name="structure" value="'.$castles_structure.'">';
        echo'<input type="hidden" name="tenshu" value="'.$castles_tenshu.'">';
        echo'<input type="hidden" name="builder" value="'.$castles_builder.'">';
        echo'<input type="hidden" name="year" value="'.$castles_year.'">';
        echo'<input type="hidden" name="lord" value="'.$castles_lord.'">';
        echo'<input type="hidden" name="remains" value="'.$castles_remains.'">';
        echo'<input type="hidden" name="specify1" value="'.$castles_specify1.'">';
        echo'<input type="hidden" name="recommend" value="'.$castles_recommend.'">';
        echo'<input type="hidden" name="prefectures" value="'.$castles_prefectures.'">';
        echo'<input type="hidden" name="explan" value="'.$castles_explan.'">';
        echo'<input type="hidden" name="access" value="'.$castles_access.'">';
        echo'<input type="hidden" name="img1" value="'.$castles_img1['name'].'">';
        echo'<input type="hidden" name="img2" value="'.$castles_img2['name'].'">';
        echo'<input type="hidden" name="img3" value="'.$castles_img3['name'].'">';
        echo'<input type="hidden" name="img4" value="'.$castles_img4['name'].'">';
        echo'<input type="hidden" name="img5" value="'.$castles_img5['name'].'">';
        echo'<br />';
        echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
        echo'<input class="btn" type="submit" value="決定する">';
        echo'</form>';
    }
    ?>
</body>
</html>