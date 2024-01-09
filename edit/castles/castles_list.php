<?php
require_once('../library.php');
session();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>城一覧</title>
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
$sql='SELECT id,title FROM 100castles WHERE 1';
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

$castles = $dbh->prepare(" SELECT id, title FROM 100castles LIMIT {$start}, 10 ");

echo '城一覧<br/><br/>';

echo '<form method="post" action="castles_branch.php">';
echo '<input class="add" type="submit" name="add" value="城を追加"><br />';

$castles->execute();
$castles = $castles->fetchAll(PDO::FETCH_ASSOC);

foreach ($castles as $post) {
	echo '<input type="radio" name="id" value="'.$post['id'].'">';
	echo $post['title']. '<br>';
}

$page_num = $dbh->prepare(" SELECT COUNT(*) id FROM 100castles ");
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
echo '<br/>';
echo '<input class="btn" type="submit" name="disp" value="参照">';
echo '<input class="btn" type="submit" name="edit" value="修正">';
echo '<input disabled class="btn" type="submit" name="delete" value="削除">';
echo '</form>';
?>

<br />
<a href="../top.php">トップメニューへ</a><br />

</body>
</html>