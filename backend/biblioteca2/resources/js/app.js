import App from "./vue/App.vue";
import {createApp} from 'vue';
import {createRouter, createWebHashHistory} from 'vue-router'
import {routes} from "./vue/routes/routes.js"

const router = createRouter({
    history: createWebHashHistory(),
    routes
})

const app = createApp(App)
app.use(router)
app.mount("#app")
