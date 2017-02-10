<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{title}}
            </div>
            <div class="panel-body">
                <form class="form" id="form_data" @submit.prevent="save">
                    <input type="hidden" name="_method" value="put" v-if = "title === 'Edit'" />
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.transport}}</label>
                                <input type="text" name="name" class="form-control" v-model="form.name">
                                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.cost}}</label>
                                <input type="text" name="cost" class="form-control" v-model="form.cost">
                                <small class="text-danger" v-if="errors.cost">{{errors.cost[0]}}</small>
                            </div>
                        </div>
                        <load-image></load-image>
                        <small class="text-danger" v-if="errors.picture">{{errors.picture[0]}}</small>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{localization.description}}</label>
                                <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                                <ckeditor v-model="form.description" name="description" :height="'300px'"
                                          :toolbar="[['Format']]"></ckeditor>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">{{localization.save}}</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    import LoadImage from '../../components/LoadImage.vue'
    import Ckeditor from '../../components/ckeditor.vue'
    import language from '../../language'
    export default{
        name: 'EventForm',
        data() {
            var localization = language.data().language
            return {
                form: {},
                errors: {},
                option: {},
                title: 'Create',
                initialize: '/api/transport/create',
                redirect: '/transport',
                store: '/api/transport',
                method: 'post',
                localization: localization
            }
        },
        beforeMount() {
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/transport/' + this.$route.params.id + '/edit'
                this.store = '/api/transport/' + this.$route.params.id
            }
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            fetchData() {
                var vm = this
                axios.get(this.initialize)
                    .then(function (response) {
                        Vue.set(vm.$data, 'form', response.data.form)
                        Vue.set(vm.$data, 'option', response.data.option)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            save() {
                var vm = this
                var form = document.querySelector('#form_data');
                var formdata = new FormData(form)
                axios[this.method](this.store, formdata)
                    .then(function (response) {
                        if (response.data.saved) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function (error) {
                        Vue.set(vm.$data, 'errors', error.response.data)
                    })
            }
        },
        components: {LoadImage, Ckeditor}
    }
</script>