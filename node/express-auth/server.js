import express from "express";
import dotenv from "dotenv";
import connectDB from "./config/db.js";
import authRoutes from "./routes/authRoutes.js";
import { errorHandler } from "./middleware/errorMiddleware.js";
dotenv.config();

connectDB();

const app = express();
const PORT = process.env.PORT || 5000;

// Global Middleware
app.use(express.json());
app.use("/api/auth", authRoutes);
app.use(errorHandler);
// Test Route
app.get("/", (req, res) => {
    res.status(200).json({
        message: "Backend Collection - API is running.",
        status: "success"
    });
});
app.get("/api/health", (req, res) => {
    res.status(200).json({
        message: "API is healthy.",
        status: "success"
    });
});
// Not Exists(404) Handler.
app.use((req, res) => {
    res.status(404).json({
        message: "Endpoint doesn't exists.",
        status: "error"
    });
});
app.listen(PORT, () => {
    console.log(`Server is running at PORT ${PORT}`);
});