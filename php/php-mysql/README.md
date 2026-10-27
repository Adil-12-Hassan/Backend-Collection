# PHP + MySQL Basic API

A simple REST API built with PHP and MySQL using PDO. This project is the 6th backend example in the Backend Collection.

### 🚀 Features

* PHP backend with PDO
* MySQL database integration
* REST API with JSON responses
* Create, Read, Update, and Delete (CRUD) operations
* Duplicate email validation
* Input validation
* Prepared statements to help prevent SQL injection
* HTTP status codes for success and error responses

### 🛠️ Technologies

* PHP
* MySQL
* PDO
* XAMPP
* Postman

### 📁 Project Structure

```text
php-mysql/
├── config/
│   └── database.php
├── routes/
│   └── users.php
├── index.php
├── schema.sql
├── .gitignore
└── README.md
```

### ⚙️ Installation and Setup

#### 1. Clone the Repository

```bash
git clone https://github.com/Adil-12-Hassan/Backend-Collection.git
```

Navigate to the project directory:

```bash
cd Backend-Collection/php/php-mysql
```

#### 2. Install XAMPP

Download and install XAMPP if it is not already installed.

Start **Apache** and **MySQL** from the XAMPP Control Panel.

#### 3. Create the Database Using XAMPP

You can create the database using phpMyAdmin.

1. Start Apache and MySQL in XAMPP.
2. Open your browser and visit `http://localhost/phpmyadmin`.
3. Click the **SQL** tab.
4. Copy the contents of `schema.sql`.
5. Paste the SQL into the editor.
6. Click **Go**.

This creates the `backend_collection` database and its `users` table.

**Alternative:** You can create the database manually by running the SQL commands in `schema.sql` through the SQL tab.

#### 4. Configure the Database Connection

Open `config/database.php` and check the database settings:

```php
private $host = "localhost";
private $db_name = "backend_collection";
private $username = "root";
private $password = "";
```

These settings use the typical default XAMPP MySQL credentials. Update them if your MySQL configuration is different.

#### 5. Run the API

Open a terminal in the `php-mysql` project directory and run:

```bash
php -S localhost:8000
```

The API will be available at:

`http://localhost:8000`

**Note:** This project uses PHP's built-in development server for local testing. You do not need to move the project into XAMPP's `htdocs` directory when running it this way.

#### 6. Test with Postman

Use Postman to send requests to the API endpoints listed below.

### 🔗 API Endpoints

| Method | Endpoint          | Description             |
| ------ | ----------------- | ----------------------- |
| GET    | `/api/users`      | Retrieve all users      |
| GET    | `/api/users?id=1` | Retrieve a user by ID   |
| POST   | `/api/users`      | Create a new user       |
| PUT    | `/api/users?id=1` | Update an existing user |
| DELETE | `/api/users?id=1` | Delete a user           |

Replace `1` with the actual user ID when testing individual records.

### 📝 Request Examples

#### Create a User

**POST** `/api/users`

Body → raw → JSON:

```json
{
    "name": "Hassan",
    "email": "hassan@example.com",
    "age": 21
}
```

Successful response:

```json
{
    "message": "User created successfully",
    "id": 1,
    "name": "Hassan",
    "email": "hassan@example.com",
    "age": 21
}
```

#### Update a User

**PUT** `/api/users?id=1`

Body → raw → JSON:

```json
{
    "name": "Hassan Updated",
    "email": "hassan.updated@example.com",
    "age": 22
}
```

#### Delete a User

**DELETE** `/api/users?id=1`

No request body is required.

### 📊 Response Status Codes

| Status Code                 | Description                              |
| --------------------------- | ---------------------------------------- |
| `200 OK`                    | Request completed successfully           |
| `201 Created`               | User created successfully                |
| `400 Bad Request`           | Invalid input or missing required fields |
| `404 Not Found`             | User or route not found                  |
| `405 Method Not Allowed`    | Unsupported HTTP method                  |
| `409 Conflict`              | Duplicate email address                  |
| `500 Internal Server Error` | Database connection or server error      |

### 🧪 Testing Checklist

* [x] Connect PHP to MySQL using PDO
* [x] Retrieve all users
* [x] Create a user
* [x] Prevent duplicate email addresses
* [x] Retrieve a single user
* [x] Update a user
* [x] Delete a user
* [x] Handle invalid requests and missing users

### 🔒 Security Notes

* Prepared statements are used for database queries.
* User input is validated before database operations.
* Duplicate email addresses are prevented.
* Database credentials should be kept private in production.
* The built-in PHP server is intended for development and testing, not production hosting.

### 📚 Learning Objectives

This project demonstrates how to:

* Build a REST API using PHP.
* Connect PHP to MySQL with PDO.
* Implement CRUD operations.
* Validate incoming JSON requests.
* Handle HTTP methods and status codes.
* Use prepared statements for database queries.

### 🤝 Contributing

Contributions are welcome! Fork the repository, create a new branch, implement your changes, and submit a pull request.

### 📄 License

This project is part of the Backend Collection and is intended for learning and educational purposes.
