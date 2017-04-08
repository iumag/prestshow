<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create" :title="title" :entity="entity">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td v-if="item.event">{{item.event.name}}</td>
                <td v-else></td>
                <td v-if="item.city">{{item.city.name}}</td>
                <td v-else></td>
                <td v-if="item.holiday">{{item.holiday.name}}</td>
                <td v-else></td>
                <td>{{item.cost}}</td>
                <td class="text-center">{{item.sort}}</td>
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
                    {title: localization.event, key: 'event', sort: false},
                    {title: localization.city, key: 'city', sort: false},
                    {title: localization.holiday, key: 'holiday', sort: false},
                    {title: localization.cost, key: 'cost', sort: true},
                    {title: localization.sort, key: 'sort', parent_column: 'events', sort: true},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    {entity_data: [
                        {value: 'city.name', name: 'City Name'},
                    ], show: false, entity: 'city'},
                    {entity_data: [
                        {value: 'holiday.name', name: 'Holiday Name'}
                    ], show: false, entity: 'holiday'},
                    {entity_data: [
                        {value: 'event.name', name: 'Event Name'}
                    ], show: false, entity: 'event'},
                ],
                entity: [
                    {name: 'city', show: false},
                    {name: 'holiday', show: false},
                    {name: 'event', show: false}
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