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
    <title>城一覧</title>
</head>
<body>
<header>
		<h1>城一覧</h1>
</header>
<main>
<?php
try
{

require('../../connect.php');
$dbh->query('SET NAMES utf8');
$sql='SELECT id,day FROM info WHERE 1';
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

$info = $dbh->prepare(" SELECT id, day, information FROM info ORDER BY id DESC LIMIT {$start}, 10  ");

echo '<form method="post" action="update_branch.php">';
echo '<input class="btn" type="submit" name="add" value="更新情報を追加"><br />';

$info->execute();
$info = $info->fetchAll(PDO::FETCH_ASSOC);

foreach ($info as $post) {
	echo '<input type="radio" name="id" value="'.$post['id'].'">';
	echo $post['day']. '<br>';
	echo $post['information']. '<br>';
}

$page_num = $dbh->prepare(" SELECT COUNT(*) id FROM info ");
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

<div class="pagination">
		<?php for ($x = 1; $x <= $pagination; $x++): ?>
				<a href="?page=<?= $x ?>" class="btn"><?= $x ?></a>
		<?php endfor; ?>
</div>

<?php
echo '<br/>';
echo '<input class="btn" type="submit" name="delete" value="削除">';
echo '</form>';
?>
<p class="btn-group"><a href="../index.php" class="btn">トップメニューへ</a></p>
</main>
<?php include("../footer.php") ?>
</body>
</html>