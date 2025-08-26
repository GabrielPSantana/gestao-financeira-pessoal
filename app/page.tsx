'use client';

import { useEffect, useState } from 'react';

export default function Home() {
  const [darkMode, setDarkMode] = useState(false);

  // Ao montar, verifica se o tema está salvo e aplica
  useEffect(() => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
      document.documentElement.classList.add('dark');
      setDarkMode(true);
    }
  }, []);

  const toggleDarkMode = () => {
    const html = document.documentElement;
    if (html.classList.contains('dark')) {
      html.classList.remove('dark');
      localStorage.setItem('theme', 'light');
      setDarkMode(false);
    } else {
      html.classList.add('dark');
      localStorage.setItem('theme', 'dark');
      setDarkMode(true);
    }
  };

  return (
    <main className="flex flex-col items-center justify-center min-h-screen bg-[var(--background)] text-[var(--text)] transition-colors duration-300">
      <button
        onClick={toggleDarkMode}
        className="flex px-6 py-4 rounded border border-gray-400 bg-gray-200 text-gray-800 dark:bg-[var(--background)] dark:text-[var(--text)]"
      >
        {darkMode ? '🌞 Modo Claro' : '🌙 Modo Escuro'}
      </button>

      <h1 className="text-3xl font-bold">Projeto iniciado</h1>
    </main>
  );
}
