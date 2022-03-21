<!-- 情報取得 -->
<?php

    require 'mainte/db_connection.php';

    if (!empty($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = :id"); //SQL作成
        $stmt->bindValue( ':id', $_GET['id'], PDO::PARAM_INT); //idセット
        $stmt->execute(); //実行
        $blog_data = $stmt->fetch();
        // データが取得できないときは戻る
        if( empty($blog_data) ) {
            header("Location: index.php");
            exit;
        }
    }

    $id = $blog_data['id'];
    $author_name = $blog_data['author_name'];
    $title = $blog_data['title'];
    $text = $blog_data['text'];
?>
<!-- 情報取得 -->

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TaskApp2</title>
    </head>
    <body>
        <h1>編集</h1>

        <!-- 編集フォーム -->
        <form method="POST" action="update.php?id=<?php echo $id; ?>">
            <label>名前<input type="text" name="author_name" value="<?php if (!empty($author_name)) {
                 echo $author_name;
            } ?>"></label>
            <label>タイトル<input type="text" name="title" value="<?php if (!empty($title)) {
                echo $title;
            } ?>"></label>
            <label>記事<textarea name="text"cols="30" rows="10"><?php if (!empty($text)) {
                echo $text;} ?>
            </textarea></label>
            <!-- id渡す -->
            <input type="hidden" name="id" value="<?php if (!empty($id)) {
                echo $id;
                } ?>">
            <!-- id渡す -->
            <input type="submit" value="更新">
        </form>
        <!-- 編集フォーム -->
        
    </body>
</html>