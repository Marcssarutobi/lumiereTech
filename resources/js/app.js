import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import router from './router/index'

if (!document.querySelector('base')) {
    const base = document.createElement('base');
    base.href = new URL('/', window.location.href).href;
    document.head.prepend(base);
}

const app = createApp(App);
app.use(router);
app.mount('#app');
