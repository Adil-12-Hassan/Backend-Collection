# PHP Basic REST API

A simple REST API built with raw PHP. This project is the 5th backend example in the Backend Collection, demonstrating CRUD operations, JSON handling, request methods, validation, and file-based data persistence without using any framework or database.

### 🚀 Features

* Raw PHP without frameworks
* REST API architecture
* JSON request and response handling
* HTTP method handling (GET, POST, PUT, DELETE)
* CRUD operations for users
* File-based data persistence using JSON
* Automatic user ID generation
* Input validation
* Duplicate email checking
* HTTP status codes and error handling
* Regular expressions for route matching

### 🛠️ Technologies Used

* PHP
* JSON
* HTTP
* PHP Built-in Development Server

### 📁 Project Structure

```text
basic-api/
├── index.php
├── users.php
├── users.json       # Generated automatically
├── README.md
└── .gitignore
```

**File descriptions:**

* `index.php` - Main entry point, request handling, routing, and API responses.
* `users.php` - User data management and JSON file storage functions.
* `users.json` - Automatically generated file containing user data.
* `README.md` - Project documentation.
* `.gitignore` - Excludes generated user data from version control.

### ⚙️ Requirements

* PHP 8.0 or later recommended.
* A terminal or command prompt.
* Postman, Thunder Client, or another HTTP client for testing.

No external PHP packages or database are required.

### ▶️ Getting Started

**1. Clone the repository**

```bash
git clone https://github.com/Adil-12-Hassan/Backend-Collection.git
```

**2. Navigate to the project directory**

```bash
cd Backend-Collection/php/basic-api
```

**3. Start the development server**

```bash
php -S localhost:8000
```

**4. Open the API**

Visit:

```text
http://localhost:8000
```

Expected response:

```json
{
    "message": "PHP Basic API is running."
}
```

The `users.json` file is generated automatically when the user data is first requested. The file must be writable by the PHP process.

### 📌 API Endpoints

Base URL:

```text
http://localhost:8000
```

| Method | Endpoint          | Description             |
| ------ | ----------------- | ----------------------- |
| GET    | `/`               | Check API status        |
| GET    | `/api/users`      | Retrieve all users      |
| GET    | `/api/users/{id}` | Retrieve a user by ID   |
| POST   | `/api/users`      | Create a new user       |
| PUT    | `/api/users/{id}` | Update an existing user |
| DELETE | `/api/users/{id}` | Delete a user           |

### 🧪 Tests

Test the following endpoints using Postman or Thunder Client.

#### 1. Check API Status

**Request**

```http
GET /
```

**Expected Status:** `200 OK`

**Expected Response**

```json
{
    "message": "PHP Basic API is running."
}
```

#### 2. Get All Users

**Request**

```http
GET /api/users
```

**Expected Status:** `200 OK`

**Expected Response**

```json
{
    "message": "Users retrieved successfully.",
    "data": [
        {
            "id": 1,
            "name": "Hassan",
            "email": "hassan@example.com",
            "age": 21
        },
        {
            "id": 2,
            "name": "Ali",
            "email": "ali@example.com",
            "age": 22
        },
        {
            "id": 3,
            "name": "Ahmed",
            "email": "ahmed@example.com",
            "age": 23
        }
    ]
}
```

#### 3. Get a Single User

**Request**

```http
GET /api/users/1
```

**Expected Status:** `200 OK`

**Expected Response**

```json
{
    "message": "User retrieved successfully.",
    "data": {
        "id": 1,
        "name": "Hassan",
        "email": "hassan@example.com",
        "age": 21
    }
}
```

**Test a non-existing user:**

```http
GET /api/users/100
```

**Expected Status:** `404 Not Found`

```json
{
    "message": "User not found."
}
```

#### 4. Create a User

**Request**

```http
POST /api/users
```

**Body → Raw → JSON**

```json
{
    "name": "Usman",
    "email": "usman@example.com",
    "age": 24
}
```

**Expected Status:** `201 Created`

**Expected Response**

```json
{
    "message": "User created successfully.",
    "data": {
        "id": 4,
        "name": "Usman",
        "email": "usman@example.com",
        "age": 24
    }
}
```

The new user is saved in `users.json` and remains available across requests.

**Test duplicate email:**

Send the same POST request again.

**Expected Status:** `409 Conflict`

```json
{
    "message": "User already exists."
}
```

**Test invalid email:**

```json
{
    "name": "Usman",
    "email": "invalid-email",
    "age": 24
}
```

**Expected Status:** `400 Bad Request`

```json
{
    "message": "Invalid email address."
}
```

#### 5. Update a User

**Request**

```http
PUT /api/users/4
```

**Body → Raw → JSON**

```json
{
    "name": "Usman Updated",
    "email": "usman.updated@example.com",
    "age": 25
}
```

**Expected Status:** `200 OK`

**Expected Response**

```json
{
    "message": "User updated successfully.",
    "data": {
        "id": 4,
        "name": "Usman Updated",
        "email": "usman.updated@example.com",
        "age": 25
    }
}
```

**Test a non-existing user:**

```http
PUT /api/users/100
```

**Expected Status:** `404 Not Found`

#### 6. Delete a User

**Request**

```http
DELETE /api/users/4
```

**Expected Status:** `200 OK`

**Expected Response**

```json
{
    "message": "User deleted successfully.",
    "data": {
        "id": 4,
        "name": "Usman Updated",
        "email": "usman.updated@example.com",
        "age": 25
    }
}
```

**Verify deletion:**

```http
GET /api/users/4
```

**Expected Status:** `404 Not Found`

The user should no longer appear in the users list.

#### 7. Test Invalid Requests

| Test Case                 | Expected Status   |
| ------------------------- | ----------------- |
| Invalid JSON request body | `400 Bad Request` |
| Missing required fields   | `400 Bad Request` |
| Invalid email address     | `400 Bad Request` |
| Invalid age               | `400 Bad Request` |
| Duplicate email address   | `409 Conflict`    |
| Non-existing user ID      | `404 Not Found`   |
| Unknown route             | `404 Not Found`   |

### 📦 Data Storage

This project uses a JSON file instead of a database.

User data is stored in:

```text
users.json
```

The API reads and writes this file through functions defined in `users.php`.

**Advantages:**

* No database setup required.
* Simple and beginner-friendly.
* Data persists between requests.
* Useful for learning basic backend concepts.

**Limitations:**

* Not suitable for high-concurrency applications.
* No database transactions or relational queries.
* File permissions must be configured correctly.
* Concurrent modifications require additional protection.

For production applications, consider using MySQL or PostgreSQL.

### 🧠 Learning Objectives

By completing this project, you will learn:

* How PHP handles HTTP requests.
* How to build a basic REST API without a framework.
* How to work with PHP arrays and functions.
* How to decode incoming JSON using `json_decode()`.
* How to encode responses using `json_encode()`.
* How to handle HTTP methods and route parameters.
* How to implement Create, Read, Update, and Delete operations.
* How to validate user input.
* How to return appropriate HTTP status codes.
* How to persist data using JSON files.

### 🔮 Future Improvements

Possible improvements include:

* Integrate MySQL using PDO.
* Add pagination to the users endpoint.
* Implement authentication and authorization.
* Add centralized error handling.
* Introduce a routing structure for larger applications.
* Add automated API tests.

### 🤝 Contributing

This project is part of the Backend Collection, a learning repository where developers can explore backend development and contribute new examples.

Contributions, improvements, and suggestions are welcome.

### 📚 Backend Collection

This is **Backend #5** in the Backend Collection.

The collection includes backend examples built with different languages, frameworks, databases, and authentication techniques.

Explore the repository:
[Backend Collection](https://github.com/Adil-12-Hassan/Backend-Collection)

### 📄 License

This project is distributed under the license specified in the root of the Backend Collection repository.
