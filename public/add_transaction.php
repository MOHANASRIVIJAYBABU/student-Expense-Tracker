<?php

session_start();

if (!isset($_SESSION["logged_in"])) {
    header("Location: login.php");
    exit;
}

require_once "config/db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $type        = $_POST["type"];
    $description = $_POST["description"];
    $category    = $_POST["category"];
    $amount      = $_POST["amount"];
    $date        = $_POST["transaction_date"];

    $sql = "INSERT INTO transactions
            (type, category, amount, description, transaction_date)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$type, $category, $amount, $description, $date])) {
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "Transaction could not be added.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Transaction</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar">
        <div class="logo">
            Student Expense Tracker
        </div>

        <div class="nav-links">
            <a href="dashboard.php">Dashboard</a>
            <a href="add_transaction.php">Add Transaction</a>
            <a href="report.php">Report</a>
            <a href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="form-container">

        <div class="form-box">

            <p class="small-title">FINANCE MANAGEMENT</p>

            <h1>Add Transaction</h1>

            <p class="form-description">
                Add your income or expense details below.
            </p>

            <?php if (!empty($message)) { ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php } ?>

            <form method="POST">

                <label>Type</label>
                <select name="type" required>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>

                <label>Category</label>
                <input type="text" name="category" placeholder="Food, Travel, Salary..." required>

                <label>Amount</label>
                <input type="number" step="0.01" name="amount" placeholder="Enter amount" required>

                <label>Description</label>
                <input type="text" name="description" placeholder="Short description">

                <label>Date</label>
                <input type="date" name="transaction_date" required>

                <button type="submit">Add Transaction</button>

            </form>

        </div>

    </div>

</body>

</html>