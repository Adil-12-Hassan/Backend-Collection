<?php

header("Content-Type: application/json; charset=UTF-8");

require_once __DIR__ . "/../config/database.php";

$database = new Database();
$conn = $database->connect();

$method = $_SERVER["REQUEST_METHOD"];

// Get user ID from URL, if provided
$id = isset($_GET["id"]) ? (int) $_GET["id"] : null;

// GET: Retrieve all users or one user
if ($method === "GET") {

    if ($id !== null) {
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);

        $user = $stmt->fetch();

        if (!$user) {
            http_response_code(404);
            echo json_encode(["message" => "User not found"]);
            exit;
        }

        echo json_encode($user);
        exit;
    }

    $stmt = $conn->query("SELECT * FROM users ORDER BY id DESC");
    echo json_encode($stmt->fetchAll());
    exit;
}

// POST: Create a new user
if ($method === "POST") {

    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !is_array($data) ||
        empty(trim($data["name"] ?? "")) ||
        !filter_var($data["email"] ?? "", FILTER_VALIDATE_EMAIL)
    ) {
        http_response_code(400);
        echo json_encode([
            "message" => "Valid name and email are required"
        ]);
        exit;
    }

    $name = trim($data["name"]);
    $email = trim($data["email"]);
    $age = $data["age"] ?? null;

    if ($age !== null && filter_var($age, FILTER_VALIDATE_INT) === false) {
        http_response_code(400);
        echo json_encode(["message" => "Age must be an integer"]);
        exit;
    }

    // Check whether the email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode(["message" => "User already exists"]);
        exit;
    }

    $stmt = $conn->prepare(
        "INSERT INTO users (name, email, age) VALUES (?, ?, ?)"
    );

    $stmt->execute([$name, $email, $age]);

    http_response_code(201);

    echo json_encode([
        "message" => "User created successfully",
        "id" => (int) $conn->lastInsertId(),
        "name" => $name,
        "email" => $email,
        "age" => $age
    ]);

    exit;
}

// PUT: Update an existing user
if ($method === "PUT") {

    if ($id === null || $id <= 0) {
        http_response_code(400);
        echo json_encode(["message" => "Valid user ID is required"]);
        exit;
    }

    $data = json_decode(file_get_contents("php://input"), true);

    if (
        !is_array($data) ||
        empty(trim($data["name"] ?? "")) ||
        !filter_var($data["email"] ?? "", FILTER_VALIDATE_EMAIL)
    ) {
        http_response_code(400);
        echo json_encode([
            "message" => "Valid name and email are required"
        ]);
        exit;
    }

    $name = trim($data["name"]);
    $email = trim($data["email"]);
    $age = $data["age"] ?? null;

    if ($age !== null && filter_var($age, FILTER_VALIDATE_INT) === false) {
        http_response_code(400);
        echo json_encode(["message" => "Age must be an integer"]);
        exit;
    }

    // Check whether the user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmt->execute([$id]);

    if (!$stmt->fetch()) {
        http_response_code(404);
        echo json_encode(["message" => "User not found"]);
        exit;
    }

    // Check whether another user has the same email
    $stmt = $conn->prepare(
        "SELECT id FROM users WHERE email = ? AND id != ?"
    );

    $stmt->execute([$email, $id]);

    if ($stmt->fetch()) {
        http_response_code(409);
        echo json_encode(["message" => "Email already belongs to another user"]);
        exit;
    }

    $stmt = $conn->prepare(
        "UPDATE users SET name = ?, email = ?, age = ? WHERE id = ?"
    );

    $stmt->execute([$name, $email, $age, $id]);

    echo json_encode(["message" => "User updated successfully"]);
    exit;
}

// DELETE: Remove a user
if ($method === "DELETE") {

    if ($id === null || $id <= 0) {
        http_response_code(400);
        echo json_encode(["message" => "Valid user ID is required"]);
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() === 0) {
        http_response_code(404);
        echo json_encode(["message" => "User not found"]);
        exit;
    }

    echo json_encode(["message" => "User deleted successfully"]);
    exit;
}

// Unsupported HTTP method
http_response_code(405);
header("Allow: GET, POST, PUT, DELETE");

echo json_encode(["message" => "Method not allowed"]);
