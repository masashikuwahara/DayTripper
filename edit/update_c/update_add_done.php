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
        $update_cas=$post['day'];
        $update_information=$post['information'];
        $update_id=$post['id'];
        $update_kinds=$post['kinds'];
        $update_url=$post['url'];

        require('../../connect.php');

        $sql = 'INSERT INTO info_c (day,content,number,kinds,url) 
        VALUES (?,?,?,?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $update_cas;
        $data[] = $update_information;
        $data[] = $update_id;
        $data[] = $update_kinds;
        $data[] = $update_url;
        $stmt->execute($data);

        $dbh = null;
        
        $update_information = mb_convert_encoding($update_information, "UTF-8", "auto");
        echo '追加しました。<br />';
    }
    catch (Exception $e)
    {
        echo('Error:'.$e->getMessage());
        exit();
    }
    ?>
    <a href="index.php">戻る</a>
</body>
</html>
