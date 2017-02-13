<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{title}}
            </div>
            <div class="panel-body">
                <form class="form" id="form_data" @submit.prevent="save">
                    <input type="hidden" name="_method" value="put" v-if="title === 'Edit'"/>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.event}}</label>
                                <input type="text" name="name" class="form-control" v-model="form.name">
                                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
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
                    <div class="row" id="test">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label class="control-label">{{localization.picture}}</label>
                                <input name="input4[]" type="file" class="input-4 file-loading" data-show-preview="false">

                            </div>
                        </div>
                        <div class="col-sm-1" style="margin-top: 26px">
                            <div class="form-group">
                                <a @click="addPicture()" class="btn btn-success">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-success">{{localization.save}}</button>
                        </div>
                    </div>
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
                initialize: '/api/event/create',
                redirect: '/event',
                store: '/api/event',
                method: 'post',
                picture_add: ` <div class="col-sm-11">
                            <div class="form-group">
                                <label class="control-label">Picture</label>
                                <input name="input4[]" type="file" class="input-4 file-loading" data-show-preview="false">

                            </div>
                        </div>
                        <div class="col-sm-1" style="margin-top: 26px">
                            <div class="form-group">
                                <a @click="addPicture()" class="btn btn-success">+</a>
                            </div>
                        </div>`,
                localization: localization
            }
        },
        beforeMount() {
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/event/' + this.$route.params.id + '/edit'
                this.store = '/api/event/' + this.$route.params.id
            }
            this.fetchData()
        },
        mounted(){
            $(".input-4").fileinput({showCaption: false, showUpload: false});
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            addPicture(){
                $('#test').append(this.picture_add)
                $(".input-4").fileinput({showCaption: false, showUpload: false});
            },
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