# Express Basic API

A simple REST API build with NodeJS and ExpressJS. This project is the 1st backend example in the Backend Collection.

### 🚀 Features
- ExpressJS server
- ES Modules (`import/export`)
- Basic REST API Structure
- JSON Response
- GET all users
- GET a single user
- Basic 404 response

### 🛠️ Technologies 
- NodeJS
- ExpressJS
- JavaScript (ES Modules)

### 📁 Project Structure

```
express-basic/
├── node_modules/
├── package-lock.json
├── package.json
└── server.js
```

### ⚙️ Installation

Clone or fork the repository, then enter the project directory:
```
cd node/express-basic
```
install dependencies
```
npm install
```

### ▶️ Run the Server
```
npm start
```
The server run at 
```
http://localhost:3000
```

## API Endpoints
### GET `/`
Return basic info about the API.
### GET `/api/users`
Returns all users.
### GET `/api/users/:id`
Return user having specific id. 
* Example
GET /api/user/1
Return user with id 1. If user not exist an error appear in JSON form that `User not found.`

## 📚 What You'll Learn 
This project demostrate the fundatementals of Express backend: 
* Creating an Express server
* Use of ES6+ Modules
* Creating routes
* Handling GET requests
* Returning JSON response
* Working with route parameters
* Sending HTTP status codes

## 🤝 Contributes
Contributions are welcome. Please read the repository's `CONTRIBUTING.md` before submitting a pull request.

## 📃 License
This project is LICENSED under MIT LICENSE.