<template>
    <div class="clearfix colelem" id="pmiasto"><!-- group -->
        <a class="anchor_item grpelem" id="miasto"></a>
        <div class="browser_width grpelem" id="u8138-bw">
            <div id="u8138"><!-- column -->
                <div class="clearfix" id="u8138_align_to_page">

                    <div class="clearfix colelem" id="u8139-4"><!-- content -->
                        <p>GDZIE?</p>
                    </div>

                    <div class="wrap">
                        <transition-group name="list-complete" tag="div">
                            <div v-for="item in model.data" v-bind:key="item"
                                 class="clearfix grpelem city list-complete-item"><!-- group -->
                                <div class="gradient rounded-corners clip_frame clearfix grpelem citywrap">
                                    <!-- image -->
                                    <a v-if="item.description" class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem"
                                       id="buttonu24047"><!-- container box -->
                                        <div class="clearfix grpelem" id="u24048-4" @click="showModal(item)">
                                            <!-- content --><p>Czytać więcej</p>
                                        </div>
                                    </a>
                                    <a @click="ShowMethod(item)"
                                       class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem"
                                       id="buttonu19832"><!-- container box -->
                                        <div class="clearfix grpelem" id="u19833-4"><!-- content --><p>Wybrać</p></div>
                                    </a>
                                    <div class="clearfix grpelem" id="u19250-4"><!-- content -->
                                        <p>{{item.name}}</p>
                                    </div>
                                    <img class="position_content" id="u19243_img" :src="'img/city/'+item.picture" alt=""
                                         width="407" height="268"/>
                                </div>
                            </div>
                        </transition-group>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'
    import Vue from 'vue'
    export default {
        data() {
            return {
                model: {
                    data: []
                },
                params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: '',
                    search_query_2: ''
                },
                total: 0
            }
        },
        beforeMount() {
            this.fetchData()
        },
        methods: {
            fetchData() {
                var vm = this
                axios.get(this.buildURL())
                    .then(function (response) {
                        response.data.model.data.forEach(function (item, i, arr) {
                            item.show = false
                        });
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            ShowMethod(item){
                item.show = !item.show
                this.$parent.$emit('getCity', item);
                this.$parent.$emit('loadElement', 'event');
                return this.model.data.reduce(function (carry, item2) {
                    if (item != item2) {
                        item2.show = false
                    }
                }, 0)
            },
            getCity() {
                return this.model.data.reduce(function (carry, item) {
                    if (item.show) {
                        return item
                    }
                }, 0)
            },
            showModal(item){
                this.$parent.$emit('modalCity', item);
            },
            buildURL() {
                var p = this.params
                return `/api/city?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            },
            Total(){
                var result = this.model.data.reduce(function (carry, item) {
                    if (item.show) {
                        carry += parseFloat(item.cost)
                    }
                    return carry
                }, 0)
                this.total = result
                console.log(this.total)
            }
        }
    }
</script>