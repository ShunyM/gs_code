<?php

    $fp = fopen("./data/data.txt", "r");

    if($fp){
        // テキスト内の各行を配列に入れる
        $data_num =[];
        while($line = fgets($fp)){
            array_push($data_num, $line);
        }

        // 各行をカンマ区切りでさらに配列に入れる
        $str_data =[];
        for($i=0; $i<count($data_num); $i++){
            $str = explode(",", $data_num[$i]);
            array_push($str_data, $str);
        }
    // ファイルが正しく開けなかったとき
    } else {
        echo "集計結果はありません"; 
    }

    // echo $str_data[0][3];
    // var_dump($str_data);
    // var_dump($data_num);
    fclose($fp);

    function h($value){
        return htmlspecialchars($value,ENT_QUOTES);
    }

    // 評価の★をカウントする
    $count1 = 0;
    $count2 = 0;
    $count3 = 0;
    $count4 = 0;
    $count5 = 0;

    for($i=0; $i<count($str_data);$i++){
        if($str_data[$i][3] === "★☆☆☆☆"){
            $count1++;
        } else if($str_data[$i][3] === "★★☆☆☆"){
            $count2++;
        } else if($str_data[$i][3] === "★★★☆☆"){
            $count3++;
        } else if($str_data[$i][3] === "★★★★☆"){
            $count4++;
        } else if($str_data[$i][3] === "★★★★★"){
            $count5++;
        } 
    }

    $count_all = $count1 + $count2 + $count3 + $count4 + $count5;

    if($count_all !== 0){
    $count_ave = (1*$count1 + 2*$count2 + 3*$count3 + 4*$count4 + 5*$count5) / $count_all;
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>集計結果</title>
    <link rel="stylesheet" href="css/style-read.css">
</head>
<body>
    <h1>アンケート集計結果</h1>
    <?php
        if(count($str_data)>0){
            echo '<p class="average">お店の評価（平均'.round($count_ave,2).'点）</p><div id="chart_div"></div>';
        }
    ?>
    <div class="wrapper">

        <?php
            // 個人情報以外の情報のみテキストから抽出して表を作成
            if(count($str_data)>0){
                echo "<table><tr><th>No.</th><th>性別</th><th>評価</th><th>感想</th></tr>";
                for($i =0; $i<count($str_data); $i++){
                    echo "<tr>";
                    echo "<td>" .($i+1). "</td>";
                    for($k = 2; $k<5; $k++){
                        echo "<td>" .h($str_data[$i][$k]). "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            // ファイルが空だった場合
            }else {
                echo '<p class="noflex">集計結果はありません</p>';
            }
        ?>


    </div>
    <li class="page"><a href="index.php">アンケートへ戻る</a></li>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        const star1 = <?=$count1 ?>;
        const star2 = <?=$count2 ?>;
        const star3 = <?=$count3 ?>;
        const star4 = <?=$count4 ?>;
        const star5 = <?=$count5 ?>; 
    </script>
    <script src="js/main.js"></script>
</body>
</html>