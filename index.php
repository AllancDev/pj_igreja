<?php

    require_once "./vendor/nexti/php-classes/src/db/Conn.php";

    $Conn = new Conn();

    
    $results = $Conn -> select("SELECT * FROM tb_user");
    echo json_encode($results);
    // echo "<br />";
    // echo md5("123456");
?>