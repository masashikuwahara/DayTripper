<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>更新情報</title>
	<style>
	.btn{
        width: 50px;
        height: 30px;
        background-color: #00bfff;
        border-radius: 20px;
        border: none;
        color: #ffffff;
        }

  .btn:hover {
            background-color: #ed6fb5;
        }

	.add{
		display: flex;
		align-items: center;
		justify-content: center;
		line-height: 1;
		text-decoration: none;
		color: #ffffff;
		border-radius: 20px;
		border: none;
		width: 120px;
		height: 40px;
		transition: 0.3s;
		background-image: radial-gradient(circle at 100% 0%, 
		rgba(94, 138, 243, 1) 15%, rgba(243, 61, 223, 1));
	}

	.add:hover {
		opacity: .5;
        }
	</style>
</head>
<body>
<?php

try
{

require('../../connect.php');
$dbh->query('SET NAMES utf8');
$sql='SELECT id,day FROM info_c WHERE 1';
$stmt=$dbh->prepare($sql);
$stmt->execute();

if (isset($_GET['page'])) {
	$page = (int)$_GET['page'];
} else {
	$page = 1;
}

if ($page > 1) {
	$start = ($page * 10) - 10;
} else {
	$start = 0;
}

$info = $dbh->prepare(" SELECT id, day, content FROM info_c ORDER BY id DESC LIMIT {$start}, 10  ");

echo '更新情報一覧<br/><br/>';

echo '<form method="post" action="update_branch.php">';
echo '<input class="add" type="submit" name="add" value="更新情報を追加"><br />';

$info->execute();
$info = $info->fetchAll(PDO::FETCH_ASSOC);

foreach ($info as $post) {
	echo '<input type="radio" name="id" value="'.$post['id'].'">';
	echo $post['day']. '<br>';
	echo $post['content']. '<br>';
}

$page_num = $dbh->prepare(" SELECT COUNT(*) id FROM info_c ");
$page_num->execute();
$page_num = $page_num->fetchColumn();

$pagination = ceil($page_num / 10);

}
catch (Exception $e)
{
	echo 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>

<?php for ($x=1; $x <= $pagination ; $x++) { ?>
	<a href="?page=<?php echo $x ?>"><?php echo $x; ?></a>
<?php } // End of for ?>

<?php
echo '<br/>';
echo '<input class="btn" type="submit" name="delete" value="削除">';
echo '</form>';
?>

<a href="../index.php">トップメニューへ</a><br />

</body>
</html>