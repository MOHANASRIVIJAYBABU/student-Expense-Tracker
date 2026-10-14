<?php

session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

require_once "config/db.php";

$total_income = 0;
$total_expense = 0;

$result = $conn->query(
    "SELECT type, SUM(amount) AS total
     FROM transactions
     GROUP BY type"
);

if ($result) {

    while ($row = $result->fetch_assoc()) {

        if ($row["type"] == "income") {
            $total_income = $row["total"];
        }

        if ($row["type"] == "expense") {
            $total_expense = $row["total"];
        }
    }
}

$balance = $total_income - $total_expense;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Student Expense Tracker</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav class="navbar">

    <div class="logo">
        Student Expense Tracker
    </div>

    <div class="nav-links">

        <a href="dashboard.php">Dashboard</a>

        <a href="report.php">Report</a>

        <a href="login.php" class="logout">
            Logout
        </a>

    </div>

</nav>


<div class="dashboard-container">

    <div class="welcome-section">

        <div>

            <p class="small-title">
                STUDENT FINANCE
            </p>

            <h1>Dashboard</h1>

            <p>
                Welcome back! Here's your financial overview.
            </p>

        </div>

        <a href="add_transaction.php"
           class="primary-btn">
            + Add Transaction
        </a>

    </div>


    <div class="summary-cards">

        <div class="summary-card income-card">

            <div class="card-icon">₹</div>

            <p>Total Income</p>

            <h2>
                ₹<?php echo number_format($total_income, 2); ?>
            </h2>

        </div>


        <div class="summary-card expense-card">

            <div class="card-icon">−</div>

            <p>Total Expenses</p>

            <h2>
                ₹<?php echo number_format($total_expense, 2); ?>
            </h2>

        </div>


        <div class="summary-card balance-card">

            <div class="card-icon">✓</div>

            <p>Balance</p>

            <h2>
                ₹<?php echo number_format($balance, 2); ?>
            </h2>

        </div>

    </div>


    <div class="quick-actions">

        <h2>Quick Actions</h2>

        <div class="action-grid">

            <a href="add_transaction.php"
               class="action-card">

                <span>＋</span>

                <div>
                    <h3>Add Transaction</h3>
                    <p>Record your income or expense</p>
                </div>

            </a>


            <a href="report.php"
               class="action-card">

                <span>📊</span>

                <div>
                    <h3>View Transactions</h3>
                    <p>View all your transactions</p>
                </div>

            </a>


            <a href="report.php"
               class="action-card">

                <span>📈</span>

                <div>
                    <h3>Monthly Report</h3>
                    <p>Analyze your spending</p>
                </div>

            </a>

        </div>

    </div>

</div>

<script src="js/dashboard.js"></script>

</body>
</html>