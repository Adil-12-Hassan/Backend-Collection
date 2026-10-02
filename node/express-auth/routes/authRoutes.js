import express from "express";
import {
    registerUser,
    loginUser,
    getMe
} from "../controllers/authController.js";
import {
    protect,
    adminOnly
} from "../middleware/authMiddleware.js";
const router = express.Router();
router.post("/register", registerUser);
router.post("/login", loginUser);
router.get("/protected", protect, (req, res) => {
    res.json({
        message: "You accessed a protected route.",
        status: "success",
        user: req.user
    });
});
router.get("/admin", protect, adminOnly, (req, res) => {
    res.status(200).json({
        message: "Welcome to Admin Dashboard",
        status: "success", 
        user: res.user
    });
});
router.get("/me", protect, getMe);
export default router;