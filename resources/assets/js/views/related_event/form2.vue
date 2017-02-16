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
                                <select @change="getEvents()" class="form-control" name="city_id" v-model="form.city_id">
                                    <option>Select</option>
                                    <option v-for="city in option.cities" :value="city.city_id">{{city.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.city_id">{{errors.city_id[0]}}</small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.holiday}}</label>
                                <select @change="getEvents()" v-if="form.city_id != 'Select'" class="form-control"
                                        name="holiday_id"
                                        v-model="form.holiday_id">
                                    <option>Select</option>
                                    <option v-for="holiday in option.holidays" :value="holiday.holiday_id">
                                        {{holiday.name}}
                                    </option>
                                </select>
                                <select v-else disabled class="form-control" name="holiday_id"
                                        v-model="form.holiday_id">
                                    <option>Select</option>
                                    <option v-for="holiday in option.holidays" :value="holiday.holiday_id">
                                        {{holiday.name}}
                                    </option>
                                </select>
                                <small class="text-danger" v-if="errors.holiday_id">{{errors.holiday_id[0]}}</small>
                            </div>
                        </div>


                    </div>
                    <div v-if="form.holiday_id != 'Select'" class="row" v-for="event in new_events">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="exampleInputEmail1" v-model="event.name"
                                       disabled>
                                <input v-if="event.check != false" type="hidden" name="event[][event_id]"
                                       v-model="event.event_id">
                            </div>
                            <div class="col-sm-1">
                                <input v-if="event.check === false" disabled type="text" class="form-control"
                                       :placeholder="localization.cost">
                                <input v-else type="text" class="form-control" name="cost[][cost]"
                                       :placeholder="localization.cost">
                            </div>
                            <div class="col-sm-1">
                                <input type="checkbox" class="form-control" @click="event.check = !event.check">
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
    import language from '../../language'
    export default{
        name: 'RelatedForm',
        data() {
            var localization = language.data().language
            return {
                form: {},
                new_events: {},
                errors: {},
                option: {},
                title: 'Create',
                initialize: '/api/related_event/create',
                redirect: '/related_event',
                store: '/api/related_event',
                method: 'post',
                get_event: '',
                localization: localization,
                holiday_id: ''
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
        updated(){
          console.log(this.new_events);
        },
        methods: {
            fetchData() {
                var vm = this
                axios.get(this.initialize)
                    .then(function (response) {
                        response.data.option.events.forEach(function (item, i, arr) {
                            item.check = false
                        });
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
            getEvents(){
                if((this.form.holiday_id != 'Select') && (this.form.city_id !='Select')) {
                    this.get_event = '/api/related_event/getNewEvents/city-' + this.form.city_id + '/holiday-' + this.form.holiday_id;
                    var vm = this
                    axios.get(this.get_event)
                        .then(function (response) {
                            Vue.set(vm.$data, 'new_events', response.data.new_events)
                        })
                        .catch(function (error) {
                            console.log(error)
                        })
                }
            }
        }
    }
</script>