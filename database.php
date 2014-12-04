<?php
    include('config.php');

    try
    {
        $pdo = new PDO("mysql:host=$server;dbname=$database", "$db_user", "$db_pass");
        //Đoạn này để kết quả trong mysql hiển thị được tiếng việt
        $pdo -> exec("SET CHARACTER SET utf8");
        $pdo -> exec("set character_set_client='utf8'");
        $pdo ->exec("set character_set_results='utf8'");
        $pdo -> exec("set collation_connection='utf8_general_ci'");
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        //Hết đoạn
    }
    catch (PDOException $e)
    {
        echo "Faile to get DB handle: " .$e -> getMessage()."\n";
        exit;
    }
?>