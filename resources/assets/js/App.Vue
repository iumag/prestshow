<template>
    <div id="root">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{localization.site_name}}</a>
                </div>
                <div class="navbar-collapse collapse">

                    <form action="/language" id="language" class="navbar-left" method="post" style="
    margin-top: 6px;
">
                        <select class="selectpicker" name="locale">
                            <option value="pl">Poland</option>
                            <option value="en">English</option>
                        </select>
                        <input type="submit" class="btn btn-success" value="Submit">
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <router-link to="/">{{localization.cart}}</router-link>
                        </li>
                        <li>
                            <router-link to="/city">{{localization.city}}</router-link>
                        </li>
                        <li>
                            <router-link to="/event">{{localization.event}}</router-link>
                        </li>
                        <li>
                            <router-link to="/related_event">{{localization.related_event}}</router-link>
                        </li>
                        <li>
                            <router-link to="/hotel">{{localization.hotel}}</router-link>
                        </li>
                        <li>
                            <router-link to="/photographer">{{localization.photographer}}</router-link>
                        </li>
                        <li>
                            <router-link to="/transport">{{localization.transport}}</router-link>
                        </li>
                        <li>
                            <router-link to="/holiday">{{localization.holiday}}</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    import axios from 'axios'
    import Vue from 'vue'
    import language from './language'
    require('es6-promise').polyfill();
    export default{
        data() {
            var localization = language.data().language
            return {
                language: 'pl',
                localization: localization
            }
        },
        beforeMount() {
            this.getLanguage()
            $('.selectpicker').selectpicker({
                style: 'btn-info',
                size: 4
            });
            setTimeout(function(){
                $('.selectpicker').selectpicker('val', this.language);
            }.bind(this), 500)

        },
        methods: {
            getLanguage() {
                var vm = this
                axios.get('/language/get')
                    .then(function (response) {
                        Vue.set(vm.$data, 'language', response.data.language)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>

