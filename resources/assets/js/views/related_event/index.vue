<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.event.name}}</td>
                <td>{{item.city.name}}</td>
                <td v-if="item.holiday">{{item.holiday.name}}</td>
                <td v-else></td>
                <td>{{item.cost}}</td>
                <td>{{item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/related_event/' + item.id + '/edit'">
                        <span class="glyphicon glyphicon-edit"></span> {{localization.edit}}
                    </router-link>
                    <button class="edit-modal btn btn-danger" @click="deleteItem(item.id,index);props.model.data.splice(index,1);props.model.total <= 10 ? showfooter = false : showfooter = true;">
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
        name: 'Related_EventIndex',
        data() {
            var localization = language.data().language
            return {
                title: 'Related Event',
                source: '/api/related_event',
                create: '/related_event/create',
                resource: 'related_event',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: localization.event, key: 'event', sort: true},
                    {title: localization.city, key: 'city', sort: true},
                    {title: localization.holiday, key: 'holiday', sort: true},
                    {title: localization.cost, key: 'cost', sort: true},
                    {title: localization.created_at, key: 'created_at', sort: true},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    'id', 'city_id', 'event_id', 'cost', 'created_at',
                    'city.id', 'city.city', 'city.picture', 'city.description', 'city.cost', 'city.created_at',
                    'event.id', 'event.event', 'event.picture', 'event.description', 'event.created_at',
                    'holiday.id', 'holiday.name', 'holiday.picture', 'holiday.description', 'holiday.created_at'
                ],
                localization: localization
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