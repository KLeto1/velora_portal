<?php
session_start();
require_once 'utils.php';
$conn = connectToDatabase();

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitizeInput($conn, $_POST['username']);
    $password = sanitizeInput($conn, $_POST['password']);

    if (authenticateUser($conn, $username, $password)) {
        $_SESSION['username'] = $username;
        logEvent($username, "User logged in");
        header("Location: dashboard.php");
        exit();
    } else {
        logEvent($username, "Failed login attempt");
        $loginError = "Invalid credentials.";
    }
}
?>
<html>
<head>
    <title>Login - Velora Defense</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Login to Velora Defense Portal</h1>
    </header>
    <section>
        <div class="login-form">
            <h2>Sign In</h2>
            <form method="POST">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" required><br><br>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br><br>
                <button type="submit">Login</button>
            </form>
            <?php if ($loginError) echo "<p style='color:red;'>$loginError</p>"; ?>
        </div>
    </section>
    <footer>
        <p>&copy; 2024 Velora Defense Operations. Unauthorized access is prohibited.</p>
    </footer>
</body>
</html>
