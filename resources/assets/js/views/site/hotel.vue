<template>
    <div class="clearfix colelem" id="pu8582"><!-- group -->
        <div class="browser_width grpelem" id="u8582-bw">
            <div id="u8582"><!-- group -->
                <div class="clearfix" id="u8582_align_to_page">
                    <div class="clearfix grpelem" id="u8583-4"><!-- content -->
                        <p>Hotel</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="SlideShowWidget clearfix grpelem" id="slideshowu8584"><!-- none box -->
            <transition name="sliderhotel">
            <div class="popup_anchor" id="u8601popup">
                <div class="SlideShowContentPanel clearfix" id="u8601"><!-- stack box -->
                    <div class="SSSlide rounded-corners clip_frame grpelem" id="u8602"><!-- image -->
                        <img class="block ImageInclude" id="u8602_img"
                             :src="image" alt=""/>
                    </div>


                </div>
            </div>
            </transition>

            <div class="popup_anchor" id="u8586popup">
                <div class="SSSlideLinks clearfix" id="u8586"><!-- horizontal-rows box -->
                    <div @click="ChangeItem(item)"
                         class="hotelitem SSSlideLink rounded-corners clip_frame clearfix grpelem"
                         v-for="item in model.data"><!-- image -->
                        <img class="position_content" :src="'img/hotel/' + item.picture" alt="" width="131"
                             height="117"/>
                    </div>
                </div>
            </div>
        </div>
        <a @click="ShowMethod()" class="nonblock nontext Button anim_swing rounded-corners clearfix grpelem"
           id="buttonu8626"><!-- container box -->
            <div class="clearfix grpelem" id="u8627-4"><!-- content --><p>WYBRAĆ</p></div>
        </a>
        <div class="PamphletWidget clearfix grpelem" id="pamphletu15202"><!-- none box -->
            <transition name="sliderhotel">
                <div class="popup_anchor" id="u15205popup" v-show="show_description">
                    <div class="ContainerGroup clearfix" id="u15205"><!-- none box -->
                        <div class="Container rounded-corners clearfix grpelem" id="u15211"><!-- group -->
                            <div class="clearfix grpelem" id="u15301-5" v-html="description">
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
            <div class="ThumbGroup clearfix grpelem" id="u15223" @click="showModal()">
                <!-- none box -->
                <div class="popup_anchor">
                    <div class="Thumb popup_element rounded-corners clearfix" id="u15226"><!-- group -->
                        <div class="Button rounded-corners clearfix grpelem" id="buttonu15295"><!-- container box -->
                            <div class="clearfix grpelem" id="u15296-4"><!-- content -->
                                <p>WIĘCEJ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="anchor_item grpelem" id="hotel"></a>
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
                    data: [],
                },
                params: {
                    column: 'id',
                    direction: 'desc',
                    per_page: 10,
                    page: 1,
                    search_column: 'city_id',
                    search_operator: 'equal_to',
                    search_query_1: this.city_id,
                    search_query_2: ''
                },

                image: 'images/blank.gif',
                description: '',
                cost: 0,
                show_description: false,
                item_hotel: ''
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
                        var picture = response.data.model.data[0].picture
                        vm.$data.description = response.data.model.data[0].description
                        vm.$data.image = 'img/hotel/' + picture
                        vm.$data.item_hotel = response.data.model.data[0]
                        //console.log( response.data.model.data[0].show)
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })

            },
            showModal(){
                this.$parent.$emit('modalHotel', this.item_hotel);
            },
            ShowMethod(){
                this.$parent.$emit('getHotel', this.item_hotel);
                this.$parent.$emit('loadElement', 'photographer');
            },
            buildURL() {
                var p = this.params
                return `/api/hotel?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            },
            ChangeItem(item){
                this.item_hotel = item
                this.image = 'img/hotel/' + item.picture
                //this.description = item.description
                this.cost = item.cost
                this.show_description = false
            }
        }
    }
</script>