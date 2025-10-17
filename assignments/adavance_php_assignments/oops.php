<?php

echo "Question: Create a simple class in PHP that demonstrates encapsulation by using private and public
properties and methods.". "<br><br>";



class BankAccount {
    // Private property (cannot be accessed directly from outside the class)
    private $balance;

    // Public property (can be accessed directly)
    public $accountHolder;

    // Constructor to initialize values
    public function __construct($accountHolder, $initialBalance) {
        $this->accountHolder = $accountHolder;
        $this->balance = $initialBalance;
    }

    // Public method to deposit money
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
        }
    }

    // Public method to withdraw money
    public function withdraw($amount) {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }

    // Public method to get current balance (safe access to private property)
    public function getBalance() {
        return $this->balance;
    }
}

// Initialize account (in real apps, this would be stored in a session or database)
$account = new BankAccount("Prince", 1000);

// Process form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['deposit'])) {
        $depositAmount = floatval($_POST['deposit_amount']);
        $account->deposit($depositAmount);
    }

    if (isset($_POST['withdraw'])) {
        $withdrawAmount = floatval($_POST['withdraw_amount']);
        $account->withdraw($withdrawAmount);
    }
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html>
<head>
    <title>Bank Account</title>
</head>
<body>
    <h2>Welcome Account Holder Name, <?php echo $account->accountHolder; ?>!</h2>
    <p><strong>Current Balance:</strong> $<?php echo $account->getBalance(); ?></p>

    <form method="post">
        <h3>Deposit Money</h3>
        <input type="number" name="deposit_amount" step="0.01" required>
        <button type="submit" name="deposit">Deposit</button>
    </form>

    <form method="post">
        <h3>Withdraw Money</h3>
        <input type="number" name="withdraw_amount" step="0.01" required>
        <button type="submit" name="withdraw">Withdraw</button>
    </form>
</body>
</html>

