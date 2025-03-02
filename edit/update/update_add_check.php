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
    <title>登録内容確認</title>
</head>
<body>
    <header>
        <h1>登録内容確認</h1>
    </header>
    <main>
    <div class="content">
        <?php
        $post=sanitize($_POST);
        $update_day=$post['day'];
        $update_information=$post['information'];
        $update_id=$post['id'];
        $update_kinds=$post['kinds'];
        $update_url=$post['url'];

        if($update_day=='')
        {
            echo'<p style="color:#ff0000">更新日時が入力されていません。</p><br />';
        }
        else
        {
            echo'更新日時:';
            echo$update_day;
            echo'<br />';
        }

        if($update_information=='')
        {
            echo'<p style="color:#ff0000">更新情報が入力されていません。</p><br />';
        }
        else
        {
            echo'城名:';
            echo$update_information;
            echo'<br />';
        }

        if($update_id=='')
        {
            echo'<p style="color:#ff0000">idが入力されていません。</p><br />';
        }
        else
        {
            echo'id:';
            echo$update_id;
            echo'<br />';
        }

        if($update_kinds=='')
        {
            echo'<p style="color:#ff0000">真偽値が入力されていません。</p><br />';
        }
        else
        {
            echo'真偽値:';
            echo$update_kinds;
            echo'<br />';
        }

        if($update_url=='')
        {
            echo'<p style="color:#ff0000">URLが入力されていません。</p><br />';
        }
        else
        {
            echo'URL:';
            echo$update_url;
            echo'<br />';
        }
        
        if($update_day==''||$update_information=='')
        {
            echo'<form>';
            echo'<input class="btn" type="button" onclick="history.back()" value="戻る">';
            echo'</form>';
        }
        else
        {
            echo'上記の内容を追加します。<br />';
            echo'<form method="post" action="update_add_done.php">';
            echo'<input type="hidden" name="day" value="'.$update_day.'">';
            echo'<input type="hidden" name="information" value="'.$update_information.'">';
            echo'<input type="hidden" name="id" value="'.$update_id.'">';
            echo'<input type="hidden" name="kinds" value="'.$update_kinds.'">';
            echo'<input type="hidden" name="url" value="'.$update_url.'">';
            echo'<br />';
            echo'<input class="btn" type="button" onclick="history.back()" value="戻る">&nbsp;';
            echo'<input class="btn" type="submit" value="決定する">';
            echo'</form>';
        }
        ?>
    </div>
    </main>
<?php include("../footer.php") ?>
</body>
</html>