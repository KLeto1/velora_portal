<?php
session_start();
require_once 'utils.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Display activity logs
$logFile = "logs/activity.log";
if (file_exists($logFile)) {
    $logs = file_get_contents($logFile);
} else {
    $logs = "No logs found.";
}
?>
<html>
<head>
    <title>Activity Logs - Velora Defense</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Activity Logs</h1>
    </header>
    <section>
        <pre><?php echo htmlspecialchars($logs); ?></pre>
    </section>
    <footer>
        <p>&copy; 2024 Velora Defense Operations.</p>
    </footer>
</body>
</html>
