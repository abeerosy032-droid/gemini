// hooks/useTasks.ts
import { useReducer, useCallback, useEffect } from 'react';
import api from '../utils/api';
import { taskReducer, initialTaskState } from '../reducers/taskReducer';
import type { TaskFormData, TaskFilters, Task } from '../types/task';

export function useTasks(initialFilters?: TaskFilters) {
  const [state, dispatch] = useReducer(taskReducer, initialTaskState);

  // ── Fetch all tasks ──
  const fetchTasks = useCallback(async (filters?: TaskFilters) => {
    dispatch({ type: 'SET_LOADING', payload: true });
    try {
      const params = new URLSearchParams();
      const f = filters || initialFilters;
      if (f?.status) params.append('status', f.status);
      if (f?.priority) params.append('priority', f.priority);
      if (f?.due) params.append('due', f.due);
      if (f?.search) params.append('search', f.search);
      if (f?.page) params.append('page', String(f.page));
      if (f?.per_page) params.append('per_page', String(f.per_page));

      const { data } = await api.get(`/tasks?${params.toString()}`);
      dispatch({ type: 'SET_TASKS', payload: data });
    } catch {
      dispatch({ type: 'SET_ERROR', payload: 'فشل في تحميل المهام' });
    }
  }, [initialFilters]);

  // ── Create task (optimistic) ──
  const createTask = useCallback(async (formData: TaskFormData) => {
    const tempId = Date.now(); // temporary ID for optimistic UI
    const optimisticTask: Task = {
      id: tempId,
      title: formData.title,
      description: formData.description ?? null,
      status: formData.status ?? 'pending',
      priority: formData.priority ?? 'medium',
      due_date: formData.due_date ?? null,
      is_overdue: false,
      created_at: new Date().toISOString(),
      updated_at: new Date().toISOString(),
    };

    dispatch({ type: 'ADD_TASK_OPTIMISTIC', payload: optimisticTask });

    try {
      const { data } = await api.post('/tasks', formData);
      // Replace optimistic task with real one
      dispatch({ type: 'REVERT_ADD', payload: tempId });
      dispatch({ type: 'ADD_TASK_OPTIMISTIC', payload: data.data });
    } catch {
      // Revert on failure
      dispatch({ type: 'REVERT_ADD', payload: tempId });
    }
  }, []);

  // ── Update task (optimistic) ──
  const updateTask = useCallback(async (id: number, formData: Partial<TaskFormData>) => {
    const original = state.tasks.find((t) => t.id === id);
    if (!original) return;

    const updated: Task = { ...original, ...formData, updated_at: new Date().toISOString() };
    dispatch({ type: 'UPDATE_TASK_OPTIMISTIC', payload: updated });

    try {
      const { data } = await api.put(`/tasks/${id}`, formData);
      dispatch({ type: 'UPDATE_TASK_OPTIMISTIC', payload: data.data });
    } catch {
      dispatch({ type: 'REVERT_UPDATE', payload: original });
    }
  }, [state.tasks]);

  // ── Delete task (optimistic) ──
  const deleteTask = useCallback(async (id: number) => {
    const original = state.tasks.find((t) => t.id === id);
    if (!original) return;

    dispatch({ type: 'DELETE_TASK_OPTIMISTIC', payload: id });

    try {
      await api.delete(`/tasks/${id}`);
    } catch {
      dispatch({ type: 'REVERT_DELETE', payload: original });
    }
  }, [state.tasks]);

  // ── Toggle task status (optimistic) ──
  const toggleTask = useCallback(async (id: number) => {
    const original = state.tasks.find((t) => t.id === id);
    if (!original) return;

    const toggled: Task = {
      ...original,
      status: original.status === 'done' ? 'pending' : 'done',
      updated_at: new Date().toISOString(),
    };

    dispatch({ type: 'TOGGLE_TASK_OPTIMISTIC', payload: toggled });

    try {
      const { data } = await api.patch(`/tasks/${id}/toggle`);
      dispatch({ type: 'TOGGLE_TASK_OPTIMISTIC', payload: data.data });
    } catch {
      dispatch({ type: 'REVERT_TOGGLE', payload: original });
    }
  }, [state.tasks]);

  // Initial fetch
  useEffect(() => {
    fetchTasks();
  }, [fetchTasks]);

  return {
    tasks: state.tasks,
    meta: state.meta,
    loading: state.loading,
    error: state.error,
    fetchTasks,
    createTask,
    updateTask,
    deleteTask,
    toggleTask,
    clearError: () => dispatch({ type: 'SET_ERROR', payload: null }),
  };
}
