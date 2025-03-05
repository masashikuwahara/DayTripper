<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>お問い合わせ一覧</title>
</head>
<body>
<header>
    <h1>お問い合わせ一覧</h1>
</header>
  <main>
      <?php
      try {
          require('../connect.php');
          $dbh->query('SET NAMES utf8');

          if (isset($_GET['page'])) {
              $page = (int)$_GET['page'];
          } else {
              $page = 1;
          }

          $start = ($page > 1) ? ($page * 10) - 10 : 0;

          $contacts = $dbh->prepare("SELECT * FROM contact LIMIT {$start}, 10");
          $contacts->execute();
          $contacts = $contacts->fetchAll(PDO::FETCH_ASSOC);

          echo '<form method="post" action="contact_branch.php">';
          echo '<table>';
          echo '<tr><th>選択</th><th>件名</th><th>日付</th><th>対応状況</th></tr>';

          foreach ($contacts as $post) {
              echo '<tr>';
              echo '<td><input type="radio" name="id" value="'.$post['id'].'"></td>';
              echo '<td>'.$post['title'].'</td>';
              echo '<td>'.$post['created_at'].'</td>';
              echo '<td><span class="status '.($post['confirmed'] == 0 ? 'pending' : 'done').'">'
                  .($post['confirmed'] == 0 ? '対応前' : '対応済み').'</span></td>';
              echo '</tr>';
          }

          echo '</table>';

          $page_num = $dbh->prepare("SELECT COUNT(*) FROM contact");
          $page_num->execute();
          $page_num = $page_num->fetchColumn();
          $pagination = ceil($page_num / 10);
      } catch (Exception $e) {
          echo '<p>ただいま障害により大変ご迷惑をお掛けしております。</p>';
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
      </div>
      </form>

      <p class="btn-group">
          <a href="../index.php" class="btn">トップメニューへ</a>
      </p>
  </main>
<?php include("../footer.php") ?>
</body>
</html>
