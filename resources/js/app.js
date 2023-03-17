import './bootstrap';

import {createApp} from 'vue'

import App from './pages/App.vue'

import router from './router.js'

import VCalendar from 'v-calendar';
import 'v-calendar/style.css';

createApp(App).use(router).use(VCalendar, {}).mount("#app")
