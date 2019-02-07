<?php
    // POSTデータ取得
    $name = filter_input(INPUT_POST, "name");
    $lid = filter_input(INPUT_POST, "lid");
    $lpw_temp = filter_input(INPUT_POST, "lpw");
    $lpw = password_hash($lpw_temp, PASSWORD_DEFAULT);
    $kanri_flg = filter_input(INPUT_POST, "kanri_flg");
    $life_flg = filter_input(INPUT_POST, "life_flg");

    // DB接続
    include("funcs.php");
    $pdo = db_con_user();

    // データ登録
    $stmt = $pdo->prepare("INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg) VALUES (:name, :lid, :lpw, :kanri_flg, :life_flg)");
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
    $stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
    $stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
    $status = $stmt->execute();

    // テータ登録後処理
    if($status == false){
        sqlError($stmt);
    } else {
        redirect("user.php");
    }


?>