<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$response = ["success" => false, "message" => ""];

$headers = getallheaders();
if (!isset($headers['Authorization'])) {
    $response["message"] = "Token missing.";
    echo json_encode($response);
    exit();
}

$jwt = str_replace("Bearer ", "", $headers['Authorization']);

try {
    $decoded = JWT::decode($jwt, new Key($_ENV['SECRET_KEY'], 'HS256'));
    $response["success"] = true;
    $response["message"] = "Token is valid.";
    $response["data"] = (array) $decoded->data;
} catch (Exception $e) {
    $response["message"] = "Invalid token: " . $e->getMessage();
}

echo json_encode($response);
?>
