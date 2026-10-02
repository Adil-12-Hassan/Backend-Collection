# Express Auth API
A complete authentication REST API built with NodeJS, ExpressJS, MongoDB and JWT. This project is the 3rd backend example in backend collection.

## 🚀 Features
* ExpressJS server
* ES Modules (`import/export`)
* MongoDB database integration
* Mongoose ODM
* User registeration
* User login
* Password hashing with bcrypt
* JWT authentication
* Protected routes
* Current user profile
* User and Admin roles
* Admin only routes
* Input validation
* 404 error handling
* Global error handling
* API health check
* Environment variables

## 🛠️ Technologies
* NodeJS
* ExpressJS
* MongoDB
* Mongoose
* JavaScript(ES Modules)
* JSON Web Token (JWT)
* bcryptjs
* dotenv
* VS Code

## 📁 Project Structure
```dir
express-auth/
├── config/
│   └── db.js
├── controllers/
│   └── authController.js
├── middleware/
│   ├── authMiddleware.js
│   └── errorMiddleware.js
├── models/
│   └── User.js
├── routes/
│   └── authRoutes.js
├── node_modules/
├── .env
├── .gitignore
├── package-lock.json
├── package.json
└── server.js
```

## ⚙️ Installation
Clone or fork the repostiory, then enter the project directoy: 
```cmd
cd node/express-auth
```
Install dependencies: 
```cmd
npm install
```
Create `.env` file in the project root. For the variable check `.env.example`

## ▶️ Run the Server
```node
npm start
```
The server runs at:
```
http://localhost:5000
```
## ❤️ Health Check
### GET `/api/health`
Check whether API is running. 

## 🔐 Authentication API Endpoints
### POST `/api/auth/register`
Register a new user.
Request Body: 
```json
{
    "name": "Hassan",
    "email": "hassan@example.com",
    "password": "password123"
}
```
Password store in DB after hashing.
### POST `/api/auth/login`
Login an existing into system.
Request Body: 
```json
{
    "email": "hassan@example.com",
    "password": "password123"
}
```
A JWT token returned after successfull authentication.
### GET `/api/auth/me`
Returns the currently authenticated user's profile.
Requires: 
```
Authorization: Bearer YOUR_JWT_TOKEN
```
The user password is not returned.
### GET `/api/auth/protected`
Example of a protected route that requires a valid JWT token.
```
GET /api/auth/protected
```
Requires:
```
Authorization: Bearer YOUR_JWT_TOKEN
```
### GET `/api/auth/admin`
An admin only protected route. 
```
GET /api/auth/admin
```
Requires a valid JWT belonging to a user with the role `admin` role. <br>
A normal user got a error. <br>
```403 Forbidden``` <br>
Only authenticated admin can access route.
## 📚 What You'll Learn
This project demostrates the fundamentals of authentication in an Exoress backend:
* Creating an Express autheticated server
* Using ES6+
* Connecting Express with MongoDB
* Creating Mongoose models
* Registering users
* Hashing passwords with bcrypt
* Comapre password while login
* Creating JWT tokens
* Verifying JWT tokens
* Creating protected routes
* Creating authentication middleware
* Implementing user roles
* Creating admin-only routes
* Using environment variables
* Handling HTTP status codes
* Creating global error middleware
* Building a health check endpoint
## 🤝 Contributes
Contributions are welcome. Please read the repository's `CONTRIBUTING.md` before submitting a pull request.
## 📃 License
This project is LICENSED under MIT LICENSE.