<?php
require_once "db.php";

$response = ["success" => false, "error" => "Invalid request"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        $sql = "DELETE FROM employees WHERE id = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $_POST["id"]);

            if (mysqli_stmt_execute($stmt)) {
                $response["success"] = true;
            } else {
                $response["error"] = "Database error. Could not delete employee.";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $response["error"] = "No employee ID provided.";
    }
}

mysqli_close($link);
header('Content-Type: application/json');
echo json_encode($response);
?>
