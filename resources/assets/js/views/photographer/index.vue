<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create"
                 :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td><img width=100 height=100 :src="'/img/photographer/' + item.picture"></td>
                <td style="height: 100px;
    display: block;
    overflow: hidden;" v-html="item.description"></td>
                <td>{{item.cost}}</td>
                <td>{{item.created_at}}</td>
                <td class="text-center">{{item.pictures.length}}</td>
                <td v-html="isVideo(item)" class="text-center"></td>
                <td class="text-center">{{item.sort}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/photographer/' + item.id + '/edit'">
                        <span class="glyphicon glyphicon-edit"></span> {{localization.edit}}
                    </router-link>
                    <button class="edit-modal btn btn-danger"
                            @click="deleteItem(item.id,index);props.model.data.splice(index,1);props.model.total <= 10 ? showfooter = false : showfooter = true;">
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
        name: 'PhotographerIndex',
        data() {
            var localization = language.data().language
            return {
                title: 'Photographer',
                source: '/api/photographer',
                create: '/photographer/create',
                resource: 'photographer',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: localization.photographer, key: 'name', sort: true},
                    {title: localization.picture, key: 'picture', sort: false},
                    {title: localization.description, key: 'description', sort: true},
                    {title: localization.cost, key: 'cost', sort: true},
                    {title: localization.created_at, key: 'created_at', sort: true},
                    {title: localization.count_pictures, key: 'pictures', parent_column: 'events', sort: false},
                    {title: localization.video, key: 'video', parent_column: 'events', sort: false},
                    {title: localization.sort, key: 'sort', parent_column: 'events', sort: false},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    'id', 'name', 'picture', 'description', 'cost'
                ],
                localization: localization
            }
        },
        components: {
            DataViewer
        },
        methods: {
            isVideo(item){
                if (item.video) {
                    return `<span class="glyphicon success glyphicon-ok text-success"></span>`
                } else {
                    return `<span class="glyphicon glyphicon-remove text-danger"></span>`
                }
            },
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