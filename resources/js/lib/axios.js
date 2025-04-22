// axios.js
import axios from 'axios';

// Create an Axios instance
const axiosInstance = axios.create({
    baseURL: process.env.NEXT_PUBLIC_BASE_URL, 
    headers: {
        'Content-Type': 'application/json',
    },
});

// Function to verify user
export function verifyUser (userId) {
    return axiosInstance.get(`/delete-user/${userId}`)
        .then(response => {
            return response.data.message; // Return the message
        })
        .catch(error => {
            console.error('There was an error!', error);
            throw error; // Rethrow the error for further handling
        });
}