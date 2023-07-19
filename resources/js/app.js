import './bootstrap';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

// import { createApp } from 'vue'
// import App from './App.vue'
// import './index.css'

// createApp(App).mount('#app')
window.Alpine = Alpine;

Alpine.plugin(collapse);

Alpine.start();
