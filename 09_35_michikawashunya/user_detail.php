<?php
    // POSTデータ取得
    $id = filter_input(INPUT_GET, "id");

    // DB接続
    include("funcs.php");
    $pdo = db_con_user();

    // データ登録
    $stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
    <link rel="stylesheet" href="css/select.css">
    <title>ユーザー更新</title>
</head>
<header>
        <h1>ユーザー更新</h1>
    </header>
<body>
    <form method="post" action="user_update.php">
        <table>
            <tr>
                <th>No.</th>
                <th>名前</th>
                <th>ID</th>
                <th>password</th>
                <th>管理</th>
                <th>ステータス</th>
            </tr>
            <tr>
                <td><?php echo $id; ?></td>
                <td><input type="text" name="name" value="<?php echo $row["name"]; ?>"></td>
                <td><input type="text" name="lid" value="<?php echo $row["lid"]; ?>"></td>
                <td><input type="text" name="lpw" value="<?php echo $row["lpw"]; ?>"></td>
                <td><input type="text" name="kanri_flg" value="<?php echo $row["name"]; ?>"></td>
                <td><input type="text" name="life_flg" value="<?php echo $row["life_flg"]; ?>"></td>
            </tr>
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p class=form-submit><input class="submit" type="submit" name="送信"></p>
    </form>
    <div class="user-link">
        <a href="user.php">ユーザー一覧</a>
    </div>
</body>
<footer><small>Gs</small></footer>
</html>