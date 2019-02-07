<?php
session_start();
    include("funcs.php");

    sessChk1();

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
    <form method="post" action="user_insert.php">
        <table>
            <tr>
                <th>名前</th>
                <th>ID</th>
                <th>password</th>
                <th>管理</th>
                <th>ステータス</th>
            </tr>
            <tr>
                <td><input type="text" name="name"></td>
                <td><input type="text" name="lid"></td>
                <td><input type="text" name="lpw"></td>
                <td><input type="text" name="kanri_flg"></td>
                <td><input type="text" name="life_flg"></td>
            </tr>
        </table>
        <p class=form-submit><input class="submit" type="submit" name="送信"></p>
    </form>
    <div class="user-link">
        <a href="user.php">ユーザー一覧</a>
    </div>
</body>
<footer><small>Gs</small></footer>
</html>