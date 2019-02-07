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
    <link rel="stylesheet" href="css/index.css">
    <title>本棚</title>
</head>
<body>
    <header>
        <h1>本棚</h1>
        <a href="logout.php">ログアウト</a>
    </header>

    <main>
        <form method="post" action="insert.php">
            <p><input type="text" name="book" placeholder="書籍名を入力ください" required></p>
            <p><input type="text" name="url" placeholder="書籍URLを入力ください" required></p>
            <p><textarea name="comment" cols="30" rows="10" placeholder="感想を入力ください"></textarea></p>
            <p class=form-submit><input class="submit" type="submit" name="送信"></p>
        </form>
    </main>

    <div class="user-link">
        <a href="select.php">本棚一覧</a>
    </div>
    <footer><small>Gs</small></footer>

</body>
</html>