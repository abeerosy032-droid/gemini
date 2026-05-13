// App.tsx — Main application component
import { useState } from 'react';
import { useTasks } from './hooks/useTasks';
import TaskForm from './components/TaskForm';
import TaskItem from './components/TaskItem';
import TaskFilters from './components/TaskFilters';
import Toast from './components/Toast';
import DarkModeToggle from './components/DarkModeToggle';
import type { TaskFormData, TaskFilters as Filters } from './types/task';

export default function App() {
  const { tasks, meta, loading, error, fetchTasks, createTask, deleteTask, toggleTask, clearError } = useTasks();
  const [toast, setToast] = useState<{ message: string; type: 'success' | 'error' | 'info' } | null>(null);

  const handleCreate = async (data: TaskFormData) => {
    await createTask(data);
    setToast({ message: '✅ تم إضافة المهمة', type: 'success' });
  };

  const handleDelete = async (id: number) => {
    await deleteTask(id);
    setToast({ message: '🗑️ تم حذف المهمة', type: 'info' });
  };

  const handleToggle = async (id: number) => {
    await toggleTask(id);
  };

  const handleFilter = (filters: Filters) => {
    fetchTasks(filters);
  };

  return (
    <div style={{ maxWidth: '700px', margin: '0 auto', padding: '20px', minHeight: '100vh' }}>
      {/* Header */}
      <header style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '24px' }}>
        <div>
          <h1 style={{ fontSize: '24px', fontWeight: 700, color: 'var(--color-text)', margin: 0 }}>
            📋 إدارة المهام
          </h1>
          <p style={{ fontSize: '13px', color: 'var(--color-text-muted)', margin: '4px 0 0' }}>
            {meta ? `${meta.total} مهمة` : 'جاري التحميل...'}
          </p>
        </div>
        <DarkModeToggle />
      </header>

      {/* Error banner */}
      {error && (
        <div style={{
          background: 'var(--color-danger)22',
          border: '1px solid var(--color-danger)',
          borderRadius: '10px',
          padding: '12px 16px',
          marginBottom: '16px',
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center',
        }}>
          <span style={{ color: 'var(--color-danger)', fontSize: '14px' }}>{error}</span>
          <button onClick={clearError} style={{ background: 'none', border: 'none', color: 'var(--color-danger)', cursor: 'pointer' }}>✕</button>
        </div>
      )}

      {/* Add form */}
      <TaskForm onSubmit={handleCreate} />

      {/* Filters */}
      <TaskFilters onFilter={handleFilter} />

      {/* Loading state */}
      {loading && (
        <div style={{ textAlign: 'center', padding: '40px', color: 'var(--color-text-muted)' }}>
          <div className="spinner" style={{ fontSize: '24px' }}>⏳</div>
          <p>جاري تحميل المهام...</p>
        </div>
      )}

      {/* Empty state */}
      {!loading && tasks.length === 0 && (
        <div style={{ textAlign: 'center', padding: '60px 20px', color: 'var(--color-text-muted)' }}>
          <div style={{ fontSize: '48px', marginBottom: '12px' }}>📭</div>
          <p style={{ fontSize: '16px', marginBottom: '6px' }}>لا توجد مهام بعد</p>
          <p style={{ fontSize: '13px' }}>أضف مهمتك الأولى من الحقل أعلاه</p>
        </div>
      )}

      {/* Task list */}
      {!loading && tasks.map((task) => (
        <TaskItem
          key={task.id}
          task={task}
          onToggle={handleToggle}
          onDelete={handleDelete}
        />
      ))}

      {/* Pagination */}
      {meta && meta.total_pages > 1 && (
        <div style={{ display: 'flex', justifyContent: 'center', gap: '8px', marginTop: '20px' }}>
          <button
            disabled={meta.current_page <= 1}
            onClick={() => fetchTasks({ page: meta.current_page - 1 })}
            style={{ padding: '8px 16px', borderRadius: '8px', border: '1px solid var(--color-border)', background: 'var(--color-surface)', color: 'var(--color-text)', cursor: meta.current_page > 1 ? 'pointer' : 'not-allowed' }}
          >
            السابق
          </button>
          <span style={{ padding: '8px 16px', color: 'var(--color-text-muted)', fontSize: '14px' }}>
            {meta.current_page} / {meta.total_pages}
          </span>
          <button
            disabled={meta.current_page >= meta.total_pages}
            onClick={() => fetchTasks({ page: meta.current_page + 1 })}
            style={{ padding: '8px 16px', borderRadius: '8px', border: '1px solid var(--color-border)', background: 'var(--color-surface)', color: 'var(--color-text)', cursor: meta.current_page < meta.total_pages ? 'pointer' : 'not-allowed' }}
          >
            التالي
          </button>
        </div>
      )}

      {/* Toast notifications */}
      {toast && (
        <Toast message={toast.message} type={toast.type} onClose={() => setToast(null)} />
      )}
    </div>
  );
}
