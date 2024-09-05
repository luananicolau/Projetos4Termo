import mongoose from "mongoose";

const databaseURL = process.env.DATABASE_URL;

if (!databaseURL) {
    throw new Error("Database não listado no .env.local");
}

const connectMongo = async () => {
    if (mongoose.connection.readyState > 0) {
        return;
    }else{
        mongoose.connect(databaseURL)
        .then("MongoDB Conectado")
        .catch(err=>console.error(err));
    }
}
export default connectMongo;