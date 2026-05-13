import { useState, useReducer, useEffect, useCallback } from 'react';
import api from '../api';

const taskReducer = (state, action) => {
  switch (action.type) {
    case 'SET_TASKS':
      return action.payload;
    case 'ADD_TASK':
      return [action.payload, ...state];
    case 'UPDATE_TASK':
      return state.map(task => task.id === action.payload.id ? action.payload : task);
    case 'DELETE_TASK':
      return state.filter(task => task.id !== action.payload);
    default:
      return state;
  }
};

export const useTasks = () => {
  const [tasks, dispatch] = useReducer(taskReducer, []);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  const fetchTasks = useCallback(async (filters = {}) => {
    setLoading(true);
    try {
      const params = new URLSearchParams(filters).toString();
      const response = await api.get(`/api/tasks${params ? `?${params}` : ''}`);
      dispatch({ type: 'SET_TASKS', payload: response.data.data });
      setError(null);
    } catch (err) {
      setError(err.response?.data?.message || 'Failed to fetch tasks');
      showToast('Error fetching tasks', 'error');
    } finally {
      setLoading(false);
    }
  }, []);

  const createTask = async (taskData) => {
    const tempId = Date.now();
    const tempTask = { id: tempId, ...taskData, status: 'todo' };
    
    // Optimistic update
    dispatch({ type: 'ADD_TASK', payload: tempTask });

    try {
      const response = await api.post('/api/tasks', taskData);
      dispatch({ type: 'UPDATE_TASK', payload: { ...response.data.data, tempId } });
      showToast('Task created successfully', 'success');
    } catch (err) {
      // Revert optimistic update
      dispatch({ type: 'DELETE_TASK', payload: tempId });
      showToast(err.response?.data?.message || 'Failed to create task', 'error');
    }
  };

  const updateTask = async (id, taskData) => {
    const previousTask = tasks.find(t => t.id === id);
    const updatedTask = { ...previousTask, ...taskData };
    
    // Optimistic update
    dispatch({ type: 'UPDATE_TASK', payload: updatedTask });

    try {
      await api.put(`/api/tasks/${id}`, taskData);
    } catch (err) {
      // Revert optimistic update
      dispatch({ type: 'UPDATE_TASK', payload: previousTask });
      showToast(err.response?.data?.message || 'Failed to update task', 'error');
    }
  };

  const toggleTaskStatus = async (id) => {
    const previousTask = tasks.find(t => t.id === id);
    const newStatus = previousTask.status === 'done' ? 'todo' : 'done';
    const updatedTask = { ...previousTask, status: newStatus };
    
    // Optimistic update
    dispatch({ type: 'UPDATE_TASK', payload: updatedTask });

    try {
      await api.patch(`/api/tasks/${id}/toggle`);
    } catch (err) {
      // Revert optimistic update
      dispatch({ type: 'UPDATE_TASK', payload: previousTask });
      showToast('Failed to toggle task status', 'error');
    }
  };

  const deleteTask = async (id) => {
    const previousTask = tasks.find(t => t.id === id);
    
    // Optimistic update
    dispatch({ type: 'DELETE_TASK', payload: id });

    try {
      await api.delete(`/api/tasks/${id}`);
      showToast('Task deleted successfully', 'success');
    } catch (err) {
      // Revert optimistic update
      dispatch({ type: 'ADD_TASK', payload: previousTask });
      showToast('Failed to delete task', 'error');
    }
  };

  const showToast = (message, type) => {
    // Basic toast implementation for demo purposes
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);
    setTimeout(() => toast.remove(), 3000);
  };

  return {
    tasks,
    loading,
    error,
    fetchTasks,
    createTask,
    updateTask,
    toggleTaskStatus,
    deleteTask
  };
};