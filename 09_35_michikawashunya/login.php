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
        <h1>本棚ログイン</h1>
    </header>

    <main>
        <form method="post" action="login_act.php">
            <p><input type="text" name="lid" placeholder="IDを入力ください" required></p>
            <p><input type="password" name="lpw" placeholder="PASSWORDを入力ください" required></p>
            <p class=form-submit><input class="submit" type="submit" name="送信"></p>
        </form>
    </main>
    <footer><small>Gs</small></footer>

</body>
</html>