<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{title}}
            </div>
            <div class="panel-body">
                <form class="form" @submit.prevent="save">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Hotel</label>
                                <input type="text" class="form-control" v-model="form.name">
                                <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" v-model="form.city_id">
                                    <option>Select</option>
                                    <option v-for="city in option.cities" :value="city.id">{{city.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.hotel">{{errors.city_id[0]}}</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="text" class="form-control" v-model="form.cost">
                                <small class="text-danger" v-if="errors.cost">{{errors.cost[0]}}</small>
                            </div>
                        </div>
                        <load-image></load-image>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="text" v-model="form.description"></textarea>
                                <small class="text-danger" v-if="errors.description">{{errors.description[0]}}
                                </small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    import LoadImage from '../../components/LoadImage.vue'
    export default{
        name: 'EventForm',
        data() {
            return {
                form: {},
                errors: {},
                option: {},
                title: 'Create',
                initialize: '/api/hotel/create',
                redirect: '/hotel',
                store: '/api/hotel',
                method: 'post'
            }
        },
        beforeMount() {
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/hotel/' + this.$route.params.id + '/edit'
                this.store = '/api/hotel/' + this.$route.params.id
                this.method = 'put'
            }
            this.fetchData()
        },
        mounted(){
            CKEDITOR.replace("text")
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
                axios[this.method](this.store, this.form)
                    .then(function (response) {
                        if (response.data.saved) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        },
        components: {LoadImage}
    }
</script>