<template>
    <div class="clearfix colelem" id="pswieta"><!-- group -->
        <a class="anchor_item grpelem" id="swieta"></a>
        <div class="browser_width grpelem" id="u7669-bw">
            <div class="pointer_cursor" id="u7669"><!-- column -->
                <a class="block anim_swing" href="#miasto"></a>

                <div class="clearfix" id="u7669_align_to_page">
                    <a class="nonblock nontext clearfix colelem" id="u7670-4" >
                        <!-- content --><p>uroczystości</p></a>
                </div>
                <div class="wrap">
                    <div class="clearfix grpelem holiday"
                         v-for="(item,index) in model.data" @click="ShowMethod(item)"><!-- group -->
                        <div v-if="item.show === false" :data-cost="item.cost"
                             class="pointer_cursor rounded-corners clearfix grpelem" id="u10782">
                            <!-- column -->
                            <a class="nonblock nontext anim_swing clip_frame colelem"
                               id="u10915"
                               href="#miasto"><!-- image --><img class="block" id="u10915_img"
                                                                           :src="'img/holiday/' + item.picture"
                                                                           alt="" width="39" height="38"/></a>
                            <a class="nonblock nontext anim_swing clearfix colelem"
                               id="u10914-4"
                               href="#miasto"><!-- content --><p>{{item.name}}</p></a>
                        </div>
                        <div v-else class="Container rounded-corners clearfix grpelem wp-panel wp-panel-active"
                             id="u12112" role="tabpanel" aria-labelledby="u12117"><!-- group -->
                            <div class="rounded-corners grpelem" id="u12113"><!-- simple frame --></div>
                        </div>
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
                    data: [
                        {show: true}
                    ],
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
        computed: {},
        beforeMount() {
            this.fetchData()

        },
        methods: {
            ShowMethod(item){
                item.show = !item.show
                this.$parent.$emit('loadElement', 'city');
                return this.model.data.reduce(function (carry, item2) {
                    if (item != item2) {
                        item2.show = false
                    }
                }, 0)
            },
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
            Test() {
                return this.model.data.reduce(function (carry, item) {
                    console.log(item.show)
                }, 0)
            },
            buildURL() {
                var p = this.params
                return `/api/holiday?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>