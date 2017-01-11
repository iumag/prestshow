import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/event', component: require('./views/event/index.vue')},
        {path: '/event/create', component: require('./views/event/form.vue')},
        {path: '/event/:id/edit', component: require('./views/event/form.vue'), meta: {mode: 'edit'}},
        {path: '/city', component: require('./views/city/index.vue')},
        {path: '/city/create', component: require('./views/city/form.vue')},
        {path: '/city/:id/edit', component: require('./views/city/form.vue'), meta: {mode: 'edit'}},
        {path: '/transport', component: require('./views/transport/index.vue')},
        {path: '/transport/create', component: require('./views/transport/form.vue')},
        {path: '/transport/:id/edit', component: require('./views/transport/form.vue'), meta: {mode: 'edit'}},
        {path: '/photographer', component: require('./views/photographer/index.vue')},
        {path: '/photographer/create', component: require('./views/photographer/form.vue')},
        {path: '/photographer/:id/edit', component: require('./views/photographer/form.vue'), meta: {mode: 'edit'}}
    ]
})

export default router