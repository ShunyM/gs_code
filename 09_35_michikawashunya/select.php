<?php
    session_start();
    include("funcs.php");

    sessChk();

    // DB接続
    $pdo = db_con();

    // データ登録SQL作成
    $stmt = $pdo->prepare("SELECT * FROM book_table");
    $status = $stmt->execute();

    // データ表示
    $view="";
    $link="";
    $lgout="";
    if($status == false){
        sqlError($stmt);
    }else{
        if($_SESSION["kanri_flg"]=="1"){
            $view.="<table><tr><th>No.</th><th>書籍名</th><th>書籍URL</th><th>書評</th><th>登録日時</th><th>更新</th><th>削除</th></tr>";
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view.="<tr>";
            $view.="<td>".$res["id"]."</td><td>".$res["book"]."</td><td>".$res["url"]."</td><td>".$res["comment"]."</td><td>".$res["indate"]."</td>";
            $view.='<td><a href="detail.php?id='.$res["id"].'">[ 更新 ]</a></td>';
            $view.='<td><a href="delete.php?id='.$res["id"].'">[ 削除 ]</a></td>';
            $view.="</tr>";
            }
            $view.="<table>";
            
            $link.='<a href="index.php">本を追加</a>';
            $link.='<a href="user.php">ユーザー一覧</a>';

            $lgout.='<a href="logout.php">ログアウト</a>';

        }else if($_SESSION["kanri_flg"]=="2"){
            $view.="<table><tr><th>No.</th><th>書籍名</th><th>書籍URL</th><th>書評</th><th>登録日時</th><th>詳細</th></tr>";
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view.="<tr>";
            $view.="<td>".$res["id"]."</td><td>".$res["book"]."</td><td>".$res["url"]."</td><td>".$res["comment"]."</td><td>".$res["indate"]."</td>";
            $view.='<td><a href="detail2.php?id='.$res["id"].'">[ 詳細 ]</a></td>';
            $view.="</tr>";
            }
            $view.="<table>";

            $link.='<a href="login.php">ログイン画面</a>';

        }else{
            $view.="<table><tr><th>No.</th><th>書籍名</th><th>書籍URL</th><th>書評</th><th>登録日時</th><th>詳細</th></tr>";
            while($res = $stmt->fetch(PDO::FETCH_ASSOC)){
            $view.="<tr>";
            $view.="<td>".$res["id"]."</td><td>".$res["book"]."</td><td>".$res["url"]."</td><td>".$res["comment"]."</td><td>".$res["indate"]."</td>";
            $view.='<td><a href="detail2.php?id='.$res["id"].'">[ 詳細 ]</a></td>';
            $view.="</tr>";
            }
            $view.="<table>";

            $link.='<a href="index.php">本を追加</a>';

            $lgout.='<a href="logout.php">ログアウト</a>';
        }
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/select.css">
    <title>本棚一覧</title>
</head>
<header>
        <h1>本棚一覧</h1>
        <?=$lgout?>
</header>
<body>
    <?=$view?>
    <div class="user-link">
        <?=$link?>
    </div>
</body>
<footer><small>Gs</small></footer>
</html>