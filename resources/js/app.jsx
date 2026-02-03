import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './eaip/App.jsx';

console.log('🚀 app.jsx loaded');

const rootElement = document.getElementById('eaip-root');
console.log('📍 Root element:', rootElement);

if (rootElement) {
    console.log('✅ Mounting React app...');
    createRoot(rootElement).render(
        <React.StrictMode>
            <App />
        </React.StrictMode>
    );
    console.log('✅ React app mounted');
} else {
    console.error('❌ Root element #eaip-root not found!');
}
