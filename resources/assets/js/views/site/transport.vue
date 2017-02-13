<template>
    <div class="clearfix colelem" id="pu16487"><!-- group -->
        <div class="browser_width grpelem" id="u16487-bw">
            <div id="u16487"><!-- simple frame --></div>
        </div>
        <div class="wrap transport-wrap2">
            <transition-group name="transport-complete" tag="div">
                <div class="transportwrap transport-complete-item" v-bind:key="item" v-for="item in model.data">
                    <div v-if="item.description" @click="showModal(item)" class="PamphletWidget clearfix grpelem"
                         id="pamphletu17791"><!-- none box -->
                        <div class="ThumbGroup clearfix grpelem" id="u17810"><!-- none box -->
                            <div class="popup_anchor">
                                <div class="Thumb popup_element rounded-corners clearfix wp-tab-active" id="u17811"
                                     role="button" tabindex="0" aria-haspopup="true" aria-controls="u17796">
                                    <!-- group -->
                                    <div class="clip_frame grpelem" id="u17812"><!-- image -->
                                        <img class="block" id="u17812_img" src="images/info.png?crc=3898747697" alt=""
                                             width="28" height="45">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup_anchor" id="u17795popup">

                        </div>
                        <div class="popup_anchor">

                        </div>
                    </div>
                    <a class="nonblock nontext anim_swing clearfix grpelem" id="u17814-4">
                        <!-- content --><p>{{item.name}}</p></a>
                    <!--<div v-if="item.show===false">-->
                    <a @click="ShowMethod(item)"
                       class="nonblock nontext anim_swing rounded-corners gradient clip_frame clearfix grpelem"
                       id="fototr"
                    ><!-- image --><img class="position_content" id="u17826_img"
                                        :src="'img/transport/'+item.picture" alt=""
                                        width="305"
                                        height="202"/></a>
                    <!--</div>-->
                    <!--<div v-else class="selecttr" v-else></div>-->
                </div>
            </transition-group>
        </div>
        <a class="anchor_item grpelem" id="typy-transportu"></a>
    </div>
</template>

<script>
    import axios from 'axios'
    import Vue from 'vue'
    export default {
        props: {
            city_id: {
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
                    per_page: 10,
                    page: 1,
                    search_column: 'id',
                    search_operator: 'equal_to',
                    search_query_1: this.city_id,
                    search_query_2: ''
                },
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
            showModal(item){
                this.$parent.$emit('modalTransport', item);
            },
            buildURL() {
                var p = this.params
                return `/api/transport?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            },
            ShowMethod(item){
                item.show = !item.show
                this.$parent.$emit('getTransport', item);
                this.$parent.$emit('loadElement', 'cena');
                return this.model.data.reduce(function (carry, item2) {
                    if (item != item2) {
                        item2.show = false
                    }
                }, 0)
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