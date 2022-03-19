<?php 

    // db保存
    require 'mainte/insert.php';
    insertContact($_POST);

    // 変数化
    $author_name = $_POST['author_name'];
    $title = $_POST['title'];
    $text = $_POST['text'];

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TaskApp2</title>
    </head>
    <body>
        <h1>入力内容確認</h1>

        <!-- 確認フォーム -->
        <form method="POST" action="index.php">
            名前
            <?php echo $author_name; ?>
            タイトル
            <?php echo $title; ?>
            記事
            <?php echo $text; ?>
            <input type="submit" value="投稿">
            <input type="hidden" name="author_name" value="<?php echo $author_name; ?>">
            <input type="hidden" name="title" value="<?php echo $title; ?>">
            <input type="hidden" name="text" value="<?php echo $text; ?>">
        </form>
        <!-- 確認フォーム -->
    </body>
</html>