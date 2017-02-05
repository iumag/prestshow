<template xmlns="http://www.w3.org/1999/html">
    <div id="site">

        <!--HTML Widget code-->
        <video id="bgvidu7616" loop preload="auto" muted poster="assets/videopng.png" autoplay
               style="position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000; background: url(assets/videopng.png) no-repeat; background-size: cover;">
            <source src="assets/videoweb.webm" type="video/webm">
            <source src="assets/videomp.mp4" type="video/mp4">
        </video>
        <span style="opacity: .05">
  <div style="background-image: url(assets/pattern-dots.png);position:fixed;opacity: 0.8;left: 0px;top: 0px;width: 100%;height: 100%;z-index: -999;"></div>
</span>

        <div class="clearfix" id="page"><!-- column -->
            <div class="position_content" id="page_position_content">
                <div class="clearfix colelem" id="pu7616"><!-- group -->
                    <div class="size_fixed grpelem" id="u7616"><!-- custom html -->
                    </div>
                    <a class="anchor_item grpelem" id="glowna"></a>
                </div>
                <site-header></site-header>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7622"
                   href="#glowna"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7623"
                   href="#swieta"><!-- simple frame --></a>
                <a v-show="showElement['city']" class="nonblock nontext anim_swing rounded-corners pinned-colelem"
                   id="u7624"
                   href="#miasto"><!-- simple frame --></a>
                <a class="nonblock nontext Button anim_swing rounded-corners clearfix colelem" id="buttonu7617"
                   href="#swieta"><!-- container box -->
                    <div class="clearfix grpelem" id="u7618-4"><!-- content -->
                        <p>
                            Co chcesz zorganizować?
                        </p>
                    </div>
                </a>
                <a v-show="showElement['event']" class="nonblock nontext anim_swing rounded-corners pinned-colelem"
                   id="u7625"
                   href="#atrakcji"><!-- simple frame --></a>
                <a v-show="showElement['is_hotel']" class="nonblock nontext anim_swing rounded-corners pinned-colelem"
                   id="u7626"
                   href="#nocleg"><!-- simple frame --></a>
                <a v-show="showElement['hotel']" class="nonblock nontext anim_swing rounded-corners pinned-colelem"
                   id="u7627"
                   href="#hotel"><!-- simple frame --></a>
                <a v-show="showElement['photographer']"
                   class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7628"
                   href="#fotograf"><!-- simple frame --></a>


                <div class="size_fixed colelem" id="u15365"><!-- custom html -->

                    <!-- This Adobe Muse widget was created by the team at MuseFree.com -->
                    <div class="u15365">
                        <div class="animated-mouse">
                            <div class="animated-mouse-pointer"></div>
                        </div>
                    </div>

                </div>
                <a v-show="showElement['is_transport']"
                   class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="istransportpage"
                   href="#po-transporcie"><!-- simple frame --></a>
                <a v-show="showElement['transport']"
                   class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="transportpage"
                   href="#pu16487"><!-- simple frame --></a>
                <a v-if="showElement['cena']" class="nonblock nontext anim_swing rounded-corners pinned-colelem"
                   id="u19814"
                   href="#cena"><!-- simple frame --></a>
                <holiday ref="holiday"></holiday>
                <transition
                        name="custom-classes-transition"
                        enter-active-class="animated flash"
                        leave-active-class="animated bounceOutRight"
                >
                    <city v-if="showElement['city']" ref="city"></city>
                </transition>
                <transition name="eventdiv">
                    <event v-if="showElement['event']" :city_id="city.id" ref="event"></event>
                </transition>
                <is-hotel v-if="showElement['is_hotel']"></is-hotel>
                <hotel v-if="showElement['hotel']" :city_id="city.id" ref="hotel"></hotel>
                <photographer v-if="showElement['photographer']" ref="photographer"></photographer>

                <is-transport v-if="showElement['is_transport']"></is-transport>


                <transport v-if="showElement['transport']" ref="transport"></transport>


                <div v-show="showElement['cena']" class="clearfix colelem" id="pcena"><!-- group -->
                    <a class="anchor_item grpelem" id="cena"></a>
                    <div class="browser_width grpelem" id="u16514-bw">
                        <div id="u16514"><!-- column -->
                            <div class="clearfix" id="u16514_align_to_page">
                                <div class="clearfix colelem" id="u15557-4"><!-- content -->
                                    <p>cena</p>
                                </div>
                                <form class="form" @submit.prevent="save">
                                    <div class="clearfix grpelem" id="ppu15527-4"><!-- column -->
                                        <div class="clearfix colelem" id="pu15527-4"><!-- group -->
                                            <div class="clearfix grpelem" id="u15527-4"><!-- content -->
                                                <p>Miasto:</p>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"><!-- content -->
                                                <p>{{city.name}}</p>

                                                <input type="hidden" name="city" :value="city.id">
                                            </div>
                                        </div>
                                        <div class="clearfix colelem" id="pu15524-4"><!-- group -->
                                            <div class="clearfix grpelem" id="u15524-4"><!-- content -->
                                                <p>Uroczystość:</p>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"><!-- content -->
                                                <div class="entityitem">{{holiday.name}}</div>
                                                <div class="spaceitem">{{holiday.cost}} ZL</div>

                                                </p>
                                                <input type="hidden" name="holiday" :value="holiday.id">
                                            </div>
                                        </div>
                                        <div class="clearfix colelem" id="u15528"><!-- column -->
                                            <div class="clearfix colelem" id="pu15532-4"><!-- group -->
                                                <div class="clearfix grpelem" id="u15532-4"><!-- content -->
                                                    <p>Atrakcji:</p>
                                                </div>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"
                                                 v-for="(event, index) in events">
                                                <!-- content -->
                                                <div class="entityitem">{{event.event.name}}</div>
                                                <div class="spaceitem">{{event.cost}} ZL</div>
                                                <div id="u15539" class="clearfix colelem">
                                                    <div @click="delete_entity(index, event)" id="u15541"
                                                         class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
                                                </p>
                                                <input type="hidden" name="related_event[]" :value="event.id">
                                            </div>
                                        </div>
                                        <div class="clearfix colelem" id="u15535"><!-- group -->
                                            <div class="clearfix grpelem" id="u15536-4"><!-- content -->
                                                <p>Hotel:</p>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"><!-- content -->
                                                <div class="entityitem">{{hotel.name}}</div>
                                                <div class="spaceitem">{{hotel.cost}} ZL</div>

                                                </p>
                                                <input type="hidden" name="hotel" :value="hotel.id">
                                            </div>
                                        </div>
                                        <div class="clearfix colelem" id="u19760"><!-- group -->
                                            <div class="clearfix grpelem" id="u19762-4"><!-- content -->
                                                <p>Transport:</p>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"><!-- content -->
                                                <div class="entityitem">{{transport.name}}</div>
                                                <div class="spaceitem">{{transport.cost}} ZL</div>

                                                </p>
                                                <input type="hidden" name="transport" :value="transport.id">
                                            </div>
                                        </div>
                                        <div class="clearfix colelem" id="u19772"><!-- group -->
                                            <div class="clearfix grpelem" id="u19774-4"><!-- content -->
                                                <p>Fotograf:</p>
                                            </div>
                                            <div class="clearfix grpelem" id="u15526-4"><!-- content -->
                                                <div class="entityitem">{{photographer.name}}</div>
                                                <div class="spaceitem">{{photographer.cost}} ZL</div>

                                                </p>
                                                <input type="hidden" name="photographer" :value="photographer.id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix colelem" id="pu15533-5"><!-- group -->
                                        <div class="rounded-corners clearfix grpelem" id="u15533-5"><!-- content -->
                                            <p><span id="u15533">&nbsp;&nbsp;&nbsp;&nbsp; SUMA </span></p>
                                        </div>
                                        <div class="rounded-corners clearfix grpelem" id="u15534-3"><!-- content -->
                                            <p>&nbsp;</p>
                                        </div>
                                        <div class="clearfix grpelem" id="u15538-4"><!-- content -->
                                            <p>{{getAllCost}} ZL</p>
                                        </div>
                                        <div class="clearfix grpelem" id="u16847-4"><!-- content -->
                                            <p>Także możesz się skontaktować z menadżerem telefonicznie: +123123123</p>
                                        </div>
                                    </div>
                                    <div class="clearfix colelem" id="pppu15527-4"><!-- group -->


                                        <div class="clearfix grpelem" id="u15558"><!-- group -->
                                            <div class="clearfix grpelem" id="u15559"><!-- group -->

                                                <div class="fld-grp clearfix grpelem" id="widgetu15578"
                                                     data-required="true" data-type="email"><!-- none box -->
                                                    <span class="fld-input NoWrap actAsDiv clearfix grpelem"
                                                          id="u15580-4"><!-- content --><input class="wrapped-input"
                                                                                               type="email"
                                                                                               spellcheck="false"
                                                                                               id="widgetu15578_input"
                                                                                               name="email"
                                                                                               tabindex="2"
                                                                                               placeholder="Enter Email"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15578_prompt"
                                                            for="widgetu15578_input"></label></span>
                                                </div>


                                                <div class="fld-grp clearfix grpelem" id="widgetu15562"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-textarea actAsDiv clearfix grpelem"
                                                          id="u15563-4"><!-- content --><textarea
                                                            class="wrapped-input" id="widgetu15562_input"
                                                            name="message" tabindex="4"
                                                            placeholder="Enter Your Message"></textarea><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15562_prompt"
                                                            for="widgetu15562_input"></label></span>
                                                </div>
                                                <div class="fld-grp clearfix grpelem" id="widgetu15574"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-input NoWrap actAsDiv clearfix grpelem"
                                                          id="u15576-4"><!-- content --><input class="wrapped-input"
                                                                                               type="text"
                                                                                               spellcheck="false"
                                                                                               id="widgetu15574_input"
                                                                                               name="FIO"
                                                                                               tabindex="1"
                                                                                               placeholder="Enter Name"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15574_prompt"
                                                            for="widgetu15574_input"></label></span>
                                                </div>
                                                <div class="fld-grp clearfix grpelem" id="widgetu15568"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-input NoWrap actAsDiv clearfix grpelem"
                                                          id="u15569-4"><!-- content --><input class="wrapped-input"
                                                                                               type="tel"
                                                                                               spellcheck="false"
                                                                                               id="widgetu15568_input"
                                                                                               name="phone"
                                                                                               tabindex="3"
                                                                                               placeholder="Enter Phone Number"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15568_prompt"
                                                            for="widgetu15568_input"></label></span>
                                                </div>
                                                <button class="submit-btn NoWrap grpelem" id="u15567-13">ZAMÓWIĆ
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="verticalspacer" data-offset-top="8854" data-content-above-spacer="8853"
                     data-content-below-spacer="0"></div>
            </div>
        </div>
        <div class="preload_images">
            <img class="preload" src="images/u15567-13-r.png" alt=""/>
            <img class="preload" src="images/u15567-13-m.png" alt=""/>
            <img class="preload" src="images/u15567-13-fs.png" alt=""/>
            <!--[if lt IE 9]>
            <img class="preload" src="images/u17826-r-grad.png" alt=""/>
            <![endif]-->
        </div>
        <!-- JS includes -->
        <!--<div v-show="modal" style="position: absolute; top: -192px; left: 0px; z-index: 100001; width: 1905px; height: 8858px;">-->
        <!--<div style="position: absolute; top: 0px; left: 0px;">-->
        <!--<div id="u16086"-->
        <!--style="left: 0px; top: 0px; width: auto; height: auto; padding: 0px; margin: 0px; z-index: auto;">-->
        <!--<div class="overlayWedge" style="width: 1905px; height: 8858px;"></div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="LightboxContent" role="dialog" tabindex="0"-->
        <!--style="position: absolute; left: 539px; top: 2423px; outline: none;">-->
        <!--<div class="ContainerGroup rgba-background clearfix"-->
        <!--style="width: 827px; height: 545px; position: absolute; padding: 0px; left: 0px; top: 0px; border-width: 0px; background: none;">-->
        <!--&lt;!&ndash; stack box &ndash;&gt;-->

        <!--<div class="Container rounded-corners clearfix grpelem wp-panel wp-panel-active" id="u16087"-->
        <!--role="tabpanel" aria-labelledby="u16108" style="position: absolute; left: 0px; top: 0px;">-->
        <!--&lt;!&ndash; column &ndash;&gt;-->
        <!--<div class="clearfix colelem" id="pu16095-4">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clearfix grpelem" id="u16095-4">&lt;!&ndash; content &ndash;&gt;-->
        <!--<p>Dyskoteka</p>-->
        <!--</div>-->
        <!--<div class="clearfix grpelem" id="u16094-4">&lt;!&ndash; content &ndash;&gt;-->
        <!--<p>20 zl</p>-->
        <!--</div>-->
        <!--<div class="PamphletWidget clearfix grpelem" id="pamphletu18669">&lt;!&ndash; none box &ndash;&gt;-->
        <!--<div class="ThumbGroup clearfix grpelem" id="u18672">&lt;!&ndash; none box &ndash;&gt;-->
        <!--<div class="popup_anchor">-->
        <!--<div class="Thumb popup_element clearfix" id="u18673" role="button" tabindex="0"-->
        <!--aria-haspopup="true" aria-controls="u18679">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clip_frame grpelem" id="u18674">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u18674_img"-->
        <!--src="images/shopping-cart%20(1)2.png?crc=3274255" alt="" width="32"-->
        <!--height="32">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="popup_anchor" id="u18678popup">-->
        <!--<div class="ContainerGroup clearfix" id="u18678" style="width: 0px; height: 0px;">-->
        <!--&lt;!&ndash; none box &ndash;&gt;-->
        <!--<div class="Container clearfix grpelem wp-panel" id="u18679" role="tabpanel"-->
        <!--aria-labelledby="u18673" style="display: none;">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clip_frame grpelem" id="u18680">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u18680_img"-->
        <!--src="images/shopping-cart-verified-symbol.png?crc=3775434275"-->
        <!--alt="" width="32" height="32">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="clearfix colelem" id="u16098-4">&lt;!&ndash; content &ndash;&gt;-->
        <!--<p>Disco is a genre of dance music containing elements of funk, soul, pop, and salsa. It-->
        <!--achieved popularity during the mid-1970s to the early 1980s. Its initial audiences in-->
        <!--the U.S. were club-goers from the gay, African American, Italian American,[1] Latino,-->
        <!--and psychedelic communities in Philadelphia and New York City during the late 1960s and-->
        <!--early 1970s.</p>-->
        <!--</div>-->
        <!--<div class="clearfix colelem" id="pu16099">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clip_frame grpelem" id="u16099">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u16099_img" src="images/disco-vinyl.jpg?crc=371783842" alt=""-->
        <!--width="147" height="110">-->
        <!--</div>-->
        <!--<div class="clip_frame grpelem" id="u16101">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u16101_img" src="images/disco-vinyl.jpg?crc=371783842" alt=""-->
        <!--width="147" height="110">-->
        <!--</div>-->
        <!--<div class="clip_frame grpelem" id="u16088">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u16088_img" src="images/disco-vinyl.jpg?crc=371783842" alt=""-->
        <!--width="147" height="110">-->
        <!--</div>-->
        <!--<div class="clip_frame grpelem" id="u19633">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u19633_img" src="images/disco-vinyl.jpg?crc=371783842" alt=""-->
        <!--width="147" height="110">-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="clearfix colelem" id="pu16096">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clip_frame grpelem" id="u16096">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u16096_img" src="images/50-crop-u16096.jpg?crc=4293059140" alt=""-->
        <!--width="319" height="132">-->
        <!--</div>-->
        <!--<div class="clip_frame grpelem" id="u16090">&lt;!&ndash; image &ndash;&gt;-->
        <!--<img class="block" id="u16090_img" src="images/music-player-play.png?crc=4129989825"-->
        <!--alt="" width="32" height="32">-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div @click="closeModal()" class="PamphletCloseButton PamphletLightboxPart popup_element clearfix" id="u16105" tabindex="0"-->
        <!--role="button" aria-label="close" style="top: -29px; left: 828px;">&lt;!&ndash; group &ndash;&gt;-->
        <!--<div class="clearfix grpelem" id="u16106-4">&lt;!&ndash; content &ndash;&gt;-->
        <!--<p>x</p>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->

        <div v-show="modal" class="dm-overlay" id="win1">
            <div class="dm-table">
                <div class="dm-cell">
                    <div class="dm-modal">
                        <div class="dm-modal-desc">
                            <span class="modal_cost">{{modal_item.cost}} ZL</span>
                            <img @click="showModal(modal_item)" class="block" id="u18674_img"
                                 v-bind:src="[modal_item.show ? cart_img2 : cart_img1]" alt="" width="32" height="32">
                            <a @click="closeModal(modal_scroll, modal_item)" class="close"></a>
                        </div>
                        <div v-if="!modal_item.event" class="name_modal"><p>{{modal_item.name}}</p></div>
                        <div v-else class="name_modal"><p>{{modal_item.event.name}}</p></div>
                        <div class="desc_modal" v-html="modal_item.description"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    require('es6-promise').polyfill();
    import SiteHeader from './views/site/header.vue'
    import Holiday from './views/site/holiday.vue'
    import City from './views/site/city.vue'
    import Event from './views/site/event.vue'
    import IsHotel from './views/site/ishotel.vue'
    import Hotel from './views/site/hotel.vue'
    import IsTransport from './views/site/istransport.vue'
    import Transport from './views/site/transport.vue'
    import Cena from './views/site/cena.vue'
    import Photographer from './views/site/photographer.vue'
    import axios from 'axios'
    export default {
        props: ['showCity'],
        components: {SiteHeader, Holiday, City, Event, IsHotel, Hotel, IsTransport, Transport, Cena, Photographer},
        data() {
            return {
                modal: false,
                modal_item: '',
                modal_scroll: '',
                showElement: {
                    city: false,
                    event: false,
                    photographer: false,
                    is_hotel: false,
                    hotel: false,
                    is_transport: false,
                    transport: false,
                    cena: true
                },
                scrollElement: {
                    city: '#miasto',
                    event: '#atrakcji',
                    is_hotel: '#nocleg',
                    hotel: '#hotel',
                    photographer: '#fotograf',
                    is_transport: '#po-transporcie',
                    transport: '#pu16487',
                    cena: '#cena'
                },
                holiday: {
                    cost: 0
                },
                city: {
                    cost: 0
                },
                event: {
                    cost: 0
                },
                photographer: {
                    cost: 0
                },
                hotel: {
                    cost: 0
                },
                transport: {
                    cost: 0
                },
                events: [],
                initialize: '/api/basket/create',
                redirect: '/basket',
                store: '/api/basket',
                method: 'post',
                cart_img1: 'images/shopping-cart (1)2.png',
                cart_img2: 'images/shopping-cart-verified-symbol.png'
            }
        },
        computed: {
            getAllCost(){
                var allcost = 0
                this.events.forEach(function (item, i, arr) {
                    allcost += parseFloat(item.cost)
                });
                allcost += parseFloat(this.holiday.cost) + parseFloat(this.city.cost)
                    + parseFloat(this.photographer.cost) + parseFloat(this.hotel.cost) + parseFloat(this.transport.cost)
                return allcost

            }
        },
        created(){
            this.$on('loadElement', function (element) {
                this.showElement[element] = true
                if ((this.showElement['photographer'] == true) && (element == 'is_hotel')) {
                    this.showElement['cena'] = true
                }
                if (element != 'is_hotel') {
                    this.scroll(element)
                }
            })
            this.$on('getCity', function (element) {
                this.city = element
            })
            this.$on('getHoliday', function (element) {
                this.holiday = element
            })
            this.$on('getHotel', function (element) {
                this.hotel = element
            })
            this.$on('getTransport', function (element) {
                this.transport = element
            })
            this.$on('getPhotographer', function (element) {
                this.photographer = element
            })
            this.$on('getEvent', function (element) {
                this.events = element
            })
            this.$on('modalHoliday', function (element) {
                this.modal_item = element
                this.modal = true
                this.modal_scroll = 'city'
            })
            this.$on('modalEvent', function (element) {
                this.modal_item = element
                this.modal = true
                this.modal_scroll = 'is_hotel'
            })
            this.$on('modalPhotographer', function (element) {
                this.modal_item = element
                this.modal = true
                this.modal_scroll = 'is_transport'
            })
            this.$on('modalTransport', function (element) {
                this.modal_item = element
                this.modal = true
                this.modal_scroll = 'cena'
            })
            this.$on('modalCity', function (element) {
                this.modal_item = element
                this.modal = true
                this.modal_scroll = 'event'
            })
        },
        methods: {
            closeModal(element, item){
                this.modal = false
                this.showElement[element] = true
                if ((element != 'is_hotel') && (this.modal_item.show == true)) {
                    this.scroll(element)
                    console.log(this.modal_item.show)
                }
                if ((this.showElement['photographer'] == true) && (element == 'is_hotel')) {
                    this.showElement['cena'] = true
                }
                if (element === 'event') this.city = item
                if (element === 'city') this.holiday = item
                if (element === 'is_hotel') {
                    this.events.push(item)
                }
                if (element === 'is_transport') this.photographer = item
                if (element === 'cena') this.transport = item
            },
            showModal(item){
                item.show = !item.show
            },
            scroll(element){
                var elm = this.scrollElement[element]
                setTimeout(function () {
                    $("html,body").animate({scrollTop: $(elm).offset().top}, 1000)
                }, 1000);
            },
            save(){
                var vm = this
                var form = document.querySelector('form');
                var formdata = new FormData(form)
                axios[this.method](this.store, formdata)
                    .then(function (response) {
                        if (response.data.saved) {
                            vm.$router.push(vm.redirect)
                        }
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            delete_entity(id, event){
                this.events.splice(id, 1)
                this.$refs.event.ShowMethod(event)
                if (this.events.length == 0) {
                    this.showElement['cena'] = false
                    console.log(this.showElement['cena'])
                    setTimeout(function () {
                        $("html,body").animate({scrollTop: $('#atrakcji').offset().top}, 1000)
                    }, 1000);
                }
            }
        }
    }
</script>
