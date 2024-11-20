<?php
require_once 'utils.php';
$conn = connectToDatabase();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = sanitizeInput($conn, $_POST['search']);

    // Vulnerable SQL query
    $query = "SELECT * FROM troop_plans WHERE description LIKE '%$search%' OR location LIKE '%$search%'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><b>Location:</b> " . htmlspecialchars($row['location']) . "</p>";
            echo "<p><b>Description:</b> " . htmlspecialchars($row['description']) . "</p>";
        }
    } else {
        echo "<p>No troop movements found.</p>";
    }

    if (strpos($search, 'debug') !== false) {
        echo "<p>Hint: Some data is stored in hidden tables.</p>";
    }
}
?>
<html>
<body>
    <h1>Search Troop Movements</h1>
    <form method="POST">
        Search: <input type="text" name="search"><br>
        <button type="submit">Search</button>
    </form>
</body>
</html>
