<?php
session_start();
require_once 'utils.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<html>
<head>
    <title>Dashboard - Velora Defense</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    </header>
    <nav>
        <ul>
            <li><a href="submit_task.php">Submit Task</a></li>
            <li><a href="view_logs.php">View Logs</a></li>
            <li><a href="admin_tools.php">Admin Tools</a></li>
            <li><a href="api/get_sensitive.php">Sensitive Data API</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
