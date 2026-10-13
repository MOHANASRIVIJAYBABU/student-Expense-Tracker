<?php

echo "<h2>PHP Test</h2>";

echo "<p>PHP is working correctly.</p>";

echo "<p>PHP Version: " .
     htmlspecialchars(PHP_VERSION) .
     "</p>";

echo "<p>PDO SQLite: " .
     (extension_loaded("pdo_sqlite")
        ? "Enabled"
        : "Not Enabled") .
     "</p>";

?>