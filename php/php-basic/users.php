<?php

$dataFile = __DIR__ . "/users.json";

// Read users from JSON file
function getUsers()
{
    global $dataFile;

    if (!file_exists($dataFile)) {
        $users = [
            [
                "id" => 1,
                "name" => "Hassan",
                "email" => "hassan@example.com",
                "age" => 21
            ],
            [
                "id" => 2,
                "name" => "Ali",
                "email" => "ali@example.com",
                "age" => 22
            ],
            [
                "id" => 3,
                "name" => "Ahmed",
                "email" => "ahmed@example.com",
                "age" => 23
            ]
        ];

        saveUsers($users);

        return $users;
    }

    $data = file_get_contents($dataFile);

    return json_decode($data, true) ?? [];
}

// Save users to JSON file
function saveUsers($users)
{
    global $dataFile;

    file_put_contents(
        $dataFile,
        json_encode($users, JSON_PRETTY_PRINT),
        LOCK_EX
    );
}
