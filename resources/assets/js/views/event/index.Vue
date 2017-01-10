<template>
    <data-viewer :source="source" :thead="thead" :filter="filter" :create="create" :title="title">
        <template scope="props">
            <tr @click="$router.push('/customer/' + props.item.id)">
                <td>{{props.item.id}}</td>
                <td>{{props.item.event}}</td>
                <td>{{props.item.picture}}</td>
                <td>{{props.item.description}}</td>
                <td>{{props.item.cost}}</td>
                <td>{{props.item.created_at}}</td>
            </tr>
        </template>
    </data-viewer>
</template>
<script>
    import DataViewer from '../../components/DataViewer.vue'
    export default {
        name: 'EventIndex',
        data() {
            return {
                title: 'Events',
                source: '/api/event',
                create: '/event/create',
                thead: [
                    {title: 'ID', key: 'id', sort: true},
                    {title: 'Event', key: 'event', sort: true},
                    {title: 'Picture', key: 'picture', sort: true},
                    {title: 'Description', key: 'description', sort: true},
                    {title: 'Cost', key: 'cost', sort: true},
                    {title: 'Created At', key: 'created_at', sort: true}
                ],
                filter: [
                    'id', 'event', 'picture', 'description', 'cost'
                ]
            }
        },
        components: {
            DataViewer
        }
    }
</script>