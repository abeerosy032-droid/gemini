// types/task.ts
export type TaskStatus = 'pending' | 'in_progress' | 'done';
export type TaskPriority = 'low' | 'medium' | 'high';

export interface Task {
  id: number;
  title: string;
  description: string | null;
  status: TaskStatus;
  priority: TaskPriority;
  due_date: string | null;
  is_overdue: boolean;
  created_at: string;
  updated_at: string;
}

export interface TaskFormData {
  title: string;
  description?: string;
  status?: TaskStatus;
  priority?: TaskPriority;
  due_date?: string;
}

export interface TasksResponse {
  data: Task[];
  meta: {
    total: number;
    count: number;
    per_page: number;
    current_page: number;
    total_pages: number;
  };
  links: Record<string, string | null>;
  filters: Record<string, string | null>;
}

export interface TaskFilters {
  status?: string;
  priority?: string;
  due?: string;
  search?: string;
  page?: number;
  per_page?: number;
}
