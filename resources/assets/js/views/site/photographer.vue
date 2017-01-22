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

        <div class="wrap" style="
    margin-top: 335px;
">
            <div class="photowrap" v-for="item in model.data">
                <a class="nonblock nontext anim_swing clearfix grpelem" id="texttr" href="index.html#o-transporcie">
                    <!-- content --><p>{{item.name}}</p></a>
                <a @click="item.show = !item.show" class="nonblock nontext anim_swing rounded-corners gradient clip_frame clearfix grpelem" id="u17826"
                   href="index.html#o-transporcie"><!-- image --><img class="position_content" id="u17826_img"
                                                                      :src="'img/photographer/'+item.picture" alt=""
                                                                      width="305"
                                                                      height="202"/></a>
            </div>
        </div>
        <div class="grpelem" id="u23602"><!-- simple frame --></div>
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
                    .then(function (response) {
                        Vue.set(vm.$data, 'model', response.data.model)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
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
            },
            buildURL() {
                var p = this.params
                return `/api/photographer?column=${p.column}&direction=${p.direction}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
            }
        }
    }
</script>