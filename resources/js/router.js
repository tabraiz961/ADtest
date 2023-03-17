import { createWebHistory, createRouter } from 'vue-router';
import Home from './pages/App.vue';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import Dashboard from './pages/Dashboard.vue';
// import login from './pages/login.vue';
// import dashboard from './pages/dashboard.vue';

const routes = [
    {
        path : '/',
        name : 'Home',
        component : Home
    },
    {
        path : '/login',
        name : 'Login',
        component : Login,
    },
    {
        path : '/register',
        name : 'Register',
        component : Register
    },
    {
        path : '/dashboard',
        name : 'Dashboard',
        component : Dashboard,
        meta:{
            requiresAuth:true
        }
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;
