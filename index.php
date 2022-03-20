<?php
    // db接続
    require 'mainte/db_connection.php';

    // 情報取得
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC";

    // 変数に代入
    $blogs = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Taskapp2</title>
    </head>
    <body>
        <h1>一覧表示</h1>
        <div class="new_btn">
            <a href="create.php">新規投稿</a>
        </div>
        <!-- 一覧表示 -->
        <?php foreach($blogs as $blog) : ?>
            <div>
                <h3><?php echo $blog['title'] ?></h3>
                <p>筆者　<?php echo $blog['author_name'] ?></p>
                <a href="edit.php?id=<?php echo $blog['id'] ?>">編集</a>
                <a href="#">削除</a>
            </div> 
        <?php endforeach ?>
        <!-- 一覧表示 -->
    </body>
</html>