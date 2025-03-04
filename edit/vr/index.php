<?php
include('../library.php');
session();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>VR動画一覧</title>
</head>
<body>
    <header>
        <h1>VR動画一覧</h1>
    </header>
    <main>
		<?php
		try
		{

		include('../../connect.php');
		$dbh->query('SET NAMES utf8');
		$sql='SELECT id,title FROM vrvideo WHERE 1';
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

		$castles = $dbh->prepare(" SELECT id, title FROM vrvideo LIMIT {$start}, 10 ");

		echo '<form method="post" action="vr_branch.php">';
		echo '<input class="btn" type="submit" name="add" value="動画を追加"><br />';

		$castles->execute();
		$castles = $castles->fetchAll(PDO::FETCH_ASSOC);

		foreach ($castles as $post) {
			echo '<input type="radio" name="id" value="'.$post['id'].'">';
			echo $post['title']. '<br>';
		}

		$page_num = $dbh->prepare(" SELECT COUNT(*) id FROM vrvideo ");
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
		<div class="btn-group">
				<input class="btn" type="submit" name="disp" value="参照">
				<input class="btn" type="submit" name="edit" value="修正">
				<input class="btn disabled" type="submit" name="delete" value="削除" disabled>
		</div>
	</form>
	<p class="btn-group"><a href="../index.php" class="btn">トップメニューへ</a></>
  </main>
<?php include("../footer.php") ?>
</body>
</html>