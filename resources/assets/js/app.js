import Vue from 'vue'
import App from './App.vue'
import router from './router.js'

const app = new Vue({
    el: '#root',
    components: {App},
    template: `<app></app>`,
    router
})

// const site = new Vue({
//     el: '#site',
//     components: {Site},
//     template: `<site></site>`
// })