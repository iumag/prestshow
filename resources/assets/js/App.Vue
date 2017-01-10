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
                        <li><a href="#">Корзина</a></li>
                        <li><a href="#">Города</a></li>
                        <li>
                            <router-link to="/event">Мероприятия</router-link>
                        </li>
                        <li><a href="#">Мероприятия города</a></li>
                        <li><a href="#">Отели</a></li>
                        <li><a href="#">Фотография</a></li>
                        <li><a href="#">Транспорт</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>


</template>
