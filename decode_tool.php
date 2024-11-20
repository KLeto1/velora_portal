<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['data'];
    $decoded = base64_decode($input);

    if ($decoded) {
        echo "Decoded Data: " . htmlspecialchars($decoded);
    } else {
        echo "Invalid input. Unable to decode.";
    }
}
?>
<html>
<head>
    <title>Decode Tool - Velora Defense</title>
</head>
<body>
    <h1>Decode Tool</h1>
    <form method="POST">
        <textarea name="data" rows="5" cols="50"></textarea><br>
        <button type="submit">Decode</button>
    </form>
</body>
</html>
