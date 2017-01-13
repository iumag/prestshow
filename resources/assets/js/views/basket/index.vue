<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create"
                 :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.FIO}}</td>
                <td>{{item.email}}</td>
                <td>{{item.phone}}</td>
                <td>{{item.message}}</td>
                <td>{{props.cost[index]}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/basket/' + item.id">
                        <span class="glyphicon glyphicon-edit"></span> Show
                    </router-link>
                    <button class="edit-modal btn btn-danger"
                            @click="deleteItem(item.id,index);props.model.data.splice(index,1);props.model.total <= 10 ? showfooter = false : showfooter = true;">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </button>
                </td>
            </tr>
        </template>
    </data-viewer>
</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'
    import axios from 'axios'
    export default {
        name: 'CityIndex',
        data() {
            return {
                title: 'Basket',
                source: '/api/basket',
                create: '/basket/create',
                resource: 'basket',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: 'FIO', key: 'FIO', sort: true},
                    {title: 'Email', key: 'email', sort: false},
                    {title: 'Phone', key: 'message', sort: true},
                    {title: 'Message', key: 'message', sort: true},
                    {title: 'Cost', key: 'cost', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true},
                    {title: 'Actions', sort: false}
                ],
                filter: [
                    'id', 'fio', 'email', 'phone', 'message', 'cost',
                    'basket_item.id', 'basket_item.basket_id', 'basket_item.entity_type', 'basket_item.entity_id'
                ]
            }
        },
        computed: {
            cost() {

            }
        },
        components: {
            DataViewer
        },
        methods: {
            deleteItem(item){
                var vm = this
                axios.delete(`/api/${this.resource}/${item}`)
                    .then(function (response) {
                        if (response.data.deleted) {

                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>