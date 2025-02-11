<?php
require_once "db.php";

$response = ["success" => false, "errors" => []];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $address = $salary = "";
    $name_err = $address_err = $salary_err = "";

    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_name)) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Validate address
    $input_address = trim($_POST["address"]);
    if (empty($input_address)) {
        $address_err = "Please enter an address.";
    } else {
        $address = $input_address;
    }

    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if (empty($input_salary)) {
        $salary_err = "Please enter the salary amount.";
    } elseif (!ctype_digit($input_salary)) {
        $salary_err = "Please enter a positive integer value.";
    } else {
        $salary = $input_salary;
    }

    // Check for errors
    if (empty($name_err) && empty($address_err) && empty($salary_err)) {
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $name, $address, $salary);
            if (mysqli_stmt_execute($stmt)) {
                $response["success"] = true;
            } else {
                $response["errors"][] = "Database error. Please try again.";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        if (!empty($name_err)) $response["errors"]["name"] = $name_err;
        if (!empty($address_err)) $response["errors"]["address"] = $address_err;
        if (!empty($salary_err)) $response["errors"]["salary"] = $salary_err;
    }
}

mysqli_close($link);
header('Content-Type: application/json');
echo json_encode($response);
?>
