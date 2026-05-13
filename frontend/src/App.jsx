import { useState, useEffect } from 'react';
import { useTasks } from './hooks/useTasks';
import './index.css';

function App() {
  const [theme, setTheme] = useState(localStorage.getItem('theme') || 'light');
  const [newTaskTitle, setNewTaskTitle] = useState('');
  const [filters, setFilters] = useState({ status: '', priority: '' });
  
  const { 
    tasks, 
    loading, 
    error, 
    fetchTasks, 
    createTask, 
    toggleTaskStatus, 
    deleteTask 
  } = useTasks();

  useEffect(() => {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
  }, [theme]);

  useEffect(() => {
    fetchTasks(filters);
  }, [filters, fetchTasks]);

  const toggleTheme = () => {
    setTheme(prev => prev === 'light' ? 'dark' : 'light');
  };

  const handleCreateTask = (e) => {
    e.preventDefault();
    if (!newTaskTitle.trim()) return;
    
    createTask({ 
      title: newTaskTitle,
      priority: 'medium' 
    });
    setNewTaskTitle('');
  };

  const handleFilterChange = (e) => {
    const { name, value } = e.target;
    setFilters(prev => {
      const newFilters = { ...prev, [name]: value };
      // Clean up empty values
      if (!value) delete newFilters[name];
      return newFilters;
    });
  };

  return (
    <div className="container">
      <header className="header">
        <h1>Task Manager</h1>
        <button onClick={toggleTheme} className="theme-toggle">
          {theme === 'light' ? '🌙 Dark Mode' : '☀️ Light Mode'}
        </button>
      </header>

      {error && <div className="toast toast-error" style={{ position: 'relative', marginBottom: '1rem' }}>{error}</div>}

      <form onSubmit={handleCreateTask} className="task-form">
        <input 
          type="text" 
          value={newTaskTitle}
          onChange={(e) => setNewTaskTitle(e.target.value)}
          placeholder="What needs to be done?" 
          className="task-input"
        />
        <button type="submit" className="btn-primary" disabled={!newTaskTitle.trim()}>
          Add Task
        </button>
      </form>

      <div className="filters">
        <select name="status" onChange={handleFilterChange} className="filter-select" value={filters.status || ''}>
          <option value="">All Statuses</option>
          <option value="todo">To Do</option>
          <option value="in_progress">In Progress</option>
          <option value="done">Done</option>
        </select>
        
        <select name="priority" onChange={handleFilterChange} className="filter-select" value={filters.priority || ''}>
          <option value="">All Priorities</option>
          <option value="high">High Priority</option>
          <option value="medium">Medium Priority</option>
          <option value="low">Low Priority</option>
        </select>
      </div>

      {loading && tasks.length === 0 ? (
        <div className="loading">Loading tasks...</div>
      ) : tasks.length === 0 ? (
        <div className="empty-state">
          No tasks found. Create one above!
        </div>
      ) : (
        <div className="task-list">
          {tasks.map(task => (
            <div key={task.id || task.tempId} className={`task-item ${task.status === 'done' ? 'done' : ''}`}>
              <input 
                type="checkbox" 
                checked={task.status === 'done'}
                onChange={() => toggleTaskStatus(task.id)}
                style={{ width: '1.5rem', height: '1.5rem', cursor: 'pointer' }}
              />
              <div className="task-content">
                <h3 className="task-title">{task.title}</h3>
                <div className="task-meta">
                  <span>Priority: {task.priority}</span>
                  {task.due_date && <span>Due: {task.due_date}</span>}
                </div>
              </div>
              <button onClick={() => deleteTask(task.id)} className="btn-danger">
                Delete
              </button>
            </div>
          ))}
        </div>
      )}
    </div>
  );
}

export default App;