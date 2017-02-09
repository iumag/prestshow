<template>
    <div>
        <h1 class="page-header">Dashboard</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                {{title}}
            </div>
            <div class="panel-body">
                <form class="form" id="form_data" @submit.prevent="save">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>City</label>
                                <select class="form-control" v-model="form.city_id">
                                    <option>Select</option>
                                    <option v-for="city in option.cities" :value="city.city_id">{{city.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.city_id">{{errors.city_id[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label>Event</label>
                                <select class="form-control" v-model="form.event_id">
                                    <option>Select</option>
                                    <option v-for="event in option.events" :value="event.event_id">{{event.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.event_id">{{errors.event_id[0]}}</small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Cost</label>
                                <input type="text" class="form-control" v-model="form.cost">
                                <small class="text-danger" v-if="errors.cost">{{errors.cost[0]}}</small>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success">Save</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    export default{
        name: 'RelatedForm',
        data() {
            return {
                form: {},
                errors: {},
                option: {},
                title: 'Create',
                initialize: '/api/related_event/create',
                redirect: '/related_event',
                store: '/api/related_event',
                method: 'post'
            }
        },
        beforeMount() {
            if (this.$route.meta.mode === 'edit') {
                this.title = 'Edit'
                this.initialize = '/api/related_event/' + this.$route.params.id + '/edit'
                this.store = '/api/related_event/' + this.$route.params.id
                this.method = 'put'
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
                axios[this.method](this.store, this.form)
                    .then(function (response) {
                        if (response.data.saved) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function (error) {
                        Vue.set(vm.$data, 'errors', error.response.data)
                    })
            }
        }
    }
</script>