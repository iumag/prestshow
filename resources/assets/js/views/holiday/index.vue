<template>
    <data-viewer :showfooter="showfooter" :source="source" :thead="thead" :filter="filter" :create="create"
                 :title="title">
        <template scope="props">
            <tr v-for="(item,index) in props.model.data">
                <td>{{item.id}}</td>
                <td>{{item.name}}</td>
                <td><img :src="'/img/holiday/' + item.picture"></td>
                <td style="height: 100px;
    display: block;
    overflow: hidden;width: 388px;" v-html="item.description"></td>
                <td>{{item.cost}}</td>
                <td class="text-center">{{item.pictures.length}}</td>
                <td v-html="isVideo(item)" class="text-center"></td>
                <td class="text-center">{{item.sort}}</td>
                <td>
                    <router-link class="edit-modal btn btn-success" :to="'/holiday/' + item.id + '/edit'">
                        <span class="glyphicon glyphicon-edit"></span> {{localization.edit}}
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
        name: 'HolidayIndex',
        data() {
            var localization = language.data().language
            return {
                title: 'Holiday',
                source: '/api/holiday',
                create: '/holiday/create',
                resource: 'holiday',
                showfooter: true,
                thead: [
                    {title: 'Id', key: 'id', sort: true},
                    {title: localization.holiday, key: 'name', sort: false},
                    {title: localization.picture, key: 'picture', sort: false},
                    {title: localization.description, key: 'description', sort: false},
                    {title: localization.cost, key: 'cost', sort: true},
                    {title: localization.count_pictures, key: 'pictures', parent_column: 'events', sort: false},
                    {title: localization.video, key: 'video', parent_column: 'events', sort: false},
                    {title: localization.sort, key: 'sort', parent_column: 'events', sort: true},
                    {title: localization.actions, sort: false}
                ],
                filter: [
                    'id', 'name', 'picture', 'cost'
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
                    })
            }
        }
    }
</script>