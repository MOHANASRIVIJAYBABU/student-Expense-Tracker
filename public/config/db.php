<?php

$host = "db01.dbhost.dev";
$port = 5051;
$dbname = "db_453eknehn";
$username = "user_453eknehn";
$password = "p453eknehn";

try {

    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Database connection failed: " . $e->getMessage());

}

?>