<?php
// POSTデータ取得
    $id = filter_input(INPUT_GET, "id");

    // DB接続
    include("funcs.php");
    $pdo = db_con();

    // データ登録
    $stmt = $pdo->prepare("SELECT * FROM book_table WHERE id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    // テータ登録後処理
    if($status == false){
        sqlError($stmt);
    } else {
            $row = $stmt->fetch();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>更新</title>
</head>
<body>
    <header>
        <h1>詳細</h1>
    </header>

    <main>
            <dl>
            <dt>書名</dt>
            <dd><?php echo $row["book"]; ?></dd>
            <dt>URL</dt>
            <dd><?php echo $row["url"]; ?></dd>
            <dt>コメント</dt>
            <dd><?php echo $row["comment"]; ?></dd>
            </dl>

    </main>
    <div class="user-link">
        <a href="select.php">本棚一覧</a>
    </div>
    <footer><small>Gs</small></footer>

</body>
</html>