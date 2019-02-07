<?php
    // POSTデータ取得
    $id = filter_input(INPUT_GET, "id");

    // DB接続
    include("funcs.php");
    $pdo = db_con();

    // データ登録
    $sql = "DELETE FROM book_table WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    // テータ登録後処理
    if($status == false){
        sqlError($stmt);
    } else {
        redirect("select.php");
    }


?>