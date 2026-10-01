# Express + MongoDB API

A REST API built with NodeJS, ExpressJS, MongoDB and Mongoose This is the 2ns backend of the Backend Collection.

## 🚀 Features
* ExpressJS Server
* ES Modules (`import/export`)
* MongoDB Database
* Mongoose ODM
* User Model
* CRUD Operations
* JSON API Responses
* Environment Variables
* Basic Error Handling (`Middlewares`)
 
## 🛠️ Technologies
* NodeJS 
* ExpressJS
* MongoDB
* Mongoose
* JavaScript (ES Modules)

## 📁 Project Structure
```
express-mongodb/
├── db/
│   └── db.js
├── models/
│   └── User.js
├── routes/
│   └── userRoutes.js
├── .env
├── .env.example
├── .gitignore
├── package.json
├── package-lock.json
└── server.js
```

## ⚙️ Installation
Clone or fork teh repository and enter the project directory.
```bash
cd node/express-mongodb
```
Install dependencies:
```bash
npm install
```

## 🔐 Environment Variables
Crearte `.env` file:
Add you connection string like this: 
```.env
MONGO_URI=your-connection-string-here
```
Never commit your `.env` file to GitHub. 
You can use `.env.example` to show that which variables need for this project. e.g.,
```.env 
MONGO_URI=
```

## ▶️ Run the Server
```bash
npm start
```
Server will run at:
```browse
http://localhost:3000
```

## 🔌 API Endpoints
### GET `/`
Return basic API information that weqther API is running or not. 
### GET `/api/users`
Return all users stored in database. 
### GET `/api/users/:id`
Return a specific user.
### POST `/api/users`
Creates a new user. 
Example req body:
```JSON
{
    "name": "Hassan",
    "email": "syedhassan06@gmail.com",
    "id": 
}
```

### POST `/api/users/:id`
Update an existing user.
Example body request. 
```JSON
{
    "name": "Hassan Updated",
    "age": 18
}
```
### DELETE `/api/users/:id
Delete a user.

## 👤 User Model
Each user contain. <br>
`name` <br>
`email` <br>
`age` <br>
`createdAt`
## Validations
* `name` is required and must be at least 3 charaters.
* `email` is required and must be unique. 
* `age` can't be -ve.
* `createdAt` is automatically generated.

## 🧪 Tests
- For testing purposes I use and recommend VS Code Extension named `Thunder Client` from official "Thunder Client".

### Test 1
```cmd
GET http://localhost:5000/
```
* This will return you message that will tell you about the condition/health of running API.

### Test 2
```cmd
GET http://localhost:5000/api/users
```
* Give you all users store in database.

### Test 3
```cmd
POST http://localhost:5000/api/users
```
* After this test a new user will create make sure add all credentials in you request.

### Test 4
```cmd
GET http://localhost:5000/api/users/YOUR_USER_ID
```
* Replace YOUR_USER_ID with a number. If that ID number exist in database, you give get that ID USER.

### Test 5
```cmd
PUT http://localhost:5000/api/users/YOUR_USER_ID
```
* This test will update the user info in DB.

### Test 6
```cmd
DELETE http://localhost:5000/api/users/YOUR_USER_ID
```
* This will delete the user with the specific ID you entered.

## 📚 What You'll Learn
This project demostrates:
* Connecting Express to MongoDB
* Using Mongoose
* Creating MongoDB Schema and Models
* CRUD Operations
* REST API Routing
* Resquest body handling
* Environment Variable and Senstive data hiding
* Database error handling
* Organizing a backend into speparate files.

## 🤝 Contributing
Contributons are welcome.
Please read the repository's `CONTRIBUTEING.md` before submiting a pull req.

## 📃 LICENSE
This project is LICENSED under MIT LICENSE.