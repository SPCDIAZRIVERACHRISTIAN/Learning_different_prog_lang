<?php
require_once "db.php";

$response = ["success" => false, "error" => "Invalid request"];

if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    $sql = "SELECT * FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["id"]);

        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) {
                $response = mysqli_fetch_assoc($result);
                $response["success"] = true;
            } else {
                $response["error"] = "Employee not found";
            }
        } else {
            $response["error"] = "Database query failed";
        }
        mysqli_stmt_close($stmt);
    }
} else {
    $response["error"] = "No employee ID provided";
}

mysqli_close($link);

header('Content-Type: application/json');
echo json_encode($response);
?>
