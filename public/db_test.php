<?php

require_once __DIR__ . "/config/db.php";

echo "<h2>Database Test</h2>";

echo "<p>Database connection successful.</p>";

$tables = $pdo->query("
    SELECT name
    FROM sqlite_master
    WHERE type = 'table'
    ORDER BY name
")->fetchAll(PDO::FETCH_COLUMN);

echo "<h3>Tables</h3>";

echo "<ul>";

foreach ($tables as $table) {

    echo "<li>" .
         htmlspecialchars($table) .
         "</li>";
}

echo "</ul>";

?>