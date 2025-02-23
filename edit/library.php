<?php
session_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function session() {
    if (!isset($_SESSION['user_name'])) {
        header("Location: login.php");
        exit();
    }
}

// function dbconnect() {
//     $db = new PDO("mysql:host=localhost;charset=utf8;dbname=daytripper", "root", "");
//     if (!$db) {
// 		die($db->error);
// 	}

//     return $db;
// }

function sanitize($before)
{
    foreach($before as $key=>$value)
    {
        $after[$key] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    return $after;
}
?>