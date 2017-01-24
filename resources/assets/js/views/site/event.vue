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
        <div v-for="n in 2">
            <div :id="'prodow'+n" class="wrap" style="padding-top: 200px;" :data-test="n"
                 v-bind:class="[n===1 ? wrap_left : '', wrap]">
                    <div class="clearfix grpelem holiday event-complete-item" v-for="(item,index) in model.data"
                         v-bind:key="item"
                         @click="ShowMethod(item)"
                         v-if="(index<n*15 && n===1) || (n>1 && index>=(n-1)*15)"><!-- group -->
                        <div class="pointer_cursor rounded-corners clearfix grpelem" id="u10782"
                             v-if="item.show === false"><!-- column -->

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
            <a v-if="n != 2" class="nonblock nontext anim_swing clip_frame grpelem" id="u9420" @click="Scroll(n)">
                <!-- image --><img
                    class="block" id="u9420_img" src="images/down-arrow-crop-u9420.png?crc=4075218507" alt="" width="52"
                    height="31"></a>
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
                total: 0,
                wrap_left: "wrap_left",
                wrap: "wrap"
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
            Scroll(n){
                $("html,body").animate({scrollTop: $("#prodow"+(n+1)).offset().top}, 1000)
            },
            buildURL() {
                var p = this.params
                return `/api/related_event?per_page=${p.per_page}&column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>