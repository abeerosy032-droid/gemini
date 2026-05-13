// components/TaskForm.tsx
import { useState, type FormEvent } from 'react';
import type { TaskFormData, TaskPriority, TaskStatus } from '../types/task';

interface TaskFormProps {
  onSubmit: (data: TaskFormData) => void;
}

export default function TaskForm({ onSubmit }: TaskFormProps) {
  const [title, setTitle] = useState('');
  const [description, setDescription] = useState('');
  const [priority, setPriority] = useState<TaskPriority>('medium');
  const [status, setStatus] = useState<TaskStatus>('pending');
  const [dueDate, setDueDate] = useState('');
  const [isExpanded, setIsExpanded] = useState(false);

  const handleSubmit = (e: FormEvent) => {
    e.preventDefault();
    if (!title.trim()) return;

    onSubmit({
      title: title.trim(),
      description: description.trim() || undefined,
      priority,
      status,
      due_date: dueDate || undefined,
    });

    // Reset form
    setTitle('');
    setDescription('');
    setPriority('medium');
    setStatus('pending');
    setDueDate('');
  };

  return (
    <form onSubmit={handleSubmit} style={{ marginBottom: '24px' }}>
      <div style={{
        background: 'var(--color-surface)',
        border: '1px solid var(--color-border)',
        borderRadius: '12px',
        padding: '16px',
      }}>
        {/* Quick add row */}
        <div style={{ display: 'flex', gap: '10px', alignItems: 'center' }}>
          <input
            type="text"
            value={title}
            onChange={(e) => setTitle(e.target.value)}
            placeholder="أضف مهمة جديدة..."
            style={{
              flex: 1,
              background: 'var(--color-bg)',
              border: '1px solid var(--color-border)',
              borderRadius: '8px',
              padding: '10px 14px',
              color: 'var(--color-text)',
              fontSize: '14px',
              outline: 'none',
            }}
          />
          <button
            type="button"
            onClick={() => setIsExpanded(!isExpanded)}
            style={{
              background: 'transparent',
              border: '1px solid var(--color-border)',
              borderRadius: '8px',
              padding: '10px',
              color: 'var(--color-text-muted)',
              cursor: 'pointer',
              fontSize: '18px',
            }}
          >
            {isExpanded ? '▲' : '▼'}
          </button>
          <button
            type="submit"
            disabled={!title.trim()}
            style={{
              background: title.trim() ? 'var(--color-primary)' : 'var(--color-border)',
              border: 'none',
              borderRadius: '8px',
              padding: '10px 20px',
              color: '#fff',
              cursor: title.trim() ? 'pointer' : 'not-allowed',
              fontSize: '14px',
              fontWeight: 600,
            }}
          >
            إضافة
          </button>
        </div>

        {/* Expanded form fields */}
        {isExpanded && (
          <div style={{ marginTop: '14px', display: 'flex', flexDirection: 'column', gap: '10px' }}>
            <textarea
              value={description}
              onChange={(e) => setDescription(e.target.value)}
              placeholder="وصف المهمة (اختياري)..."
              rows={2}
              style={{
                background: 'var(--color-bg)',
                border: '1px solid var(--color-border)',
                borderRadius: '8px',
                padding: '10px 14px',
                color: 'var(--color-text)',
                fontSize: '13px',
                resize: 'vertical',
                outline: 'none',
              }}
            />

            <div style={{ display: 'flex', gap: '10px', flexWrap: 'wrap' }}>
              <select
                value={priority}
                onChange={(e) => setPriority(e.target.value as TaskPriority)}
                style={{
                  background: 'var(--color-bg)',
                  border: '1px solid var(--color-border)',
                  borderRadius: '8px',
                  padding: '8px 12px',
                  color: 'var(--color-text)',
                  fontSize: '13px',
                }}
              >
                <option value="low">🟢 أولوية منخفضة</option>
                <option value="medium">🟡 أولوية متوسطة</option>
                <option value="high">🔴 أولوية عالية</option>
              </select>

              <select
                value={status}
                onChange={(e) => setStatus(e.target.value as TaskStatus)}
                style={{
                  background: 'var(--color-bg)',
                  border: '1px solid var(--color-border)',
                  borderRadius: '8px',
                  padding: '8px 12px',
                  color: 'var(--color-text)',
                  fontSize: '13px',
                }}
              >
                <option value="pending">قيد الانتظار</option>
                <option value="in_progress">قيد التنفيذ</option>
                <option value="done">مكتمل</option>
              </select>

              <input
                type="date"
                value={dueDate}
                onChange={(e) => setDueDate(e.target.value)}
                style={{
                  background: 'var(--color-bg)',
                  border: '1px solid var(--color-border)',
                  borderRadius: '8px',
                  padding: '8px 12px',
                  color: 'var(--color-text)',
                  fontSize: '13px',
                }}
              />
            </div>
          </div>
        )}
      </div>
    </form>
  );
}
