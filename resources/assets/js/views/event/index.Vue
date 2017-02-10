<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td><img width=100 height=100 :src="'/img/event/' + item.picture"></td>
                <td v-html="item.description"></td>
                <td>{{item.created_at}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/event/' + item.id + '/edit'">
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
        name: 'EventIndex',
        data() {
            var localization = language.data().language
            return {
                title: 'Events',
                source: '/api/event',
                create: '/event/create',
                resource: 'event',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: localization.event, key: 'name', sort: true},
                    {title: localization.picture, key: 'picture', sort: false},
                    {title: localization.description, key: 'description', sort: true},
                    {title: localization.created_at, key: 'created_at', sort: true},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    'id', 'name', 'picture', 'description'
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