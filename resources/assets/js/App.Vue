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
                    <a class="navbar-brand" href="#">PrestShow</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form action="/language" id="language" method="post">
                        <select name="locale">
                            <option v-if="language === 'pl'" selected value="pl">Poland</option>
                            <option v-else value="pl">Poland</option>
                            <option v-if="language === 'en'" selected value="en">English</option>
                            <option v-else value="en">English</option>
                        </select>
                        <input type="submit" value="Submit">
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <router-link to="/">Корзина</router-link>
                        </li>
                        <li>
                            <router-link to="/city">Города</router-link>
                        </li>
                        <li>
                            <router-link to="/event">Мероприятия</router-link>
                        </li>
                        <li>
                            <router-link to="/related_event">Мероприятия города</router-link>
                        </li>
                        <li>
                            <router-link to="/hotel">Отели</router-link>
                        </li>
                        <li>
                            <router-link to="/photographer">Фотография</router-link>
                        </li>
                        <li>
                            <router-link to="/transport">Транспорт</router-link>
                        </li>
                        <li>
                            <router-link to="/holiday">Праздник</router-link>
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

    export default{
        data() {
            return {
                language: 'pl'
            }
        },
        beforeMount() {
            this.getLanguage()
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

