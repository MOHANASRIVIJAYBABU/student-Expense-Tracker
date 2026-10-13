<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?= htmlspecialchars($pageTitle ?? "Transaction Manager") ?>
    </title>

    <link
        rel="stylesheet"
        href="css/style.css"
    >

</head>

<body>

<header class="topbar">

    <div class="brand">
        Transaction Manager
    </div>

    <nav>

        <?php if (isset($_SESSION["user_id"])): ?>

            <a href="dashboard.php">
                Dashboard
            </a>

            <a href="add_transaction.php">
                Add Transaction
            </a>

            <a href="report.php">
                Report
            </a>

            <a href="logout.php">
                Logout
            </a>

        <?php else: ?>

            <a href="login.php">
                Login
            </a>

            <a href="register.php">
                Register
            </a>

        <?php endif; ?>

    </nav>

</header>

<main class="container">