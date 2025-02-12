<?php
require_once "db.php";

$response = ["success" => false, "errors" => []];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit();
}

$fullName = $email = $password = "";
$name_err = $email_err = $password_err = "";

// Validate Full Name
$input_fullName = trim($_POST["fullName"]);
if (empty($input_fullName)) {
    $name_err = "Please enter a name.";
} elseif (!preg_match("/^[a-zA-Z\s]+$/", $input_fullName)) {
    $name_err = "Please enter a valid name.";
} else {
    $fullName = $input_fullName;
}

// Validate Email
$input_email = trim($_POST["email"]);
if (empty($input_email)) {
    $email_err = "Please enter an email.";
} elseif (!filter_var($input_email, FILTER_VALIDATE_EMAIL)) {
    $email_err = "Please enter a valid email.";
} else {
    $email = $input_email;
}

// Validate Password
$input_password = trim($_POST["password"]);
if (empty($input_password)) {
    $password_err = "Please provide a password.";
} else {
    $password = $input_password;
}

if (empty($name_err) && empty($email_err) && empty($password_err)) {
    $sql = "INSERT INTO users (fullName, email, password) VALUES (?, ?, ?)";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sss", $param_fullName, $param_email, $param_password);

        $param_fullName = $fullName;
        $param_email = $email;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        if (mysqli_stmt_execute($stmt)) {
            $response["success"] = true;
        } else {
            $response["errors"][] = "Something went wrong. Please try again later.";
        }

        mysqli_stmt_close($stmt);
    }
} else {
    if (!empty($name_err)) $response["errors"][] = $name_err;
    if (!empty($email_err)) $response["errors"][] = $email_err;
    if (!empty($password_err)) $response["errors"][] = $password_err;
}

mysqli_close($link);
header('Content-Type: application/json');
echo json_encode($response);
?>
