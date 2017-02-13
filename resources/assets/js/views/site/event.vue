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
        <div v-for="n in total">
            <div :id="'prodow'+n" class="wrap wrap-padding" :data-test="n"
                 v-bind:class="[n===1 ? wrap_left : '', wrap]">
                <div class="clearfix grpelem holiday event-complete-item" v-for="(item,index) in model.data"
                     v-bind:key="item"
                     v-if="(index<n*15 && n===1) || (n>1 && index>=(n-1)*15)"><!-- group -->
                    <div v-if="item.description" id="pamphletu16085" @click="showModal(item)"><!-- none box -->
                        <div class="ThumbGroup clearfix grpelem" id="u16107"><!-- none box -->
                            <div class="popup_anchor">
                                <div class="Thumb popup_element rounded-corners clearfix wp-tab-active" id="u16108"
                                     role="button" tabindex="0" aria-haspopup="true" aria-controls="u16087">
                                    <!-- group -->
                                    <div class="clip_frame grpelem" id="u16109"><!-- image -->
                                        <img title="Do koszyka" class="block" id="u16109_img" src="images/inform.png?crc=157975575" alt=""
                                             width="78" height="59">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup_anchor" id="u16086popup">

                        </div>
                        <div class="popup_anchor">

                        </div>
                    </div>
                    <div @click="ShowMethod(item)" class="pointer_cursor rounded-corners clearfix grpelem" id="u10782"
                         v-if="item.show === false"><!-- column -->

                        <a class="nonblock nontext anim_swing clip_frame colelem" id="u10915"
                           Z><!-- image --><img class="block" id="u10915_img"
                                                :src="'img/event/' + item.event.picture"
                                                alt="" width="39" height="38"/></a>
                        <a class="nonblock nontext anim_swing clearfix colelem" id="u10914-4"
                        ><!-- content --><p>{{item.event.name}}</p></a>
                    </div>
                    <div v-else @click="ShowMethod(item)"
                         class="Container rounded-corners clearfix grpelem wp-panel wp-panel-active"
                         id="u12112" role="tabpanel" aria-labelledby="u12117"><!-- group -->
                        <div class="rounded-corners grpelem" id="u12113"><!-- simple frame --></div>
                    </div>
                </div>
            </div>
            <a v-if="n != 1" class="nonblock nontext anim_swing clip_frame grpelem" id="u9420" @click="Scroll(n)">
                <!-- image --><img
                    class="block" id="u9420_img" src="images/down-arrow-crop-u9420.png?crc=4075218507" alt="" width="52"
                    height="31"></a>
        </div>
        <a @click="scrollh()" class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem"
           id="buttonu8269"><!-- container box -->
            <div class="clearfix grpelem" id="u8270-4"><!-- content --><p>Przejść do następnego kroku</p></div>
        </a>
    </div>
</template>

<script>

    import axios from 'axios'
    import Vue from 'vue'
    export default {
        props: {
            city_id: {
                type: Number
            },
            holiday_id:{
                type: Number
            }
        },
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
                    search_column: 'city_id',
                    search_column2: 'holiday_id',
                    search_operator: 'equal_to',
                    search_query_1: this.city_id,
                    search_query_2: '',
                    search_query_3: this.holiday_id
                },
                total: 0,
                wrap_left: "wrap_left",
                wrap: "wrap",
                total: 0
            }
        },
        beforeMount() {
            this.fetchData()
        },
        updated() {
            if (this.city_id != this.params.search_query_1) {
                this.params.search_query_1 = this.city_id
                this.fetchData()
            }
            if(this.holiday_id != this.params.search_query_3){
                this.params.search_query_3 = this.holiday_id
                this.fetchData()
            }
        },
        methods: {
            showModal(item){
                this.$parent.$emit('modalEvent', item);
            },
            fetchData() {
                var vm = this
                axios.get(this.buildURL())
                    .then(function (response) {
                        response.data.model.data.forEach(function (item, i, arr) {
                            item.show = false
                        });
                        var total_round = Math.round(response.data.model.total / 15)
                        if ((response.data.model.total > 0) && (total_round == 0)) {
                            total_round = 1
                        }
                        vm.$data.total = total_round
                        console.log(vm.$data.total)
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            ShowMethod(item){
                item.show = !item.show
                let items = [];
                this.model.data.forEach(function (item2) {
                    if (item2.show) {
                        items.push(item2)
                    }
                });
                this.$parent.$emit('getEvent', items);
                this.$parent.$emit('loadElement', 'is_hotel');
            },
            scrollh(){
                this.$parent.scroll('is_hotel')
            },
            Scroll(n){
                $("html,body").animate({scrollTop: $("#prodow" + (n + 1)).offset().top}, 1000)
            },
            buildURL() {
                var p = this.params
                return `/api/related_event?per_page=${p.per_page}&column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}&search_query_3=${p.search_query_3}&search_column2=${p.search_column2}`
            }
        }
    }


</script>