<?php
    $servername="localhost";
    $username = "goldengym";
    $dbname = "my_goldengym";
    $password = null;
    $error = false;

    try {
        $conn = new PDO("mysql:host=".$servername.";dbname=".$dbname,
        $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "DB error: ".$e->getMessage();
        $error = true;
    }
?>