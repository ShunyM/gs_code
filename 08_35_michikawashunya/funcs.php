<?php
    function h ($a){
        return htmlspecialchars($a, ENT_QUOTES);
    }

    function db_con(){
        try{
            $pdo = new PDO('mysql:dbname=book;charset=utf8;host=localhost', 'root', '');
            return $pdo;
        } catch(PDOException $e){
            exit('DB-Connection-Error:'.$e->getMessege());
        }
    }

    function db_con_user(){
        try{
            $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
            return $pdo;
        } catch(PDOException $e){
            exit('DB-Connection-Error:'.$e->getMessege());
        }
    }

    function sqlError ($stmt){
        $error = $stmt->errorInfo();
        exit("ErrorSQL".$error[2]);
    }

    function redirect($page){
        header("LOCATION: ".$page);
        exit;
    }

?>