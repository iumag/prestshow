<template>
    <div class="clearfix colelem" id="pu15744"><!-- group -->
        <div class="browser_width grpelem" id="u15744-bw">
            <div id="u15744"><!-- simple frame --></div>
        </div>
        <div class="clearfix grpelem" id="u23383-4"><!-- content -->
            <p>FOTOGRAF CZY GOPRO?</p>
        </div>
        <div class="grpelem" id="u23603"><!-- simple frame --></div>
        <a class="anchor_item grpelem" id="fotograf"></a>

        <div class="wrap photographer">
            <transition-group name="photographer-complete" tag="div">
                <div class="photowrap photographer-complete-item" id="cityie"  v-bind:key="item.id" v-for="item in model.data">
                    <a class="nonblock nontext anim_swing clearfix grpelem" id="texttr">
                        <!-- content --><p>{{item.name}}</p></a>
                    <div v-if="item.description" @click="showModal(item)" class="PamphletWidget clearfix grpelem" id="pamphletu17790"><!-- none box -->
                        <div class="ThumbGroup clearfix grpelem" id="u17810"><!-- none box -->
                            <div class="popup_anchor">
                                <div href="javascript:void(0)" data-hint="Informacja" class="hint--top-right Thumb popup_element rounded-corners clearfix wp-tab-active" id="u17811" role="button" tabindex="0" aria-haspopup="true" aria-controls="u17796"><!-- group -->
                                    <div class="clip_frame grpelem" id="u17812FOTO"><!-- image -->
                                        <img class="block" id="u17812_img" src="images/info.png?crc=3898747697" alt="" width="28" height="45">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popup_anchor" id="u17795popup">

                        </div>
                        <div class="popup_anchor">

                        </div>
                    </div>
                    <a @click="ShowMethod(item)"
                       class="nonblock nontext anim_swing rounded-corners gradient clip_frame clearfix grpelem"
                       id="u17826"><!-- image --><img class="position_content" id="u17826_img"
                                                                :src="'img/photographer/'+item.picture" alt=""
                                                                width="305"
                                                                height="202"/></a>
                </div>
            </transition-group>
        </div>
        <div class="grpelem" id="u23602"><!-- simple frame --></div>
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
                    column: 'sort',
                    direction: 'asc',
                    per_page: 10,
                    page: 1,
                    search_column: 'city_id',
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
                this.$parent.$emit('modalPhotographer', item);
            },
            ShowMethod(item){
                item.show = !item.show
                this.$parent.$emit('getPhotographer', item);
                this.$parent.$emit('loadElement', 'is_transport');
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
            },
            buildURL() {
                var p = this.params
                return `/api/photographer?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>