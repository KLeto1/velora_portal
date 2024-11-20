<?php
function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "velora_portal";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function sanitizeInput($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars($input));
}

function logEvent($user, $event) {
    $logFile = "logs/activity.log";
    $entry = "[" . date("Y-m-d H:i:s") . "] User: $user - Event: $event\n";
    file_put_contents($logFile, $entry, FILE_APPEND);
}

function authenticateUser($conn, $username, $password) {
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    return $result->num_rows > 0;
}
?>
