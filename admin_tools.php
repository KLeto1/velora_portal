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
    <title>Admin Tools - Velora Defense</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Admin Tools</h1>
    </header>
    <section>
        <p>The Admin Tools module is currently under maintenance. Check back later!</p>
    </section>
    <footer>
        <p>&copy; 2024 Velora Defense Operations.</p>
    </footer>
</body>
</html>
