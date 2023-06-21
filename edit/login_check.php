<?php

try
{

    require_once('library.php');
    
    $post=sanitize($_POST);
    $user_id=$post['id'];
    $user_pass=$post['pass'];
    
    require('connect.php');

    $sql = 'SELECT name FROM users WHERE id=? AND password=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $user_id;
    $data[] = $user_pass;
    $stmt->execute($data);
    
    $dbh = null;

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec==false)
    {
        header("Content-Type: text/html; charset=UTF-8");
        print'スタッフコードかパスワードが間違っています。<br />';
        print'<a href="login.html">戻る</a>';
    }
    else
    {
        session_start();
        $_SESSION['login']=1;
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$rec['name'];
        header('Location:top.php');
        exit();
    }

}
catch(Exception $e)
{
    print'ただいま障害により大変迷惑をおかけしております。';
    exit();
}

?>