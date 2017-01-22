<template>
    <div class="clearfix colelem" id="ppatrakcji"><!-- group -->
        <div class="clearfix grpelem" id="u8547-4"><!-- content -->
            <p>Atrakcji</p>
        </div>
        <div class="clearfix grpelem" id="patrakcji"><!-- column -->
            <a class="anchor_item colelem" id="atrakcji"></a>
            <a class="anchor_item colelem" id="prodow"></a>
        </div>
        <div class="browser_width grpelem" id="u11635-bw">
            <div class="museBGSize" id="u11635"><!-- simple frame --></div>
        </div>
        <div class="browser_width grpelem" id="u15327-bw">
            <div id="u15327"><!-- simple frame --></div>
        </div>
        <div class="wrap">
            <div class="clearfix grpelem holiday" v-for="item in model.data" @click="ShowMethod(item)"><!-- group -->
                <div class="pointer_cursor rounded-corners clearfix grpelem" id="u10782" v-if="item.show === false"><!-- column -->

                    <a class="nonblock nontext anim_swing clip_frame colelem" id="u10915"
                       Z><!-- image --><img class="block" id="u10915_img"
                                                                   :src="'img/event/' + item.event.picture"
                                                                   alt="" width="39" height="38"/></a>
                    <a class="nonblock nontext anim_swing clearfix colelem" id="u10914-4"
                       ><!-- content --><p>{{item.event.name}}</p></a>
                </div>
                <div v-else class="Container rounded-corners clearfix grpelem wp-panel wp-panel-active"
                     id="u12112" role="tabpanel" aria-labelledby="u12117"><!-- group -->
                    <div class="rounded-corners grpelem" id="u12113"><!-- simple frame --></div>
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
                    per_page: 10000,
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
                    .then(function(response){
                        response.data.model.data.forEach(function (item, i, arr) {
                            item.show = false
                        });
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },
            ShowMethod(item){
                item.show = !item.show
                this.$parent.$emit('loadElement', 'is_hotel');
            },
            Total() {
                var result = this.model.data.reduce(function (carry, item) {
                    if (item.show) {
                        carry += parseFloat(item.cost)
                    }
                    return carry
                }, 0)
                this.total = result
                console.log(this.total)
            },
            buildURL() {
                var p = this.params
                return `/api/related_event?per_page=${p.per_page}&column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>