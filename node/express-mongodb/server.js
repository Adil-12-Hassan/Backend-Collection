import mongoose from 'mongoose';
import express from 'express';
import userRoutes from './routes/userRoutes.js';
import connectDB from './db/database.js';

const app = express();
const PORT = 5000;
app.use(express.json());

app.get("/", (req, res) => {
    res.json({
        message: "Backend Collection - API is running.",
        status: "success"
    })
})
app.use("/api/users", userRoutes);
connectDB();
app.listen(PORT, () => {
    console.log(`Server is running at PORT ${PORT}`);
})
