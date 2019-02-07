<?php
session_start();

include("funcs.php");
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$pdo = db_con_user();

$sql = "SELECT * FROM gs_user_table WHERE lid=:lid";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid);
$res = $stmt->execute();

if( password_verify($lpw, $val["lpw"])){
    $_SESSION["chk_ssid"] = session_id();
    $_SESSION["kanri_flg"] = $val['kanri_flg'];
    $_SESSION["name"] = $val['name'];
    header("LOCATION: select.php");
}else{
    header("LOCATION: login.php");
}

if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError".$error[2]);
}

//4. 抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  header("LOCATION: select.php");
}else{
  //logout処理を経由して全画面へ
  header("LOCATION: login.php");
}

exit();
?>