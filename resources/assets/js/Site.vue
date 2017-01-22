<template xmlns="http://www.w3.org/1999/html">
    <div id="site">

        <!--HTML Widget code-->
        <!--<video id="bgvidu7616" loop preload="auto" muted poster="assets/videopng.png" autoplay-->
               <!--style="position: fixed; right: 0; bottom: 0; min-width: 100%; min-height: 100%; width: auto; height: auto; z-index: -1000; background: url(assets/videopng.png) no-repeat; background-size: cover;">-->
            <!--<source src="assets/videoweb.webm" type="video/webm">-->
            <!--<source src="assets/videomp.mp4" type="video/mp4">-->
        <!--</video>-->
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
                   href="index.html#glowna"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7623"
                   href="index.html#swieta"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7624"
                   href="index.html#miasto"><!-- simple frame --></a>
                <a class="nonblock nontext Button anim_swing rounded-corners clearfix colelem" id="buttonu7617"
                   href="index.html#swieta"><!-- container box -->
                    <div class="clearfix grpelem" id="u7618-4"><!-- content -->
                        <p>
                            <button @click="getChildTotals()">Co chcesz zorganizować?</button>
                        </p>
                    </div>
                </a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7625"
                   href="index.html#atrakcji"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7626"
                   href="index.html#nocleg"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7627"
                   href="index.html#hotel"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u7628"
                   href="index.html#fotograf"><!-- simple frame --></a>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u19811"
                   href="index.html#o-transporcie"><!-- simple frame --></a>
                <div class="size_fixed colelem" id="u15365"><!-- custom html -->

                    <!-- This Adobe Muse widget was created by the team at MuseFree.com -->
                    <div class="u15365">
                        <div class="animated-mouse">
                            <div class="animated-mouse-pointer"></div>
                        </div>
                    </div>

                </div>
                <a class="nonblock nontext anim_swing rounded-corners pinned-colelem" id="u19814"
                   href="index.html#cena"><!-- simple frame --></a>
                <holiday ref="holiday"></holiday>
                <transition
                        name="custom-classes-transition"
                        enter-active-class="animated flash"
                        leave-active-class="animated bounceOutRight"
                ><city v-if="showElement['city']" ref="city"></city></transition>
                <event v-if="showElement['event']" ref="event"></event>
                <is-hotel v-if="showElement['is_hotel']"></is-hotel>
                <hotel v-if="showElement['hotel']" ref="hotel"></hotel>
                <photographer v-if="showElement['photographer']" ref="photographer"></photographer>
                <is-transport v-if="showElement['is_transport']"></is-transport>
                <transport v-if="showElement['transport']" ref="transport"></transport>

                <cena></cena>

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
                    transport: false
                }
            }
        },
        created(){
            this.$on('loadElement', function(element) {
                this.showElement[element] = true
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
        }
    }
</script>
