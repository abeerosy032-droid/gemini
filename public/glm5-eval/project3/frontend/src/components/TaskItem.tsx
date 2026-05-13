// components/TaskItem.tsx
import { useState } from 'react';
import type { Task } from '../types/task';

interface TaskItemProps {
  task: Task;
  onToggle: (id: number) => void;
  onDelete: (id: number) => void;
}

const priorityColors: Record<string, string> = {
  high: 'var(--color-danger)',
  medium: 'var(--color-warning)',
  low: 'var(--color-success)',
};

const statusLabels: Record<string, string> = {
  pending: 'قيد الانتظار',
  in_progress: 'قيد التنفيذ',
  done: 'مكتمل',
};

export default function TaskItem({ task, onToggle, onDelete }: TaskItemProps) {
  const [confirmDelete, setConfirmDelete] = useState(false);

  return (
    <div
      className={`task-item ${task.status === 'done' ? 'task-done' : ''}`}
      style={{
        display: 'flex',
        alignItems: 'center',
        gap: '12px',
        padding: '14px 18px',
        background: 'var(--color-surface)',
        borderRadius: '10px',
        border: '1px solid var(--color-border)',
        marginBottom: '8px',
        opacity: task.status === 'done' ? 0.65 : 1,
        transition: 'all 0.2s ease',
      }}
    >
      {/* Checkbox */}
      <button
        onClick={() => onToggle(task.id)}
        aria-label="Toggle task"
        style={{
          width: '24px',
          height: '24px',
          borderRadius: '50%',
          border: `2px solid ${task.status === 'done' ? 'var(--color-success)' : 'var(--color-border)'}`,
          background: task.status === 'done' ? 'var(--color-success)' : 'transparent',
          cursor: 'pointer',
          flexShrink: 0,
          display: 'flex',
          alignItems: 'center',
          justifyContent: 'center',
          color: '#fff',
          fontSize: '14px',
        }}
      >
        {task.status === 'done' ? '✓' : ''}
      </button>

      {/* Content */}
      <div style={{ flex: 1, minWidth: 0 }}>
        <div style={{ display: 'flex', alignItems: 'center', gap: '8px', marginBottom: '4px' }}>
          <span
            style={{
              textDecoration: task.status === 'done' ? 'line-through' : 'none',
              color: task.status === 'done' ? 'var(--color-text-muted)' : 'var(--color-text)',
              fontWeight: 500,
            }}
          >
            {task.title}
          </span>

          {/* Priority badge */}
          <span
            style={{
              fontSize: '11px',
              padding: '2px 8px',
              borderRadius: '12px',
              background: `${priorityColors[task.priority]}22`,
              color: priorityColors[task.priority],
              fontWeight: 600,
            }}
          >
            {task.priority}
          </span>

          {/* Status badge */}
          <span style={{ fontSize: '11px', color: 'var(--color-text-muted)' }}>
            {statusLabels[task.status]}
          </span>

          {/* Overdue indicator */}
          {task.is_overdue && (
            <span style={{ fontSize: '11px', color: 'var(--color-danger)' }}>
              ⚠️ متأخر
            </span>
          )}
        </div>

        {task.description && (
          <p style={{ fontSize: '13px', color: 'var(--color-text-muted)', margin: 0 }}>
            {task.description}
          </p>
        )}
      </div>

      {/* Due date */}
      {task.due_date && (
        <span style={{ fontSize: '12px', color: 'var(--color-text-muted)', whiteSpace: 'nowrap' }}>
          📅 {task.due_date}
        </span>
      )}

      {/* Delete button */}
      {confirmDelete ? (
        <div style={{ display: 'flex', gap: '6px' }}>
          <button
            onClick={() => onDelete(task.id)}
            className="btn-danger"
            style={{ fontSize: '12px', padding: '4px 12px' }}
          >
            تأكيد
          </button>
          <button
            onClick={() => setConfirmDelete(false)}
            style={{ fontSize: '12px', padding: '4px 12px', background: 'transparent', border: '1px solid var(--color-border)', color: 'var(--color-text-muted)', borderRadius: '6px', cursor: 'pointer' }}
          >
            إلغاء
          </button>
        </div>
      ) : (
        <button
          onClick={() => setConfirmDelete(true)}
          aria-label="Delete task"
          style={{
            background: 'none',
            border: 'none',
            color: 'var(--color-text-muted)',
            cursor: 'pointer',
            fontSize: '16px',
            padding: '4px',
          }}
        >
          🗑️
        </button>
      )}
    </div>
  );
}
