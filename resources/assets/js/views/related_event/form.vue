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
                                <label>{{localization.city}}</label>
                                <select @change="getEvents()" class="form-control" v-model="form.city_id">
                                    <option>Select</option>
                                    <option v-for="city in option.cities" :value="city.city_id">{{city.name}}</option>
                                </select>
                                <small class="text-danger" v-if="errors.city_id">{{errors.city_id[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label>{{localization.event}}</label>
                                <select id="eventselect" v-if="form.city_id != 'Select' && form.holiday_id != 'Select'"
                                        class="form-control" v-model="form.event_id">
                                    <option>Select</option>
                                    <option v-for="(event,index) in option.events" :data-id="index"
                                            :value="event.event_id">{{event.name}}
                                    </option>
                                </select>
                                <select id="eventselect" v-else disabled class="form-control" v-model="form.event_id">
                                    <option>Select</option>
                                    <option v-for="(event,index) in option.events" :data-id="index"
                                            :value="event.event_id">{{event.name}}
                                    </option>
                                </select>
                                <small class="text-danger" v-if="errors.event_id">{{errors.event_id[0]}}</small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>{{localization.holiday}}</label>
                                <select @change="getEvents()" v-if="form.city_id != 'Select'" class="form-control"
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
                            <div class="form-group">
                                <label>{{localization.cost}}</label>
                                <input v-if="form.city_id != 'Select' && form.holiday_id != 'Select'" type="text"
                                       class="form-control" v-model="form.cost">
                                <input v-else disabled type="text" class="form-control" v-model="form.cost">
                                <small class="text-danger" v-if="errors.cost">{{errors.cost[0]}}</small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <label>{{localization.sort}}</label>
                                    <input v-if="form.city_id != 'Select' && form.holiday_id != 'Select'" type="text"
                                           name="sort" class="form-control text-center" v-model="form.sort">
                                    <input v-else disabled type="text" name="sort" class="form-control text-center"
                                           v-model="form.sort">
                                    <small class="text-danger" v-if="errors.sort">{{errors.sort[0]}}</small>
                                </div>
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

    export default {
        name: 'RelatedForm',
        data() {
            var localization = language.data().language
            return {
                form: {},
                errors: {},
                option: {},
                new_events: {},
                title: 'Create',
                initialize: '/api/related_event/create',
                redirect: '/related_event',
                store: '/api/related_event',
                method: 'post',
                localization: localization,
                get_event: '',
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
            setTimeout(function () {
                this.getEvents()
            }.bind(this), 1000);

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
            },
            getEvents() {
                if ((this.form.holiday_id != 'Select') && (this.form.city_id != 'Select') || (this.$route.meta.mode === 'edit')) {
                    this.get_event = '/api/related_event/getNewEvents/city-' + this.form.city_id + '/holiday-' + this.form.holiday_id + '/edit_news-' + this.form.id;
                    var vm = this
                    axios.get(this.get_event)
                        .then(function (response) {
                            var array = $.map(response.data.new_events, function (value, index) {
                                return [value];
                            });
                            array.forEach(function (item, i, arr) {
                                item.check = false
                            });
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