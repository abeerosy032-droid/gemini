// components/DarkModeToggle.tsx
import { useState, useEffect } from 'react';

export default function DarkModeToggle() {
  const [dark, setDark] = useState(() => {
    const saved = localStorage.getItem('darkMode');
    return saved !== null ? saved === 'true' : true; // default dark
  });

  useEffect(() => {
    localStorage.setItem('darkMode', String(dark));
    document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light');
  }, [dark]);

  return (
    <button
      onClick={() => setDark(!dark)}
      aria-label="Toggle dark mode"
      style={{
        background: 'var(--color-surface)',
        border: '1px solid var(--color-border)',
        borderRadius: '50%',
        width: '38px',
        height: '38px',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        cursor: 'pointer',
        fontSize: '18px',
        transition: 'all 0.3s',
      }}
    >
      {dark ? '☀️' : '🌙'}
    </button>
  );
}
