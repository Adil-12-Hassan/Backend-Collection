import express from 'express';

const app = express();
const PORT = 3000;
const users = [
    {
        id: 1,
        name: "Hassan",
        email: "syedadilhassan06@gmail.com"
    },
    {
        id: 2,
        name: "Young Master",
        email: "youngmaster@adil12hassan.dev"
    }
];
app.get("/", (req, res) => {
    res.json({
        message: "Backend Collection - Express Basic API",
        status: "success"
    });
})
app.get("/api/users/:id", (req,res)=> {
    const id = Number(req.params.id);
    const user = users.find(user => user.id === id);
    if(!user) {
        return res.status(404).json({
            message: "User not Found."
        });
    }
    res.json(user);
})
app.get("/api/user", (req, res) => {
    res.json(users);
})
app.listen(PORT, () => {
    console.log(`Server is running on localhsot on PORT ${PORT}`);
});