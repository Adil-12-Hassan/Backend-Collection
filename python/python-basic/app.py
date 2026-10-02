from flask import Flask, request

app = Flask(__name__)

users = [
    {"id": 1, "name": "Hassan", "email": "syed@hassan.dev", "age": "19"},
    {"id": 2, "name": "Young Master", "email": "example@gmail.com", "age": "18"},
]


# Get Health
@app.route("/")
def home():
    return {
        "message": "Backend Collection - Flask API is running.",
        "status": "success",
    }


# Get all users
@app.route("/api/users", methods=["GET"])
def get_users():
    return users


# Get specific user with ID
@app.route("/api/users/<int:user_id>", methods=["GET"])
def get_user(user_id):
    for user in users:
        if user["id"] == user_id:
            return user
    return {"message": "User not found"}, 404


# Create user
@app.route("/api/users", methods=["POST"])
def create_user():
    data = request.get_json()

    for user in users:
        if user["email"] == data["email"]:
            return {"message": "User already exists", "status": "error"}, 409
    new_user = {
        "id": len(users) + 1,
        "name": data["name"],
        "email": data["email"],
        "age": data["age"],
    }
    users.append(new_user)
    return {
        "message": "User created successfully",
        "status": "success",
        "user": new_user,
    }, 201


# Update user
@app.route("/api/users/<int:user_id>", methods=["PUT"])
def update_user(user_id):
    data = request.get_json()
    for user in users:
        if user["id"] == user_id:
            user["name"] = data["name"]
            user["email"] = data["email"]
            user["age"] = data["age"]
        return user
    return {"message": "User not found"}, 404


@app.route("/api/users/<int:user_id>", methods=["DELETE"])
def delete_user(user_id):
    for user in users:
        if user["id"] == user_id:
            users.remove(user)
        return {"message": "User deleted successfully", "status": "success"}, 200
    return {"message": "User not found"}


if __name__ == "__main__":
    app.run(debug=True)
