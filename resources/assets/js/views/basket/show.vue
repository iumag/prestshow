<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="panel-title">{{model.title}}</span>
            <div>
                <button class="btn btn-danger btn-sm" @click="remove">Delete</button>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4">
                    <label>FIO</label>
                    <p>{{model.FIO}}</p>
                    <label>Email</label>
                    <p>{{model.email}}</p>
                    <label>Phone</label>
                    <p>{{model.phone}}</p>
                    <label>Message</label>
                    <pre>{{model.message}}</pre>
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
                    <td>{{item.entity.name}}</td>
                    <td>{{item.entity.cost}}</td>
                </tr>
                </tbody>
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
                resource: 'basket',
                redirect: '/basket'
            }
        },
        beforeMount() {
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
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
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>