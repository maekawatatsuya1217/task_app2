<?php
    // 取得
    require 'mainte/db_connection.php';
    
    if(!empty($_GET['id'])){
        $sql = $pdo->prepare("SELECT * FROM blogs WHERE id = :id"); //SQL作成
        $sql->bindValue(':id', $_GET['id'], PDO::PARAM_INT); //idセット
        $sql->execute(); //実行
        $blog_data = $sql->fetch(); //変数に代入
        if(empty($blog_data)){
            header("Location: index.php");
            exit;
        }
    }
    // 取得

    $id = $blog_data['id'];
    $author_name = $blog_data['author_name'];
    $title = $blog_data['title'];
    $text = $blog_data['text'];
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
        <h1>詳細ページ</h1>
        <div class="content">
            <h3><?php echo $title; ?></h3>
            <p>筆者　<?php echo $author_name; ?></p>
            <p>本文 <?php echo $text; ?></p>
            <a href="edit.php?id=<?php echo $id; ?>">編集</a>
            <a href="delete_confirm.php?id=<?php echo $id; ?>">削除</a>
        </div>
        <a href="index.php">一覧画面へ</a>
    </body>
</html>