<?php
    session_start();
    include("funcs.php");

    sessChk();

    // POSTデータ取得
    $id = filter_input(INPUT_GET, "id");

    // DB接続
    $pdo = db_con();

    // データ登録
    $stmt = $pdo->prepare("SELECT * FROM book_table WHERE id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    // テータ登録後処理
    if($status == false){
        sqlError($stmt);
    } else {
        if($_SESSION["kanri_flg"]=="1"){
            $row = $stmt->fetch();
        } else {
            $row = $stmt->fetch();
            $location = 'detail2.php?id='.$row["id"];
            header("LOCATION: ".$location);
        }
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
        <h1>更新</h1>
    </header>

    <main>
        <form method="post" action="update.php">
            <p><input type="text" name="book" value="<?php echo $row["book"]; ?>" required></p>
            <p><input type="text" name="url" value="<?php echo $row["url"]; ?>" required></p>
            <p><textarea name="comment" cols="30" rows="10" ><?php echo $row["comment"]; ?></textarea></p>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <p class=form-submit><input class="submit" type="submit" name="送信"></p>
        </form>
    </main>
    <div class="user-link">
        <a href="select.php">本棚一覧</a>
    </div>
    <footer><small>Gs</small></footer>

</body>
</html>