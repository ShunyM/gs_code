<html>
<head>
<meta charset="utf-8">
<title>お店の評価</title>
<link rel="stylesheet" href="css/style-index.css">
</head>
<body>
<div class="header">
    <h1>アンケート</h1>
    <p>ご来店いただきありがとうございました。<br>アンケートへのご協力をお願いします。</p>
</div>
<form class="form" method="post" action="write.php">
    <dl>
        <dt>お名前</dt>
        <dd><input type="text" name="name" required></dd>

        <dt>メールアドレス</dt>
        <dd><input type="email" name="email" required></dd>
        
        <dt>性別</dt>
        <dd>
            <input type="radio" name="gender" value="man" checked>男性
            <input type="radio" name="gender" value="woman">女性
        </dd>

        <dt>評価</dt>
        <dd>
            <select name="star">
                <option value="1">★☆☆☆☆</option>
                <option value="2">★★☆☆☆</option>
                <option value="3">★★★☆☆</option>
                <option value="4">★★★★☆</option>
                <option value="5">★★★★★</option>
            </select>
        </dd>
        
        <dt>感想</dt>
        <dd><textarea name="thought" id="" cols="30" rows="10"></textarea></dd>
    </dl>

    <input type="submit" value="送信" class="submit">
</form>
</body>
</html>