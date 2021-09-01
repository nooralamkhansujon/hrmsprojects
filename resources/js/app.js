require('./bootstrap');


import {createApp}  from 'vue';
import VueFeather from 'vue-feather';
import Master from './layout/Master.vue';
import router from './router/index';
import store from './store/index.js';
import 'alga-css/dist/alga.min.css'
// import 'alga-css/dist/alga-animate.min.css'

const app = createApp(Master);
app.component(VueFeather.name, VueFeather);
app.use(store);
app.use(router);
app.mount('#app');

