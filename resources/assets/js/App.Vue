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
                    </ul>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>

