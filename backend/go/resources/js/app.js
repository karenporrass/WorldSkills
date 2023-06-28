// import './bootstrap';
import App from "./vue/App.vue"
import axios from 'axios'
import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'
import {routes} from './vue/routes/routes.js'

window.axios = axios

const router = createRouter({
    history: createWebHashHistory(),
    routes
})
const app = createApp(App)
app.config.globalProperties.axios = axios
app.use(router)
app.mount('#app')
