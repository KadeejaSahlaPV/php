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
