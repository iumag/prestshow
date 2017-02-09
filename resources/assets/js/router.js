import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/event', component: require('./views/event/index.vue')},
        {path: '/event/create', component: require('./views/event/form.vue')},
        {path: '/event/:id/edit', component: require('./views/event/form.vue'), meta: {mode: 'edit'}},
        {path: '/holiday', component: require('./views/holiday/index.vue')},
        {path: '/holiday/create', component: require('./views/holiday/form.vue')},
        {path: '/holiday/:id/edit', component: require('./views/holiday/form.vue'), meta: {mode: 'edit'}},
        {path: '/city', component: require('./views/city/index.vue')},
        {path: '/city/create', component: require('./views/city/form.vue')},
        {path: '/city/:id/edit', component: require('./views/city/form.vue'), meta: {mode: 'edit'}},
        {path: '/transport', component: require('./views/transport/index.vue')},
        {path: '/transport/create', component: require('./views/transport/form.vue')},
        {path: '/transport/:id/edit', component: require('./views/transport/form.vue'), meta: {mode: 'edit'}},
        {path: '/photographer', component: require('./views/photographer/index.vue')},
        {path: '/photographer/create', component: require('./views/photographer/form.vue')},
        {path: '/photographer/:id/edit', component: require('./views/photographer/form.vue'), meta: {mode: 'edit'}},
        {path: '/hotel', component: require('./views/hotel/index.vue')},
        {path: '/hotel/create', component: require('./views/hotel/form.vue')},
        {path: '/hotel/:id/edit', component: require('./views/hotel/form.vue'), meta: {mode: 'edit'}},
        {path: '/related_event', component: require('./views/related_event/index.vue')},
        {path: '/related_event/create', component: require('./views/related_event/form.vue')},
        {path: '/related_event/create_all', component: require('./views/related_event/form2.vue')},
        {path: '/related_event/:id/edit', component: require('./views/related_event/form.vue'), meta: {mode: 'edit'}},
        {path: '/', component: require('./views/basket/index.vue')},
        {path: '/basket/:id', component: require('./views/basket/show.vue')},
    ]
})

export default router