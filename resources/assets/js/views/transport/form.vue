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
                                <label>{{localization.transport}}</label>
                                <input type="text" name="name" class="form-control" v-model="form.name">
                                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" name="city_id" v-model="form.city_id">
                                    <option>Select</option>
                                    <option v-for="city in option.cities" :value="city.city_id">{{city.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.hotel">{{errors.city_id[0]}}</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.cost}}</label>
                                <input type="text" name="cost" class="form-control" v-model="form.cost">
                                <small class="text-danger" v-if="errors.cost">{{errors.cost[0]}}</small>
                            </div>
                        </div>
                        <load-image :picture="'/img/transport/' + form.picture">></load-image>
                        <small class="text-danger" v-if="errors.picture">{{errors.picture[0]}}</small>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{localization.description}}</label>
                                <small class="text-danger" v-if="errors.description">{{errors.description[0]}}</small>
                                <ckeditor v-model="form.description" name="description" :height="'300px'"
                                ></ckeditor>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>{{localization.video}}</label>
                                <input type="text" name="video" class="form-control" v-model="form.video">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3" v-for="(picture,index) in form.pictures">
                            <a :href="picture.link" data-lightbox="image-1" :data-title="form.name"> <img
                                    :src="picture.link" width="200" height="200" class="img-thumbnail"></a>
                            <a class="btn btn-danger" @click="deleteItem(picture.id);form.pictures.splice(index,1)">-</a>
                        </div>

                    </div>
                    <div v-for="(picture,index) in pictures" class="row" id="test">
                        <div class="col-sm-11">
                            <div class="form-group">
                                <label class="control-label">{{localization.picture}}</label>
                                <input name="pictures[][picture]" type="file" class="input-4 file-loading">

                            </div>
                        </div>
                        <div class="col-sm-1" style="margin-top: 26px">
                            <div class="form-group">
                                <a v-if="picture.plus" @click="addPicture(picture)" class="btn btn-success">+</a>
                                <a v-else @click="pictures.splice(index,1)" class="btn btn-danger">-</a>
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
                pictures: [],
                localization: localization
            }
        },
        mounted(){
            $(".input-4").fileinput({showCaption: false, showUpload: false, showRemove: false});
        },
        beforeMount() {
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/transport/' + this.$route.params.id + '/edit'
                this.store = '/api/transport/' + this.$route.params.id
            }
            this.pictures.push({
                plus: true
            });
            this.fetchData()
        },
        watch: {
            '$route': 'fetchData'
        },
        methods: {
            addPicture(picture){
                picture.plus = false
                this.pictures.push({
                    plus: true
                });
                setTimeout(function () {
                    $(".input-4").fileinput({showCaption: false, showUpload: false});
                }, 100);

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
            },
            deleteItem(id){
                axios.delete('/delete_picture/'+id)
                    .then(function (response){
                        console.log(response)
                    })
                    .catch(function (error){
                        console.log(error)
                    })
            }
        },
        components: {LoadImage, Ckeditor}
    }
</script>