// reducers/taskReducer.ts
import type { Task, TasksResponse } from '../types/task';

export type TaskAction =
  | { type: 'SET_LOADING'; payload: boolean }
  | { type: 'SET_TASKS'; payload: TasksResponse }
  | { type: 'ADD_TASK_OPTIMISTIC'; payload: Task }
  | { type: 'UPDATE_TASK_OPTIMISTIC'; payload: Task }
  | { type: 'DELETE_TASK_OPTIMISTIC'; payload: number }
  | { type: 'TOGGLE_TASK_OPTIMISTIC'; payload: Task }
  | { type: 'REVERT_ADD'; payload: number }
  | { type: 'REVERT_UPDATE'; payload: Task }
  | { type: 'REVERT_DELETE'; payload: Task }
  | { type: 'REVERT_TOGGLE'; payload: Task }
  | { type: 'SET_ERROR'; payload: string | null };

export interface TaskState {
  tasks: Task[];
  loading: boolean;
  error: string | null;
  meta: TasksResponse['meta'] | null;
}

export const initialTaskState: TaskState = {
  tasks: [],
  loading: false,
  error: null,
  meta: null,
};

export function taskReducer(state: TaskState, action: TaskAction): TaskState {
  switch (action.type) {
    case 'SET_LOADING':
      return { ...state, loading: action.payload };

    case 'SET_TASKS':
      return {
        ...state,
        tasks: action.payload.data,
        meta: action.payload.meta,
        loading: false,
        error: null,
      };

    case 'ADD_TASK_OPTIMISTIC':
      return { ...state, tasks: [action.payload, ...state.tasks] };

    case 'UPDATE_TASK_OPTIMISTIC':
      return {
        ...state,
        tasks: state.tasks.map((t) =>
          t.id === action.payload.id ? action.payload : t
        ),
      };

    case 'DELETE_TASK_OPTIMISTIC':
      return {
        ...state,
        tasks: state.tasks.filter((t) => t.id !== action.payload),
      };

    case 'TOGGLE_TASK_OPTIMISTIC':
      return {
        ...state,
        tasks: state.tasks.map((t) =>
          t.id === action.payload.id ? action.payload : t
        ),
      };

    case 'REVERT_ADD':
      return {
        ...state,
        tasks: state.tasks.filter((t) => t.id !== action.payload),
        error: 'فشل إضافة المهمة',
      };

    case 'REVERT_UPDATE':
      return {
        ...state,
        tasks: state.tasks.map((t) =>
          t.id === action.payload.id ? action.payload : t
        ),
        error: 'فشل تحديث المهمة',
      };

    case 'REVERT_DELETE':
      return {
        ...state,
        tasks: [...state.tasks, action.payload].sort(
          (a, b) => new Date(b.created_at).getTime() - new Date(a.created_at).getTime()
        ),
        error: 'فشل حذف المهمة',
      };

    case 'REVERT_TOGGLE':
      return {
        ...state,
        tasks: state.tasks.map((t) =>
          t.id === action.payload.id ? action.payload : t
        ),
        error: 'فشل تحديث حالة المهمة',
      };

    case 'SET_ERROR':
      return { ...state, error: action.payload };

    default:
      return state;
  }
}
