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
                        <span class="glyphicon glyphicon-edit"></span> {{localization.show}}
                    </router-link>
                    <button class="edit-modal btn btn-danger"
                            @click="deleteItem(item.id,index, props.model.data); props.model.total <= 10 ? showfooter = false : showfooter = true">
                        <span class="glyphicon glyphicon-trash"></span> {{localization.delete}}
                    </button>
                </td>
            </tr>
        </template>
    </data-viewer>
</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'
    import axios from 'axios'
    import language from '../../language'
    export default {
        name: 'CityIndex',
        data() {
            var localization = language.data().language
            return {
                title: 'Basket',
                source: '/api/basket',
                create: '/basket/create',
                resource: 'basket',
                showfooter: true,
                thead: [
                    {title: 'id', key: 'id', sort: true},
                    {title: localization.basket_FIO, key: 'FIO', sort: true},
                    {title: localization.basket_email, key: 'email', sort: false},
                    {title: localization.basket_phone, key: 'message', sort: true},
                    {title: localization.basket_message, key: 'message', sort: true},
                    {title: localization.cost, key: 'cost', sort: true},
                    {title: localization.created_at, key: 'created_at', sort: true},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    'id', 'fio', 'email', 'phone', 'message', 'cost',
                    'basket_item.id', 'basket_item.basket_id', 'basket_item.entity_type', 'basket_item.entity_id'
                ],
                localization: localization
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
            deleteItem(item, index, modal){
                var isConfirm = confirm('Are you sure?');
                if (!isConfirm) return false;
                var vm = this
                axios.delete(`/api/${this.resource}/${item}`)
                    .then(function (response) {
                        if (response.data.deleted) {
                            modal.splice(index,1)
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                        return false
                    })

            }
        }
    }
</script>