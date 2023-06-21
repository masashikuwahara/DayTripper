<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true)
{
    setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ログアウトしました</title>
</head>
<body>
    ログアウトしました。<br />
    <br />
    <a href="login.html">ログイン画面へ</a>
</body>
</html>