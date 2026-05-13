// components/Toast.tsx
import { useEffect, useState } from 'react';

interface ToastProps {
  message: string;
  type: 'success' | 'error' | 'info';
  onClose: () => void;
}

export default function Toast({ message, type, onClose }: ToastProps) {
  const [visible, setVisible] = useState(true);

  useEffect(() => {
    const timer = setTimeout(() => {
      setVisible(false);
      setTimeout(onClose, 300); // wait for fade out
    }, 4000);
    return () => clearTimeout(timer);
  }, [onClose]);

  const bgColors = {
    success: 'var(--color-success)',
    error: 'var(--color-danger)',
    info: 'var(--color-primary)',
  };

  return (
    <div
      style={{
        position: 'fixed',
        bottom: '20px',
        left: '50%',
        transform: `translateX(-50%) translateY(${visible ? '0' : '20px'})`,
        background: bgColors[type],
        color: '#fff',
        padding: '12px 24px',
        borderRadius: '10px',
        fontSize: '14px',
        fontWeight: 500,
        boxShadow: '0 4px 20px rgba(0,0,0,0.3)',
        zIndex: 1000,
        opacity: visible ? 1 : 0,
        transition: 'all 0.3s ease',
      }}
    >
      {message}
    </div>
  );
}
