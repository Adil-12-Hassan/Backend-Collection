<?php
header("Content-Type: application/json; charset=UTF-8");
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
// Route all user requests through the users API
if ($path === "/api/users") {
    require_once __DIR__ . "/routes/users.php";
    exit;
}
http_response_code(404);
echo json_encode([
    "message" => "Route not found"
]);
