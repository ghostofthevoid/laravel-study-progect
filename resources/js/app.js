
import './bootstrap';
import { createApp } from 'vue';
import PostComponent from './components/PostComponent.vue';

const app = createApp({});
app.component('post-component',PostComponent)
app.mount('#app');
