<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report = $_POST['report'];

    if (strlen($report) > 120) {
        echo "Report exceeds allowed length.";
    } else {
        $escaped_report = escapeshellarg($report);
        $output = shell_exec("./buffer_overflow $escaped_report 2>&1");
        echo "<pre>$output</pre>";
    }
}
?>
<html>
<head>
    <title>Submit Intelligence</title>
</head>
<body>
    <h1>Submit Intelligence</h1>
    <p>Enter your intelligence report below. Ensure it complies with reporting standards.</p>
    <form method="POST">
        <textarea name="report" rows="4" cols="50"></textarea><br>
        <button type="submit">Submit Report</button>
    </form>
</body>
</html>
