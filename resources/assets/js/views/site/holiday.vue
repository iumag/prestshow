<template>
    <div class="clearfix colelem" id="pswieta"><!-- group -->
        <a class="anchor_item grpelem" id="swieta"></a>
        <div class="browser_width grpelem" id="u7669-bw">
            <div class="pointer_cursor" id="u7669"><!-- column -->
                <a class="block anim_swing" href="index.html#miasto"></a>

                <div class="clearfix" id="u7669_align_to_page">
                    <a class="nonblock nontext clearfix colelem" id="u7670-4" href="http://www.musefree.com">
                        <!-- content --><p>uroczystości</p></a>
                </div>
                <div class="wrap">
                    <div class="clearfix grpelem holiday" v-for="item in model.data"><!-- group -->
                        <div class="pointer_cursor rounded-corners clearfix grpelem" id="u10782"><!-- column -->
                            <a class="block anim_swing" href="index.html#miasto"></a>
                            <a class="nonblock nontext anim_swing clip_frame colelem" id="u10915"
                               href="index.html#miasto"><!-- image --><img class="block" id="u10915_img"
                                                                           :src="'img/holiday/' + item.picture"
                                                                           alt="" width="39" height="38"/></a>
                            <a class="nonblock nontext anim_swing clearfix colelem" id="u10914-4"
                               href="index.html#miasto"><!-- content --><p>{{item.name}}</p></a>
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
                    data: []
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
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function(error){
                        console.log(error)
                    })
            },
            buildURL() {
                var p = this.params
                return `/api/holiday?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>