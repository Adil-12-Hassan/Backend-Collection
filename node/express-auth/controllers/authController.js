import { User } from "../models/User.js";
import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";

export const registerUser = async (req, res) => {
    try {
        const { name, email, password } = req.body;
        // Validate Inputs.
        if (!name || !email || !password)
            return res.status(400).json({
                message: "All fields are required.",
                status: "error"
            });
        // Check if user already exists.
        const existingUser = await User.findOne({ email })
        if (existingUser) {
            return res.status(409).json({
                message: "User already exists.",
                status: "error"
            });
        }
        // Hash Pass
        const hashedPassword = await bcrypt.hash(password, 10);
        // Create User
        const user = await User.create({
            name, email, password: hashedPassword
        });
        // Create JWT
        const token = jwt.sign(
            {
                userId: user._id,
                role: user.role
            },
            process.env.JWT_SECRET, { expiresIn: "7d" }
        );
        res.status(201).json({
            message: "User registered successfully.",
            status: "success",
            token
        });
    } catch (error) {
        res.status(500).json({
            message: "Server error",
            status: "error"
        });
    }
};

export const loginUser = async (req, res) => {
    try {
        const { email, password } = req.body;
        // Validate Inputs
        if (!email || !password) {
            return res.status(400).json({
                message: "All fields are requireds.",
                status: "error"
            });
        }
        // Find User
        const user = await User.findOne({ email });
        if (!user) {
            return res.status(401).json({
                message: "Invalid Credentials",
                status: "error"
            });
        }
        // Compare Password
        const isPasswordValid = await bcrypt.compare(password, user.password);
        if (!isPasswordValid) {
            return res.status(401).json({
                message: "Invalid Credentials",
                status: "error"
            });
        }
        // Create JWT
        const token = jwt.sign(
            {
                userId: user._id,
                role: user.role
            }, process.env.JWT_SECRET,
            { expiresIn: "7d" }
        );
        res.status(200).json({
            message: "Login Successfull.",
            status: "success",
            token
        });
    } catch (error) {
        res.status(500).json({
            message: "Can't Login",
            status: "error"
        });
    }
};

export const getMe = async (req, res) => {
    try {
        const user = await User.findById(req.user.userId).select("-password");
        if (!user) {
            return res.status(404).json({
                message: "User not found.",
                status: "error"
            });
        }
        res.status(200).json({
            message: "User profile retrived successfully.",
            status: "success",
            user
        });
    } catch (error) {
        res.status(500).json({
            message: "Server error.",
            status: "error"
        });
    }
};