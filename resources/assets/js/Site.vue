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
                <a v-show="showElement['is_transport']"
                   class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u19811"
                   href="#o-transporcie"><!-- simple frame --></a>
                <div class="size_fixed colelem" id="u15365"><!-- custom html -->

                    <!-- This Adobe Muse widget was created by the team at MuseFree.com -->
                    <div class="u15365">
                        <div class="animated-mouse">
                            <div class="animated-mouse-pointer"></div>
                        </div>
                    </div>

                </div>
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
                <!--<transition name="bounce">-->
                    <is-transport v-if="showElement['is_transport']"></is-transport>
                <!--</transition>-->

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
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
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
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
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
                                            <div class="clearfix grpelem" id="u15526-4" v-for="event in events">
                                                <!-- content -->
                                                <div class="entityitem">{{event.event.name}}</div>
                                                <div class="spaceitem">{{event.cost}} ZL</div>
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
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
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
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
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
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
                                                <div id="u15539" class="clearfix colelem">
                                                    <div id="u15541" class="rounded-corners clearfix grpelem">
                                                        <div id="u15540-4" class="clearfix grpelem"><p>+</p></div>
                                                    </div>
                                                </div>
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
                                                                                               tabindex="2"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15578_prompt"
                                                            for="widgetu15578_input"><span
                                                            class="actAsPara">Enter Email</span></label></span>
                                                </div>


                                                <div class="fld-grp clearfix grpelem" id="widgetu15562"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-textarea actAsDiv clearfix grpelem"
                                                          id="u15563-4"><!-- content --><textarea
                                                            class="wrapped-input" id="widgetu15562_input"
                                                            name="message" tabindex="4"></textarea><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15562_prompt"
                                                            for="widgetu15562_input"><span class="actAsPara">Enter Your Message</span></label></span>
                                                </div>
                                                <div class="fld-grp clearfix grpelem" id="widgetu15574"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-input NoWrap actAsDiv clearfix grpelem"
                                                          id="u15576-4"><!-- content --><input class="wrapped-input"
                                                                                               type="text"
                                                                                               spellcheck="false"
                                                                                               id="widgetu15574_input"
                                                                                               name="FIO"
                                                                                               tabindex="1"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15574_prompt"
                                                            for="widgetu15574_input"><span
                                                            class="actAsPara">Enter Name</span></label></span>
                                                </div>
                                                <div class="fld-grp clearfix grpelem" id="widgetu15568"
                                                     data-required="true"><!-- none box -->
                                                    <span class="fld-input NoWrap actAsDiv clearfix grpelem"
                                                          id="u15569-4"><!-- content --><input class="wrapped-input"
                                                                                               type="tel"
                                                                                               spellcheck="false"
                                                                                               id="widgetu15568_input"
                                                                                               name="phone"
                                                                                               tabindex="3"/><label
                                                            class="wrapped-input fld-prompt"
                                                            id="widgetu15568_prompt"
                                                            for="widgetu15568_input"><span class="actAsPara">Enter Phone Number</span></label></span>
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
                test: true,
                showElement: {
                    city: false,
                    event: false,
                    photographer: false,
                    is_hotel: false,
                    hotel: false,
                    is_transport: false,
                    transport: false,
                    cena: false
                },
                scrollElement: {
                    city: '#miasto',
                    event: '#atrakcji',
                    hotel: '#hotel',
                    photographer: '#fotograf',
                    is_transport: '#o-transporcie',
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
                method: 'post'
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
                var elm = this.scrollElement[element]
                setTimeout(function () {
                    $("html,body").animate({scrollTop: $(elm).offset().top}, 1000)
                }, 1000);
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
        },
        methods: {
            getChildTotals() {
                this.showElement[city] = true
                let holiday = this.$refs.holiday.Total()
                let city = this.$refs.city.Total()
                let event = this.$refs.event.Total()
                let photographer = this.$refs.photographer.Total()
                let transport = this.$refs.transport.Total()
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
            }
        }
    }
</script>
