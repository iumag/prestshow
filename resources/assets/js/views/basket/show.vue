<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title"><h3>{{model.FIO}}</h3></span>
                <div>
                    <button class="btn btn-danger btn-sm" @click="remove">{{localization.delete}}</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label>{{localization.basket_FIO}}</label>
                        <p>{{model.FIO}}</p>
                        <label>{{localization.basket_email}}</label>
                        <p>{{model.email}}</p>
                    </div>
                    <div class="col-sm-6">
                        <label>{{localization.basket_phone}}</label>
                        <p>{{model.phone}}</p>
                        <label>{{localization.basket_message}}</label>
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
                <tr v-for="item in model.items" v-if="item.entity_type!='related_event'">
                    <td>{{enitity_type[item.entity_type]}}</td>
                    <td>{{item.entity.name}}</td>
                    <td>{{item.entity.cost}}</td>
                </tr>
                <tr v-for="item in event.items" v-if="item.entity">
                    <td>{{enitity_type[item.entity_type]}}</td>
                    <td>{{item.entity.event.name}}</td>
                    <td>{{item.entity.cost}}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr class="text-uppercase text-info" rowspan="2">
                    <td>
                        <h3>{{localization.sub_total}}</h3>
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
    import language from '../../language'

    export default {
        name: 'BasketShow',
        data() {
            var localization = language.data().language
            var enitity_type = {
                'city' : 'Miasto',
                'holiday' :  'Uroczystość',
                'hotel' :  'Hotel',
                'related_event' :  'Atrakcje',
                'transport' : 'Transport',
                'photographer' : 'Photographer',
            }
            return {
                model: {
                    customer: {},
                    items: []
                },
                event: '',
                resource: 'basket',
                redirect: '/',
                index: -1,
                localization: localization,
                enitity_type: enitity_type
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
                    if (item.entity) {
                        return carry + parseFloat(item.entity.cost)
                    } else {
                        return carry + 0
                    }
                }, 0)
            }
        },
        methods: {
            remove() {
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
            },
            AddIndex() {
                if (this.event.length - 1 > this.index) {
                    this.index += 1
                    return this.index
                }
            }
        }
    }
</script>