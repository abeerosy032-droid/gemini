// utils/api.ts
import axios from 'axios';

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api',
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json',
  },
});

// Request interceptor — attach Sanctum token
api.interceptors.request.use((config) => {
  const token = localStorage.getItem('sanctum_token');
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  return config;
});

// Response interceptor — handle 401/429 gracefully
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response?.status === 401) {
      localStorage.removeItem('sanctum_token');
      window.location.href = '/login';
    }
    if (error.response?.status === 429) {
      console.warn('Rate limit exceeded. Slow down.');
    }
    return Promise.reject(error);
  }
);

export default api;
