<?php
    // DB接続
    include("funcs.php");
    $pdo = db_con_user();

    // データ登録SQL作成
    $stmt = $pdo->prepare("SELECT * FROM gs_user_table");
    $status = $stmt->execute();

    // データ表示
    $view="";
    if($status == false){
        sqlError($stmt);
    }else{
        $view.="<table><tr><th>No.</th><th>名前</th><th>ID</th><th>password</th><th>管理</th><th>ステータス</th><th>更新</th><th>削除</th></tr>";
        while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
        $view.="<tr>";
        $view.="<td>".$res["id"]."</td><td>".$res["name"]."</td><td>".$res["lid"]."</td><td>".$res["lpw"]."</td><td>".$res["kanri_flg"]."</td><td>".$res["life_flg"]."</td>";
        $view.='<td><a href="user_detail.php?id='.$res["id"].'">[ 更新 ]</a></td>';
        $view.='<td><a href="user_delete.php?id='.$res["id"].'">[ 削除 ]</a></td>';
        $view.="</tr>";
        }
        $view.="<table>";
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/select.css">
    <title>ユーザー一覧</title>
</head>
<header>
        <h1>ユーザー一覧</h1>
    </header>
<body>
    <?=$view?>
    <div class="user-link">
        <a href="select.php">本棚一覧</a>
    </div>
</body>
<footer><small>Gs</small></footer>
</html>