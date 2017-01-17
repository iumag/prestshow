<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title"><h3>{{model.FIO}}</h3></span>
                <div>
                    <button class="btn btn-danger btn-sm" @click="remove">Delete</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>FIO</label>
                        <p>{{model.FIO}}</p>
                        <label>Email</label>
                        <p>{{model.email}}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>Phone</label>
                        <p>{{model.phone}}</p>
                        <label>Message</label>
                        <pre>{{model.message}}</pre>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Entity</th>
                    <th>Name</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in model.items">
                    <td>{{item.entity_type}}</td>
                    <td>{{item.entity.name || event[0].name}}</td>
                    <td>{{item.entity.cost}}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="text-uppercase text-info" rowspan="2">
                    <td>
                        <h3>Sub Total<h3/>
                    </td>
                    <td colspan="2" class="text-right"><h3>{{subTotal}}</h3></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue'
    import axios from 'axios'
    export default {
        name: 'BasketShow',
        data(){
            return {
                model: {
                    customer: {},
                    items: []
                },
                event: '',
                resource: 'basket',
                redirect: '/'
            }
        },
        beforeMount() {
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        computed: {
            subTotal() {
                return this.model.items.reduce(function (carry, item) {
                    return carry + parseFloat(item.entity.cost)
                }, 0)
            }
        },
        methods: {
            remove(){
                var vm = this
                axios.delete(`/api/${this.resource}/${this.$route.params.id}`)
                    .then(function (response) {
                        if (response.data.deleted) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    })

            },
            fetchData() {
                var vm = this
                axios.get(`/api/${this.resource}/${this.$route.params.id}`)
                    .then(function (response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                        Vue.set(vm.$data, 'event', response.data.event)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>