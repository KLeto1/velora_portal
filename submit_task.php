<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskDetails = $_POST['task_details'];

    if (strlen($taskDetails) > 100) {
        echo "Error: Task details exceed maximum length.";
    } else {
        $escapedDetails = escapeshellarg($taskDetails);
        $output = shell_exec("./task_logger $escapedDetails 2>&1");
        echo "<pre>$output</pre>";
    }
}
?>
<html>
<head>
    <title>Submit Task - Velora Defense</title>
</head>
<body>
    <h1>Submit a Task</h1>
    <form method="POST">
        <textarea name="task_details" rows="5" cols="60"></textarea><br>
        <button type="submit">Submit Task</button>
    </form>
</body>
</html>
