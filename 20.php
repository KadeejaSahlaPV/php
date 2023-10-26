<!DOCTYPE html>
<html>
<head>
    <title>Bank Transactions</title>
</head>
<body>
    <h2>Bank Transactions</h2>
    <form action="process_transaction.php" method="post">
        Account Number: <input type="text" name="accno" required><br><br>
        Amount: <input type="text" name="amount" required><br><br>
        Transaction Type:
        <input type="radio" name="transaction_type" value="deposit" required>Deposit
        <input type="radio" name="transaction_type" value="withdraw" required>Withdrawal<br><br>
        <input type="submit" value="Submit">
    </form>
</body>
          </html>
<?php
// Establish a database connection (replace with your database credentials)
$servername = "your_server";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$accno = $_POST['accno'];
$amount = $_POST['amount'];
$transaction_type = $_POST['transaction_type'];

// Retrieve the current balance for the account
$sql = "SELECT balance FROM bank WHERE accno = $accno";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $current_balance = $row['balance'];

    // Update the balance based on the transaction type
    if ($transaction_type === "deposit") {
        $new_balance = $current_balance + $amount;
    } else if ($transaction_type === "withdraw") {
        $new_balance = $current_balance - $amount;
    }

    // Update the balance in the database
    $update_sql = "UPDATE bank SET balance = $new_balance WHERE accno = $accno";
    if ($conn->query($update_sql) === TRUE) {
        echo "Transaction completed successfully. New balance: $new_balance";
    } else {
        echo "Error updating balance: " . $conn->error;
    }
} else {
    echo "Account not found.";
}

$conn->close();
?>
