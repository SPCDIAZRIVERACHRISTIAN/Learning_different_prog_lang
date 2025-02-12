<?php
require_once "db.php";
require_once __DIR__ . '/vendor/autoload.php';

use \Firebase\JWT\JWT;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$response = ["success" => false, "message" => ""];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $response["message"] = "Please provide both email and password.";
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($password, $row["password"])) {
                        $key = $_ENV['SECRET_KEY'];
                        $payload = [
                            "exp" => time() + (60 * 60),
                            "data" => [
                                "id" => $row["id"],
                                "email" => $row["email"]
                            ]
                        ];

                        $jwt = JWT::encode($payload, $key, 'HS256');
                        $response["success"] = true;
                        $response["token"] = $jwt;
                    } else {
                        $response["message"] = "Invalid password.";
                    }
                } else {
                    $response["message"] = "No account found with that email.";
                }
            } else {
                $response["message"] = "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($link);
    echo json_encode($response);
}
?>
