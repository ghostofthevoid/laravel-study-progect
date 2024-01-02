
import './bootstrap';
import { createApp } from 'vue';
import IndexComponent from "./components/IndexComponent.vue";
import router from "./router";


const app = createApp({});
app.component('index-component', IndexComponent);
app.use(router);
app.mount('#app');
