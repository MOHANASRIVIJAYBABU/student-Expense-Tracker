<?php

session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {

        $_SESSION["logged_in"] = true;
        $_SESSION["email"] = $email;

        header("Location: dashboard.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Student Expense Tracker</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="login-body">

<div class="login-container">

    <div class="login-box">

        <div class="login-icon">₹</div>

        <h1>Welcome Back</h1>

        <p class="login-subtitle">
            Login to manage your expenses
        </p>

        <form method="POST" action="login.php">

            <label>Email Address</label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >

            <button type="submit" class="primary-btn login-btn">
                Login →
            </button>

        </form>

        <a href="index.php" class="back-home">
            ← Back to Home
        </a>

    </div>

</div>

</body>
</html>