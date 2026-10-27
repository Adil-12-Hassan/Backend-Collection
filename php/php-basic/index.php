<?php

header("Content-Type: application/json");

$requestMethod = $_SERVER["REQUEST_METHOD"];
$requestUri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

require_once "users.php";

// Get request body
$input = json_decode(file_get_contents("php://input"), true);

// Get all users
$users = getUsers();

// Helper function for JSON responses
function response($statusCode, $message, $data = null)
{
    http_response_code($statusCode);

    $response = [
        "message" => $message
    ];

    if ($data !== null) {
        $response["data"] = $data;
    }

    echo json_encode($response, JSON_PRETTY_PRINT);
}

// GET /
if ($requestUri === "/" && $requestMethod === "GET") {

    response(200, "PHP Basic API is running.");

    // GET /api/users
} elseif ($requestUri === "/api/users" && $requestMethod === "GET") {

    response(200, "Users retrieved successfully.", $users);

    // GET /api/users/{id}
} elseif (
    preg_match("/^\/api\/users\/(\d+)$/", $requestUri, $matches)
    && $requestMethod === "GET"
) {

    $id = (int) $matches[1];

    $user = null;

    foreach ($users as $item) {
        if ($item["id"] === $id) {
            $user = $item;
            break;
        }
    }

    if ($user) {
        response(200, "User retrieved successfully.", $user);
    } else {
        response(404, "User not found.");
    }

    // POST /api/users
} elseif ($requestUri === "/api/users" && $requestMethod === "POST") {

    if (!is_array($input)) {
        response(400, "Invalid JSON request body.");
        exit;
    }

    $name = trim($input["name"] ?? "");
    $email = trim($input["email"] ?? "");
    $age = $input["age"] ?? null;

    if ($name === "" || $email === "" || $age === null) {
        response(400, "Name, email, and age are required.");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        response(400, "Invalid email address.");
        exit;
    }

    if (!is_numeric($age) || (int) $age <= 0) {
        response(400, "Age must be a positive number.");
        exit;
    }

    // Check duplicate email
    foreach ($users as $item) {
        if (strtolower($item["email"]) === strtolower($email)) {
            response(409, "User already exists.");
            exit;
        }
    }

    // Generate new ID
    $newId = empty($users)
        ? 1
        : max(array_column($users, "id")) + 1;

    $newUser = [
        "id" => $newId,
        "name" => $name,
        "email" => $email,
        "age" => (int) $age
    ];

    $users[] = $newUser;

    saveUsers($users);

    response(201, "User created successfully.", $newUser);

    // PUT /api/users/{id}
} elseif (
    preg_match("/^\/api\/users\/(\d+)$/", $requestUri, $matches)
    && $requestMethod === "PUT"
) {

    if (!is_array($input)) {
        response(400, "Invalid JSON request body.");
        exit;
    }

    $id = (int) $matches[1];

    $userIndex = null;

    foreach ($users as $index => $item) {
        if ($item["id"] === $id) {
            $userIndex = $index;
            break;
        }
    }

    if ($userIndex === null) {
        response(404, "User not found.");
        exit;
    }

    $name = trim($input["name"] ?? "");
    $email = trim($input["email"] ?? "");
    $age = $input["age"] ?? null;

    if ($name === "" || $email === "" || $age === null) {
        response(400, "Name, email, and age are required.");
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        response(400, "Invalid email address.");
        exit;
    }

    if (!is_numeric($age) || (int) $age <= 0) {
        response(400, "Age must be a positive number.");
        exit;
    }

    // Check duplicate email excluding current user
    foreach ($users as $item) {
        if (
            $item["id"] !== $id &&
            strtolower($item["email"]) === strtolower($email)
        ) {
            response(409, "Email already belongs to another user.");
            exit;
        }
    }

    $users[$userIndex] = [
        "id" => $id,
        "name" => $name,
        "email" => $email,
        "age" => (int) $age
    ];

    saveUsers($users);

    response(
        200,
        "User updated successfully.",
        $users[$userIndex]
    );

    // DELETE /api/users/{id}
} elseif (
    preg_match("/^\/api\/users\/(\d+)$/", $requestUri, $matches)
    && $requestMethod === "DELETE"
) {

    $id = (int) $matches[1];

    $userIndex = null;

    foreach ($users as $index => $item) {
        if ($item["id"] === $id) {
            $userIndex = $index;
            break;
        }
    }

    if ($userIndex === null) {
        response(404, "User not found.");
        exit;
    }

    $deletedUser = $users[$userIndex];

    array_splice($users, $userIndex, 1);

    saveUsers($users);

    response(200, "User deleted successfully.", $deletedUser);

    // Route not found
} else {

    response(404, "Route not found.");
}
