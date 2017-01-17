<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td>{{item.city.name}}</td>
                <td><img :src="'/img/hotel/' + item.picture"></td>
                <td>{{item.description}}</td>
                <td>{{item.cost}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/hotel/' + item.id + '/edit'">
                        <span class="glyphicon glyphicon-edit"></span> Edit
                    </router-link>
                    <button class="edit-modal btn btn-danger" @click="deleteItem(item.id,index);props.model.data.splice(index,1);props.model.total <= 10 ? showfooter = false : showfooter = true;">
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
        name: 'HotelIndex',
        data() {
            return {
                title: 'Hotel',
                source: '/api/hotel',
                create: '/hotel/create',
                resource: 'hotel',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: 'Hotel', key: 'name', sort: true},
                    {title: 'City', key: 'city', sort: true},
                    {title: 'Picture', key: 'picture', sort: false},
                    {title: 'Description', key: 'description', sort: true},
                    {title: 'Cost', key: 'cost', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true},
                    {title: 'Actions', sort: false}
                ],
                filter: [
                    'id', 'hotel', 'picture', 'description', 'cost',
                    'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost'
                ]
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