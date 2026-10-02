# Flask Basic API
A simple REST API built with Python and Flask. This project is 4th backend example in the Backend Collection.

## 🚀 Features
* Python Flask
* REST API
* JSON repsonses
* CRUD operations
* GET all users
* GET user by ID
* Create a user
* Update a user 
* Delete a user
* Duplicate email checking
* HTTP status codes
* In-memory data storage
* No DB required

## 🛠️ Technologies
* Python
* Flask
* REST API
* JSON
## 📁 Project Structure
```dir
flask-basic/
├── app.py
├── requirements.txt
├── README.md
└── .gitignore
```
## ⚙️ Installation 
Clone the repository and move into project direcotry. <br>
Create a virtual environment:
```cli
python -m venv venv
```
Install the dependencies: 
```
pip install -r requirements.txt
```
## ▶️ Run the Server 
```
python app.py
```
`http://localhost:5000` or `http://127.0.0.1:5000`
## 🔗 API Endpoints
Method | Endpoint | Description|
|------|----------|------------|
GET | / |	Check API status |
GET	| /api/users | Get all users|
GET | /api/users/<id> | Get a specific user|
POST | /api/users | Create a new user|
PUT | /api/users/<id> | Update a user|
DELETE | /api/users/<id> | Delete a user|

## 🧪 Test
### GET `/api/users`
Return all users
### GET`/api/users/id
Get user with specific id.
### POST `/api/users`
Request body:
```json
{ 
    "name": "Ahmed", 
    "email": "ahmed@gmail.com", 
    "age": 21 
}
```
Expected response: 
```json
{ 
    "message": "User created successfully", 
    "status": "success", 
    "user": 
        { 
            "id": 3, 
            "name": "Ahmed", "email": "ahmed@gmail.com", 
            "age": 21 
        } 
}
```
If the email already exists, the API return:
```json
{
    "message": "User already exists",
    "status": "error"
}
```
with HTTP status `409 Conflict`.
### PUT `/api/users/id`
Request body: 
```json
{ 
    "name": "Ahmed Updated", 
    "email": "ahmed@gmail.com", 
    "age": 18
}
```
User update if exists. But if not exists you got that the user not exists. 
### DELETE `/api/users/id
Successful response: 
```json
{
    "message": "User deleted successfully",
    "status": "success"
}
```
## 💾 Data Storage
This project uses an in-memory Python list for storing users.

```code
users = [
    {
        "id": 1,
        "name": "Hassan",
        "email": "syed@hassan.dev",
        "age": 19
    }
]
```
Because there is no database, all data will be list when the Flask server stop/restarted. <br>
A future backend in the collection can demostrate Flask with a database.
## 📚 What You'll Learn 
This project demostrate the fundatementals of Express backend: 
* Creating an Python server
* Python lists and dictionaries
* Flask routes
* HTTP methods
* JSON request data
* JSON responses
* CRUD operation
* HTTP status codes
* Basic error handling

## 🤝 Contributes
Contributions are welcome. Please read the repository's `CONTRIBUTING.md` before submitting a pull request.

## 📃 License
This project is LICENSED under MIT LICENSE.