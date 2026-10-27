<?php

require_once __DIR__ . "/config/database.php";

$database = new Database();
$conn = $database->connect();

if ($conn) {
    echo "Database connected successfully!";
}
