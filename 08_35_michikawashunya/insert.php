<?php
    // POSTデータ取得
    $book = filter_input(INPUT_POST, "book");
    $url = filter_input(INPUT_POST, "url");
    $comment = filter_input(INPUT_POST, "comment");

    // DB接続
    include("funcs.php");
    $pdo = db_con();

    // データ登録
    $stmt = $pdo->prepare("INSERT INTO book_table(book,url,comment,indate) VALUES (:book, :url, :comment, sysdate())");
    $stmt->bindValue(':book', $book, PDO::PARAM_STR);
    $stmt->bindValue(':url', $url, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    $status = $stmt->execute();

    // テータ登録後処理
    if($status == false){
        sqlError($stmt);
    } else {
        redirect("index.php");
    }


?>