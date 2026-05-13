// components/TaskFilters.tsx
import { useState } from 'react';
import type { TaskFilters as Filters } from '../types/task';

interface TaskFiltersProps {
  onFilter: (filters: Filters) => void;
}

export default function TaskFilters({ onFilter }: TaskFiltersProps) {
  const [status, setStatus] = useState('');
  const [priority, setPriority] = useState('');
  const [due, setDue] = useState('');
  const [search, setSearch] = useState('');

  const applyFilters = () => {
    onFilter({
      status: status || undefined,
      priority: priority || undefined,
      due: due || undefined,
      search: search || undefined,
    });
  };

  const clearFilters = () => {
    setStatus('');
    setPriority('');
    setDue('');
    setSearch('');
    onFilter({});
  };

  return (
    <div style={{
      background: 'var(--color-surface)',
      border: '1px solid var(--color-border)',
      borderRadius: '12px',
      padding: '14px 16px',
      marginBottom: '16px',
    }}>
      <div style={{ display: 'flex', gap: '8px', flexWrap: 'wrap', alignItems: 'center' }}>
        {/* Search */}
        <input
          type="text"
          value={search}
          onChange={(e) => setSearch(e.target.value)}
          placeholder="🔍 بحث..."
          onKeyDown={(e) => e.key === 'Enter' && applyFilters()}
          style={{
            flex: '1 1 200px',
            background: 'var(--color-bg)',
            border: '1px solid var(--color-border)',
            borderRadius: '8px',
            padding: '8px 12px',
            color: 'var(--color-text)',
            fontSize: '13px',
            outline: 'none',
          }}
        />

        {/* Status filter */}
        <select
          value={status}
          onChange={(e) => setStatus(e.target.value)}
          style={{
            background: 'var(--color-bg)',
            border: '1px solid var(--color-border)',
            borderRadius: '8px',
            padding: '8px 12px',
            color: 'var(--color-text)',
            fontSize: '13px',
          }}
        >
          <option value="">كل الحالات</option>
          <option value="pending">قيد الانتظار</option>
          <option value="in_progress">قيد التنفيذ</option>
          <option value="done">مكتمل</option>
        </select>

        {/* Priority filter */}
        <select
          value={priority}
          onChange={(e) => setPriority(e.target.value)}
          style={{
            background: 'var(--color-bg)',
            border: '1px solid var(--color-border)',
            borderRadius: '8px',
            padding: '8px 12px',
            color: 'var(--color-text)',
            fontSize: '13px',
          }}
        >
          <option value="">كل الأولويات</option>
          <option value="high">عالية</option>
          <option value="medium">متوسطة</option>
          <option value="low">منخفضة</option>
        </select>

        {/* Due filter */}
        <select
          value={due}
          onChange={(e) => setDue(e.target.value)}
          style={{
            background: 'var(--color-bg)',
            border: '1px solid var(--color-border)',
            borderRadius: '8px',
            padding: '8px 12px',
            color: 'var(--color-text)',
            fontSize: '13px',
          }}
        >
          <option value="">كل التواريخ</option>
          <option value="today">اليوم</option>
          <option value="week">هذا الأسبوع</option>
          <option value="overdue">متأخرة</option>
        </select>

        <button onClick={applyFilters} className="btn-primary" style={{ fontSize: '13px', padding: '8px 16px' }}>
          تطبيق
        </button>

        <button
          onClick={clearFilters}
          style={{
            background: 'transparent',
            border: '1px solid var(--color-border)',
            borderRadius: '8px',
            padding: '8px 12px',
            color: 'var(--color-text-muted)',
            cursor: 'pointer',
            fontSize: '13px',
          }}
        >
          مسح
        </button>
      </div>
    </div>
  );
}
