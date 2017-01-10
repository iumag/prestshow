import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/event', component: require('./views/event/index.vue')}
    ]
})

export default router