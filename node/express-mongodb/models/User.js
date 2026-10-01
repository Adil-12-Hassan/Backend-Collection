import mongoose from 'mongoose';
import { Counter } from './Counter.js';

const userSchema = new mongoose.Schema({
    name: {
        type: String,
        required: true,
        trim: true,
        minlength: 2
    },
    email: {
        type: String,
        required: true,
        unique: true,
        lowercase: true,
        match: /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    },
    id: {
        type: Number,
        required: true,
        unique: true,
        sparse: true,
        immutable: true,
        min: 1
    },
    age: {
        type: Number,
        min: 0
    },
    createdAt: {
        type: Date,
        default: Date.now
    }
}, { id: false });

userSchema.pre('validate', async function () {
    if (!this.isNew) return;

    const latestUser = await this.constructor
        .findOne({ id: { $type: 'number' } })
        .sort({ id: -1 })
        .select({ id: 1 })
        .lean();

    await Counter.updateOne(
        { _id: 'user' },
        { $max: { sequence: latestUser?.id ?? 0 } },
        { upsert: true }
    );

    const counter = await Counter.findOneAndUpdate(
        { _id: 'user' },
        { $inc: { sequence: 1 } },
        { new: true, upsert: true, setDefaultsOnInsert: true }
    );

    this.id = counter.sequence;
});

export const User = mongoose.model('User', userSchema)