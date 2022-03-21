<?php
    require 'mainte/db_connection.php';

    if (!empty($_POST['id'])) {
        try {
            $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = :id"); //SQL作成
            $stmt->bindValue( ':id', $_POST['id'], PDO::PARAM_INT); //IDセット
            $stmt->execute(); //実行
            echo "削除しました。";
        } catch (Exception $e) {
            echo 'エラーが発生しました。:' . $e->getMessage();
        } 
        if(empty($_POST['id']) ) {
            header("Location: index.php");
            exit;
        }
    }
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
        <h1>削除完了</h1>
        <a href="index.php">一覧画面へ</a>
    </body>
</html>