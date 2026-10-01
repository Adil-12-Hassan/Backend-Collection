import express from 'express'
import { User } from '../models/User.js'
const router = express.Router();
// Get all users
router.get("/", async (req, res) => {
    const users = await User.find();
    res.json(users);
});
// Get one user
router.get("/:id", async (req, res) => {
    const user = await User.findOne({
        id: Number(req.params.id)
    });
    if (!user) {
        return res.status(404).json({
            message: "User not found.",
        });
    } res.json(user)
})
// Create User
router.post("/", async (req, res) => {
    const user = await User.create(req.body);
    res.status(201).json(user);
});

// Update user
router.put("/:id", async (req, res) => {
    const user = await User.findOneAndUpdate(
        { id: Number(req.params.id) },
        req.body,
        { new: true, runValidators: true }
    );
    if (!user) {
        return res.status(404).json({
            message: "User not found"
        });
    } res.json(user);
});

// Delete user
router.delete("/:id", async (req, res) => {
    const user = await User.findOneAndDelete({
        id: Number(req.params.id)
    });
    if (!user) {
        return res.status(404).json({
            message: "User not found"
        })
    }
    res.json({
        message: "User deleted successfully"
    })
})

export default router;