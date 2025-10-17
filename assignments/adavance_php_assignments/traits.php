<?php

echo "Questions: Create two traits and use them in a class to demonstrate
how to include multiple behaviors". "<br><br>";

?>

<?php
// First trait: Logging behavior
trait Logger {
    public function log($message) {
        echo "[LOG]: $message<br>";
    }
}

// Second trait: Notification behavior
trait Notifier {
    public function notify($user, $message) {
        echo "Sending notification to $user: $message<br>";
    }
}

// Class using both traits
class UserActivity {
    use Logger, Notifier;

    public function performAction($user, $action) {
        $this->log("User '$user' performed action: $action");
        $this->notify($user, "Your action '$action' has been recorded.");
    }
}

// Create object
$activity = new UserActivity();
$activity->performAction("Alice", "Login");
?>
