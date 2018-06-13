<template>
    <div>
        <h1 class="page-header" style="margin-top: 79px;">Aleevent</h1>
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="panel-title">{{title}}</span>
                <div>
                    <router-link :to="create" class="btn btn-primary btn-sm" v-if="title != 'Basket'">
                        {{localization.create}}

                    </router-link>
                    <router-link :to="'/related_event/create_all'" class="btn btn-success btn-sm"
                                 v-if="title === 'Related Event'">{{localization.create_all}}

                    </router-link>
                    <button class="btn btn-default btn-sm" v-if="entity" @click="showFilter = !showFilter">F</button>
                </div>
            </div>
            <div class="panel-body">
                <div class="filter" v-if="showFilter">
                    <div v-for="(ent,index) in entity" class="col-sm-2">
                        <a v-if="!ent.show" @click="opensearch(ent, index)" class="btn btn-success">+</a>
                        <a v-else @click="opensearch(ent, index)" class="btn btn-danger">-</a>
                        {{ent.name}}
                        <div v-if="ent.show">
                        <div class="filter-input">
                        <input type="text" class="form-control" v-model="params.search_query_arr[index]"
                            @keyup.enter="fetchData" placeholder="Search">
                        </div>
                        <!--<div class="filter-input">-->
                            <!--<input type="text" class="form-control" v-model="params.search_query_arr[index]"-->
                                   <!--@keyup.enter="fetchData" placeholder="Search">-->
                        <!--</div>-->
                    </div>
                    </div>
                    <br/>
                    <!--<div class="filter-column">-->
                        <!--<div v-if="entity.show" v-for="(entity,index) in filter">-->
                            <!--<select class="form-control" v-model="params.search_column_arr[index]">-->
                                <!--<option v-for="ent in entity.entity_data" :value="ent.value">{{ent.name}}</option>-->
                            <!--</select>-->
                            <!--<div class="filter-input">-->
                                <!--<input type="text" class="form-control" v-model="params.search_query_arr[index]"-->
                                       <!--@keyup.enter="fetchData" placeholder="Search">-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="filter-operator">-->
                    <!--<select class="form-control" v-model="params.search_operator">-->
                    <!--<option v-for="(value, key) in operators" :value="key">{{value}}</option>-->
                    <!--</select>-->
                    <!--</div>-->

                    <div class="filter-input" v-if="params.search_operator === 'between'">
                        <input type="text" class="form-control" v-model="params.search_query_2"
                               @keyup.enter="fetchData" placeholder="Search">
                    </div>
                    <div class="filter-btn">
                        <button class="btn btn-primary btn-sm btn-block" @click="fetchData">{{localization.filter}}
                        </button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th v-for="item in thead">
                            <div class="dataviewer-th" @click="sort(item.key, item.parent_column)" v-if="item.sort">
                                <span>{{item.title}}</span>
                                <span v-if="params.column === item.key">
                                    <span v-if="params.direction === 'asc'">&#x25B2;</span>
                                    <span v-else>&#x25BC;</span>
                                </span>
                            </div>
                            <div v-else>
                                <span>{{item.title}}</span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <slot :cost="cost" :model="model"></slot>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer pagination-footer" v-if="showfooter && this.model.total >= 10">
                <div class="pagination-item">
                    <span>{{localization.per_page}}: </span>
                    <select v-model="params.per_page" @change="fetchData">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>
                <div class="pagination-item">
                    <small>{{localization.showing}} {{model.from}} - {{model.to}} of {{model.total}}</small>
                </div>
                <div class="pagination-item">
                    <small>{{localization.current_page}}:</small>
                    <input type="text" class="pagination-input" v-model="params.page"
                           @keyup.enter="fetchData">
                    <small> of {{model.last_page}}</small>
                </div>
                <div class="pagination-item">
                    <button @click="prev" class="btn btn-default btn-sm">{{localization.prev}}</button>
                    <button @click="next" class="btn btn-default btn-sm">{{localization.next}}</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Vue from 'vue'
    import axios from 'axios'
    import language from '../language'
    export default {
        props: ['source', 'thead', 'filter', 'create', 'title', 'showfooter', 'entity'],
        data() {
            var localization = language.data().language
            return {
                showFilter: false,
                model: {
                    data: []
                },
                cost: [],
                params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    parent_column: 'event_translations',
                    search_query_1: '',
                    search_query_2: '',
                    search_column_arr: [],
                    search_query_arr: [],
                    event: '',
                    city: '',
                    holiday: ''
                },
                operators: {
                    equal_to: '=',
                    not_equal: '<>',
                    less_than: '<',
                    greater_than: '>',
                    less_than_or_equal_to: '<=',
                    greater_than_or_equal_to: '>=',
                    in: 'IN',
                    not_in: 'NOT IN',
                    like: 'LIKE',
                    between: 'BETWEEN'
                },
                localization: localization
            }
        },
        beforeMount() {
            this.fetchData()
            this.filter.forEach(function(item, i, arr) {
                this.params.search_column_arr.push("");
                this.params.search_query_arr.push("");
            }.bind(this));
        },
        methods: {
            next() {
                if (this.model.next_page_url) {
                    this.params.page++
                    this.fetchData()
                }
            },
            prev() {
                if (this.model.prev_page_url) {
                    this.params.page--
                    this.fetchData()
                }
            },
            sort(column, parent_table) {
                if (column === this.params.column) {
                    if (this.params.direction === 'desc') {
                        this.params.direction = 'asc'
                    } else {
                        this.params.direction = 'desc'
                    }
                } else {
                    this.params.column = column
                    this.params.parent_column = parent_table
                    this.params.direction = 'asc'
                }
                this.fetchData()
            },
            fetchData() {
                var vm = this
                axios.get(this.buildURL())
                    .then(function (response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                        Vue.set(vm.$data, 'cost', response.data.cost)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            buildURL() {
                var p = this.params
                //return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}&parent_column=${p.parent_column}`
                return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}&search_column_arr=${p.search_column_arr}&search_query_arr=${p.search_query_arr}`
            },
            opensearch(ent, indexQ){
                ent.show = !ent.show
                    switch(ent.name) {
                        case 'event':
                            if (ent.show) {
                                this.params.search_column_arr[indexQ] = 'event.name';
                            }else{
                                this.params.search_column_arr.find(function (element, index, array) {
                                    if ('event.name' === element) {
                                        this.params.search_column_arr[indexQ] = ' '
                                    }
                                }.bind(this));
                            }
                            break;
                        case 'holiday':
                            if (ent.show) {
                                this.params.search_column_arr[indexQ] = 'holiday.name';
                            }else{
                                this.params.search_column_arr.find(function (element, index, array) {
                                    if ('holiday.name' === element) {
                                        this.params.search_column_arr[indexQ] = ' '
                                    }
                                }.bind(this));
                            }
                            break;
                        case 'city':
                            if(ent.show){
                                this.params.search_column_arr[indexQ] = 'city.name';
                            }else{
                                this.params.search_column_arr.find(function (element, index, array) {
                                    if ('city.name' === element) {
                                        this.params.search_column_arr[indexQ] = ' '
                                    }
                                }.bind(this));
                            }
                            break;
                    }
                    if(!ent.show){
                        this.params.search_query_arr[indexQ] = ' '
                    }
                this.filter.find(function (element, index, array) {
                    if (ent.name === element.entity) {
                        ent.show ? element.show = true : element.show = false;
                    }
                });
            }
        }
    }
</script>