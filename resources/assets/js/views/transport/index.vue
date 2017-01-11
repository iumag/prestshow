<template>
    <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr>
                <td>{{props.item.id}}</td>
                <td>{{props.item.transport}}</td>
                <td><img :src="'/img/transport/' + props.item.picture"></td>
                <td>{{props.item.description}}</td>
                <td>{{props.item.cost}}</td>
                <td>{{props.item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/transport/' + props.item.id + '/edit'">
                        <span class="glyphicon glyphicon-edit"></span> Edit
                    </router-link>
                    <button class="edit-modal btn btn-danger" @click="deleteItem(props.item.id)">
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
        name: 'TransportIndex',
        data() {
            return {
                title: 'Transport',
                source: '/api/transport',
                create: '/transport/create',
                resource: 'transport',
                redirect: '/transport',
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: 'Transport', key: 'transport', sort: true},
                    {title: 'Picture', key: 'picture', sort: true},
                    {title: 'Description', key: 'description', sort: true},
                    {title: 'Cost', key: 'cost', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true},
                    {title: 'Actions', sort: false}
                ],
                filter: [
                    'id', 'transport', 'picture', 'description', 'cost'
                ]
            }
        },
        components: {
            DataViewer
        },
        watch: {
            '$route' : 'fetchData'
        },
        methods: {
            deleteItem(item){
                var vm = this
                vm.$router.push(vm.redirect)
                /*axios.delete(`/api/${this.resource}/${item}`)
                 .then(function (response) {
                 if (response.data.deleted) {

                 }
                 })
                 .catch(function (error) {
                 console.log(error)
                 })*/
            }
        }
    }
</script>