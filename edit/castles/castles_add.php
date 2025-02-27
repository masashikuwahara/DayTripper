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
    <title>城追加</title>
</head>
<body>
<header>
    <h1>城追加</h1>
</header>
<main>
    <div class="form-container">
        <form method="post" action="castles_add_check.php" enctype="multipart/form-data">
            <label>城番号を入力してください。100名城001～、続100名城101～、その他城201～</label><br />
            <input class="tex" type="text" name="cas"><br />
            
            <label>城名を入力してください。</label><br />
            <input class="tex" type="text" name="title"><br />
            
            <label>城郭構造を入力してください。</label><br />
            <input class="tex" type="text" name="structure"><br />
            
            <label>天守構造を入力してください。</label><br />
            <input class="tex" type="text" name="tenshu"><br />
            
            <label>築城主を入力してください。</label><br />
            <input class="tex" type="text" name="builder"><br />
            
            <label>築城年を入力してください。</label><br />
            <input class="tex" type="text" name="year"><br />
            
            <label>主な城主を入力してください。</label><br />
            <input class="tex" type="text" name="lord"><br />
            
            <label>遺構を入力してください。</label><br />
            <input class="tex" type="text" name="remains"><br />
            
            <label>指定文化財を入力してください。</label><br />
            <input class="tex" type="text" name="specify1"><br />
            
            <label>おすすめ度を入力してください。</label><br />
            <select class="tex" name="recommend">
                <option>★☆☆☆☆</option>
                <option>★★☆☆☆</option>
                <option>★★★☆☆</option>
                <option>★★★★☆</option>
                <option>★★★★★</option>
            </select><br />
            
            <label>所在地を入力してください。</label><br />
            <input class="tex" type="text" name="prefectures"><br />
            
            <label>説明を入力してください。</label><br />
            <textarea class="tex" name="explan"></textarea><br />
            
            <label>アクセスを入力してください。widthを600から100%に変更。</label><br />
            <textarea class="tex" name="access"></textarea><br />
            
            <label>画像を選んでください。</label><br />
            <input type="file" name="img1"><br />
            <input type="file" name="img2"><br />
            <input type="file" name="img3"><br />
            <input type="file" name="img4"><br />
            <input type="file" name="img5"><br />
            
            <div class="btn-group">
                <input class="btn" type="button" onclick="history.back()" value="戻る">
                <input class="btn" type="submit" value="次のページへ">
            </div>
        </form>
    </div>
</main>
<?php include("../footer.php") ?>
</body>
</html>
