<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
<link rel="stylesheet" href="css/style-write.css">
</head>
<body>
    <?php
    if($_POST["name"] !== null){
// POSTされた内容を変数に格納
    $name = $_POST["name"];
    $email = $_POST["email"];

    // 男性、女性以外の入力がされた場合に表示
    $gender = $_POST["gender"];
    if($gender === "man"){
        $gender = "男性";
    } else if ($gender === "woman"){
        $gender = "女性";
    } else {
        $gender = "不正な値"; /*valueを操作されえたら*/
    }

    // 数字（＝星の数）、を星で表示する
    $tmp_star = $_POST["star"];
    $star = "";

    if(1<=$tmp_star && 5>=$tmp_star){
        for($i=0; $i < $tmp_star; $i++){
            $star .= "★";
        }

        for(; $i<5; $i++){
            $star .= "☆";
        }
    } else {
        $star = "不正な値"; /*valueを操作されえたら*/
    }


    $thought = $_POST["thought"];

    // アンケート回答していない場合リダイレクトする
    } else {
        header('Location: index.php');
        exit();
    }

    // 書き込む
    $file = fopen("./data/data.txt", "a");
    // カンマ区切りで書き込む
    fwrite($file, $name. "," .$email. "," .$gender. "," .$star. "," .$thought. "\n");
    fclose($file);


    function h($value){
        return htmlspecialchars($value,ENT_QUOTES);
    }
    ?>
    
    <div class="wrapper">
        <p>回答ありがとうございました！</p>
        <div class="answer">
            <p><span>名前：</span><?= h($name)?></p>
            <p><span>メールアドレス：</span><?= h($email)?></p>
            <p><span>性別：</span><?= h($gender)?></p>
            <p><span>評価：</span><?= h($star)?></p>
            <p><span>感想：</span><?= h($thought)?></p>
            </div>


        <ul>
            <li><a href="read.php">全体集計データを表示</a></li>
            <li><a href="index.php">アンケートへ戻る</a></li>
        </ul>
    </div>
</body>
</html>