import Vue from 'vue'
import Site from './Site.vue'


const site = new Vue({
    el: '#site',
    components: {Site},
    template: `<site></site>`
})

document.addEventListener('DOMContentLoaded', function () {
   site.$mount('#site')
})