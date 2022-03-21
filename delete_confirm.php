<?php
    //取得
    require 'mainte/db_connection.php';

    if(!empty($_GET['id'])){
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = :id"); //SQL作成
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT); //idセット
        $stmt->execute(); //実行
        $blog_data = $stmt->fetch();
        // 取得失敗時
        if (empty($blog_data)){
            header("Location: index.php");
            exit();
        }
    }
    //取得

    //値セット
    $id = $blog_data['id'];
    $author_name = $blog_data['author_name'];
    $title = $blog_data['title'];
    $text = $blog_data['text'];
    //値セット
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
        <h1>本当に削除しますか？</h1>
        <form method="POST" action="delete.php?id=<?php echo $id ?>">
            <input type="hidden" name="id" value="<?php if (!empty($id)) {
                echo $id;
            } ?>">
            <input type="hidden" name="author_name" value="<?php if (!empty($author_name)) {
                echo $author_name;
            } ?>">
            <input type="hidden" name="title" value="<?php if (!empty($title)) {
                echo $title;
            } ?>">
            <input type="hidden" name="text" value="<?php if (!empty($text)) {
                echo $text;
            } ?>">
            <input type="submit" value="削除">
        </form>
    </body>
</html>