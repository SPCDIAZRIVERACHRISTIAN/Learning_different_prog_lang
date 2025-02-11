<?php
require_once "db.php";

// Handle GET request to fetch employee data
$sql = "SELECT * FROM employees";
$result = mysqli_query($link, $sql);
$employees = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $employees[] = $row;
    }
    mysqli_free_result($result);
}

mysqli_close($link);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($employees);
?>
