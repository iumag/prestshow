<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.event.event}}</td>
                <td>{{item.city.city}}</td>
                <td>{{item.cost}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/related_event/' + item.id + '/edit'">
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
        name: 'Related_EventIndex',
        data() {
            return {
                title: 'Related Event',
                source: '/api/related_event',
                create: '/related_event/create',
                resource: 'related_event',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: 'Event', key: 'event', sort: true},
                    {title: 'City', key: 'city', sort: true},
                    {title: 'Cost', key: 'cost', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true},
                    {title: 'Actions', sort: false}
                ],
                filter: [
                    'id', 'city_id', 'event_id', 'cost', 'created_at',
                    'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost', 'city.created_at',
                    'event.id', 'event.event', 'event.picture', 'event.description', 'event.created_at'
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